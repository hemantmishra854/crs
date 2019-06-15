<?php
session_start();

if(isset($_SESSION['Student']))
{
    header("location:welcome.php");
}

?>
<?php include("header.php"); ?>

<div class="jumbotron jumbotron-fluid mt-5" id="commonDiv">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1 class="display-4 text-primary">Sign up right now!</h1>
                <p class="lead">Get placed to the top notch companies during your studies.
                </p>
                <hr class="my-4">
                <p>Don't waste your valuable time. Get connected with the ocean of the jobs and work in your dream company.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-12 col-md-6 mt-5 mt-md-0">
                <form id="signupForm" action="validate-signup.php" method="post" onsubmit="" class="form">
                    <h1 class="text-center mb-3 text-primary">Student Registration</h1>
                    <div id="errorMessage">

                    </div>
                    <div class="form-group">
                        <label for="inputName1">Full Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="inputName1" id="name" placeholder="Enter full name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1">Email address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="inputEmail1" placeholder="Enter email" required id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-unlock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="inputPassword1" id="pwd" placeholder="Enter Password" required>
                            <small id="passwordHelp" class="form-text text-muted">
                                Your password must be 6-20 characters long, contain atleast one uppercase letter and one number
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputConfirmPassword1">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-unlock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="cpwd" name="inputConfirmPassword1" placeholder="Retype Password" required>


                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3" name="register" id="submit">Submit</button>
                    <div class="row mt-2">
                        <div class="col-12">
                            <a href="login.php" class="hlink">Sign in instead</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/signup.js"></script>

<?php include("footer.php"); ?>
