<?php
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
        
        $email = test_input($_POST["email"]);
         
        if (empty($email)) {
          echo "*Email is required";
            exit;
        }
        else 
        {
         // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "*Invalid email format"; 
            exit;
       }
      }
        
        
        $checkemail="select * from tblStudents where Email='$email'";
        $result=mysqli_query($mydb,$checkemail);
        $count=mysqli_num_rows($result);
        if($count>0)
        {
         echo '*email already exists!'; 
            exit;
        }
        else
        {
         echo 'ok';   

        }
    }
    
}
else
{
    echo "*connection failed!";
}
     
?>
