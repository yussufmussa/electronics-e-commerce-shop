@extends('backend.admin.layouts.base')
@section('extra_style')
<!-- DataTables -->
<link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Select datatable -->
<link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable -->
<link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('title', 'Posts')
@section('contents')
<div class="row">
<div class="d-flex justify-content-end">
        <a type="submit" class="btn  btn-primary mb-1 mt-0" href="{{route('admin.posts.create')}}">Add Post</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    {{ Session::get('message') }}
                </div>
                @endif

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{asset('photos/posts/'.$post->thumbnail)}}" alt="" width="100px" height="100px" class="img-responsive img-thumbnail"></td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td> 

                            <td> <input type="checkbox" id="switch{{$post->id}}" switch="none" class="switch" name="status" {{ $post->status == 'published' ? 'checked' : '' }} value="{{$post->id}}">
                                <label for="switch{{$post->id}}" data-on-label="On" data-off-label="Off"></label>
                            </td>


                            <td>
                                <a href="{{route('post.details', $post->slug)}}" target="_blank" class="btn btn-sm btn-info">view</a>
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$post->id}}">Del</button>
                                <div id="deleteModal{{$post->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">@csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Warning!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <h4>Are you sure??</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Yes, Delete</button>
                                                </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </td>
            </tr>

            @endforeach
            </tbody>
            </table>

        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
</div> <!-- end col -->
</div> <!-- end row -->
@endsection
@section('extra_js_script')
<!-- Required datatable js -->
<script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-keyTable/js/dataTables.keyTable.min.html')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Datatable init js -->
<script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $('.switch').change(function() {
        let status = $(this).prop('checked') === true ? 'published' : 'draft';
        let post_id = $(this).val();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/statusUpdate',
            data: {
                'status': status,
                'id': post_id
            },
            success: function(data) {
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            }
        });
    });
</script>

@endsection