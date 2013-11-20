        //infinite scrolling
            $(window).scroll(function() {
                if ($(window).scrollTop() > window.innerHeight) {
                    if (!$(".scrolltotop").hasClass("active")) {
                        $(".scrolltotop").addClass("active");
                    }
                } else {
                    $(".scrolltotop").removeClass("active");
                }
            });
     
            $(".scrolltotop").on("click", function(ev) {
                ev.preventDefault();
                $("body, html").animate({
                    scrollTop: 0
                }, 600);
            });