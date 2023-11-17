<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'Bin Electronic Shop',
            'meta_description' => 'Order smartphones, laptop, smart watch etc online from bin e electronics store',
            'google_analytics_link' => '',
            'mobile_phone_1' => '+255 773 830 093',
            'keywords' => 'Mobile shop online, Tanzania Shop',
            'name' => 'Bin Electronic Shop',
            'title' => 'Bin Electronics Strone',
        ]);
    }
}
