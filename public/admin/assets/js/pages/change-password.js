$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.input-group').addClass('has-error').removeClass("has-success");
    },
    unhighlight: function(element) {
        $(element).closest('.input-group').removeClass('has-error').addClass("has-success");
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

$( "#form" ).validate({
    rules: {
        old_password: {
            required: true,
            minlength: 5
        },
        password: {
            required: true,
            minlength: 5
        },
        confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
        }
    },
    messages: {
        old_password: {
                required: "Please enter your old password",
                minlength: "Your old password must be at least 5 characters long"
        },
        password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 5 characters long"
        },
        confirm_password: {
                required: "Please confirm your password",
                minlength: "Your password confirmation must be at least 5 characters long",
                equalTo: "Passwords do not match"
        }
    }
});
