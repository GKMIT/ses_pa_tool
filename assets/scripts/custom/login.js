var Login = function () {
	var handleLogin = function() {

		$('.login-form').validate({
	            errorElement: 'span',
	            errorClass: 'help-block',
	            focusInvalid: false,
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                user_type: {
	                    required: true
	                }
	            },
	            messages: {
	                username: {
	                    required: "Username is required."
	                },
	                password: {
	                    required: "Password is required."
	                },
					user_type: {
						required: "User Type is required."
					}
	            },
	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
					$.ajax({
						url:"jquery-data.php",
						type:"POST",
						dataType: "JSON",
						data:{
							user_login:true,
							user_name:$("#user_name").val(),
							password:$("#password").val(),
							user_type:$("#user_type").val()
						},
						beforeSend: function() {
							$("#login_button").html("<i class='fa fa-sign-in'></i>&nbsp;Validating...");
						},
						success: function(data) {
							if(data.status==200) {
								window.location = data.redirect_url;
							}
							else {
								console.log("ass");
								$("#unauth_alert").css('display','block');
								$("#login_button").html("<i class='fa fa-sign-in'></i>&nbsp;Login");
							}
						}
					});
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit(); //form validation success, call ajax form submit
	                }
	                return false;
	            }
	        });
	}
	var handleForgetPassword = function () {
		$('.forget-form').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "",
			rules: {
				current_password: {
					required: true
				},
				new_password: {
					required: true
				},
				cp_user_name: {
					required:true
				}
			},
			messages: {
				current_password: {
					required: "Enter your current password"
				},
				new_password: {
					required: "Enter your new password"
				},
				cp_user_name: {
					required:"Enter user name"
				}
			},

			invalidHandler: function (event, validator) { //display error alert on form submit

			},

			highlight: function (element) { // hightlight error inputs
				$(element)
					.closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			success: function (label) {
				label.closest('.form-group').removeClass('has-error');
				label.remove();
			},

			errorPlacement: function (error, element) {
				error.insertAfter(element.closest('.input-icon'));
			},

			submitHandler: function (form) {
				$.ajax({
					url:"jquery-data.php",
					type:"POST",
					dataType: "JSON",
					data:{
						change_password:true,
						cp_user_name:$("#cp_user_name").val(),
						current_password:$("#current_password").val(),
						new_password:$("#new_password").val()
					},
					beforeSend: function() {
						$("#change_password_proceed").html("<i class='fa fa-sign-in'></i>&nbsp;Processing...");
					},
					success: function(data) {
						if(data.status==200) {
							$("#change_password_proceed").html("Proceed <i class='m-icon-swapright m-icon-white'></i>");
							$(".forget-form").find("#success_alert").removeClass("display-hide");
							form.reset();
						}
						else if(data.status==401) {
							$(".forget-form").find("#unauth_alert").removeClass("display-hide");
							$("#change_password_proceed").html("Proceed <i class='m-icon-swapright m-icon-white'></i>");
						}
						else {
							$("#change_password_proceed").html("Proceed <i class='m-icon-swapright m-icon-white'></i>");
							$(".forget-form").find("#internal_error").removeClass("display-hide");
						}
					}
				});
			}
		});

		$('.forget-form input').keypress(function (e) {
			if (e.which == 13) {
				if ($('.forget-form').validate().form()) {
					$('.forget-form').submit();
				}
				return false;
			}
		});

		jQuery('#forget-password').click(function () {
			jQuery('.login-form').hide();
			jQuery('.forget-form').show();
		});

		jQuery('#back-btn').click(function () {
			jQuery('.login-form').show();
			jQuery('.forget-form').hide();
		});

	}

    return {
        init: function () {
            handleLogin();
			handleForgetPassword();
        }
    };
}();