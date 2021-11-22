<section class="ho-so container">
    <div class="ho-so-inner">
        <div class="left">
            <p>@lang('main.home-hoso-title1')</p>
            <p>@lang('main.home-hoso-title2')</p>
            <p>@lang('main.home-hoso-title3')</p>
            <p>@lang('main.home-hoso-title4')</p>
            <p>@lang('main.home-hoso-title5')</p>
        </div>
        <div class="right">
            @foreach ($hosocanchuanbi as $item)
                <p>
                    @php
                        if (App::getLocale() == 'vi') {
                            echo($item->ten);
                        }else{
                            echo($item->tenjp);
                        }
                    @endphp
                </p>
            @endforeach
        </div>
    </div>
</section>
