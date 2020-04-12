var selectDate = null;
var numApplicant, monthFee, option, fastCheck = 0, carPickup = 0, process = 0;
jQuery(document).ready(function($){
    $("#applicants").on("change", function() {
        var visa_id = this.value;
        var text = this.options[this.selectedIndex].text;
        numApplicant = $('option:selected', this).attr('data-applicant');
        $.ajax({
            type: "POST",
            url: "/orders/frontend/getVisaFee",
            data: {
                visa_id : visa_id
            },
            success: function(res) {
                $("#monthVisa").html(res);
            }
        });
        $("#textApplicant").html(text);
        $.ajax({
            type: "POST",
            url: "/orders/frontend/applicantForm",
            data: {
                total : numApplicant
            },
            success: function(res1) {
                $("#listApplicant").html(res1);
            }
        });//orderResult
        
        $.ajax({
	        type: "POST",
            url: "/orders/frontend/visaResult",
            data: {
                visa_id : visa_id
            },
            success: function(res2) {
                $("#orderResult").html(res2);
            }
        });
        
        // reset sub fee
        $("#subFee").html('');
        $("#totalFee").html('');
        $("#lastFee").html("<strong>0$</strong");
    });

    $("#monthVisa").on("change", function() {
        var val = this.value;
        monthFee = $('option:selected', this).attr('data-fee');
        option = $('option:selected', this).attr('data-month');
        var text = this.options[this.selectedIndex].text;
        $("#textVisaMonth").html(text);

        $("#subFee").html(numApplicant + " x " + monthFee + " = " + (numApplicant*monthFee) + "$");
        $("#service_price").value = (numApplicant*monthFee);
        if(isNaN(process)) { 
        	$("#totalFee").html((numApplicant*monthFee) + "$");
        	
        	if(isNaN(fastCheck) && isNaN(carPickup)) {
	        	$("#lastFee").html("<strong>" + (numApplicant*monthFee) + "$</strong>");
        	} 
        	if(isNaN(fastCheck) && (carPickup > 0)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + carPickup) + "$</strong>");
        	}
        	if((fastCheck > 0) && isNaN(carPickup)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + fastCheck) + "$</strong>");
        	}
        	if((fastCheck > 0) && (carPickup > 0)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + fastCheck + carPickup) + "$</strong>");
        	}
        } else {
	        $("#totalFee").html((numApplicant*monthFee) + " + " + process + " = " + ((numApplicant*monthFee)+process) + "$");
	        
	        if(isNaN(fastCheck) && isNaN(carPickup)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee)+process) + "$</strong>");
        	} 
        	if(isNaN(fastCheck) && (carPickup > 0)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee)+process + carPickup) + "$</strong>");
        	}
        	if((fastCheck > 0) && isNaN(carPickup)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee)+process + fastCheck) + "$</strong>");
        	}
        	if((fastCheck > 0) && (carPickup > 0)) {
	        	$("#lastFee").html("<strong>" + ((numApplicant*monthFee)+process + fastCheck + carPickup) + "$</strong>");
        	}
        }
    });


    var str = '';
    if(option == 1) {
        str = '+1M + 2Y';
    }
    if(option == 3) {
        str = '+3M + 2Y';
    }
    $("#entryDate").datepicker({
        minDate: 0,
        dateFormat: 'dd-mm-yy',
        yearRange: "0:+3",
        changeMonth: true,
        changeYear: true,
        //maxDate: str,
        numberOfMonths: 2,
        onSelect: function(selected) {
            $("#exitDate").datepicker("option","minDate", selected)
        }
    });
    selectDate = $("#entryDate").val();
    $("#exitDate").datepicker({
        minDate: selectDate,
        dateFormat: 'dd-mm-yy',
        //yearRange: "0:+3",
        changeMonth: true,
        changeYear: true,
        maxDate: str,
        numberOfMonths: 2,
        onSelect: function(selected) {
            $("#entryDate").datepicker("option","maxDate", selected)
        }
    });
    $( ".date_of_birth" ).datepicker({
        dateFormat: 'dd-mm-yy',
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: new Date()
    });
    $("#arrivalPost").on("change", function() {
        //portArrival
        var arrival = this.value;
        if(arrival === 'HN') {
            $("#portArrival").html("Noi Bai (Ha Noi city)");
        }
        if(arrival === 'DN') {
            $("#portArrival").html("Da Nang (Da Nang city)");
        }
        if(arrival === 'HCM') {
            $("#portArrival").html("Tan Son Nhat (Ho Chi Minh city)");
        }
    });
    $("#timeProcess").on("change", function() {
        process = parseInt(this.value);
        if(process == -1) {
            $('#applyModal').modal('show');
            $("#sendPayment").attr("disabled", "disabled");
            $("#sendPayment").css("background", "#d1d1d1");

        } else {
            $("#sendPayment").removeAttr("disabled");
            $("#sendPayment").css("background", "#324cc0");
            var subfee = parseFloat($("#service_price").value);
            if(process > 0) {
	            $("#totalFee").html((numApplicant*monthFee) + " + " + process + " = " + ((numApplicant*monthFee)+process) + "$");
            } else {
	            $("#totalFee").html(numApplicant*monthFee + "$");
            }
            if(isNaN(fastCheck)) {
            	$("#lastFee").html("<strong>" + ((numApplicant*monthFee)+process) + "$</strong>");
            } else {
	            $("#lastFee").html("<strong>" + ((numApplicant*monthFee)+process + fastCheck) + "$</strong>");
            }
        }
    });
    $('input:radio[name="fast_check"]').change(function () {
		fastCheck = parseInt($('input[name="fast_check"]:checked').val());
		if (fastCheck == 0 || isNaN(fastCheck)) {
			fastCheck = 0;
			$(".fastCheck").addClass("hidden");
			$("#fastCheckFee").html("0");
			if(!isNaN(process)) { 
				if(!isNaN(carPickup) &&(carPickup > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process + carPickup) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process) + "$</strong>");
					
			} else {
				if(!isNaN(carPickup) && (carPickup > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + carPickup) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + (numApplicant*monthFee) + "$</strong>");
			}
		} else {
			$(".fastCheck").removeClass("hidden");
			$("#fastCheckFee").html(fastCheck + "$");
			if(!isNaN(process)) { 
				if(!isNaN(carPickup) && (carPickup > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee)+ process + fastCheck + carPickup) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process + fastCheck) + "$</strong>");
					
			} else {
				if(!isNaN(carPickup) && (carPickup > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + fastCheck + carPickup) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + fastCheck) + "$</strong>");
			}
		}
    });
    $('input:radio[name="car_pickup"]').change(function () {
		carPickup = parseInt($('input[name="car_pickup"]:checked').val());
		if(carPickup == 0 || isNaN(carPickup)) {
			carPickup = 0;
			$(".carPickup").addClass("hidden");
			$("#carPickupFee").html("0");
			if(!isNaN(process)) { 
				if(!isNaN(fastCheck) && (fastCheck > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process + fastCheck) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process) + "$</strong>");
			} else {
				if(!isNaN(fastCheck) && (fastCheck > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + fastCheck) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + (numApplicant*monthFee) + "$</strong>");
			}
			
		} else {
			$(".carPickup").removeClass("hidden");
			$("#carPickupFee").html(carPickup + "$");
			if(!isNaN(process)) { 
				if(!isNaN(fastCheck) && (fastCheck > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process + fastCheck + carPickup) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + process + carPickup) + "$</strong>");
			} else {
				if(!isNaN(fastCheck) && (fastCheck > 0))
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + fastCheck + carPickup) + "$</strong>");
				else 
					$("#lastFee").html("<strong>" + ((numApplicant*monthFee) + carPickup) + "$</strong>");
			}
		}
    });

    $("#home").on("click", "#btnPromocode", function(){
	    var promocode = $("#saleCode").val();
	    //alert(promocode);
	    $.ajax({
		    type: 'post',
		    url: '/orders/frontend/updateTotal',
		    data: {
			    promo: promocode,
			    total: $("#lastFee").text()
		    },
		    success: function(resData) {
			    if(resData !== "-1") {
				    $("#lastFee").html(resData+"$");
					$("#payAmount").val(resData);
				} else {
					alert("Your promocode has activated or expired");
				}
		    }
	    });
    });
    
    $("#home").on("click", '#sendPayment', function(){
        $("#visaPrice").val((numApplicant*monthFee)+process);
        $("#processPrice").val(process);
        $("#fastcheckPrice").val(fastCheck);
        $("#carPrice").val(carPickup);
        $("#totalPrice").val((numApplicant*monthFee) + process + fastCheck + carPickup);
        $("#payAmount").val((numApplicant*monthFee) + process + fastCheck + carPickup);
        ajaxData("#sendPaypal");
    	$("#sendPaypal").validate({
	    	rules: {
		    	numberApplicant: {
			    	required: true
		    	},
		    	visaType: {
			    	required: true
		    	},
		    	entry_date: {
			    	required: true
		    	},
		    	exit_date: { 
			    	required: true,
			    	remote: {
                        url: '/orders/frontend/checkMonth',
                        type: 'POST',
                        dataType: 'json',
                        data: {
	                        month: function() {
		                        return $('select[name=visaType]').val();
	                        },
                            entry: function () {
                                return $('#sendPaypal :input[name="entry_date"]').val();
                            },
                            exit: function() {
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
			    customer_phone: { required: true, number: true },
			    customer_country: { required: true },
			    
			    argee: { required: true }
		    },
		    messages: {
			    exit_date: { remote: "Please enter the correct time of visa" }
		    },
		    errorPlacement: function (error, element) {
	            if (element.is(':checkbox') || element.is(':radio')) {
	                error.appendTo(element.parent("label").parent("div").parent("div"));
	            } else if(element.parents('.input-group').length) {
		            error.appendTo(element.parent("div").parent("div"));
	            } else {
	                error.appendTo(element.parent("div"));
	            }
	        } 
    	});
	});
 
  
});
populateCountries("cus_national");

function ajaxData(form) {
	$.ajax({
		type: 'POST',
		url: 'orders/frontend/save',
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