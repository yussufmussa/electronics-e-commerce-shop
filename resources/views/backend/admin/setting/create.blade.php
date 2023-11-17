@extends('backend.admin.layouts.base')
@section('title', 'Site General info')
@section('content_heading', 'General Site Settings')
@section('contents')
@if(count($infos) > 0)
<div class="row">
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Brand Logo</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('admin.info.save')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="forCategory" class="form-label">Logo</label>
                                <img class="img-fluid img-thumbnail mb-3" id="logoPreview" src="{{ asset('photos/general/'.$info->logo) }}" alt="preview banner" style="max-height: 80px;">
                                <input type="file" name="logo" class="form-control">
                                @error('logo')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="forCategory" class="form-label">Favicon</label>
                                <img class="img-fluid img-thumbnail mb-3" id="faviconPreview" src="{{ asset('photos/general/'.$info->favicon) }}" alt="preview banner" style="max-height: 80px;">
                                <input type="file" name="favicon" class="form-control">
                                @error('favicon')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$info->id}}">
                        </div>  <!-- end brand -->

                        <div class="row">
                            <label for="">Hero Background</label>
                            <div class="col-md-12 mb-3">
                                <img class="img-fluid img-thumbnail mb-3" id="heroPreview" src="{{ asset('photos/general/'.$info->hero_bg) }}" alt="preview banner" style="max-height: 1920px;">
                                <input type="file" name="hero_bg" class="form-control" id="hero_bg">
                                @error('hero_bg')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>  <!-- end brand -->

                       

                        <h4 class="card-title mt-3">Social Media</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{$info->facebook}}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{$info->instagram}}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Trip Advisor</label>
                                <input type="text" name="tripadvisor" class="form-control" value="{{$info->tripadvisor}}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{$info->twitter}}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" value="{{$info->linkedin}}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Youtube</label>
                                <input type="text" name="youtube" class="form-control" value="{{$info->youtube}}">
                            </div>
                        </div> <!-- end social media row -->

                    <h4 class="card-title mt-3">General Contacts</h4>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Email 1</label>
                            <input type="email" name="email_address_1" class="form-control" value="{{$info->email_address_1}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Email 2</label>
                            <input type="email" name="email_address_2" class="form-control" value="{{$info->email_address_2}}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Mobile Phone 1</label>
                            <input type="text" name="mobile_phone_1" class="form-control" value="{{$info->mobile_phone_1}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Mobile Phone 2</label>
                            <input type="text" name="mobile_phone_2" class="form-control" value="{{$info->mobile_phone_2}}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" value="{{$info->location}}">
                        </div>
                    </div> <!-- end general contacts -->

                    <!-- SEO Manager -->
                    <div class="row">
                    <h4 class="card-title mt-3">SEO Manager</h4>
                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Site Keywords</label>
                        <input type="text" name="keywords" class="form-control" value="{{$info->keywords}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Site Name</label>
                        <input type="text" name="name" class="form-control" value="{{$info->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Site Title</label>
                        <input type="text" name="title" class="form-control" value="{{$info->title}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Google Analytics</label>
                        <input type="text" name="google_analytics_link" class="form-control"  value="{{$info->google_analytics_link}}">
                    </div>

                    <div class="mb-3">
                        <label for="forCategory" class="form-label">Description</label>
                        <textarea name="meta_description" id="" cols="30" rows="10" class="form-control">{{$info->meta_description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </form>
                    </div> <!-- end seo manager -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>

<!-- if the setting is empty create new records -->
@else
<div class="row">
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Brand Logo</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('admin.info.save')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                
                                <img class="img-fluid img-thumbnail mb-3" id="logoPreview" src="https://st3.depositphotos.com/1322515/35964/v/450/depositphotos_359648638-stock-illustration-image-available-icon.jpg" alt="preview banner" style="max-height: 80px;">
                                <input type="file" name="logo" class="form-control" id="logo">
                                @error('logo')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="forCategory" class="form-label">Favicon</label>
                                <img class="img-fluid img-thumbnail mb-3" id="faviconPreview" src="https://st3.depositphotos.com/1322515/35964/v/450/depositphotos_359648638-stock-illustration-image-available-icon.jpg" alt="preview banner" style="max-height: 80px;">
                                <input type="file" name="favicon" class="form-control" id="favicon">
                                @error('favicon')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>  <!-- end brand -->

                        <div class="row">
                            <label for="">Hero Background</label>
                            <div class="col-md-12 mb-3">
                                <img class="img-fluid img-thumbnail mb-3" id="heroPreview" src="https://st3.depositphotos.com/1322515/35964/v/450/depositphotos_359648638-stock-illustration-image-available-icon.jpg" alt="preview banner" style="max-height: 1920px;">
                                <input type="file" name="hero_bg" class="form-control" id="hero_bg">
                                @error('hero_bg')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>  <!-- end brand -->

                        <h4 class="card-title mt-3">Social Media</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Facebook</label>
                                <input type="text" name="facebook" class="form-control" >
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Instagram</label>
                                <input type="text" name="instagram" class="form-control" >
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Trip Advisor</label>
                                <input type="text" name="tripadvisor" class="form-control" >
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Twitter</label>
                                <input type="text" name="twitter" class="form-control" >
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="forCategory" class="form-label">Youtube</label>
                                <input type="text" name="youtube" class="form-control" >
                            </div>
                        </div> <!-- end social media row -->

                    <h4 class="card-title mt-3">General Contacts</h4>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Email 1</label>
                            <input type="email" name="email_address_1" class="form-control" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Email 2</label>
                            <input type="email" name="email_address_2" class="form-control" >
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Mobile Phone 1</label>
                            <input type="text" name="mobile_phone_1" class="form-control" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Mobile Phone 2</label>
                            <input type="text" name="mobile_phone_2" class="form-control" >
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="forCategory" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" >
                        </div>
                    </div> <!-- end general contacts -->

                    <!-- SEO Manager -->
                    <div class="row">
                    <h4 class="card-title mt-3">SEO Manager</h4>
                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Site Keywords</label>
                        <input type="text" name="keywords" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Site Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Site Title</label>
                        <input type="text" name="title" class="form-control" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="forCategory" class="form-label">Google Analytics</label>
                        <input type="text" name="google_analytics_link" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="forCategory" class="form-label">Description</label>
                        <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

        
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </form>
                    </div> <!-- end seo manager -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('extra_js_script')
<script type="text/javascript">
        $('#logo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#logoPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#favicon').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#faviconPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#hero_bg').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#heroPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
</script>
@endsection