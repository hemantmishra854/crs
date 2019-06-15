<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include("config.php");
if($mydb)
{
    if(isset($_POST["submit"]))
    {
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        
        $name=test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $pwd = test_input($_POST["pass"]);
        $cpwd = test_input($_POST["cpass"]);
    
        if(empty($name))
        {
            echo "<span style='color:red'>*Name is required!</span>";
            
        }
        else
        {
            if(!preg_match("/^[a-zA-Z ]*$/",$name))
            {
               echo "<span style='color:red'>*only letters and whitespace is allowed</span>";
            
            }
            
        }
         if (empty($email)) {
          echo "<span style='color:red'>*Email is required</span>";
          
        }
        else 
        {
         // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span style='color:red'>*Invalid email format</span>";
        
       }
      }
        
         if (empty($pwd)) {
          echo "<span style='color:red'>*Password is required</span>";
             
        }
        else 
        {
        if (!preg_match("/[a-zA-Z0-9]{6,20}/",$pwd)) {
            echo "<span style='color:red'>*Your password must be 6-20 characters long</span>";
            

        }
        else if (!preg_match("/(?=.*[A-Z])/",$pwd)) {
           echo "<span style='color:red'>*Your password must  contain atleast one uppercase letter</span>";
            
        }
        else if (!preg_match("/(?=.*[0-9])/",$pwd)) {
            echo "<span style='color:red'>*Your password must  contain atleast one digit</span>";
        
        } 
        }
        
         if (empty($cpwd)) {
          echo "<span style='color:red'>*Confirm password is required</span>";
            
        }
        else 
        {
        if ($pwd != $cpwd) {
            echo "<span style='color:red'>*password is not matching</span>";
    
        }
        }
          $checkemail="select * from tblStudents where email='$email'";
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
            $query="insert into tblstudents(Name,Email,Password,Hash) values('$name','$email','$pwd','$hash')";
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
    $mail->Body    = "Thanks for signing up!'\n'\n
                     Please click this link to activate your account:'\n
                     http://localhost/CRS/verify.php?email=$email&hash=$hash";
    $mail->AltBody = "Do not waste your time.wake up";
    $mail->send();
    echo "<span style='color:green'>account created successfully.Check your email to activate the account.</span>";      

      } 
              catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }
            else
            {
                echo "<span style='color:red'>account can not be created!</span>";

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
