<?php
header('Content-type: application/pdf');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges:bytes');
session_start();

if(!isset($_SESSION['Employer']))
{
header("location:employer-login.php");
}

include("employer-header.php");
include("config.php");
$std=$_GET['std'];
$query="select * from tblUploadedResumes where Std_Id='$std'";
$resume=mysqli_query($mydb,$query);
$res=mysqli_fetch_array($resume);
$file="uploads/".$res['Resume_Name'];
$filename=$res['Resume_Name'];
$fp = fopen($file, "r") ;
header("Cache-Control: maxage=1");
header("Pragma: public");
header("Content-Disposition: inline; filename=".$fileName."");
header("Content-Description: PHP Generated Data");
header("Content-Transfer-Encoding: binary");
header('Content-Length:' . filesize($file));
ob_clean();
flush();
while (!feof($fp)) {
$buff = fread($fp, 1024);
print $buff;
}
?>