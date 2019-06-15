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

<div class="jumbotron jumbotron-fluid mt-5" id="commonDiv">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <h1 class="display-4 text-success">Register as Recruiter!</h1>
                <p class="lead">Get connected with the talented job seekers.
                </p>
                <hr class="my-4">
                <p>Don't worry for the recruitment process, we are here to help you with the best strategy to make the task easy.</p>
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-12 col-md-8 mt-5 mt-md-0">
                <form class="form" id="empRegistrationForm" action="validate-employer.php">

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label id="errorMessage"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First Name" required>
                            <label id="errFirstName" class="text-danger"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name" required>
                            <label id="errLastName" class="text-danger"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
                            <label id="errEmail" class="text-danger"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputMobile">Mobile</label>
                            <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile" required>
                            <label id="errMobile" class="text-danger"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
                            <label id="errPassword" class="text-danger"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputConfirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password" required>
                            <label id="errConfirmPassword" class="text-danger"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <button type="submit" class="btn btn-success" name="btnEmpRegistration" id="btnEmpRegistration">Create account</button>
                        </div>
                        <div class="form-group  col-6 text-right">
                            <a href="employer-login.php" class="hlink text-success">Sign in instead</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/validate-employer.js"></script>

<?php include("footer.php"); ?>
