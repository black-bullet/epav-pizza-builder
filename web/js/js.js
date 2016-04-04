$(document).ready(function(){
    function all() {
        setTimeout(function () {
            $('#select').css({
                left: $('.navWrapper .presets ul li a.active').position().left - 15,
                top: $('.navWrapper .presets ul li a.active').position().top,
                width: $('.navWrapper .presets ul li a.active').width() + 30,
                height: $('.navWrapper .presets ul li a.active').height()
            });
            $('#selectSize').css({
                left: $('.navWrapper .size ul li a.active').position().left - 15,
                top: $('.navWrapper .size ul li a.active').position().top,
                width: $('.navWrapper .size ul li a.active').width() + 30,
                height: $('.navWrapper .size ul li a.active').height()
            });
            $('#name').css({
                width: $('.chooseBlock').width() + $('.chooseBlock input').width() - 10
            });
            $('#order').css({
                width: $('.chooseBlock').width() + $('.chooseBlock input').width() - 10
            });
            $('.chooseBlock label').css({
                width: $('.chooseBlock').width() - $('.chooseBlock input').width() - 12
            });
            $('.totalBlock h2').css({
                width: $('.chooseBlock').width() + $('.chooseBlock input').width() - 10
            });
            $('.builderWrapper .viewBlock').css({
                height: $('.builderWrapper .viewBlock').width()
            });
        }, 100);
        $('.navWrapper .presets ul li').click(function () {
            position = $(this).position();
            var Width = $(this).width() + 30;
            Height = $(this).height();
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            $('#select').stop(true, true).animate({
                width: Width,
                height: Height,
                left: position.left,
                top: position.top
            }, 300);
        });
        $('.navWrapper .size ul li').click(function () {
            position = $(this).position();
            var Width = $(this).width() + 30;
            Height = $(this).height();
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            $('#selectSize').stop(true, true).animate({
                width: Width,
                height: Height,
                left: position.left,
                top: position.top
            }, 300);
        });
        $('#ingradient1').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient1_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient1_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient2').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient2_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient2_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient3').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient3_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient3_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient4').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient4_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient4_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient5').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient5_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient5_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient6').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient6_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient6_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient7').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient7_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient7_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient8').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient8_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient8_view').animate({opacity: 0}, 300);
            }
        });
        $('#ingradient9').change(function () {
            if ($(this).is(':checked')) {
                $('#ingradient9_view').animate({opacity: 1}, 300);
            } else {
                $('#ingradient9_view').animate({opacity: 0}, 300);
            }
        });
    };
    all();
    $(window).resize(function(){
       all();
    });
});