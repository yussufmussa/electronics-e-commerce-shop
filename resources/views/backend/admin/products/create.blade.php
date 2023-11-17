@extends('backend.admin.layouts.base')
@section('extra_style')
@endsection
@section('title', 'Add Products')
@section('contents')
<div class="row">
    <div class="d-flex justify-content-end">
        <a type="submit" class="btn  btn-primary mb-1 mt-0" href="{{route('admin.products.index')}}">Products</a>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Product</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="mb-3">
                                <label for="forCategory" class="form-label">Upload Produt Photo</label>
                                <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail">
                                @error('thumbnail')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="forCategory" class="form-label">Product Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="forCategory" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter product description" cols="50" rows="5"></textarea>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="forCategory" class="form-label">Product Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="">--Select Category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="forCategory" class="form-label">Price(Tsh)</label>
                                <input class="form-control @error('price') is-invalid @enderror" type="text" name="price">
                                @error('price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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
@endsection