<?php
session_start();
if(isset($_SESSION['Employer']))
{
    header("location:welcome-employer.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="css/home.css" rel="stylesheet">
    <script src="js/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="menubar">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <a href="" class="navbar-brand"><span class="text-warning">C</span><span class="text-alert">R</span><span class="text-warning">S</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapseContent">
                <ul class="navbar-nav mr-auto ml-lg-5" id="first-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="post-job.php" class="nav-link">Post jobs</a>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
                
                <a href="login.php" class="nav-link text-white">Go to Jobseeker Zone</a>
                <a href="employer-login.php" class="nav-link btn-success text-white mr-lg-2 rounded">Login</a>
                <a href="employer-registration.php" class="nav-link btn-success text-white mt-2 mt-lg-0 rounded">Register</a>
            </div>
        </nav>
    </div>


<div id="commonDiv" class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="row">
           <div class="col-12 col-md-6">
              <h1 class="display-4 text-success">Login !</h1>
              <p class="lead">To post jobs without any cost.</p>
              <hr class="my-4">
              <p>Experience the hassle free job posting and hire the top notch students from the best colleges and universities of India.</p>
               
           </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <form id="empLoginForm" method="post" class="empForm">
                    <h1 class="text-center mb-3 text-success">Recruiter Login</h1>

                    <p id="errorMessage"></p>
                    <div class="form-group">
                        <label for="inputEmail1">Email address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="inputEmail1" value="<?php if(isset($_COOKIE['emp-email'])) { echo $_COOKIE['emp-email']; }?>" id="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1">
                                    <i class="fas fa-unlock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="inputPassword1" value="<?php if(isset($_COOKIE['emp-pass'])) { echo $_COOKIE['emp-pass']; }?>" id="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check1" <?php if(isset($_COOKIE['emp-email'])) { ?>checked <?php } ?> name="rememberme">
                        <label class="form-check-label" for="check1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="login" id="submit">Login</button>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <a href="employer-registration.php" class="hlink text-success">Create account</a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="forgotpassword.php" class="hlink text-success">Forgot password?</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<script src="js/employer-login.js"></script>
<?php include("footer.php"); ?>
