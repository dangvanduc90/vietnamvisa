$(document).ready(function () {

    $.ajax({
        type: 'post',
        url:site_url+'home/page/create_captcha',        
        data: {},
        success: function (res) {
            $('#captcha_code').html(res);
        }
    });
    $.ajax({
        type: 'post',
        url:site_url+'home/register/create_captcha',        
        data: {},
        success: function (res) {
            $('#captcha').html(res);
        }
    });
    $('.refresh_captcha').click(function(){
        $.ajax({
            type: 'post',
            url:site_url+'home/register/create_captcha',        
            data: {},
            
            success: function (res) {
                $('#captcha').html(res);
            }
        });
    });
    $('#formLogin').validate({
        rules: {
            email: {
                required: true,
                email: true,
                remote: {
                    url: site_url+'home/login/ajax_check_email',
                    type: "post",
                    dataType: 'json',
                    data: {
                        email: function () {
                            return $('#formLogin :input[name="email"]').val();
                        }
                    }
                }
            },
            password: {
                required: true,
                remote: {
                    url:  site_url+'home/login/ajax_check_pass',
                    type: "post",
                    dataType: 'json',
                    data: {
                        email: function () {
                            return $('#formLogin :input[name="email"]').val();
                        },
                        password: function () {
                            return $('#formLogin :input[name="password"]').val();
                        }
                    }
                }
            }
        },
        messages: {
            email: {
                required: 'Email can not be empty!',
                email:'Email is not correct!',
                remote: 'Email does not exist!'
            },
            password: {
                required: 'Password can not be empty!',
                remote: 'The password is incorrect!'
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: 'post',
                url:  site_url+'home/login/ajax_check_login',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    window.location = res;
                }
            });
            return false;
        }
    });

    $('#formRegister').validate({
        rules: {
            fullname:{
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: site_url+'home/register/ajax_check_email',
                    type: "post",
                    dataType: 'json',
                    data: {
                        email: function () {
                            return $('#formRegister :input[name="email"]').val();
                        }
                    }
                }
            },
            password: {
                required: true,
            },
            phone:{
                required: true,
                number:true,
            },
            configPass:{
                required: true,
                equalTo:"#Password"
            },
        },
        
        submitHandler: function (form) {
            $.ajax({
                type: 'post',
                url:  site_url+'home/register/ajax_check_register',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    alert(res);
                   window.location = window.location.href;
                }
            });
            return false;
        }
    });
    
    $("#formForgot").validate({
	    rules: {
		    email: {
			    required: true,
			    email: true,
			    remote: {
                    url: site_url+'home/forgot/ajax_check_email',
                    type: "post",
                    dataType: 'json',
                    data: {
                        email: function () {
                            return $('#formForgot :input[name="email"]').val();
                        }
                    }
                }
		    }
	    },
	    messages: {
		    email: { remote: 'Account does not exist' }
	    },
	    submitHandler: function(form) {
		    $.ajax({
                type: 'post',
                url:  site_url+'home/forgot/ajax_send_email',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    alert(res);
                    location.reload();
                }
            });
            return false;
	    }
    });

    $('#register_aff').validate({
        rules: {
            name:{
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: site_url+'home/register/ajax_check_email',
                    type: "post",
                    dataType: 'json',
                    data: {
                        email: function () {
                            return $('#register_aff :input[name="email"]').val();
                        }
                    }
                }
            },
            phone:{
                required: true,
                number:true,
            },
            chose_check:{
                required: true,
            }
        },
        messages: {
            name:{
                required: "Full Name can not be empty",
            },
            email: {
                required: 'Email can not be empty!',
                email:'Email is not correct!',
                remote: 'Email is already registered!'
            },
            phone:{
                required: "Phone can not be empty",
                number:'The phone number is incorrect',
            },
            chose_check:{
                required: 'Please, chose agree',
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: 'post',
                url:  site_url+'home/register/ajax_check_register_aff',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    $('.box_img_load_ajax').addClass('hidden');
                    if(res === "TRUE"){
                        $('#showSuccess').modal('toggle');
                    }else{
                        alert("Erorr");
                    }
                   
                   
                }
            });
            return false;
        }
    });
    $('#showSuccess .close').click(function(){
        window.location = window.location.href;
    });
    $('#change_password').validate({
        rules: {
            pass_old: {
                required: true,
                remote: {
                    url: site_url+'home/member/ajax_check_password',
                    type: "post",
                    dataType: 'json',
                    data: {
                        pass_old: function () {
                            return $('#change_password :input[name="pass_old"]').val();
                        }
                    }
                }
            },
            pass_new:{
                required: true,
            },
            pass_confirm:{
                required: true,
                equalTo : "#pass_new"
            }
           
        },
        messages: {
            pass_old: {
                required: 'This field is required.',
                remote: 'Incorrect password!'
            },
            pass_new:{
                required: 'This field is required.',
            },
            pass_confirm:{
                required: 'This field is required.',
                equalTo : "Password entered incorrectly"
            }
            
        },
        submitHandler: function (form) {
            $.ajax({
                type: 'post',
                url:  site_url+'home/member/ajax_update_password',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    alert(res);
                    window.location = window.location.href;
                }
            });
            return false;
        }
    });
    $('#form_profile').validate({
        rules: {
            mem_name: {
                required: true,
            },
            mem_phone: {
                required: true,
            },
        },
       
        submitHandler: function (form) {
            $.ajax({
                type: 'post',
                url:  site_url+'home/member/ajax_update',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    window.location = window.location.href;
                }
            });
            return false;
        }
    });

    $('#formSearch').validate({
        rules: {
            txt_keyword: {
                required: true,
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: 'post',
                url:  '/home/post/ajax_search',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    window.location = site_url+'search';
                }
            });
            return false;
        }
    });
    $('.ykienkhachhang').on('click','.btn_viewall', function(){
        var testid = $(this).attr('TestID');
        var number = $(this).attr('Number');
        if(number === '1'){
            $.ajax({
                type: 'post',
                url:  '/home/reviews/ajax_load',
                data: {testid:testid},
                beforeSend: function () {
                    $('.box_img_load_ajax').removeClass('hidden');
                },
                success: function (res) {
                    $('.box_img_load_ajax').addClass('hidden');
                    $('.what_client_say .item_'+testid+'').css({'height':'auto'});
                    $('.content_test_'+testid+'').append(res);
                    $('.btn_viewall_'+testid+'').html('<i class="fa fa-minus-circle" aria-hidden="true"></i> Close');
                    $('.btn_viewall_'+testid+'').css({'color':'#189242'});
                    $('.btn_viewall_'+testid+'').attr('Number','0');

                   
                }
            });
        }else{
            $('.what_client_say .item_'+testid+'').css({'height':'370px'});
            $('.content_test_'+testid+'').html("");
            $('.btn_viewall_'+testid+'').html('<i class="fa fa-plus-circle" aria-hidden="true"></i> View all');
            $('.btn_viewall_'+testid+'').css({'color':'#ec1c23'});
            $('.btn_viewall_'+testid+'').attr('Number','1');
        }

    });
    $('.btn_signin').click(function(){
        $('#showLogin').modal('toggle');
        $('#showRegister').modal('hidden');
    });
    $('.btn_signup').click(function(){
        $('#showRegister').modal('toggle');
        $('#showLogin').modal('hidden');
        
    })
})