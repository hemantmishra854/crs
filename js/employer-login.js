$(document).ready(function() {
        $('#submit').click(function(event) {
            event.preventDefault();
            var formData = $('#empLoginForm').serialize();
            console.log(formData);
            $.ajax({
                url:"validate-emp-login.php", 
                data:formData+'&action=login',
                type:'post',
                success: function(data, status, xhttp) {
                if (xhttp.responseText!== "ok") {

                    $('#errorMessage').html(data);
                    
                } else {
                    window.location.assign('welcome-employer.php');

                }

            }});
        });
    });
