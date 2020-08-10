$(document).ready(function(){
    $('.js-nav-icon').on('click', function (ev) {
        var menu = $(this).parents('.header__menu').find('.js-nav-ul');


        if (!menu.hasClass('nav-opened')) {
            scrollVar = $(window).scrollTop();
            menu.addClass('nav-opened');
            $('body').addClass('fixed');
            $(this).addClass('icon-opened');


        } else {
            menu.removeClass('nav-opened');
            $('body').removeClass('fixed');
            $(this).removeClass('icon-opened');
            $(window).scrollTop(scrollVar);
        }
    });

    $(".form").submit(function() {
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "contact.php",
            data: str,
            success: function(msg) {
                if(msg == 'ok') {
                    window.location.href = "/thanks.html";
                }
                else {
                    console.log('Error')
                }
            }
        });
        return false;
    });


});