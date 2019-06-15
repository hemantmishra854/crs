$(document).ready(function () {
    $('#resetPassword').click(function (event) {
        event.preventDefault();
        var formData = $('#resetPasswordForm').serialize();
        console.log(formData);
        $.ajax({
            url: 'reset-password.php',
            data: formData + '&action=resetPassword',
            type: 'post',
            success: function (data, status, xhttp) {
                if (xhttp.responseText !== "success") {

                    $('#errorMessage').html(data);
                    $('#errorMessage').css("color", "red");

                } else {

                    $('#resetPassword').prop("disabled", true);
                    $('#resetPassword').attr("value", "please wait...");
                    $('#resetPassword').css("cursor", "not-allowed");
                    $('#errorMessage').html("Password has been reset successfully!");
                    $('#errorMessage').css("color", "green");
                    $('#redirectMessage').html('Redirecting to login page after 5 seconds');
                    $('#redirectMessage').css("color", "red");
                    setTimeout(function () {
                        window.location.assign("login.php");
                    }, 5000);

                }

            }
        });
    });
});
