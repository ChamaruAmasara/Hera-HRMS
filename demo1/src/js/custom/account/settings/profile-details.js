"use strict";

// Class definition
var KTAccountSettingsProfileDetails = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Full name is required'
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: 'Birth Date is required'
                            }
                        }
                    },
                    emergency_contact_name: {
                        validators: {
                            notEmpty: {
                                message: 'Emergency Contact Name is required'
                            }
                        }
                    },
                    emergency_contact_number: {
                        validators: {
                            notEmpty: {
                                message: 'Emergency contact phone number is required'
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: 'Please select a country'
                            }
                        }
                    },
                    branch: {
                        validators: {
                            notEmpty: {
                                message: 'Please select a branch'
                            }
                        }
                    },
                    'gender[]': {
                        validators: {
                            notEmpty: {
                                message: 'Please select the gender'
                            }
                        }
                    },
                    'marital[]': {
                        validators: {
                            notEmpty: {
                                message: 'Please select the status'
                            }
                        }
                    },
                    department: {
                        validators: {
                            notEmpty: {
                                message: 'Please select a department'
                            }
                        }
                    },
                    job_title: {
                        validators: {
                            notEmpty: {
                                message: 'Please select a job title'
                            }
                        }
                    },
                    pay_grade: {
                        validators: {
                            notEmpty: {
                                message: 'Please select a pay grade'
                            }
                        }
                    },
                    employment_status: {
                        validators: {
                            notEmpty: {
                                message: 'Please select 1 employment status'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Select2 validation integration
        $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validation.revalidateField('country');
        });

        $(form.querySelector('[name="name"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validation.revalidateField('name');
        });

        $(form.querySelector('[name="timezone"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validation.revalidateField('timezone');
        });
    }

    var handleForm = function() {
		nextButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Disable button to avoid multiple click 
			nextButton.disabled = true;

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');
					e.preventDefault();

					if (status == 'Valid') {
						// Show loading indication
						nextButton.setAttribute('data-kt-indicator', 'on');

						// Simulate form submission
						setTimeout(function() {
							// Simulate form submission
							nextButton.removeAttribute('data-kt-indicator');
							
							// Enable button
							nextButton.disabled = false;
							
							// Go to next step
							stepper.goNext();
						}, 1000);   						
					} else {
						// Enable button
						nextButton.disabled = false;
						
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}			
		});
	}


    var handleSubmitAjax = function(e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');

                    // Enable button
                    submitButton.disabled = false;
                                        
                    // Check axios library docs: https://axios-http.com/docs/intro 
                    axios.post('', {
                        user_name: form.querySelector('[name="name"]').value, 
                        user_password: form.querySelector('[name="country"]').value 
                    }).then(function (response) {
                        if (response) {
                            form.querySelector('[name="name"]').value= "";
                            form.querySelector('[name="country"]').value= "";  

                            const redirectUrl = form.getAttribute('data-kt-redirect-url');
                            
                            if (redirectUrl) {
                                location.href = redirectUrl;
                            }
                        } else {
                            // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Sorry, something is wrong, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    }).catch(function (error) {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
		});
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_account_profile_details_form');
            
            if (!form) {
                return;
            }

            submitButton = form.querySelector('#kt_account_profile_details_submit2');

            initValidation();
            handleSubmitAjax();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsProfileDetails.init();
});
