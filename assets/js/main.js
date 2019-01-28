$(document).ready(function(){
    expandNav();
    
});

function expandNav(){
    const $navControl = $('#navControl');
    
    let deviceWidth = $(window).width();
    
    console.log(deviceWidth);
    
    if (deviceWidth < 991.98) {
        $navControl.on('click', function(){
            $(this).toggleClass('active');
            $('.nav-main > ul').toggleClass('active');
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