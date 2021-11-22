@extends('admincp.layouts.light.master')
@section('title', 'Admincp | Edit post')
@push('main') Post @endpush
@push('item') {{ __('admin.edit') }} @endpush
@push('linkmain'){{ 'admincp/posts' }}@endpush
    @section('content')
        <div class="content-wrapper">
            @include('admincp.layouts.light.breadcrumb')
            <section class="content">
                <div class="container-fluid">
                    <form method="POST" action="admincp/posts/{{ $post->id }}/update" autocomplete="off" enctype="multipart/form-data" class="col-lg-12">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h2 class="card-title"> FORM </h2>
                                <div class="card-tools nutluu">
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-save"></i> {{ __('admin.confirm') }} </button>
                                    <a class="btn btn-sm btn-dark" href="admincp/posts"><i class="fas fa-list"></i> {{ __('admin.back_list') }} </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-body col-lg-9">
                                    <div class="form-group">
                                        <label> Name </label>
                                        <input type="text" name="name" value="{{ old('name', $post->name) }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label> slug </label>
                                        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="summernote" name="content">{!! old('content', $post->content) !!}</textarea>
                                    </div>
                                </div>
                                <div class="card-body col-lg-3">
                                    <div class="form-group">
                                        <label> Image </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend lfm" data-input="thumbnail" data-preview="holder">
                                                <span class="input-group-text btn btn-info"><i class="far fa-image"> </i>
                                                    &nbsp; Choose image</span>
                                            </div>
                                            <input id="thumbnail" class="form-control d-none" type="text" name="image"
                                                value="{{ $post->image }}">
                                        </div>
                                        <div id="holder">
                                            <img src="{{ $post->image }}" style="height: 10rem;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Category </label>
                                        <select name="id_category" class="form-control select2bs4">
                                            <option value="0">ROOT</option>
                                            {{ showCategories($categories, $parent_id = 0, $char = ' &#9830;', $post->id_category) }}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Caption </label>
                                        <textarea name="caption" rows="2" class="form-control">{!!$post->caption!!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label> Description </label>
                                        <textarea name="description" rows="2" class="form-control">{!!old('description', $post->description)!!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label> Key </label>
                                        <input type="text" name="key" class="form-control" value="{{old('key', $post->key)}}">
                                    </div>
                                    <div class="form-group">
                                        <label> Link </label>
                                        <input type="text" name="link" class="form-control" value="{{old('link', $post->link)}}">
                                    </div>
                                    <div class="form-group">
                                        <label> Sort </label>
                                        <input type="number" name="sort" value="{{old('sort', $post->sort)}}" class="form-control form-control-sm" style="width: 160px" placeholder="Sort">
                                    </div>
                                    <div class="form-group">
                                        <label> {{ __('admin.status') }}</label>
                                        <input type="checkbox" name="status" @if ($post->status == 1) checked @endif data-bootstrap-switch
                                            data-off-color="danger" data-on-color="primary">
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
