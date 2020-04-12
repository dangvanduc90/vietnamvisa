var option, timeProccess = 1;
jQuery(document).ready(function($){
    $("#purpose").on("change", function() {
        var id = this.value;
        $.ajax({
            type: 'post',
            url: '/orders/frontend/months',
            data: { purpose: id },
            success: function(res) {
                $("#visatype").html(res);
            }
        });
        $.ajax({
            type: 'post',
            url: '/orders/frontend/urgents',
            data: { purpose: id },
            success: function(res) {
                $("#timeProcess").html(res);
            }
        });
    });

    $("#visatype").on("change", function() {
        var month = this.value;
        option = month;
        // load month visa
        $.ajax({
            type: "post",
            url: "/orders/frontend/types",
            data: {
                month_id : month
            },
            success: function(res) {
                $("#applicants").html(res);
            }
        });
        // load form paypal
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaResult",
            data: $("#sendPaypal").serialize(),
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
    });

    $("#applicants").on("change", function() {
        var numApplicant = this.value;
        var id = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaResult",
            data: $("#sendPaypal").serialize(),
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
        //load form applicant
        $.ajax({
            type: "POST",
            url: "/orders/frontend/applicantForm",
            data: {
                total : numApplicant
            },
            success: function(res1) {
                $("#listApplicant").html(res1);
            }
        });
        // load added services
        $.ajax({
            type: 'post',
            url: "/orders/frontend/services",
            data: {
                number: numApplicant
            },
            success: function(res) {
                $("#extraServices").html(res);
            }
        });
        
    });

/*
    var str = '';
    if(option == 1) {
        str = '+1M';
    }
    if(option == 3) {
        str = '+3M';
    }
*/
    var date = new Date();
    date.setDate(date.getDate());
    $('#datetimepicker6').datetimepicker({
        minDate: new Date(),
        useCurrent: false,
        format: 'DD/MM/YYYY'
    });
    $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        format: 'DD/MM/YYYY'
    });
    $("#datetimepicker6").on("dp.change", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepicker7").on("dp.change", function (e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
 //    $("#entryDate").daterangepicker({
	//     autoUpdateInput: false,
	// 	locale: {
 //        	cancelLabel: 'Clear'
 //    	}
 //    });
    
 //    $('#entryDate').on('apply.daterangepicker', function(ev, picker) {
	//     $(this).val(picker.startDate.format('DD-MM-YYYY') + ' To ' + picker.endDate.format('DD-MM-YYYY'));
	// });

	$('#entryDate').on('cancel.daterangepicker', function(ev, picker) {
		$(this).val('');
	});
  
  
/*
    selectDate = $("#entryDate").val();
    $("#exitDate").datepicker({
        minDate: selectDate,
        dateFormat: 'dd-mm-yy',
        //yearRange: "0:+3",
        changeMonth: true,
        changeYear: true,
        //maxDate: new Date(str),
        numberOfMonths: 2,
        onSelect: function(selected) {
            $("#entryDate").datepicker("option","maxDate", selected);
            $("#exitDate").datepicker("option","maxDate", new Date(str));
        }
    });
*/
    
    $("#arrivalPost").on("change", function() {
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaResult",
            data: $("#sendPaypal").serialize(),
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
        
    });
    $("#timeProcess").on("change", function() {
	    //alert($("#entryDate").val());
        process = parseInt(this.value);
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaProccess",
            data: { urgent: process },
            success: function(res) {
                if(res == null) {
                    return;
                } else if(res === 'FALSE') {
                    timeProccess = 0;
                    $('#applyModal').modal('show');
                    $("#sendPayment").attr("disabled", "disabled");
                    $("#sendPayment").css("background", "#d1d1d1");
                    //$("#cus_national").attr('disabled', 'disabled');

                    for (var i = 1; i <= 10; i++) {
                        $("#national" + i).attr('disabled', 'disabled');
                    }


                } else {
                    timeProccess = 1;
                    $("#sendPayment").removeAttr("disabled");
                    $("#sendPayment").css("background", "#324cc0");
                    //$("#cus_national").removeAttr('disabled', 'disabled');
                    for (var i = 1; i <= 10; i++) {
                        $("#national" + i).removeAttr('disabled', 'disabled');
                    }
                    $.ajax({
                        type: "POST",
                        url: "/orders/frontend/visaResult",
                        data: $("#sendPaypal").serialize(),
                        success: function(res2) {
                            $("#orderResult").html(res2);
                        }
                    });
                    
                }
            }
        });
    });
    
    $(document).on('change',"input[name='fast_check']:radio", function () {
    //$('#fast_check').on("change", function () {
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaResult",
            data: $("#sendPaypal").serialize(),
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
        
    });

    $(document).on('change',"input[name='car_pickup']:radio", function () {
    //$('input[name="car_pickup"]').change(function () {
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaResult",
            data: $("#sendPaypal").serialize(),
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
        
    });

    $("#home").on("click", "#btnPromocode", function(){
        $.ajax({
            type: "POST",
            url: "/orders/frontend/visaResult",
            data: $("#sendPaypal").serialize(),
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
        
    });
    
    // $("#cus_national").on("change", function() {
    //     var country = this.value;
    //     //alert(country);
    //     $.ajax({
    //         type: "POST",
    //         url: "/orders/frontend/checkCountry",
    //         data: { country: country },
    //         success: function(res) {
                
    //             if(res === '0') {
    //                 $("#national-modal").modal("show");
    //                 $("#sendPayment").attr("disabled", "disabled");
    //                 $("#sendPayment").css("background", "#d1d1d1");
    //             } 
    //             if(res === 'TRUE') {
    //                 for (var i = 1; i <= 15; i++) {
    //                     $("#home").on("change", "#national" + i, function(){
    //                     //$().on('change', function () {
    //                         var country = this.value;
    //                         //alert(country);
    //                         $.ajax({
    //                             type: "POST",
    //                             url: "/orders/frontend/checkCountry",
    //                             data: { country: country },
    //                             success: function(res) {
    //                                 if(res === 'TRUE') {
    //                                     $("#allowFree").modal("show");
    //                                     $("#sendPayment").removeAttr("disabled");
    //                                     $("#sendPayment").css("background", "#324cc0");
    //                                 } 
    //                                 if(res === '0') {
    //                                     $("#national-modal").modal("show");
    //                                     $("#sendPayment").attr("disabled", "disabled");
    //                                     $("#sendPayment").css("background", "#d1d1d1");
    //                                 }
    //                             }
    //                         });
    //                     });
    //                 }
    //             } 
    //         }
    //     });
    // });
    for (var i = 1; i <= 15; i++) {
        $("#home").on("change", "#national" + i, function(){
        //$().on('change', function () {
            var country = this.value;
            //alert(country);
            $.ajax({
                type: "POST",
                url: "/orders/frontend/checkCountry",
                data: { country: country },
                success: function(res) {
                    if(res === 'TRUE') {
                        $("#sendPayment").removeAttr("disabled");
                        $("#sendPayment").css("background", "#324cc0");
                    } 
                    if(res === '0') {
                        $("#national-modal").modal("show");
                        $("#sendPayment").attr("disabled", "disabled");
                        $("#sendPayment").css("background", "#d1d1d1");
                    }
                }
            });
        });
    }

    $("#home").on("click", '#sendPayment', function(){
        $("#sendPaypal").validate({
            rules: {
                numberApplicant: {
                    required: true
                },
                visaType: {
                    required: true
                },

                entry_date: {
                    //required: true,
                    remote: {
                        url: '/orders/frontend/checkMonth',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            month: function() {
                                return $('select[name="visaType"]').val();
                            },
                            entry_date: function () {
                                return $('#sendPaypal :input[name="entry_date"]').val();
                            },
                            exit_date: function () {
                                return $('#sendPaypal :input[name="exit_date"]').val();
                            }
                        }
                    }
                },
                arrivalPost: { required: true },
                processing: { required: true },
                "applicant_name[]": {
                    required: true
                },
                "applicant_passport[]": {
                    required: true
                },
                "applicant_country[]": {
                    required: true
                },
                "applicant_birth[]": {
                    required: true
                },
                "applicant_expired[]": { required: true },
                customer_name: { required: true },
                customer_email: { required: true, email: true },
                customer_phone: { required: true },
                customer_country: { required: true },

                argee: { required: true }
            },
            messages: {
                entry_date: { remote: "Please enter the correct time of visa" }
            },
            errorPlacement: function (error, element) {
                if (element.is(':checkbox') || element.is(':radio')) {
                    error.appendTo(element.parent("label").parent("div").parent("div"));
                } else if(element.parents('.input-group').length) {
                    error.appendTo(element.parent("div").parent("div"));
                } else {
                    error.appendTo(element.parent("div"));
                }
            },
            success: function(form) {
	            
	            return;
            }
        });
        ajaxData("#sendPaypal");
        
    });

    $("#applySendUrgent").validate({
        rules: {
            ug_fullname: { required: true },
            ug_email: { required: true, email: true } 
        },
        messages: {},
        submitHandler:function(form) {
            $.ajax({
                type: $(form).attr('method'),
                url: '/orders/contact/sendUrgent',
                data: $(form).serialize(),
                beforeSend: function() {
                    $(".send-email").removeClass('hidden');
                },
                success: function(res) {
                    setTimeout(function(){
                        $(".send-email").addClass('hidden');
                    }, 1200);
                    $(".sent-mail").removeClass('hidden');
                }
            });
        }
    });
    $("#applyHardNational").validate({
        rules: {
            hard_fullname: { required: true },
            hard_email: { required: true, email: true } 
        },
        messages: {},
        submitHandler:function(form) {
            $.ajax({
                type: $(form).attr('method'),
                url: '/orders/contact/sendHardNational',
                data: $(form).serialize(),
                beforeSend: function() {
                    $(".send-email-hard").removeClass('hidden');
                },
                success: function(res) {
                    setTimeout(function(){
                        $(".send-email-hard").addClass('hidden');
                    }, 1200);
                    $(".sent-mail-hard").removeClass('hidden');
                }
            });
        }
    });
});

function ajaxData(form) {
    $.ajax({
        type: 'POST',
        url: '/orders/frontend/visaResult',
        data: $(form).serialize(),
        success: function(resp) {
            return true;
        }
    });
}
function getValueId(id) {
    var value = $(id).text;
    return parseInt(value);
}