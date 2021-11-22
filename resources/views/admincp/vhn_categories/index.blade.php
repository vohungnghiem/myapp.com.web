@extends('admincp.layouts.light.master')
@section('title', 'Admincp | Categories')
@push('main') Admin control panel @endpush
@push('item') Categories @endpush
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
                                <h3 class="card-title">Categories</h3>
                                <div class="card-tools">
                                    <a class="btn btn-sm btn-primary" href="admincp/categories/create"><i class="fas fa-plus"> </i> Add category</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        {{indexCategories($categories, $parent_id = 0, $char = ' &#9830;',0)}}
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
                columns: [
                    { width: '40%'},
                    { width: '20%'},
                    { width: '20%'},
                    { width: '10%'},
                    { width: '1%'},
                    { width: '1%'},
                ],
                search: {
                    "regex": true
                },
                "ordering": false,
            });
        });


    </script>
    <script>
        status('admincp/categories');
        destroy('admincp/categories');
    </script>
@endpush
