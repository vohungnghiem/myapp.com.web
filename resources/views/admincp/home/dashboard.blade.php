@extends('admincp.layouts.light.master')
@section('title', 'Admincp | Dashboard')
@push('main') {{ __('admin.home') }} @endpush
@push('item') {{ __('admin.dashboard') }} @endpush
@push('linkmain'){{ 'admincp' }}@endpush
    @section('content')
        <div class="content-wrapper">
            @include('admincp.layouts.light.breadcrumb')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                    <div class="row">

                    </div>
                </div>
            </section>
        </div>
    @endsection
    @push('scripts')

    @endpush
