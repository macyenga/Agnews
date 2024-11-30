$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error').removeClass("has-success");
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error').addClass("has-success");
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$("#simple-form").validate();
$("#validate-form").validate();


$( "#advanced-form" ).validate( {
    rules: {
        firstname: "required",
        lastname: "required",
        username: {
                required: true,
                minlength: 2
        },
        password: {
                required: true,
                minlength: 5
        },
        confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
        },
        email: {
                required: true,
                email: true
        },
        agree: "required"
    },
    messages: {
        firstname: "Please enter your first name",
        lastname: "Please enter your last name",
        username: {
                required: "Username is required",
                minlength: "Username must be at least 2 characters long"
        },
        password: {
                required: "Please enter your password",
                minlength: "Password must be at least 5 characters long"
        },
        confirm_password: {
                required: "Please confirm your password",
                minlength: "Password confirmation must be at least 5 characters long",
                equalTo: "Passwords do not match"
        },
        email: "Please enter a valid email address",
        agree: "Please accept the terms and conditions"
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        error.addClass( "help-block" );

        if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
        } else {
                error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
    }
} );
