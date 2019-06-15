<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include("config.php");
include("bootstrapfiles.php");
if($mydb)
{
if(isset($_POST["btnApplyForJob"]))
{
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

$jobid=$_POST['jobId'];
$std_id=$_SESSION['Student'];
$date=Date("y/m/d h:i:s");

$query="select * from tblJobApplications where Job_Id='$jobid' and Candidate_Id='$std_id'";
$q1=mysqli_query($mydb,$query) or die(mysqli_error($mydb));
$count=mysqli_num_rows($q1);
if($count>=1)
{
	?>
	<div class="card" align="center">
		<div class="card-body" style="max-width: 500px;">
			<h5 class="card-title text-success">You have already applied for this job!</h5>
				<a href="welcome.php" class="nav-link">Click here to continue</a>
		</div>
	</div>
	<?php
}
else
{	
$query="insert into tblJobApplications(Job_Id,Candidate_Id,Date) values('$jobid','$std_id','$date')";
$q1=mysqli_query($mydb,$query) or die(mysqli_error($mydb));

if($q1)
{

	?>
	<div class="card" align="center">
		<div class="card-body" style="max-width: 500px;">
			<h5 class="card-title text-success">You have successfully applied to this job.</h5>
			<a href="welcome.php">Click here to continue</a>
		</div>
	</div>
	<?php

}
else
{

	?>
	<div class="card" align="center">
		<div class="card-body" style="max-width: 500px;">
			<h5 class="card-title text-danger">Your application was rejected.Try again after some time.</h5>
				<a href="welcome.php">Click here to continue</a>
		</div>
	</div>
	<?php

}
}

}
}
else
{
echo "<span style='color:red'>connection failed!</span>";
exit;
}

?>