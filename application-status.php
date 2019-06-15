<?php
session_start();
if(!isset($_SESSION['Student']))
{
header("location:login.php");
}
include("config.php");
if(!$mydb)
{
exit;
}
include("profileheader.php");
$cid=$_SESSION['Student'];
$query="select * from tbljobapplications where Candidate_Id='$cid'";
$result=mysqli_query($mydb,$query);
$count=mysqli_num_rows($result);
?>
<div class="container" style="margin-top:100px;margin-bottom:50px;">
    <div class="row bg-light mb-5 p-3">
        <div class="col-12">
            <h3>Your Job Application Status</h3>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">You have applied for <?php echo $count." job/s "; ?></h5>
                </div>
            </div>
            <?php while($arr=mysqli_fetch_array($result)) {
            $jid=$arr['Job_Id'];
            $query="select * from tbljobs where Job_Id='$jid'";
            $data=mysqli_query($mydb,$query);
            $row1=mysqli_fetch_array($data);
            $emp_id=$row1['Employer_Id'];
            $query="select * from tblcompanyaddress where Employer_Id='$emp_id'";
            $data=mysqli_query($mydb,$query);
            $row=mysqli_fetch_array($data);
            $query="select * from tblemployers where Employer_Id='$emp_id'";
            $data=mysqli_query($mydb,$query);
            $row2=mysqli_fetch_array($data); ?>
            <div class="card mt-3">
                <div class="card-body">
                    <form action="save-applied-job.php" method="post">
                        <input type="hidden" value="<?php echo $jid; ?>" name="jobId">
                        <h5 class="card-title text-info"><?php echo $row1['Job_Title']; ?></h5>
                        <h5 class="text-muted"><?php echo $row1['Company']; ?></h5>
                        <h6 class="d-inline"><?php echo $row1['Job_Type']; ?></h6>
                        <h6 class="d-inline ml-5"><?php echo $row['City']; ?></h6>
                        <h6 class="mt-3"><?php echo $arr['Date']; ?>&nbsp;&nbsp;&nbsp;<span class="text-success">applied</span></h6>
                        <br>
                        
                    </div>
                    <div class="card-footer">
                        <h5 class="card-title"><?php echo $row2['First_Name']." ".$row2['Last_Name'];?></h5>
                        <p class="card-text"><?php echo $row2['Email'];?></p>
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<script src="">
</script>
