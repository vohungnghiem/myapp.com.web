@extends('admincp.layouts.light.master')
@section('title', 'Admincp | Add category')
@push('main') Category @endpush
@push('item') {{__('admin.create')}} @endpush
@push('linkmain'){{ 'admincp/categories' }}@endpush
@section('content')
    <div class="content-wrapper">
        @include('admincp.layouts.light.breadcrumb')
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="admincp/categories/store" autocomplete="off" enctype="multipart/form-data" class="col-12">
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h2 class="card-title"> FORM </h2>
                            <div class="card-tools nutluu">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-save"></i> {{__('admin.confirm')}} </button>
                                <a class="btn btn-sm btn-dark" href="admincp/categories"><i class="fas fa-list"></i> {{__('admin.back_list')}} </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body col-lg-4">
                                <div class="form-group">
                                    <label> Name </label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Parent </label>
                                    <select name="id_parent" class="form-control select2bs4">
                                        <option value="0">ROOT</option>
                                        {{showCategories($categories, $parent_id = 0, $char = ' &#9830;',0)}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Description </label>
                                    <textarea name="description" rows="2" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label> Sort </label>
                                    <input type="number" name="sort" value="1" class="form-control form-control-sm" style="width: 160px" placeholder="Sort">
                                </div>
                                <div class="form-group">
                                    <label> {{__('admin.status')}}</label>
                                    <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger" data-on-color="primary">
                                </div>
                            </div>
                            <div class="card-body col-lg-4">
                                <div class="form-group">
                                    <label> Image </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend lfm" data-input="thumbnail" data-preview="holder">
                                            <span class="input-group-text btn btn-info"><i class="far fa-image"> </i> &nbsp; choose image</span>
                                        </div>
                                        <input id="thumbnail" class="form-control d-none" type="text" name="image">
                                    </div>
                                    <div id="holder"> </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@push('css')

@endpush
@push('scripts')

@endpush
