@extends('main.layouts.master')
@section('title', __('main.layout-tintuc-title3'))
@section('description', __('main.layout-tintuc-title3'))
@section('content')
    <main>
        <section class="page-banner"><img src="main_template/img/banner.jpg" alt="banner.jpg"></section>
			<section class="container">
				<nav class="breadcrumb">
					<a class="breadcrumb__step" href="/">@lang('main.trangchu')</a>
					<a class="breadcrumb__step breadcrumb__step--active" href="tintuc">@lang('main.layout-tintuc-title3')</a></nav>
			</section>
			<section class="tin-tuc tintuc-page">
				<div class="container">
					<div class="row" style="margin-bottom: 48px">
						<div class="col-12">
							<h2 class="title">@lang('main.layout-tintuc-title1')</h2>
						</div>
						<div class="col-lg-8">
							<div class="swiper-container">
								<div class="swiper-wrapper">
									@foreach ($tintuc as $item)
										<a class="swiper-slide" href="tintuc/{{$item->slug}}">
											<article>
												<div class="box-img"><img src="{{$item->image}}" alt="news-1.png"></div>
												<h4 class="article-title">
													@php
														if (App::getLocale() == 'vi') {
															echo($item->ten);
														}else{
															echo($item->tenjp);
														}
													@endphp
												</h4>
												<p class="posted">{{$item->created_at}}</p>
												<div class="item-content">
													<p>
														@php
															if (App::getLocale() == 'vi') {
																echo($item->description);
															}else{
																echo($item->descriptionjp);
															}
														@endphp
													</p>
												</div>
											</article>
										</a>
									@endforeach
								</div>
							</div>
							<div class="pagination"></div>
						</div>
						<div class="col-lg-4">
							<div class="tin-tuc-khac">
								@foreach ($tintucorther as $item)
									<div class="item">
										<p class="posted">{{date('d-m-Y',strtotime($item->created_at))}}</p>
										<a class="item-title" href="tintuc/{{$item->slug}}">
											@php
												if (App::getLocale() == 'vi') {
													echo($item->ten);
												}else{
													echo($item->tenjp);
												}
											@endphp
										</a>
									</div>
								@endforeach

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<h2 class="title">@lang('main.layout-tintuc-title2')</h2>
						</div>
						@foreach ($tinlienquan as $item)
							<div class="col-md-4">
								<article class="tintuc-item"><a href="tintuc/{{$item->slug}}">
										<div class="box-img"><img src="{{$item->image}}" alt="{{$item->image}}"></div>
										<h4 class="article-title">
											@php
												if (App::getLocale() == 'vi') {
													echo($item->ten);
												}else{
													echo($item->tenjp);
												}
											@endphp
										</h4>
										<p class="posted">{{$item->created_at}}</p>
										<div class="item-content">
											<p>
												@php
													if (App::getLocale() == 'vi') {
														echo($item->description);
													}else{
														echo($item->descriptionjp);
													}
												@endphp
											</p>
										</div>
									</a>
								</article>
							</div>
						@endforeach
					</div>
				</div>
			</section>
    </main>
@endsection
