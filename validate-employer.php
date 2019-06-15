<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include("config.php");
if($mydb)
{
    if(isset($_POST["action"]) && $_POST["action"]==='submit')
    {
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        
        $fname=test_input($_POST["inputFirstName"]);
        $lname=test_input($_POST["inputLastName"]);
        $email = test_input($_POST["inputEmail"]);
        $pwd = test_input($_POST["inputPassword"]);
        $mobile = test_input($_POST["inputMobile"]);
        $name=$fname." ".$lname;
    
          $checkemail="select * from tblEmployers where email='$email'";
          $result=mysqli_query($mydb,$checkemail);
          $count=mysqli_num_rows($result);
          if($count>=1)
          {
              echo "<span style='color:red'>*email already exists!</span>";
              exit;
          }
        else
        {
           $pwd=md5($pwd);
           $hash=md5(rand(0,1000));
            $query="insert into tblEmployers(First_Name,Last_Name,Email,Mobile,Password,Hash) values('$fname','$lname','$email','$mobile','$pwd','$hash')";
            $run=mysqli_query($mydb,$query);
            if($run)
            {
                
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
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('crsteam432@gmail.com', 'Campus Recruitment System');
    $mail->addAddress($email,$name);     // Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Signup | Verification';
    $mail->Body    = "Thanks for signing up!<br>
                     Please click this link to activate your account:<br>
                     http://localhost/CRS/verify-employer.php?email=$email&hash=$hash";
    $mail->AltBody = "Do not waste your time.wake up";
    $mail->send();
    echo "<span style='color:green'>account created successfully.Check your email to activate the account.</span>";      

      } 
              catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
               exit;
            }
            }
            else
            {
                echo "<span style='color:red'>account can not be created!</span>";
                exit;

            }
        
        }
    }
        
    
    
}
else
{
    echo "<span style='color:red'>connection failed!</span>";
    exit;
}
     
?>
