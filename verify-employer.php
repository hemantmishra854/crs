<?php

include "config.php";

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
// Verify data
$email = mysqli_real_escape_string($mydb,$_GET['email']); // Set email variable
$hash = mysqli_real_escape_string($mydb,$_GET['hash']); // Set hash variable

$search = mysqli_query($mydb,"SELECT email, hash, status FROM tblEmployers WHERE email='$email' AND hash='$hash' AND status='pending'") or die(mysqli_error($mydb));
$match = mysqli_num_rows($search);   

if($match > 0){
// We have a match, activate the account
mysqli_query($mydb,"UPDATE tblEmployers SET status='active' WHERE email='$email' AND hash='$hash' AND status='pending'") or die(mysqli_error($mydb));
echo '<div style="color:green;position:absolute;width:auto;height:auto;top:50%;left:50%;transform:translate(-50%,-50%);font-size:x-large;border:2px solid green;padding:5px;">';
echo "Your account has been activated.";
echo "<br><a href='http://localhost/CRS/employer-login.php'>click here </a>to login.";
echo '</div>'; 
    }
else{
// No match -> invalid url or account has already been activated.
echo '<div style="color:red;position:absolute;width:auto;height:auto;top:50%;left:50%;transform:translate(-50%,-50%);font-size:x-large;border:2px solid red;padding:5px;">';
echo "The url is either invalid or you already have activated your account.";
echo "<br><a href='http://localhost/CRS/employer-login.php'>click here</a> to login.";
echo '</div>';
}

}
else{
// Invalid approach
echo '<div style="color:red;position:absolute;width:auto;height:auto;top:50%;left:50%;transform:translate(-50%,-50%);font-size:x-large;border:2px solid red;padding:5px;">Invalid approach, please use the link that has been send to your email.</div>';
}

?>
