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



/*=====================================
=            Register Form            =
=====================================*/
var csrf_hash = $("input[name='csrf_teddy_token']").val();

$(document).ready(function() {
    $( "#register_form" ).validate({
        rules: {
            register_name : {
                required: true
            },
            register_phone : {
                required: true,
                number: true
            },
            register_email : {
                required: true,
                email: true
            }
        },
        messages: {
            register_name: {
                required: "Vui lòng nhập Họ tên",
            },
            register_phone: {
                required: "Vui lòng nhập số điện thoại",
                number: "Vui lòng nhập số",
            },
            register_email: {
                required: "Vui lòng nhập số địa chỉ email",
                email: "Định dạng email không đúng",
            },
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: form.action,
                data: $(form).serialize(),
                success: function (response) {
                    if (response.status == 200 && response.result == true) {
                        csrf_hash = response.csrf_hash;
                        $('#register_name').val('');
                        $('#register_phone').val('');
                        $('#register_email').val('');
                        $('#register_message').val('');
                        $('#modalAdvise').modal('hide');
                        alert('Bạn đã đăng ký thành công!');
                    }else{
                        alert('Có lỗi trong quá trình đang ký!');
                    }
                    
                }
            });
            return false;
         }
    });

    // $('#btn_register_send').click(function(e){
    //     e.preventDefault();

    //     name = $('#register_name').val();
    //     phone = $('#register_phone').val();
    //     email = $('#register_email').val();
    //     message = $('#register_message').val();
    // });
});

/*=====  End of Register Form  ======*/

