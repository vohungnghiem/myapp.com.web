<section class="muc-tieu">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content">
                    @foreach ($muctieu as $item)
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
                <div class="line"></div>
            </div>
        </div>
    </div>
</section>
