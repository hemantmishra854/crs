<?php
session_start();
if(isset($_SESSION['Student']))
{
include("profileheader.php");
}
else if(isset($_SESSION['Employer']))
{
header("location:welcome-employer.php");
}
else
{
include("header.php");
}
include "config.php";
$query="select * from tbljobs";
$result=mysqli_query($mydb,$query);
$count=mysqli_num_rows($result);
?>
<div id="slantedDiv1" class="container-fluid">
    <div class="row">
        <div class="col-12 text-center mt-5">
            <h1 class="text-white display-6">get your dream job</h1>
            <form class="form-block">
                <input class="form-control-lg  mt-5 mt-md-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn-lg btn-primary " type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid mt-5" id="slantedDiv2">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs justify-content-center">
                <li class="nav-item ">
                    <a href="#" class="nav-link active">All</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">IT</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Manufacturing</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Health Care</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Hospitality</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Finance</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Insurance</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Banking</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Marketting</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Education</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Others</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="card-columns">
                <?php while ($row=mysqli_fetch_array($result)) {
                ?>
                <div class="card">
                    
                    <div class="card-body">

                        <h5 class="card-title"><a href="apply-for-job.php?jid=<?php echo $row['Job_Id']; ?>" class="nav-link">Immediate opening for
                        <?php echo $row['Job_Title'];  ?></a>
                        
                        </h5>
                        <h6 class="text-muted">
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
</div>
<?php include("footer.php"); ?>