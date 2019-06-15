<?php
session_start();
if(!isset($_SESSION['Student']))
{
    header("location:index.php");
}
include "config.php";
if($_FILES['resume']['name']!='')
{ 
    $image_name=$_FILES['resume']['name'];
    $image_tmp_name=$_FILES['resume']['tmp_name'];
    $test=explode(".",$image_name);
    $extension=end($test);
    $location="uploads/$image_name";
    move_uploaded_file($image_tmp_name,$location);
    $image=file_get_contents($location);
    $image=base64_encode($image);
    $std_id=$_SESSION["Student"];
    $query="select * from tblUploadedResumes where Std_Id='$std_id'";
    $result=mysqli_query($mydb,$query);
    $count=mysqli_num_rows($result);
    $run=0;
    date_default_timezone_set('Asia/Kolkata'); 
    $timestamp=date("Y-m-d H:i:s");
    if($count>=1)
    {
    $query="update tblUploadedResumes set Resume='$image',Resume_Name='$image_name',
    Resume_TimeStamp='$timestamp' where Std_Id='$std_id'";
    $run=mysqli_query($mydb,$query);
    }
    else
    {
    $query="insert into tblUploadedResumes(Resume,Resume_Name,Resume_TimeStamp,Std_Id) values('$image','$image_name','$timestamp','$std_id')";
    $run=mysqli_query($mydb,$query);  
    }
    if($run)
    {        
    echo "<span class='text-success'>".$_FILES['resume']['name']." has been uploaded successfully.</span>";   
    }
    else
    {
    echo "<span class='text-danger'>".$_FILES['resume']['name']." can not be uploaded!</span>";
        
    }
    
}
else
{
    echo "select !";
}

?>