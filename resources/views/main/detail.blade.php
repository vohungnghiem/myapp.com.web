@extends('main.layouts.master')
    @section('title', "$detail->ten")
    @section('description', "$detail->ten")
    @section('content')

    <section class="page-banner"><img src="main_template/img/banner.jpg" alt="banner.jpg"></section>
<section class="container">
	<nav class="breadcrumb">
		<a class="breadcrumb__step" href="/">@lang('main.trangchu')</a>
		<a class="breadcrumb__step" href="tintuc">@lang('main.layout-tintuc-title3')</a>
		<a class="breadcrumb__step breadcrumb__step--active" href="tintuc/{{$detail->slug}}">{{$detail->ten}}</a></nav>
	<section class="page-ct-tintuc row">
		<div class="col-md-9">
			<h2 class="sub-title color-title">{{$detail->ten}}</h2>
			<div class="line"></div>
			<div class="content post-content">
				{!!$detail->noidung!!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="viec-lam-mirai">
				<h3 class="sub-title color-title">@lang('main.vieclammirai')</h3>
				<div class="line"></div>
				<nav class="list-viec-lam">
					@foreach ($donhang  as $item)
						<li><a class="hot" href="donhang/{{$item->id}}">[ {{$item->tendonhang}} ] - {{$item->nganhnghe_vn}}</a></li>
					@endforeach
				</nav>
			</div>
		</div>
	</section>
</section>
<script>
	$('.post-content p img').each(function () {
		$(this).attr('src', $(this).attr('src')).css({
        display: "block",
        margin: "16px auto 0"
        });
		$(this).parent().append("<p style='text-align:center;font-style:italic'>" + $(this).attr('alt') + "</p>");
	});
</script>
@endsection
