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
$std_id=$_SESSION['Student'];
$skills=test_input($_POST['searchKeySkills']);
$skills=explode(" ", $skills);

foreach ($skills as $skill) {
$query="INSERT INTO `tblstudentskills`(`Skills`, `Std_ID`) VALUES ('$skill','$std_id')";
$run=mysqli_query($mydb,$query);
}
/*

$query="update tblStudentSkills set Skills='$skills' where Std_ID='$std_id'";
$run=mysqli_query($mydb,$query);
}
*/
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