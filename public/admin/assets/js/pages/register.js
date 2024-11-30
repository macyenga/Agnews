$("#advanced-form").validate({
    rules: {
        name: {
            required: true,
            minlength: 2
        },
        password: {
            required: true,
            // minlength: 5
        },
        password_confirmation: {
            required: true,
            // minlength: 5,
            equalTo: "#password"
        },
        email: {
            required: true,
            email: true
        },
        agree: "required"
    },
    messages: {
        name: {
            required: "Please enter your name",
            minlength: "Your name must be at least 2 characters long"
        },
        password: {
            required: "Please enter your password",
            // minlength: "Your password must be at least 5 characters long"
        },
        password_confirmation: {
            required: "Please confirm your password",
            // minlength: "Your password confirmation must be at least 5 characters long",
            equalTo: "Passwords do not match"
        },
        email: {
            required: "Please enter your email",
            email: "Please enter a valid email address",
        },
        agree: "Please agree to the terms and conditions"
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
        error.addClass("help-block");

        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.prop("type") === "checkbox") {
            error.insertAfter(document.getElementById('agree-label'));
        } else {
            error.insertAfter(element);
        }
    },

    highlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
    }
});
