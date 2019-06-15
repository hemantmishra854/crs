<?php
session_start();
if(isset($_SESSION['Employer']))
{
    header("location:welcome-employer.php");
}
include("config.php");

if($mydb)
{
    if(isset($_POST["action"]) && $_POST["action"]=='login')
    {
       
    $email=$_POST["inputEmail1"];
    $pass=$_POST["inputPassword1"]; 
    $pass=md5($pass);    
    
    $query="select * from tblEmployers where Email='$email' and Password='$pass' and status='active'";
    $result=@mysqli_query($mydb,$query);
    $count=@mysqli_num_rows($result);   
    if($count>0)
    {
        if(!empty($_POST['rememberme']))
    {
        setcookie('emp-email',$email,time()+60*60*7);
        setcookie('emp-pass',$_POST["inputPassword1"],time()+60*60*7); 
    }
        else
        {
            if(isset($_COOKIE["emp-email"]))
            {
                setcookie("emp-email","");
            }
            if(isset($_COOKIE["emp-pass"]))
            {
                setcookie("emp-pass","");
            }
            
        }
    $arr=mysqli_fetch_array($result);
    $ename= $arr['First_Name']." ".$arr['Last_Name'];  
    $_SESSION["empName"]=$ename; 
    $_SESSION['Employer']=$arr['Employer_Id'];    
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
