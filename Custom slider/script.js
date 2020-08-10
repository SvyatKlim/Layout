$(function () {
    let slider = $('.slide');
    let slides = $('.slide>div');
    $('.arrow_right').click(function (event) {
        let active = slider.find('.visible'),
            index = active.index();
        if (index < slides.length - 1) {
            active.next().addClass('visible');
            active.removeClass('visible');
            let activeSpan = $('span.visible');
            activeSpan.removeClass('visible');
            console.log(index)
            console.log($('li').eq(index))
            $('.pagination li').eq(index + 1).find('span').addClass('visible');

        } else {
            slides.eq(0).addClass('visible')
            active.removeClass('visible');
            let activeSpan = $('span.visible');
            activeSpan.removeClass('visible');
            $('.pagination li').eq(0).find('span').addClass('visible');
        }

    })
    $('.arrow_left').click(function (event) {
        let active = slider.find('.visible'),
            index = active.index();
        if (index === 0) {
            console.log(active)
            slides.eq(8).addClass('visible');
            active.removeClass('visible');
            let activeSpan = $('span.visible');
            activeSpan.removeClass('visible');
            $('.pagination li').eq(8).find('span').addClass('visible');
        } else {
            active.prev().addClass('visible');
            active.removeClass('visible');
            let activeSpan = $('span.visible');
            activeSpan.removeClass('visible');
            $('.pagination li').eq(index - 1).find('span').addClass('visible');
        }
    });
    $('li').click(function (event) {
        pagination($(this))
        console.log($(this))
    });

    function pagination(item) {
        let index = $(item).index();
        let curSpan = $(item).find('span');
        let activeSpan = $('span.visible')
        let active = slider.find('.visible');
        //     index = active.index();
        // index = li;

        if (!curSpan.hasClass('visible')) {
            slides.eq(index).addClass('visible');
            active.removeClass('visible');
            curSpan.addClass('visible');
            activeSpan.removeClass('visible')
        }
    }

    $('#play').click(function () {
        play()
        $(this).addClass('hidden')
        $('#pause').addClass('visible')
        $('#pause').removeClass('hidden')
    });
    $('#pause').click(function () {
        clearInterval(interval)
        $(this).addClass('hidden')
        $('#play').addClass('visible')
        $('#play').removeClass('hidden')
    })


    let interval;

    function play() {
        interval = setInterval(function () {
            let active = slider.find('.visible'),
                index = active.index();
            console.log($('span').index)

            if (index < slides.length - 1) {
                active.next().addClass('visible');
                active.removeClass('visible');
                let activeSpan = $('span.visible');
                activeSpan.removeClass('visible');
                $('.pagination li').eq(index + 1).find('span').addClass('visible');
            } else {
                slides.eq(0).addClass('visible')
                active.removeClass('visible');
                let activeSpan = $('span.visible');
                activeSpan.removeClass('visible');
                $('.pagination li').eq(0).find('span').addClass('visible');
            }
        }, 1000)
    };


});


