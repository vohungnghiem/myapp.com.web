<section class="cam-nhan">
    <div class="container">
        <div class="cam-nhan-inner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($camnhanhocvien as $item)
                        <div class="swiper-slide">
                            <figure>
                                <div class="box-img"><img src="{{$item->image}}" alt="user.jpg"></div>
                                <figcaption>
                                    <div class="item-title">
                                        <p class="name">{{$item->tenhocvien}}</p>
                                        <p>
                                            @php
                                                if (App::getLocale() == 'vi') {
                                                    echo($item->nganhnghe);
                                                }else{
                                                    echo($item->nganhnghejp);
                                                }
                                            @endphp
                                        </p>
                                        <p>@lang('main.home-camnhan-title2'): {{$item->ngayxuatcanh}}</p>
                                    </div>
                                    <div class="item-content">
                                        <p>
                                            @php
                                                if (App::getLocale() == 'vi') {
                                                    echo($item->noidung);
                                                }else{
                                                    echo($item->noidungjp);
                                                }
                                            @endphp
                                        </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pagination-wrap">
                <div class="pagination"></div><span>@lang('main.home-camnhan-title1')</span>
            </div>
        </div>
    </div>
</section>
