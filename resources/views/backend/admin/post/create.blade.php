@extends('backend.admin.layouts.base')
@section('title', 'add Post')
@section('extra_style')
@endsection

@section('contents')
<div class="row">
<div class="d-flex justify-content-end">
        <a type="submit" class="btn  btn-primary mb-1 mt-0" href="{{route('admin.posts.index')}}">Posts</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Blog Post</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">@csrf
                            <div class="mb-3">
                                <label for="fullname" class="mt-3">Post Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Top 5 things to do in zanzibar" />
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="mt-45"> Body * </label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="editor" rows="10" cols="10"></textarea>
                                @error('body')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Thumbnail</label><br />
                                <img class="img-fluid img-thumbnail mb-3" id="preview-thumbnail" src="https://st3.depositphotos.com/1322515/35964/v/450/depositphotos_359648638-stock-illustration-image-available-icon.jpg" alt="preview banner" style="max-height: 250px;">
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                                @error('thumbnail')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('extra_js_script')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>


<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        fontFamily: {
            options: [
                'default',
                'Ubuntu, Arial, sans-serif',
                'Ubuntu Mono, Courier New, Courier, monospace'
            ]
        },
        toolbar: [
            'heading', 'bulletedList', 'numberedList', 'fontFamily', 'undo', 'redo'
        ]
    } )
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

        // previe thumbnail
        $('#thumbnail').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-thumbnail').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    @endsection