$(document).ready(function() {
        $('#submit').click(function(event) {
            event.preventDefault();
            var formData = $('#loginForm').serialize();
            console.log(formData);
            $.ajax({
                url:"validate-login.php", 
                data:formData+'&action=login',
                type:'post',
                success: function(data, status, xhttp) {
                if (xhttp.responseText!= "ok") {

                    $('#errorMessage').html(data);
                    
                } else {
                    window.location.assign('welcome.php');

                }

            }});
        });
    });
