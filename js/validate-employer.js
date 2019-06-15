$(document).ready(function () {
function checkFirstName() {
if ($('#inputFirstName').val() == "") {
$('#errFirstName').html('*first name is required!');
$('#errFirstName').css('color', 'red');
$('#inputFirstName').focus();
return false;
}
if (!$('#inputFirstName').val().match(/^[a-zA-Z ]*$/)) {
$('#errFirstName').html('*only letters and whitespace can be used for first name');
$('#errFirstName').css('color', 'red');
$('#inputFirstName').focus();
return false;
} else {
$('#errFirstName').html('');
return true;
}
}
$('#inputFirstName').keyup(function () {
checkFirstName();
});
function checkLastName() {
if ($('#inputLastName').val() == "") {
$('#errLastName').html('*last name is required!');
$('#errLastName').css('color', 'red');
$('#inputLastName').focus();
return false;
}
if (!$('#inputLastName').val().match(/^[a-zA-Z ]*$/)) {
$('#errLastName').html('*only letters and whitespace can be used for last name');
$('#errLastName').css('color', 'red');
$('#inputLastName').focus();
return false;
} else {
$('#errLastName').html('');
return true;
}
}
$('#inputLastName').keyup(function () {
checkLastName();
});
function checkPassword() {
if ($('#inputPassword').val() == "") {
$('#errPassword').html('*password is required!');
$('#errPassword').css('color', 'red');
$('#inputPassword').focus();
return false;
}
var pwd = $('#inputPassword').val();
if (!pwd.match(/[a-zA-Z0-9]{6,20}/)) {
$('#errPassword').html('*Your password must be 6-20 characters long');
$('#errPassword').css('color', 'red');
return false;
} else if (!pwd.match(/(?=.*[A-Z])/)) {
$('#errPassword').html('*Your password must  contain atleast one uppercase letter');
$('#errPassword').css('color', 'red');
return false;
} else if (!pwd.match(/(?=.*[0-9])/)) {
$('#errPassword').html('*Your password must  contain atleast one digit');
$('#errPassword').css('color', 'red');
$('#inputPassword').focus();
return false;
} else {
$('#errPassword').html('');
return true;
}
}
$('#inputPassword').keyup(function () {
checkPassword();
});
function comparePassword() {
if ($('#inputConfirmPassword').val() == "") {
$('#errConfirmPassword').html('*confirm password is required!');
$('#errConfirmPassword').css('color', 'red');
$('#inputConfirmPassword').focus();
return false;
}
var pwd = $('#inputPassword').val();
var cpwd = $('#inputConfirmPassword').val();
if (pwd != cpwd) {
$('#errConfirmPassword').html('*password is not matching');
$('#errConfirmPassword').css('color', 'red');
$('#inputConfirmPassword').focus();
return false;
} else {
$('#errConfirmPassword').html('');
return true;
}
}
$('#inputConfirmPassword').keyup(function () {
comparePassword();
});
function validateEmail() {
var atposition=$('#inputEmail').val().indexOf("@");
var dotposition=$('#inputEmail').val().lastIndexOf(".");
if ($('#inputEmail').val() == "") {
$('#errEmail').html('*email is required!');
$('#errEmail').css('color', 'red');
$('#inputEmail').focus();
return false;
}
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
    $('#errEmail').html('*Please enter a valid e-mail address!');
    $('#errEmail').css('color', 'red');
    $('#inputEmail').focus();
    return false;
    }
    else {
    $('#errEmail').html('');
    return true;
    }
    }
    $('#inputEmail').keyup(function () {
    validateEmail();
    });
    function checkMobile() {
    if ($('#inputMobile').val() == "") {
    $('#errMobile').html('*mobile number is required!');
    $('#errMobile').css('color', 'red');
    $('#inputMobile').focus();
    return false;
    }
    if (!$('#inputMobile').val().match(/^[6-9]\d{9}$/)) {
    $('#errMobile').html('*invalid mobile number');
    $('#errMobile').css('color', 'red');
    $('#inputMobile').focus();
    return false;
    } else {
    $('#errMobile').html('');
    return true;
    }
    }
    $('#inputMobile').keyup(function () {
    checkMobile();
    });
    
    $('#btnEmpRegistration').click(function (event) {
    event.preventDefault();
    var fn = checkFirstName();
    var ln = checkLastName();
    var email = validateEmail();
    var pass = checkPassword();
    var cpass = comparePassword();
    var mobile = checkMobile();
    if (fn && ln && email && pass && cpass && mobile) {
    $.ajax({
    url: "validate-employer.php",
    data: $('#empRegistrationForm').serialize() + '&action=submit',
    type: 'post',
    success: function (data, status, xhttp) {
    $('#errorMessage').html(data);
    }
    });
    }
    });
    });