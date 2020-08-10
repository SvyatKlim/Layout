$(document).ready(function(){
    function accordion(item, nav) {
        $(item).each(function (i, el) {
            if ($(el).hasClass('opened')) {
                $(el).find(nav).slideDown('fast')
            }
        });

        $('body').on('click', item, function (ev) {
            ev.preventDefault();
            if ($(ev.currentTarget).hasClass('opened')) {
                $(ev.currentTarget).removeClass('opened');
                $(ev.currentTarget).find(nav).slideUp('fast');
            } else {
                $(ev.currentTarget).addClass('opened');
                $(ev.currentTarget).find(nav).slideDown('fast');
            }
        });
    }

    accordion('.question__section', '.question__text');


    $('.js-nav-icon').on('click', function (ev) {
        var menu = $('.js-nav-ul');

        if (!menu.hasClass('active')) {
            menu.addClass('active');
            $(this).addClass('active');


        } else {
            menu.removeClass('active');
            $(this).removeClass('active');
        }
    });

    $('.js-nav-ul a').on('click', function(){
        $('.js-nav-ul').removeClass('active');
        $('.js-nav-icon').removeClass('active');
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() >= 200) {
            $('.js-header').addClass('fixed-header');

        }
        else {
            $('.js-header').removeClass('fixed-header');
        }
    });

});
