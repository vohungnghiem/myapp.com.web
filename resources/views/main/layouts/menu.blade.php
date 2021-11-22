@php
    $menu = DB::table('vhn_menu')->where('stt', '=', '1')->orderBy('id','asc')->get();
    function showmenu($item) {
        $showmenu = '';
        if (App::getLocale() == 'vi') {
            $showmenu = $item->ten;
        }else{
            $os = array(2,3,4);
            if (!in_array($item->id, $os)) {
                $showmenu = $item->tenjp;
            }
        }
        return $showmenu;
    }
@endphp
<header>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12 flex-box">
                    <div class="logo"><a href="#"><img src="main_template/img/logo.png" alt="logo"></a></div>
                    <div class="hamburger"></div>
                    <nav class="header-nav">
                        <li><a class="active" href="/">@lang('main.trangchu')</a></li>
						<li><a href="/gioithieu">@lang('main.gioithieu')</a></li>
                        @foreach ($menu as $item)
							<li><a href="{{$item->link}}">{{showmenu($item)}}</a></li>
						@endforeach
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($language['status'] == 1)
                                <li><a href="{{ route('lang.switch', $lang) }}"><img src="main_template/img/flag{{ $language['flag-icon'] }}.png" alt="flag{{ $language['flag-icon'] }}.png"></a></li>
                            @endif
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-mobile">
        <nav>
            <li>
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($language['status'] == 1)
                        <a href="{{ route('lang.switch', $lang) }}"><img
                                src="main_template/img/flag{{ $language['flag-icon'] }}.png" alt="flag{{ $language['flag-icon'] }}.png"></a>
                    @endif
                @endforeach
            </li>
            @foreach ($menu as $item)
                <li><a href="{{$item->link}}">{{showmenu($item)}}</a></li>
            @endforeach
        </nav>
    </div>
</header>
