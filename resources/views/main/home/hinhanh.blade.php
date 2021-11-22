<section class="bo-suu-tap">
    <div class="container">
        <div class="bo-suu-tap-inner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @php
                         $i=0;
                    @endphp
                    @foreach ($hinhanh as $item)
                        @php

                            $ha_array = json_decode($item->hinhanh);
                        @endphp
                        <div class="swiper-slide">
                            <div class="box-img"><a href="{{$ha_array[0]}}" data-fancybox="{{$item->slug}}"><img src="{{$ha_array[0]}}" alt="{{$item->slug}}"></a></div>
                                <div class="gallery">
                                    @foreach ($ha_array as $item1)
                                        <div class="box-img"><a href="{{$item1}}" data-fancybox="{{$item->slug}}"><img src="{{$item1}}" alt=""></a></div>
                                    @endforeach
                                </div>
                            <div class="text-center">
                                <span>
                                    @php
                                        if (App::getLocale() == 'vi') {
                                            echo($item->ten);
                                        }else{
                                            echo($item->tenjp);
                                        }
                                    @endphp
                                </span>
                            </div>
                        </div>

                    @endforeach
                    @php
                            $i++;
                        @endphp
                </div>
            </div>
            <div class="pagination-wrap">
                <div class="pagination"></div><span>@lang('main.home-hinhanh-title')</span>
                <div class="line"></div>
            </div>
        </div>
    </div>
</section>
