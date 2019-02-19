switch(window.location.origin){
    case 'http://vyan.com':
        var HOSTNAME = 'http://vyan.com/';
        break;
    default:
        var HOSTNAME = 'http://localhost/vyan/';
}
switch(window.location.origin){
    case 'http://vyan.com':
        var HOSTNAMEADMIN = 'http://vyan.com/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/vyan/admin';
} 
$(document).ready(function(){
    "use strict";

    tinymce.init({
        selector: ".tinymce-area",
        theme: "modern",
        height: 300,
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: HOSTNAME + "filemanager/",
        filemanager_title: "Responsive Filemanager",
        filemanager_access_key:'myPrivateKey',
        external_plugins: {"filemanager": HOSTNAME + "filemanager/plugin.min.js"}
    });

    $('#title').change(function(){
        $('#slug').val(to_slug($('#title').val()));
    });

    $('#title_vi').change(function(){
        $('#slug_shared').val(to_slug($('#title_vi').val()));
    });
});

$(window).scroll(function () {
    //if you hard code, then use console
    //.log to determine when you want the
    //nav bar to stick.
    'use strict';
    if ($(window).scrollTop() > 150) {
        $('.nav_side').addClass('nav_side_fix');
    }
    if ($(window).scrollTop() < 150) {
        $('.nav_side').removeClass('nav_side_fix');
    }
});


$('#parent_id').each(function(){
    category = $('#parent_id_hidden').val();
    id = $(this).val();
    $.ajax({
        method: "get",
        url: HOSTNAMEADMIN + '/service_category_sub_2/get_service_category',
        data: {
            id : id
        },
        success: function(response){
            html = '';
            if(response.status == 200){
                if (response.result.length > 0) {
                    $.each(response.result, function(index, value){
                        selected = (value.id == category)? "selected" : "";
                        html += '<option value="'+ value.id +'" ' + selected + ' >'+ value.title +'</option>';
                    });
                }else{
                    html = '<option value="">Không có danh mục</option>';
                }
                $('#parent_id_1').html(html);
            }
        },
        error: function(jqXHR, exception){
            console.log(errorHandle(jqXHR, exception));
        }
    });
});

$('#parent_id').change(function(){
    id = $(this).val();
    $.ajax({
        method: "get",
        url: HOSTNAMEADMIN + '/service_category_sub_2/get_service_category',
        data: {
            id : id
        },
        success: function(response){
            html = '';
            if(response.status == 200){
                if (response.result.length > 0) {
                    $.each(response.result, function(index, value){
                        html += '<option value="'+ value.id +'">'+ value.title +'</option>';
                    });
                }else{
                    html = '<option value="">Không có danh mục</option>';
                }
                $('#parent_id_1').html(html);
            }
        },
        error: function(jqXHR, exception){
            console.log(errorHandle(jqXHR, exception));
        }
    });
});

$('.btn-deactive').click(function(){
    id = $(this).data('id');
    if (confirm('Chắc chắn hủy kích hoạt?')) {
        $.ajax({
            method: "get",
            url: HOSTNAMEADMIN + '/service_category/deactive',
            data: {
                id : id
            },
            success: function(response){
                location.reload();
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});

$('.btn-active').click(function(){
    id = $(this).data('id');
    if (confirm('Chắc chắn hủy kích hoạt?')) {
        $.ajax({
            method: "get",
            url: HOSTNAMEADMIN + '/service_category/active',
            data: {
                id : id
            },
            success: function(response){
                location.reload();
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});

$('.btn-remove').click(function(){
    id = $(this).data('id');
    if (confirm('Chắc chắn xóa?')) {
        $.ajax({
            method: "get",
            url: HOSTNAMEADMIN + '/service_category/remove',
            data: {
                id : id
            },
            success: function(response){
                if (response.result == true) {
                    alert('Xóa thành công!');
                }else{
                    alert('Xóa thất bại do danh mục này có chứa các danh mục con!');
                }
                location.reload();
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});