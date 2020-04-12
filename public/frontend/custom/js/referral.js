(function($){
    var formAddReferral = $('#formAddReferral');
    /*set nationlity code*/
    formAddReferral.find('#selectPhoneCode').select2();
    
    /**submit form*/
    formAddReferral.on('click', '#btnSubmit', function(){
    	var that,err,pass,repass,email;
        that = $(this);
        err  = 0;
    	formAddReferral.find('input,select').each(function(){
            if (_.isEmpty($(this).val())) {
                $(this).addClass('input-error');
                formAddReferral.find('span.select2-selection').addClass('input-error');
                err++;
            }
        });
        if (err > 0) {
            return;
        }
        /*email*/
        email = formAddReferral.find('input[name="email"]');
        if (!_.isEmpty(email.val()) && !validateEmail(email.val())) {
            email.addClass('input-error');
            formAddReferral.find('.form-error').removeClass('hide').text('Email is not valid!');
            return;
        }
        /*password*/
        pass   = formAddReferral.find('input[name="password"]');
        repass = formAddReferral.find('input[name="cf_password"]');
        if (pass.val() !== repass.val()) {
            pass.addClass('input-error');
            repass.addClass('input-error');
            formAddReferral.find('.form-error').removeClass('hide').text('Password and confirm password does not match!');
            return;
        }
        
        formAddReferral.find('.form-error').addClass('hide');
        
    });

    /*remove error border*/
    formAddReferral.on('focus', '.input-error', function(){
    	$(this).removeClass('input-error');
    });
}(jQuery));