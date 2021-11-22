@extends('main.layouts.master')
@section('title', __('messages.layout-giayphep'))
@section('description', __('messages.layout-giayphep'))
@section('content')
    <main>
        <section class="page-banner"><img src="main_template/img/banner.jpg" alt="banner.jpg"></section>
        <section class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb__step" href="#">Trang chủ</a>
                <a class="breadcrumb__step breadcrumb__step--active" href="#">Giấy phép</a>
            </nav>
            <section class="news-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-wrap">
                                <img src="main_template/img/giayphep.png" alt="giay-phep" style="width:100%">
                            </div>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection
