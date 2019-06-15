<?php
session_start();
if(!isset($_SESSION['Employer']))
{
header("location:employer-login.php");
}
?>
<?php
include("employer-header.php");
include("config.php");
$emp_id=$_SESSION['Employer'];
$query="select * from tblEmployers where Employer_Id='$emp_id'";
$result=mysqli_query($mydb,$query) or die(mysqli_error($mydb));
$row=mysqli_fetch_array($result);
?>
<div id="welcomeDiv1">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <h1 class="text-white">Get the best students</h1>
                <form class="form-block">
                    <input class="form-control-lg  mt-5 mt-md-0" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn-lg btn-primary " type="submit">Search</button>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <h6 class="card-header">
                    
                    <?php  echo $row['Email'] ;?>
                    </h6>
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="assets/IMG_1217.JPG" class="card-img"  alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                <?php  echo  $row['First_Name'] ;?></h5>
                                <h6 class="card-subtitle text-muted mb-3"></h6>
                                <a href="#" class="btn btn-primary btn-block">Update profile</a>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5" id="slantedDiv2">
    <h3 class="pt-5">Recent Job Applications</h3>
    <?php
    
    $emp_id=$_SESSION['Employer'];
    $query="select * from tbljobapplications";
    $result=mysqli_query($mydb,$query);
    ?>
    
    <div class="card-body">
        <div class="card-columns">
            <?php while ($row=mysqli_fetch_array($result)) {
            
            $Job_id=$row['Job_Id'];
            
            $query="select * from tblJobs where Job_Id='$Job_id' and  Employer_Id='$emp_id'";
            $data=mysqli_query($mydb,$query);
            $arr1=mysqli_fetch_array($data);
            $job_id=$arr1['Job_Id'];
            
            $query="select * from tbljobapplications where Job_Id='$job_id'";
            $data=mysqli_query($mydb,$query);
            $app=mysqli_fetch_array($data);
            $std=$app['Candidate_Id'];
            $date=$app['Date'];
            $query="select * from tblStudents where SID='$std'";
            $data=mysqli_query($mydb,$query);
            $arr2=mysqli_fetch_array($data);
            $query="select * from tblstudentpersonaldetails where Std_ID='$std'";
            $data=mysqli_query($mydb,$query);
            $arr3=mysqli_fetch_array($data);
            ?>
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Candidate Details
                    </h5>
                    <a  class="nav-link" href="view-resume?std=<?php echo $std; ?>" target="_blank">
                    View Resume
                    </a>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td><?php echo $arr2['Name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $arr2['Email']; ?></td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td><?php echo $arr3['Mobile']; ?></td>
                            </tr>
                            <tr>
                                <td>Applied for:</td>
                                <td><?php echo $arr1['Job_Title']; ?></td>
                            </tr>
                            <tr>
                                <td>Applied on :</td>
                                <td><?php echo $date; ?></td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(document).on('show.bs.modal', '.modal', function () {
$(this).appendTo('body');
});
});
</script>
<?php include("footer.php"); ?>