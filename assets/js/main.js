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