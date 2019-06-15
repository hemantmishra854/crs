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
if(isset($_GET['jid']))
{
include("profileheader.php");
$jid=$_GET['jid'];
$query="select * from tbljobs where Job_ID='$jid'";
$result=mysqli_query($mydb,$query);
$arr=mysqli_fetch_array($result);
$emp_id=$arr['Employer_Id'];
$query="select * from tblcompanyaddress where Employer_Id='$emp_id'";
$result=mysqli_query($mydb,$query);
$row=mysqli_fetch_array($result);
?>
<div class="container" style="margin-top:100px;margin-bottom:50px;">
    <div class="row bg-light mb-5 p-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="save-applied-job.php" method="post">
                        <input type="hidden" value="<?php echo $jid; ?>" name="jobId">
                    <h5 class="card-title text-info"><?php echo $arr['Job_Title']; ?></h5>
                    <h5 class="text-muted"><?php echo $arr['Company']; ?></h5>
                    <h6 class="d-inline"><?php echo $arr['Job_Type']; ?></h6>
                    <h6 class="d-inline ml-5"><?php echo $row['City']; ?></h6>
                    <br>
                    <button class="btn btn-primary mt-3 mb-3" id="btnApplyForJob" name="btnApplyForJob">Apply</button>
                    <hr>
                    <h5>Job Description</h5>
                    <p class="card-text"><?php echo $arr['Job_Description']; ?></p>
                    <table class="table table-striped w-50">
                        <tbody>
                            <tr>
                                <td>Salary: </td>
                                <td><?php echo $arr['Salary']; ?></td>
                            </tr>
                            <tr>
                                <td>Industry: </td>
                                <td><?php echo $arr['Category']; ?></td>
                            </tr>
                            <tr>
                                <td>Job Type: </td>
                                <td><?php echo $arr['Job_Type']; ?></td>
                            </tr>
                            <tr>
                                <td>Total Vacancies: </td>
                                <td><?php echo $arr['Vacancies']; ?></td>
                            </tr>
                            <tr>
                                <td>Key Skills: </td>
                                <td><?php echo $arr['Skills']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h5>Desired candidate Profile</h5>
                    <h6>Education</h6>
                    <table class="table table-striped w-50">
                        <tbody>
                            <tr>
                                <td><?php echo $arr['Education']; ?>: </td>
                                <td><?php echo $arr['Degree']; ?></td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <button class="btn btn-primary mt-3 mb-3" id="btnApplyForJob" name="btnApplyForJob">Apply</button>
                </form>
                    <p id="msgApplyForJob"></p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="">
</script>
<?php
}
else
{
exit;
}
?>