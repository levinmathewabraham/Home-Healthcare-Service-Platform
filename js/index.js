//Form validations
function validateForm(fullname, username, email, password, role) {
    var isValid = true;

    //Validate full name
    if (fullname === '') {
        $('#floatingFullName').addClass('is-invalid').removeClass('is-valid');
        if ($('#floatingFullName').next('.invalid-feedback').length === 0) {
            $('#floatingFullName').after('<div class = "invalid-feedback">Name is required.</div>');
        }
        isValid = false;
    } else {
        $('#floatingFullName').removeClass('is-invalid').addClass('is-valid');
        $('#floatingFullName').next('invalid-feedback').remove();
    }

    // Validate username
    var trimmedUsername = username.trim();
    if (trimmedUsername === '') {
        $('#floatingUsernameRegister').addClass('is-invalid').removeClass('is-valid');
        if ($('#floatingUsernameRegister').next('.invalid-feedback').length === 0) {
            $('#floatingUsernameRegister').after('<div class="invalid-feedback">Username is required.</div>');
        }
        isValid = false;
    } else if (/\s/.test(trimmedUsername)) {
        $('#floatingUsernameRegister').addClass('is-invalid').removeClass('is-valid');
        if ($('#floatingUsernameRegister').next('.invalid-feedback').length === 0) {
            $('#floatingUsernameRegister').after('<div class="invalid-feedback">Username must not contain spaces.</div>');
        }
        isValid = false;
    } else {
        $('#floatingUsernameRegister').removeClass('is-invalid').addClass('is-valid');
        $('#floatingUsernameRegister').next('.invalid-feedback').remove();
    }

    //Validate email
    if (!validateEmail(email)) {
        $('#floatingEmail').addClass('is-invalid').removeClass('is-valid');
        if ($('#floatingEmail').next('.invalid-feedback').length === 0) {
            $('#floatingEmail').after('<div class="invalid-feedback">Enter a valid email address.</div>');
        }
        isValid = false;
    } else {
        $('#floatingEmail').removeClass('is-invalid').addClass('is-valid');
        $('#floatingEmail').next('.invalid-feedback').remove();
    }

    //Validate password
    if (password.length < 6) {
        $('#floatingPasswordRegister').addClass('is-invalid').removeClass('is-valid');
        if ($('#floatingPasswordRegister').next('.invalid-feedback').length === 0) {
            $('#floatingPasswordRegister').after('<div class="invalid-feedback">Password must be at least 6 characters long.</div>');
        }
        isValid = false;
    } else {
        $('#floatingPasswordRegister').removeClass('is-invalid').addClass('is-valid');
        $('#floatingPasswordRegister').next('.invalid-feedback').remove();
    }

    //Validate role
    if (role === '') {
        $('#floatingRole').addClass('is-invalid').removeClass('is-valid');
        if ($('#floatingRole').next('.invalid-feedback').length === 0) {
            $('#floatingRole').after('<div class="invalid-feedback">Role is required.</div>');
        }
        isValid = false;
    } else {
        $('#floatingRole').removeClass('is-invalid').addClass('is-valid');
        $('#floatingRole').next('invalid-feedback').remove();
    }
    return isValid;
}

function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

//Toggle password visibility
function togglePasswordVisibility(passwordField, showPasswordCheckbox) {
    var passwordFieldType = passwordField.attr('type');
    if (passwordFieldType == 'password') {
        passwordField.attr('type','text');
    } else {
        passwordField.attr('type','password');
    }
}

//Form submission handler
function handleRegisterFormSubmit() {
    var fullname = $('#floatingFullName').val().trim();
    var username = $('#floatingUsernameRegister').val().trim();
    var email = $('#floatingEmail').val().trim();
    var password = $('#floatingPasswordRegister').val();
    var role = $('#floatingRole').val();
    
    if (!validateForm(fullname, username, email, password, role)) {
        event.preventDefault();
    }
}

$(document).ready(function() {
    //Register form submission handler
    $('#registerForm').on('submit', handleRegisterFormSubmit);

    //Password toggle event listener in registration form
    $('#showPasswordRegister').on('change', function() {
        var passwordField = $('#floatingPasswordRegister');
        togglePasswordVisibility(passwordField, $(this));
    });
    
    //Password toggle event listener in login form
    $('#showPasswordLogin').on('change', function() {
        var passwordField = $('#loginPassword');
        togglePasswordVisibility(passwordField, $(this));
    });

    //Real-time form validation
    $('#floatingFullName, #floatingUsernameRegister, #floatingEmail, #floatingPasswordRegister, #floatingRole').on('input', function() {
        handleRegisterFormSubmit();
    });
});

function updateStatus(newStatus, appointmentId) {
    // Send a form submission (assuming you have a form element)
    document.getElementById('appointment_status_form_' + appointmentId).submit();
}
