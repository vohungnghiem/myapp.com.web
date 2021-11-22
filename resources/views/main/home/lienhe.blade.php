<section class="lien-he">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="title">@lang('main.home-lienhe-title1')</h2>
                <form class="contact-form" method="post"  action="storeLienHe">
                    {{ csrf_field() }}
                    <div class="form-item">
                        <input type="text" name="hovaten" placeholder="@lang('main.home-lienhe-title2')" value="{{ old('hovaten') }}" required>
                    </div>
                    <div class="form-item">
                        <input type="text" name="email" placeholder="exemple@email.com"  value="{{ old('email') }}" required>
                    </div>
                    <div class="form-item">
                        <input type="text" name="tieude" placeholder="@lang('main.home-lienhe-title3')"  value="{{ old('tieude') }}" >
                    </div>
                    <div class="form-item">
                        <input type="text" name="sodienthoai" placeholder="@lang('main.home-lienhe-title4')"  value="{{ old('sodienthoai') }}">
                    </div>
                    <div class="form-item">
                        <textarea id="content" name="noidung" placeholder="@lang('main.home-lienhe-title5')" value="{{ old('noidung') }}" required></textarea>
                    </div>
                    <input class="contact-send" type="submit" value="@lang('main.home-lienhe-title6')">
                </form>
            </div>
            <div class="col-md-8">
                <div class="box-img"><img src="main_template/img/header-banner.png" alt="header-banner"></div>
            </div>
        </div>
    </div>
</section>
