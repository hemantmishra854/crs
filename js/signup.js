    $(document).ready(function () {
        

        function checkName() {
            if (!$('#name').val().match(/^[a-zA-Z ]*$/)) {
                $('#errorMessage').html('*only characters can be used for name');
                $('#errorMessage').css('color', 'red');
                $('#name').focus();
                return false;

            } else {

                $('#errorMessage').html('');
                return true;
            }

        }

        $('#name').keyup(function () {
            checkName();

        });

        function checkPassword() {
            var pwd = $('#pwd').val();
            if (!pwd.match(/[a-zA-Z0-9]{6,20}/)) {
                $('#errorMessage').html('*Your password must be 6-20 characters long');
                $('#errorMessage').css('color', 'red');
                return false;

            } else if (!pwd.match(/(?=.*[A-Z])/)) {
                $('#errorMessage').html('*Your password must  contain atleast one uppercase letter');
                $('#errorMessage').css('color', 'red');
                return false;

            } else if (!pwd.match(/(?=.*[0-9])/)) {
                $('#errorMessage').html('*Your password must  contain atleast one digit');
                $('#errorMessage').css('color', 'red');
                $('#pwd').focus();

                return false;

            } else {

                $('#errorMessage').html('');
                return true;
            }

        }
        $('#pwd').keyup(function () {
            checkPassword();
        });

        function comparePassword() {
            var pwd = $('#pwd').val();
            var cpwd = $('#cpwd').val();
            if (pwd != cpwd) {
                $('#errorMessage').html('*password is not matching');
                $('#errorMessage').css('color', 'red');
                $('#cpwd').focus();

                return false;

            } else {

                $('#errorMessage').html('');
                return true;
            }

        }
        $('#cpwd').keyup(function () {

            comparePassword();

        });

        
        function checkEmail() {
            var email = $('#email').val();
            var submit = $('#submit').val();
            $.post("checkemail.php", {
                email: email,
                submit: submit
            }, function (data, status, xhttp) {
                if (xhttp.responseText == "ok") {
                    
                    $('#errorMessage').html('');
                    return true;
                } else {
                    $('#errorMessage').html(data);
                    $('#errorMessage').css('color', 'red');
                    $('#email').focus();
                    return false;
                }
            });
        }
        

        $('#email').keyup(function () {
            checkEmail();
            
        });
        

        $('#signupForm').submit(function (event) {
            event.preventDefault();
            if (checkName() && checkPassword() && comparePassword()) {
                $.post("validate-signup.php", {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    pass: $('#pwd').val(),
                    cpass: $('#cpwd').val(),
                    submit: $('#submit').val()

                }, function (data, status, xhttp) {
                    $('#errorMessage').html(data);

                });
            }
        });


    });
