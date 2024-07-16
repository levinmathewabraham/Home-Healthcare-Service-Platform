$(document).ready(function() {
    //Toggle password visibility in registration form
    $('#showPasswordRegister').on('change', function() {
        //Fetches password input field
        var passwordField = $('#floatingPasswordRegister');
        //Checks the current type of password field
        var passwordFieldType = passwordField.attr('type');
        //If password field type is password, it changes to text to show the password and vice-versa
        if (passwordFieldType == 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });
    
    //Toggle password visibility in login form
    $('#showPasswordLogin').on('change', function() {
        //Fetches password input field
        var passwordField = $('#loginPassword');
        //Checks the current type of password field
        var passwordFieldType = passwordField.attr('type');
        //If password field type is password, it changes to text to show the password and vice-versa
        if (passwordFieldType == 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });

    $('#registerForm').on('submit', function(event) {
        var isValid = true;
        var fullname = $('#floatingFullName').val().trim();
        var username = $('#floatingUsernameRegister').val().trim();
        var email = $('#floatingEmail').val().trim();
        var password = $('#floatingPasswordRegister').val();
        var role = $('#floatingRole').val();

        //Clear previous errors
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        //Validate full name
        if (fullname === '') {
            $('#floatingFullName').addClass('is-invalid');
            $('#floatingFullName').after('<div class = "invalid-feedback">Name is required.</div>');
            isValid = false;
        }

        //Validate username
        if (username === '') {
            $('#floatingUsernameRegister').addClass('is-invalid');
            $('#floatingUsernameRegister').after('<div class = "invalid-feedback">Username is required.</div>');
            isValid = false;
        }

        //Validate email
        if (!validateEmail(email) === '') {
            $('#floatingEmail').addClass('is-invalid');
            $('#floatingEmail').after('<div class = "invalid-feedback">Enter a valid email address.</div>');
            isValid = false;
        }

        //Validate password
        if (password.length < 6) {
            $('#floatingPasswordRegister').addClass('is-invalid');
            $('#floatingPasswordRegister').after('<div class = "invalid-feedback">Password must be atleast 6 characters long.</div>');
            isValid = false;
        }

        //Validate role
        if (role === '') {
            $('#floatingRole').addClass('is-invalid');
            $('#floatingRole').after('<div class = "invalid-feedback">Role is required.</div>');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); //Prevent form submission if validation fails
        }
    });

    //Email validation function
    function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});