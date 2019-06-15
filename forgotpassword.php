<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$msg="";
$errorcode=0;

if(isset($_SESSION['uname']))
{
    header("location:welcome.php");
}
if(isset($_POST['resetPassword']))
{
    
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
      $email=test_input($_POST['inputEmail1']);
      if (empty($email)) {
          $msg= "*Email is required";
          
        }
        else 
        {
         // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg= "*Invalid email format";
        
       }
      }
    
    include "config.php";
    
    if($mydb)
    {
        $checkemail="select * from tblStudents where Email='$email' and active=1";
        $result=mysqli_query($mydb,$checkemail);
        $count=mysqli_num_rows($result);
        if($count>0)
        {
            $query="delete from tblResetPassword where Email='$email'";
            $run=mysqli_query($mydb,$query);
            $hash=md5(rand(0,1000));
            $query1="insert into tblResetPassword(Email,Hash) values('$email','$hash')";
            $run1=mysqli_query($mydb,$query1);
            
                 
// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

              try {
    //Server settings
    //$mail->SMTPDebug = 2;                                       // Enable verbose debug 
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'crsteam432@gmail.com';                     // SMTP username
    $mail->Password   = 'Hmt@7080';                               // SMTP password
    $mail->SMTPSecure = 'tls';                // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('crsteam432@gmail.com', 'Campus Recruitment System');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Password | Verification';
    $mail->Body    = "Dear User<br>
                     Please click this link to reset your password:<br>
                     http://localhost/CRS/verify-reset-password.php?email=$email&hash=$hash";
    $mail->AltBody = "Do not waste your time.wake up";
    $mail->send();
    $msg= "Password reset link has been sent to your registered email-id!";
    $errorcode=1;              

      } 
              catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }
           
        
        else
        {
         
            $msg="*Email doest not exist!";   

        }
   
        
    }
    else
    {
        $msg="*connection problem.";
    }
    
        
        
}
else
{
    ;
}

?>
<?php 
include "bootstrapfiles.php";

?>

<div id="commonDiv" class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form id="loginForm" method="post" class="form">
                    <h1 class="text-center mb-3">Account Recovery</h1>

                    <p id="errorMessage"></p>
                    <div class="form-group">
                        <label for="inputEmail1">Email address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="inputEmail1" id="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="resetPassword" id="resetPassword">Send Email</button>
                      <h6 class="mt-2">
                      <?php if($errorcode==1){ echo "<span style='color:green'>$msg</span>";}
                          else { echo "<span style='color:red'>$msg</span>";} ?>
                      </h6> 
                </form>

            </div>

        </div>
    </div>
</div>
