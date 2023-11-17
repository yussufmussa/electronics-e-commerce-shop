@extends('backend.admin.layouts.base')

@section('extra_style')
<!-- DataTables -->
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Select datatable -->
<link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable -->
<link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('title', 'Admin - role List')

@section('contents')
<div class="row">
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible ">
        {{ Session::get('message') }}
    </div>

    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="table-responsive">
                        <table id="roleDT" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($roles) > 0)
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$role->id}}">Del</button>
                                        <div id="deleteModal{{$role->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('admin.role.destroy', $role->id)}}" method="post">@csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
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
                    @else
                    <tr>
                        <td colspan="4" class="text-center"><span class="text-danger">Create role</span> <a href="{{route('admin.role.create')}}">here</a></td>
                    </tr>
                    @endif
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

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
<script>
    $(document).ready(function() {
        var now = new Date();
        var date_string = now.getFullYear()+''+now.getMonth()+''+now.getDay();
        var title = 'All_role_List_'+date_string;

        $('#roleDT').DataTable({
            dom: '<"row mb-2"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            buttons: [{
                    extend: "collection",
                    className: "btn btn-info dropdown-toggle",
                    text: '<i class="bx bx-export me-sm-2"></i> <span class="d-none d-sm-inline-block">Export</span>',
                    buttons: [{
                            extend: "print",
                            text: '<i class="bx bx-printer me-2" ></i>Print',
                            title: title,
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2],

                            }
                        },
                        {
                            extend: "csv",
                            text: '<i class="bx bx-file me-2" ></i>Csv',
                            className: "dropdown-item",
                            title: title,
                            exportOptions: {
                                columns: [0, 1, 2],

                            },
                        },
                        {
                            extend: "excel",
                            text: "Excel",
                            title: title,
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2],

                            },
                        },
                        {
                            extend: "pdf",
                            text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                            title:title,
                            customize: function(doc) {
                                doc.content[1].table.widths =
                                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            },
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2],
                            },
                        },
                        {
                            extend: "copy",
                            text: '<i class="bx bx-copy me-2" ></i>Copy',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2],
                            },
                        },
                    ],
                },
                {
                    text: '<a href"add.php">Add role</a>',
                    className: "btn btn-success ",
                    action: function() {
                        window.location = '{{route('admin.role.create')}}';
                    }
                },
            ]





        });

    });
</script>
@endsection