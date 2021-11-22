@extends('main.layouts.master')
@section('title', __('main.home-donhang-title3'))
@section('description', __('main.home-donhang-title3'))
@section('content')
<main>
    <section class="page-banner"><img src="main_template/img/banner.jpg" alt="banner.jpg"></section>
    <section class="don-hang">
        <h2 class="title text-center">@lang('main.home-donhang-title1')</h2>
        <div class="container">
            <div class="row">
                <div class="table-wrap">
                    <table id="example">
                        <thead>
                            <tr>
                                <th>@lang('main.home-donhang-title2')</th>
                                <th>@lang('main.home-donhang-title3')</th>
                                <th>@lang('main.home-donhang-title4')</th>
                                <th>@lang('main.home-donhang-title5')</th>
                                <th>@lang('main.home-donhang-title6')</th>
                                <th>@lang('main.home-donhang-title7')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donhang as $dh)
                                <tr>
                                    <td><a href="donhang/{{$dh->id}}">[{{$dh->tendonhang}}] {{$dh->nganhnghe_vn}}</a></td>
                                    <td><a href="donhang/{{$dh->id}}">{{$dh->tendonhang}}</a></td>
                                    <td><span>{{$dh->luongcoban}}</span></td>
                                    @if ($dh->trinhdo=='')
                                        <td><span class="">Không</span></td>
                                    @else
                                        <td><span class="{{$dh->trinhdo}}">{{$dh->trinhdo}}</span></td>
                                    @endif
                                    <td><a href="donhang/{{$dh->id}}">{{$dh->noilamviec}}</a></td>
                                    <td> {{$dh->ngaytuyenbd}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
