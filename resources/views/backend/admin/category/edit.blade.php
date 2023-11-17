@extends('backend.admin.layouts.base')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">@csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="forCategory" class="form-label">Category Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$category->name}}">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="forCategory" class="form-label">Category Photo</label>
                                <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo">
                                @error('photo')
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