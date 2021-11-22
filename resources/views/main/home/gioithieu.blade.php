<div class="container gioi-thieu">
    <div class="row gioi-thieu-wrap">
        <div class="gioi-thieu-inner">
            <div class="content">
                @foreach ($gioithieuhomefirst as $item)
                    <h2 class="title">
                        @php
                            if (App::getLocale() == 'vi') {
                                echo($item->ten);
                            }else{
                                echo($item->tenjp);
                            }
                        @endphp
                    </h2>
                    <p>
                        @php
                            if (App::getLocale() == 'vi') {
                                echo($item->noidung);
                            }else{
                                echo($item->noidungjp);
                            }
                        @endphp
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<section class="tieu-bieu">
    <div class="container grid-container">
        @foreach ($gioithieuhome as $item)
            <div class="item">
                <div class="box-img"><img src="{{$item->image}}" alt="{{$item->ten}}"></div>
                <h3 class="sub-title">
                    @php
                        if (App::getLocale() == 'vi') {
                            echo($item->ten);
                        }else{
                            echo($item->tenjp);
                        }
                    @endphp
                </h3>
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
        @endforeach

    </div>
</section>
