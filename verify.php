<?php

include "config.php";

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
// Verify data
$email = mysqli_real_escape_string($mydb,$_GET['email']); // Set email variable
$hash = mysqli_real_escape_string($mydb,$_GET['hash']); // Set hash variable

$search = mysqli_query($mydb,"SELECT email, hash, active FROM tblStudents WHERE email='$email' AND hash='$hash' AND active=0") or die(mysqli_error());
$match = mysqli_num_rows($search);   

if($match > 0){
// We have a match, activate the account
mysqli_query($mydb,"UPDATE tblStudents SET active='1' WHERE email='$email' AND hash='$hash' AND active=0") or die(mysqli_error());
echo '<div style="color:red;margin:100px auto;">';
echo "Your account has been activated, you can now login";
echo "<br><a href='http://localhost/CRS/login.php'>click here </a>to login.";
echo '</div>'; 
    }
else{
// No match -> invalid url or account has already been activated.
echo '<div style="color:red;position:absolute;margin:100px 300px;font-size:x-large;">';
echo "The url is either invalid or you already have activated your account.";
echo "<br><a href='http://localhost/CRS/signup.php'>click here</a> to sign up again.";
echo '</div>';
}

}
else{
// Invalid approach
echo '<div style="color:red;margin:100px auto;">Invalid approach, please use the link that has been send to your email.</div>';
}

?>