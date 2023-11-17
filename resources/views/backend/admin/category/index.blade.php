@extends('backend.admin.layouts.base')
@section('title', 'Category List')
@section('extra_style')
<!-- DataTables -->
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Select datatable -->
<link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable -->
<link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

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
                        <table id="categoryDT" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Category Name</th>
                                    <th>No. of Products</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($categories) > 0)
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <img src="{{asset('photos/category_photo/'.$category->category_photo)}}" class="img-fluid">
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->products->count()}}</td>
                                    <td>
                                        <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$category->id}}">Del</button>
                                        <div id="deleteModal{{$category->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('admin.category.destroy', $category->id)}}" method="post">@csrf
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
                        <td colspan="4" class="text-center"><span class="text-danger">Create category</span> <a href="{{route('admin.category.create')}}">here</a></td>
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
        let now = new Date();
        let date_string = now.getFullYear() + '' + (now.getMonth() + 1).toString().padStart(2, '0') + '' + now.getDate().toString().padStart(2, '0');
        let date_footer = now.getFullYear() + '-' + (now.getMonth() + 1).toString().padStart(2, '0') + '-' + now.getDate().toString().padStart(2, '0');
        var title = 'All_Category_List_' + date_footer;

        $('#categoryDT').DataTable({
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
                                columns: [0, 2,3],
                            }
                        },
                        {
                            extend: "csv",
                            text: '<i class="bx bx-file me-2" ></i>Csv',
                            className: "dropdown-item",
                            title: title,
                            exportOptions: {
                                columns: [0, 2,3],

                            },
                        },
                        {
                            extend: "excel",
                            text: "Excel",
                            title: title,
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2,3],

                            },
                        },
                        {
                            extend: "pdf",
                            text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                            title: title,
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2,3],
                            },
                            customize: function(doc) {
                                doc.pageMargins = [20, 20, 20, 20];
                                // Remove spaces around page title
                                doc.content[0].text = doc.content[0].text.trim();
                                // Create a footer
                                doc['footer'] = (function(page, pages) {
                                    return {
                                        columns: [
                                            'Date: ' + date_footer,
                                            {
                                                // This is the right column
                                                alignment: 'right',
                                                text: ['page ', {
                                                    text: page.toString()
                                                }, ' of ', {
                                                    text: pages.toString()
                                                }]
                                            }
                                        ],
                                        margin: [10, 0]
                                    }
                                });
                                // Set table layout to 'fullWidth' for auto-fit
                                doc.content[1].table.widths = ['10%', '70%', '20%']
                                doc.content[1].layout = {
                                    hLineWidth: function(i, node) {
                                        return 1;
                                    },
                                    vLineWidth: function(i, node) {
                                        return 1;
                                    },
                                    hLineColor: function(i, node) {
                                        return '#aaa';
                                    },
                                    vLineColor: function(i, node) {
                                        return '#aaa';
                                    },
                                    fillColor: function(i, node) {
                                        return (i % 2 === 0) ? '#f2f2f2' : '#fff';
                                    },
                                    table: {
                                        widths: ['*'],
                                        headerRows: 1,
                                        body: doc.content[1].table.body
                                    },
                                    margin: [0, 0, 0, 0]

                                };
                            }
                        },
                        
                    ],
                },
                {
                    text: '<a href"add.php">Add Category</a>',
                    className: "btn btn-success ",
                    action: function() {
                        window.location = '{{route('admin.category.create')}}';
                    }
                },
            ]





        });

    });
</script>
@endsection