<section class="header-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="title">@lang('main.banner-title1')</h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        {{-- <div class="swiper-slide">
                            <p>Nơi làm việc: Tokyo</p>
                            <p>Công việc: Chế tạo kim loại xây dựng</p>
                            <p>Lương cơ bản: 140.000 YÊN</p>
                            <p>Ngày tuyển: 27/12/2019</p>
                            <div class="box-img"><img src="main_template/img/co-khi.jpg"
                                    alt="co-khi.jpg"></div>
                            <h3 class="sub-title">cơ khí</h3>
                        </div>
                        <div class="swiper-slide">
                            <p>Nơi làm việc: Tokyo</p>
                            <p>Công việc: Chế biến thực phẩm</p>
                            <p>Lương cơ bản: 140.000 YÊN</p>
                            <p>Ngày tuyển: 27/12/2019</p>
                            <div class="box-img"><img src="main_template/img/che-bien-thuc-pham.jpg"
                                    alt="che-bien-thuc-pham.jpg"></div>
                            <h3 class="sub-title">chế biến thực phẩm</h3>
                        </div> --}}
                    </div>
                    <div class="pagination"></div><a class="see-more" href="donhang">@lang('main.xemchitiet') </a>
                </div>
            </div>
            <div class="col-md-6 banner-right">
                <div class="figure">
                    {{-- <div class="box-img"><img src="main_template/img/header-banner.png"
                            alt="header-banner"></div> --}}
                            @foreach ($banner as $item)
                            <div class="box-img"><img src="{{$item->image}}" alt="header-banner"></div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
