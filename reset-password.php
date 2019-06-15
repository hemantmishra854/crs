<?php
include "config.php";
if(isset($_POST['action']) && $_POST['action']=='resetPassword')
{
 
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    $msg='';
    $email=$_POST['email'];
    $hash=$_POST['hash'];
    $pwd=test_input($_POST['inputPassword1']);
    $cpwd=test_input($_POST['inputConfirmPassword1']);
    if (empty($pwd)) {
          echo "*Password is required<br>";
          exit;
             
        }
        else 
        {
        if (!preg_match("/[a-zA-Z0-9]{6,20}/",$pwd)) {
            echo "*Your password must be 6-20 characters long<br>";
            exit;

        }
        else if (!preg_match("/(?=.*[A-Z])/",$pwd)) {
            echo "*Your password must  contain atleast one uppercase letter<br>";
            exit;
        }
        else if (!preg_match("/(?=.*[0-9])/",$pwd)) {
            echo  "*Your password must  contain atleast one digit<br>";
            exit;
        
        } 
        }
        
         if (empty($cpwd)) {
           echo "*Confirm password is required<br>";
             exit;
            
        }
        else 
        {
        if ($pwd != $cpwd) {
            echo "*password is not matching<br>";
            exit;
    
        }
        }
    
      $pwd=md5($pwd);
      $query="update tblStudents set password='$pwd' where email='$email'";
      $result=@mysqli_query($mydb,$query) or die(mysqli_error());
     if($result>0)
     {
        echo "success"; 
        $query="delete from tblResetPassword  where email='$email'";
        mysqli_query($mydb,$query) or die(mysqli_error());
        exit;
     }
    else
    {
        echo "Password can't be reset!";
        exit;
    }
    
}
else
{
    header("location:login.php");
}
?>