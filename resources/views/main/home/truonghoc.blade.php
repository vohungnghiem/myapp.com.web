<section class="lien-ket">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">@lang('main.home-lienket-title')</div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($truonghoc as $item)
                            <div class="swiper-slide">
                                <div class="box-img"><img src="{{$item->image}}" alt="school-1.png"></div>
                                <p>
                                    @php
                                        if (App::getLocale() == 'vi') {
                                            echo($item->ten);
                                        }else{
                                            echo($item->tenjp);
                                        }
                                    @endphp
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination"></div>
            </div>
        </div>
    </div>
</section>
