<?php
session_start();
if(isset($_SESSION['Student']))
{
    header("location:welcome.php");
}
?>

<?php include("header.php"); ?>

<div id="commonDiv" class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="row">
           <div class="col-12 col-md-6">
              <h1 class="display-4 text-primary">Login immediately!</h1>
              <p class="lead">To apply for your job of dream.</p>
              <hr class="my-4">
              <p>You are few steps far from your dream job.Don't think more just login and apply the job you are searching for.</p>
               
           </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <form id="loginForm" method="post" class="form">
                    <h1 class="text-center mb-3 text-primary">Student Login</h1>

                    <p id="errorMessage"></p>
                    <div class="form-group">
                        <label for="inputEmail1">Email address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="inputEmail1" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; }?>" id="email" placeholder="Enter email" required>
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
                            <input type="password" class="form-control" name="inputPassword1" value="<?php if(isset($_COOKIE['pass'])) { echo $_COOKIE['pass']; }?>" id="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check1" <?php if(isset($_COOKIE['email'])) { ?>checked <?php } ?> name="rememberme">
                        <label class="form-check-label" for="check1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="login" id="submit">Login</button>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <a href="signup.php" class="hlink">Create account</a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="forgotpassword.php" class="hlink">Forgot password?</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<script src="js/login.js"></script>
<?php include("footer.php"); ?>
