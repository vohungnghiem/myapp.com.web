@extends('admincp.layouts.light.master')
@section('title', 'Admincp | Posts')
@push('main') Admin control panel @endpush
@push('item') Posts @endpush
@push('linkmain'){{'admincp'}}@endpush
@section('content')
    <div class="content-wrapper">
        @include('admincp.layouts.light.breadcrumb')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Posts</h3>
                                <div class="card-tools">
                                    <a class="btn btn-sm btn-primary" href="admincp/posts/create"><i class="fas fa-plus"> </i> Add post</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>Category</th>
                                            <th>image</th>
                                            <th>{{__('admin.status')}}</th>
                                            <th class="text-center">{{__('admin.action')}}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="admin_template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        img {max-width:100% !important;}
    </style>
@endpush
@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="admin_template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin_template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin_template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin_template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $.fn.dataTable.ext.errMode = 'throw';
            $('#myTable').DataTable({
                stateSave: true,
                processing: true,
                serverSide: true,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                ajax: 'admincp/datatables/posts',
                columns: [
                    { data: 'id',"width": "5px" },
                    { data: 'name', "width": "40%" },
                    { data: 'category', "width": "40%" },
                    { data: 'image', "width": "10%" },
                    { data: 'status', "width": "1%" },
                    { data: 'action', "width": "1%", "className": "text-center" },
                ],
                "columnDefs": [{
                    "searchable": true,
                    "orderable": true,
                }],
                "ordering": true,
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    var index = iDisplayIndexFull + 1;
                    $('td:eq(0)', nRow).html(index);
                    return nRow;
                },
                search: {
                    "regex": true
                },
            });
        });
    </script>
    <script>
        status('admincp/posts');
        destroy('admincp/posts');
    </script>
@endpush
