$(document).ready(function(){
    expandNav();
	onScrollNav();
});

function expandNav(){
    var $navControl = $('#navControl');
    
    var deviceWidth = $(window).width();
    
    if (deviceWidth < 991.98) {
		$navControl.click(function(){
            $(this).toggleClass('active');
            $('.nav-main').toggleClass('active');

            $('.nav-main > ul  ul.active').removeClass('active');

        });

        //ul lv.2
		$('.nav-main > ul > li > span').on('click', function(){
			$(this).next().addClass('active');
		});

        //ul lv.3
        $('.nav-main > ul > li > ul > li >span').on('click', function(e){
            e.preventDefault();
            $(this).next().addClass('active');
        });

        //Close ul expand
        $('.nav-main > ul > li a.back').on('click', function(){
            $(this).closest('ul').removeClass('active');
        });
        
    } else {
        $('.nav-main > ul > li').each(function(){
            $('.nav-main > ul > li').hover(function(){
                $(this).addClass('selected');
                $('.nav-main > ul > li').not($(this)).removeClass('selected');
                
                $(this).find('ul').addClass('show');
            }, function(){
                $(this).removeClass('selected');
                $(this).find('ul').removeClass('show');
            });
        });
    }
}

function onScrollNav(){
	$(window).scroll(function () {
		//if you hard code, then use console
		//.log to determine when you want the
		//nav bar to stick.
		'use strict';
		var windowHeight = $(window).height();

		if ($(window).scrollTop() > 0) {
			$('header').addClass('scaled');
		}
		if ($(window).scrollTop() === 0) {
			$('header').removeClass('scaled');
		}
	});
}
