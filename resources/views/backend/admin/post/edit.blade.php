@extends('backend.admin.layouts.base')
@section('title', 'Edit '.$post->title.'')
@section('extra_style')
@endsection
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Post</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="{{route('admin.posts.update', $post->id)}}" enctype="multipart/form-data">@csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="fullname" class="mt-3">Post Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" />
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="mt-45"> Body * </label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="editor" rows="10" cols="10">
                                {{$post->body}}
                                </textarea>
                                @error('body')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Thumbnail</label><br />
                                <img class="img-fluid img-thumbnail mb-3" id="preview-thumbnail" src="{{asset('photos/posts/'.$post->thumbnail)}}" alt="preview banner" style="max-height: 250px;">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
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