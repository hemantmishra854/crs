<?php
session_start();
include("config.php");
if($mydb)
{
if(isset($_POST["action"]))
{
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$std_id=$_SESSION['Student'];
$skills=test_input($_POST['txtInput']);
$sid=$_POST['skillId'];

$query="update tblStudentSkills set Skills='$skills' where Std_ID='$std_id' and ID='$sid'";
$run=mysqli_query($mydb,$query);

if($run)
{
echo "<span style='color:green;'>Data updated successfully</span>";
}
else
{
echo "<span style='color:red;'>Error!Data can not be updated</span>";
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