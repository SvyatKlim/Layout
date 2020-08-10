
$(function () {
    cloudScroll()

    $('.dot').hover(function () {
        $( this ).find( ".info" ).addClass('visible')
    });
    $('.dot').mouseleave(function () {
        $( this ).find( ".info" ).removeClass('visible')
    })
    $('.dot ').click(function (ev) {
        if(!$(this).hasClass('active')){
            $('.dot.active').removeClass('active');
            $(this).addClass('active')
            if ($(this).hasClass('dot4')) {
                scroll('#footerMon');
            }
            if ($(this).hasClass('dot1')) {
                scroll('#firstMon');

            }
            if ($(this).hasClass('dot2')) {
                scroll('#secondMon');

            }
            if ($(this).hasClass('dot3')) {
                scroll('#thirdMon');
            }
        }

    })

    $('.fa-caret-up').each(function (index, item) {
        $(item).click(function () {
            let dots = $('.dot');
            if (index === 0) {
                scroll('#firstMon')
            } else if (index === 1) {
                scroll('#secondMon')
            } else if (index === 2) {
                scroll('#thirdMon')
            }
            $('.dot.active').removeClass('active');
            $(dots[index]).addClass('active')
        })
    })
    $('.fa-caret-down').each(function (index, item) {
        $(item).click(function () {
            let dots = $('.dot');
            console.log(dots[2])
            if (index === 0) {
                scroll('#secondMon');
            } else if (index === 1) {
                scroll('#thirdMon')
            } else if (index === 2) {
                scroll('#footerMon')
            }


        })
    })

    function scroll(id) {
        let offset = 0;
        $('html,body').animate({
            scrollTop: $(id).offset().top - offset
        }, 1100);
        cloudScroll()
        return false;
    }

    function cloudScroll() {
        $(window).on('scroll', function () {
            let scrollPos = $(this).scrollTop();
            if (scrollPos > 0 && scrollPos < 200) {
                $('#cloud-2').css({
                        'transform': 'translateY(' + scrollPos * 0.3 + '%' + ')'
                    }
                )
            }
            if (scrollPos > 0 && scrollPos < 250) {
                $('#cloud-3').css({
                        'transform': 'translateY(' + scrollPos * 0.3 + '%' + ')'
                    }
                )
            }
            if (scrollPos > 0 && scrollPos < 1200) {
                $('#cloud-4').css({
                        'transform': 'translateY(' + scrollPos * .65 + '%' + ')'
                    }
                )
            }
            if (scrollPos > 400 && scrollPos < 1800) {
                $('#cloud-6').css({
                        'transform': 'translateX(' + scrollPos * -.08 + '%' + ')'
                    }
                )
            }

            if (scrollPos > 0 && scrollPos < 1800) {
                $('#cloud-7').css({
                        'transform': 'translateX(' + scrollPos * 0.25 + '%' + ')'
                    }
                )
            }
            if (scrollPos > 1100 && scrollPos < 2000) {
                $('#cloud-9').css({
                        'transform': 'translateX(' + scrollPos * -0.02 + '%' + ')'
                    }
                )
            }
            if (scrollPos > 1752 && scrollPos < 2930) {
                $('#cloud-8').css({
                        'transform': 'translateX(' + scrollPos * 0.1 + 'px' + ')'
                    }
                )
            }
            if (scrollPos > 2100 && scrollPos < 2930) {
                $('#cloud-11,#cloud-12').css({
                        'transform': 'translateX(' + scrollPos * 0.1 + 'px' + ')'
                    }
                )
            }

        })
    }




})


