<?php
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
$mobile=test_input($_POST["mobile"]);
$name=test_input($_POST["inputName"]);
$state=test_input($_POST["state"]);
$std_id=$_SESSION['Student'];
$run=0;
$query="update tblStudents set Name='$name' where SID='$std_id'";
$update_name=mysqli_query($mydb,$query);
$checkstudent="select * from tblStudentPersonalDetails where Std_ID='$std_id'";
$result=mysqli_query($mydb,$checkstudent);
$count=mysqli_num_rows($result);
if($count>=1)
{
$query="update tblStudentPersonalDetails set Mobile='$mobile',State='$state' where Std_ID='$std_id'";
$run=mysqli_query($mydb,$query);
}
else
{
$query="insert into tblStudentPersonalDetails(Mobile,State,Std_ID) values('$mobile','$state','$std_id')";
$run=mysqli_query($mydb,$query);
}
if($run && $update_name)
{
echo "<span style='color:green;'>Data saved successfully</span>";
}
else
{
echo "<span style='color:red;'>Error!Data can not be saved</span>";
}
}
else
{

echo "<span style='color:red;'>Error!Please first fill the form </span>"; 
exit();
}
}
else
{
echo "<span style='color:red;'>Error!Connection problem </span>"; 
exit();
}
?>