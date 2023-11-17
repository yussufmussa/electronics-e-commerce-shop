@extends('backend.admin.layouts.base')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('admin.city.update', $city->id)}}" method="post">@csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="forcity" class="form-label">City Name</label>
                                <input class="form-control @error('city_name') is-invalid @enderror" type="text" name="city_name" value="{{$city->city_name}}">
                                @error('city_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save & update</button>
                    </div>

                    </form>
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>

@endsection