<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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

$company=test_input($_POST["inputCompanyName"]);
$designation=test_input($_POST["inputDesignation"]);
$vacancy = test_input($_POST["inputVacancies"]);
$salary = test_input($_POST["inputSalary"]);
$job = test_input($_POST["selecetJobType"]);
$industry = test_input($_POST["inputIndustry"]);
$skills = test_input($_POST["inputSkills"]);
$education = test_input($_POST["inputEducation"]);
$degree = test_input($_POST["inputDegree"]);
$jobdesc = test_input($_POST["inputJobDesc"]);
$add1 = test_input($_POST["inputAddress1"]);
$add2 = test_input($_POST["inputAddress2"]);
$city = test_input($_POST["inputCity"]);
$state = test_input($_POST["inputState"]);
$country = test_input($_POST["inputCountry"]);
$zip = test_input($_POST["inputZip"]);
$std_id=$_SESSION['Employer'];

$query="insert into tblJobs(Job_Title,Category,Company,Salary,Vacancies,Job_Type,Skills,Education,Degree,Job_Description,Employer_Id) values('$designation','$industry','$company','$salary','$vacancy','$job','$skills','$education','$degree','$jobdesc','$std_id')";
$q1=mysqli_query($mydb,$query) or die(mysqli_error($mydb));

$query="insert into tblcompanyaddress(Address_Line1,Address_Line2,City,State,Country,Zip_Code,Employer_Id) values('$add1','$add2','$city','$state','$country','$zip','$std_id')";
$q2=mysqli_query($mydb,$query) or die(mysqli_error($mydb));

if($q1 && $q2)
{
echo "<span style='color:green'>job posted successfully</span>";

}
else
{
  echo "<span style='color:red'>Error!job not posted.</span>";

}


}
}
else
{
echo "<span style='color:red'>connection failed!</span>";
exit;
}

?>