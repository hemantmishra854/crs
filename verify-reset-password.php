<?php 

session_start();
include "config.php";

$isValid=false;

if(isset($_SESSION['uname']))
{
    header("location:welcome.php");
}

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
// Verify data
$email = mysqli_real_escape_string($mydb,$_GET['email']); // Set email variable
$hash = mysqli_real_escape_string($mydb,$_GET['hash']); // Set hash variable

$search = mysqli_query($mydb,"SELECT email, hash FROM tblResetPassword WHERE email='$email' AND hash='$hash'") or die(mysqli_error());
$match = mysqli_num_rows($search);   
    
if($match > 0)
{
    
include "bootstrapfiles.php";

?>

<div id="commonDiv" class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form id="resetPasswordForm" method="post" class="form" action="reset-password.php">
                    <h1 class="text-center mb-3">Reset Password</h1>

                    <div class="form-group">
                        <label for="inputPassword1">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                    <i class="fas fa-unlock"></i>
                                </span>
                            </div>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="hash" value="<?php echo $hash; ?>">
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
                    <input type="submit" class="btn btn-primary btn-block" name="resetPassword" id="resetPassword" value="Reset Password"/>
                  
                    <h6 class="mt-2" id="errorMessage">
                    </h6>
                    <h6 class="mt-2" id="redirectMessage">
                    </h6>
                </form>

            </div>

        </div>
    </div>
</div>


<script src="js/reset-password.js">
</script>

</body>
</html>
  <?php 
    
}
else
{
    echo "<center><h1>invalid url or request!</h1></center>";
    exit;
}

}
else
{
   
    ; 
}

?>