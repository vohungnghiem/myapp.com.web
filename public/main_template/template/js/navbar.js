    // sticky

    window.onscroll = function() { mysticky() };
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function mysticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
    $(document).ready(function() {
        // search
        $(".search").on("click", function() {
            $('.search-form').slideToggle();
            var has_s = $(this).hasClass('has_s');
            if (has_s) {
                $(this).empty().removeClass('has_s').addClass('close_s').append('<i class="fas fa-times"></i>');
            } else {
                $(this).empty().removeClass('close_s').addClass('has_s').append(' <i class="fas fa-search"></i>');
            }
        });


        $('.nav-mobile').on("click", function() {
            $('.search-form').slideUp();
            $('.search').empty().addClass('has_s').removeClass('close_s').append(' <i class="fas fa-search"></i>');
            var height = $(window).height() - 60;
            $('.top-menu').css({
                "width": "100%",
                "height": height + "px",

            }).animate({
                width: 'toggle'
            });
        });

        // top-menu

        // mobile
        if ($('.nav-mobile').css('display') == 'block') {
            $('.top-menu').slideUp(); // ẩn top menu

            $(".search").on("click", function() {
                $('.top-menu').slideUp(); // ẩn form search
            });

            $('.sub-menu').on("click", function() {
                var index = $('.sub-menu').index(this);
                $('.sub-menu:eq(' + index + ') .dropdown-content').slideToggle();
                $('.sub-menu:eq(' + index + ') .dropbtn i').toggleClass('fa-chevron-up').fadeIn(1000);
            });
        } else {
            function search_form() {
                $('.search-form').slideUp();
                $('.search').empty().addClass('has_s').removeClass('close_s').append(' <i class="fas fa-search"></i>');
            }
            $('.sub-menu').on("mouseenter", function(e) {
                var index = $('.sub-menu').index(this);
                $('.sub-menu:eq(' + index + ') .dropdown-content').slideDown(300, function() {
                    $('.sub-menu:eq(' + index + ') .dropdown-content').stop();
                });
                $('.sub-menu:eq(' + index + ') .dropbtn i').removeClass('fa-chevron-down').addClass('fa-chevron-up').fadeIn();
                search_form();
            });
            $('.sub-menu').on("mouseleave", function(e) {
                var index = $('.sub-menu').index(this);
                $('.sub-menu:eq(' + index + ') .dropdown-content').slideUp(100, function() {
                    $('.sub-menu:eq(' + index + ') .dropdown-content').stop();
                });
                $('.sub-menu:eq(' + index + ') .dropbtn i').removeClass('fa-chevron-up').addClass('fa-chevron-down').fadeIn();
                search_form();
            });
        }


    });