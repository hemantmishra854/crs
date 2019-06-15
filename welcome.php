<?php
session_start();
if(!isset($_SESSION['Student']))
{
header("location:index.php");
}
?>
<?php
include("profileheader.php");
include ("config.php");
?>
<div id="welcomeDiv1">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <h1 class="text-white">get your dream job</h1>
                <form class="form-block">
                    <input class="form-control-lg  mt-5 mt-md-0" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn-lg btn-primary " type="submit">Search</button>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <h6 class="card-header">
                    <?php if(isset($_SESSION['stdEmail'])){ echo $_SESSION['stdEmail'] ;}?>
                    </h6>
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="assets/IMG_1217.JPG" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                <?php if(isset($_SESSION['stdName'])){ echo $_SESSION['stdName'] ;}?>
                                </h5>
                                <h6 class="card-subtitle text-muted mb-3">Software Developer</h6>
                                <a href="update-profile.php" class="btn btn-primary btn-block">Update profile</a>
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
            <h3 class="pt-5">Job Openings</h3>
            <?php
            
            $query="select * from tbljobs";
            $result=mysqli_query($mydb,$query);
            $count=mysqli_num_rows($result);
            ?>
            
        <div class="card-body">
            <div class="card-columns">
                <?php while ($row=mysqli_fetch_array($result)) {
                ?>
                <div class="card">
                    
                    <div class="card-body">

                        <h5 class="card-title"><a href="apply-for-job.php?jid=<?php echo $row['Job_Id']; ?>" class="nav-link">Immediate opening for
                        <?php echo $row['Job_Title'];  ?></a>
                        
                        </h5>
                        <h6 class="text-muted text-center">
                        <?php echo $row['Company'];  ?>
                        
                        </h6>
                        <p class="card-text">
                            <?php echo "salary : " .$row['Salary']." p/m";  ?>
                        </p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
</div>
<?php include("footer.php"); ?>