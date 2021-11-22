<section class="tin-tuc">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="title">tin tức hoạt động</h2>
                <p>Chọn giáo dục & việc làm là cơ sở cốt lõi cho sự phát triển một xã hội phồn vinh & bền vững nhất</p>
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
    </div>
</section>
