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
$mobile=test_input($_POST["inputMobile"]);
$dob=test_input($_POST["inputDOB"]);
$dob = explode("/",$dob);  
$dob = "$dob[2]-$dob[1]-$dob[0]"; 
$gender = test_input($_POST["rdGender"]);
$status = test_input($_POST["selectMaritulStatus"]);
$add1 = test_input($_POST["inputAddress1"]);
$add2 = test_input($_POST["inputAddress2"]);
$city=test_input($_POST["inputCity"]);
$state=test_input($_POST["inputState"]);
$country=test_input($_POST["inputCountry"]);
$zip=test_input($_POST["inputZip"]);
$std_id=$_SESSION['Student'];
$run=0;
$checkstudent="select * from tblStudentPersonalDetails where Std_ID='$std_id'";
$result=mysqli_query($mydb,$checkstudent);
$count=mysqli_num_rows($result);
if($count>=1)
{
$query="update tblStudentPersonalDetails set DOB='$dob',Mobile='$mobile',Gender='$gender',Maritus_Status='$status',Address_Line1='$add1',Address_Line2='$add2',City='$city',State='$state',Country='$country',Zip_Code='$zip' where Std_ID='$std_id'";
$run=mysqli_query($mydb,$query);
}
else
{
$query="insert into tblStudentPersonalDetails(DOB,Mobile,Gender,Maritus_Status,Address_Line1,Address_Line2,City,State,Country,Zip_Code,Std_ID) values('$dob','$mobile','$gender','$status','$add1','$add2','$city','$state','$country','$zip','$std_id')";
$run=mysqli_query($mydb,$query);
}
if($run)
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