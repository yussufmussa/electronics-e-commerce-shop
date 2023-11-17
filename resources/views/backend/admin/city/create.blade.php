@extends('backend.admin.layouts.base')
@section('title', 'Add City')
@section('extra_style')
<link href="{{asset('backend/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('contents')
<div class="row">
<div class="d-flex justify-content-end">
        <a  type="submit" class="btn  btn-primary mb-1 mt-0" href="{{route('admin.city.index')}}">Cities</a>
        </div>
        
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New city</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('admin.city.store')}}" method="post">@csrf
                            <div class="mb-3">
                                <label for="forcity" class="form-label">City</label>
                                <input class="form-control @error('city_name') is-invalid @enderror" type="text" name="city_name" value="{{old('city_name')}}">
                                @error('city_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>                           

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>

                    </form>
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra_js_script')
<script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();

    });
</script>
@endsection