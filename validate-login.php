<?php
session_start();
if(isset($_SESSION['Student']))
{
    header("location:welcome.php");
}
include("config.php");

if($mydb)
{
    if(isset($_POST["action"]) && $_POST["action"]=='login')
    {
       
    $email=$_POST["inputEmail1"];
    $pass=$_POST["inputPassword1"]; 
    $pass=md5($pass);    
    
    $query="select * from tblStudents where Email='$email' and Password='$pass' and active=1";
    $result=@mysqli_query($mydb,$query);
    $count=@mysqli_num_rows($result);   
    if($count>0)
    {
        if(!empty($_POST['rememberme']))
    {
        setcookie('email',$email,time()+60*60*7);
        setcookie('pass',$_POST["inputPassword1"],time()+60*60*7); 
    }
        else
        {
            if(isset($_COOKIE["email"]))
            {
                setcookie("email","");
            }
            if(isset($_COOKIE["pass"]))
            {
                setcookie("pass","");
            }
            
        }
    
    $arr=mysqli_fetch_array($result);
    $stdname=$arr['Name'];
    $_SESSION['stdName']=strtoupper($stdname);
    $_SESSION['stdEmail']=$email;    
    $_SESSION["Student"]=$arr['SID']; 
    echo "ok";    
    }
        else
        {
          
    echo "<span style='color:red;'>invalid email or/and password!</span>";  
        }
    }
    else
    {
       echo "<span style='color:red;'>Please enter the values first.</span>" ;
    }
    
    
}
else
{
    echo "<script>alert('connection failed!');</script>";
}
?>
