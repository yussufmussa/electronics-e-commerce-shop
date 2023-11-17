<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Setting;

class GeneralSiteSettingController extends Controller
{
    public function index()
    {
        $info = Setting::all()->first();
        $infos = Setting::all();
        return view('backend.admin.setting.create', compact('info', 'infos'));
    }

    public function store(Request $request)
    {
        //get current info if present
        $contact = Setting::all();

        if ($contact->isEmpty()) {
            $info = new Setting();
            $info->email_address_1 = $request->email_address_1;
            $info->email_address_2 = $request->email_address_2;
            $info->mobile_phone_1 = $request->mobile_phone_1;
            $info->mobile_phone_2 = $request->mobile_phone_2;
            $info->location = $request->location;
            $info->facebook = $request->facebook;
            $info->instagram = $request->instagram;
            $info->twitter = $request->twitter;
            $info->youtube = $request->youtube;
            $info->linkedin = $request->linkedin;
            $info->keywords =  $request->keywords;
            $info->title =  $request->title;
            $info->name =  $request->name;
            $info->meta_description = $request->meta_description;
            $info->google_analytics_link = $request->google_analytics_link;

            if ($request->hasFile('logo')) {
                $request->validate([
                    'logo' => 'mimes:png,jpg|max:2048',
                ]);
                $newName = Str::uuid() . '.' . $request->logo->extension();
                $info->logo = $newName;
                $request->logo->move(public_path('photos/general/'), $newName);
            }

            if ($request->hasFile('favicon')) {
                $request->validate([
                    'favicon' => 'mimes:png,jpg|max:2048',
                ]);
                $newName = Str::uuid() . '.' . $request->favicon->extension();
                $info->favicon = $newName;
                $request->favicon->move(public_path('photos/general/'), $newName);
            }

            if ($request->hasFile('hero_bg')) {
                $request->validate([
                    'hero_bg' => 'mimes:png,jpg,jpeg|max:2048',
                ]);
                $newName = Str::uuid() . '.' . $request->hero_bg->extension();
                $info->hero_bg = $newName;
                $request->hero_bg->move(public_path('photos/general'), $newName);
                $image = Image::make(public_path('photos/general/' . $newName));
                $image->resize(1920, 1024, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->save(public_path('photos/general/' . $newName));
            }

            $save = $info->save();
        } else {
            $getInfo = Setting::find($request->id);

            $data = [
                'email_address_1' => $request->email_address_1,
                'email_address_2' => $request->email_address_2,
                'mobile_phone_1' => $request->mobile_phone_1,
                'mobile_phone_2' => $request->mobile_phone_2,
                'location' => $request->location,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'tripadvisor' => $request->tripadvisor,
                'keywords' => $request->keywords,
                'meta_description' => $request->meta_description,
                'title' =>  $request->title,
                'name' => $request->name,
                'google_analytics_link' => $request->google_analytics_link,
            ];
            if ($request->hasFile('logo')) {
                $request->validate([
                    'logo' => 'image|mimes:png,jpg, JPG|max:2048',
                ]);

                $newName = Str::uuid() . '.' . $request->logo->extension();
                $logoPath = public_path() . '/photos/general/' . $getInfo->logo;
                File::delete($logoPath);
                $request->logo->move(public_path('photos/general/'), $newName);
                $data['logo'] = $newName;
            }

            if ($request->hasFile('favicon')) {
                $request->validate([
                    'favicon' => 'image|mimes:png,jpg,JPG|max:2048',
                ]);

                $newName = Str::uuid() . '.' . $request->favicon->extension();
                $logoPath = public_path() . '/photos/general/' . $getInfo->favicon;
                File::delete($logoPath);
                $request->favicon->move(public_path('photos/general/'), $newName);
                $data['favicon'] = $newName;
            }

            if ($request->hasFile('hero_bg')) {
                $request->validate([
                    'hero_bg' => 'image|mimes:png,jpg,JPG,jpeg|max:2048',
                ]);
                $newName = Str::uuid() . '.' . $request->hero_bg->extension();
                $bgPath = public_path() . '/photos/general/' . $getInfo->hero_bg;
                File::delete($bgPath);
                $request->hero_bg->move(public_path('photos/general/'), $newName);
                $data['hero_bg'] = $newName;
                
                $image = Image::make(public_path('photos/general/' . $newName));
                $image->resize(1920, 1024, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->save(public_path('photos/general/' . $newName));
            }

            $update = $getInfo->update($data);
        }

        return back()->with('message', 'Site info Updated');
    }
}
