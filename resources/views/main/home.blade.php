@extends('main.layouts.master')

    @section('title', __('main.trangchu'))
    @section('description',__('main.trangchu'))
    @section('content')

    <main>
        @include('main.home.banner')
        {{-- @include('main.home.donhang') --}}
        @include('main.home.gioithieu')
        @include('main.home.muctieu')
        @include('main.home.hoso')
        @include('main.home.camnhan')
        @include('main.home.tintuc')
        @include('main.home.truonghoc')
        @include('main.home.hinhanh')
        @include('main.home.lienhe')
    </main>
@endsection

