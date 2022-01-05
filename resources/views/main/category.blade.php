@extends('main.layouts.master')

    @section('title', __('main.category'))
    @section('description',__('main.category'))
    @section('content')

    <section class="container mt-3 page category-page">
        <div class="row">
            @for ($i = 0; $i < 8; $i++)
            <div class="col-lg-3 h-100 d-table">
                <div class="card card-body d-table-cell align-middle">
                    <a href="post"><img src="main_template/image/logo/logo.png" alt=""></a>
                    <h3><a href="post">vo hung nghiem</a></h3>
                </div>
            </div>
            @endfor

        </div>
    </section>
@endsection
@push('styles')

@endpush
@push('scripts')

@endpush
