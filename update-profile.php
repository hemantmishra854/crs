<?php
session_start();
if(!isset($_SESSION['Student']))
{
header("location:index.php");
}
include("profileheader.php");
include("config.php");
if(!$mydb)
{
exit;
}
$std_id=$_SESSION['Student'];
$query="select * from tblUploadedImages where Std_Id='$std_id'";
$result=mysqli_query($mydb,$query);
$arr=mysqli_fetch_array($result);
$query="select * from tblUploadedResumes where Std_Id='$std_id'";
$result=mysqli_query($mydb,$query);
$arr1=mysqli_fetch_array($result);
$query="select * from tblStudents where SID='$std_id'";
$result=mysqli_query($mydb,$query);
$arr2=mysqli_fetch_array($result);
$std_id=$_SESSION['Student'];
$query="select * from tblStudentPersonalDetails where Std_ID='$std_id'";
$result=mysqli_query($mydb,$query);
$arr3=mysqli_fetch_array($result);
?>
<div class="container" style="margin-top:100px;margin-bottom:50px;">
    <div class="row bg-light mb-5 p-3">
        <div class="col-4 col-md-2 col-lg-2" style="max-width:200px;">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#picModal" id="btnUploadPhoto">
            <img src="uploads/<?php echo $arr['Image_Name']; ?>" class="card-img rounded" alt="Upload Profile Photo" id="profile-img">
            <i class="fas fa-camera fa-2x text-primary"></i>
            </button>
            <div class="modal" id="picModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                            Update Profile Photo
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <p>Your profile photo should be professional and simple.</p>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profilePhoto" name="profilePhoto">
                                    <label class="custom-file-label" for="profilePhoto">Change profile photo</label>
                                    <small>Supported Formats: jpg, jpeg, png, upto 2 MB</small>
                                    <p id="msgUploadPhoto" style="height:auto;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 col-md-10 col-lg-6">
            <h5>
            <?php echo $arr2['Name'] ;?>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#nameModal">
            <i aria-hidden="true" class="fas fa-pencil-alt"></i></button>
            <div class="modal" tabindex="-1" role="dialog" id="nameModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Basic Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form id="basicDetailsForm" name="basicDetailsForm" action="basic-details.php">
                                    <div class="form-group">
                                        <label for="inputName">Full Name</label>
                                        <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $arr2['Name'];?>">
                                        <label class="text-danger d-none" id="errName"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail"readonly value="<?php echo $arr2['Email'] ;?>">
                                        <label class="text-danger d-none" id="errEmail"></label>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"  value="<?php if(!empty($arr3)){ echo $arr3['Mobile']; } ?>">
                                            <label class="text-danger d-none" id="errorMobile"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="state">Current Location</label>
                                            <select id="state" name="state" class="form-control" required>
                                                
                                                <?php if(!empty($arr3)){ $state=$arr3["State"];echo "<option value='$state' selected>$state</option>"; } ?>
                                                <option value="-1">Choose...</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                <option value="Daman and Diu">Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Orissa">Orissa</option>
                                                <option value="Pondicherry">Pondicherry</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttaranchal">Uttaranchal</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                            <label class="text-danger d-none" id="errorState"></label>
                                        </div>
                                    </div>
                                    <div id="msgBasicDetails" class="form-group"></div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnBasicDetails" name="btnBasicDetails">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            </h5>
            <div class="row">
                <div class="col-12 col-md-5">
                    <h6>
                    <i class="fas fa-phone-square"></i> <?php if(!empty($arr3)) { echo $arr3['Mobile']; } else { echo "Add mobile no.";} ?></h6>
                </div>
                <div class="col-12 col-md-7">
                    <h6><i class="fas fa-envelope-square"></i>
                    <?php echo $arr2['Email'] ;?></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                </div>
                <div class="col-12 col-md-6">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <h4 class="text-white">One Action Pending</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-light p-3">
        <div id="profile-list" class="list-group col-12 col-md-4">
            <a class="list-group-item list-group-item-action" href="#Upload-Resume">Upload Resume</a>
            <a class="list-group-item list-group-item-action" href="#Key-Skills">
            Key Skills</a>
            <a class="list-group-item list-group-item-action" href="#Education">Education</a>
            <a class="list-group-item list-group-item-action" href="#IT-Skills">IT Skills</a>
            <a class="list-group-item list-group-item-action" href="#Projects">Projects</a>
            <a class="list-group-item list-group-item-action" href="#Job-Preferences">
                Job Preferences
            </a>
            <a class="list-group-item list-group-item-action" href="#Personal-Details">
                Personal Details
            </a>
        </div>
        <div data-spy="scroll" data-target="#profile-list" data-offset="0" class="scrollspy-example col-12 col-md-8 mt-3 mt-md-0">
            <div class="card" id="Upload-Resume">
                <div class="card-body">
                    <h5 class="card-title">Upload Resume</h5>
                    <p class="card-text">Upload your resume to make your profile more engaging and eye-catching.</p>
                    <p class="mt-4">
                        <?php
                        date_default_timezone_set('Asia/Kolkata');
                        echo "<b>".$arr1['Resume_Name']."</b> uploaded on ";
                        echo "<b>".$arr1['Resume_TimeStamp']."</b>";
                        ?>
                    </p>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="resume" name="resume">
                        <label class="custom-file-label" for="resume">Upload resume</label>
                        <small>Supported Formats: doc, docx, rtf, pdf, upto 2 MB</small>
                        <p id="msgUploadResume"></p>
                    </div>
                </div>
            </div>
            <div class="card mt-4" id="Key-Skills">
                <div class="card-body">
                    <h5 class="card-title">Key Skills
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#skillsModal">
                    <i aria-hidden="true" class="fas fa-plus-circle"></i></button>
                    <div class="modal" id="skillsModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="keySkillsForm" action="key-skills.php" name="keySkillsForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                        Update Key Skills
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <p>Tell your skills to the world and get the actual rewards of your skills by the top recruiters of the overall world community.</p>
                                            <label class="mt-3">Skills</label>
                                            <input type="text" class="form-control" id="searchKeySkills" name="searchKeySkills" placeholder="Enter your skill">
                                            <small class="help-text">Specify all your skills separated by a whitespace</small>
                                            <label class="text-danger d-none" id="errSkills"></label>
                                            <p id="msgKeySkills" class="mt-4" style="height:auto;"></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="btnKeySkillsDetails" name="btnKeySkillsDetails">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </h5>
                    <p class="">
                        <?php
                        $query="select * from  tblStudentSkills where Std_ID='$std_id'";
                        $result=mysqli_query($mydb,$query);
                        if(mysqli_num_rows($result)>=1)
                        {
                        ?>
                        <form id="editKeySkillsForm" action="edit-key-skills.php">
                        <table class="table table-striped ">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                while ($arr4=mysqli_fetch_array($result)) {
                                    $i=$i+1;
                                echo '<tr>
                                    <th scope="row">'.$i.'</th>
                                    <td><input type="text" class="form-control" value="'.$arr4['Skills'].'" name="txtSkills'.$i.'" id="txtSkills'.$i.'" onkeyup="getTextId(this.id)"/>
                                        <input type="hidden" value="'.$arr4['ID'].'" id="skillId'.$i.'" name="skillId'.$i.'">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link" id="btnEditKeySkills'.$i.'" value="btnEditKeySkills'.$i.'" onclick="getClickedId(this.id)">
                                        <i  class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link text-danger" id="btnDeleteKeySkills'.$i.'" value="btnDeleteKeySkills'.$i.'" onclick="getDeleteId(this.id)">
                                        <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>';
                                }
                                ?>
                                
                            </tbody>
                        </table>
                     
                    <label class="text-danger" id="check"></label>
                    <label class="text-danger" id="errKeySkills"></label>
                        </form>
                    <?php 
                   } else { echo "<p class='text-muted'>No skills are provided by you!</p>" ;} ?>
                    </p>
                </div>
            </div>
            <div class="card mt-4" id="Education">
                <div class="card-body">
                    <h5 class="card-title">Education
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#educationModal">
                    <i aria-hidden="true" class="fas fa-plus-circle"></i></button>
                    </h5>
                    <div class="">
                    </div>
                </div>
            </div>
            <div class="card mt-4" id="IT-Skills">
                <div class="card-body">
                    <h5 class="card-title">IT Skills
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#educationModal">
                    <i aria-hidden="true" class="fas fa-plus-circle"></i></button>
                    </h5>
                    <div class="">
                    </div>
                </div>
            </div>
            <div class="card mt-4" id="Projects">
                <div class="card-body">
                    <h5 class="card-title">Projects
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#educationModal">
                    <i aria-hidden="true" class="fas fa-plus-circle"></i></button>
                    </h5>
                    <div class="">
                    </div>
                </div>
            </div>
            <div class="card mt-4" id="Job-Preferences">
                <div class="card-body">
                    <h5 class="card-title">Job Preferences
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#educationModal">
                    <i aria-hidden="true" class="fas fa-plus-circle"></i></button>
                    </h5>
                    <div class="">
                    </div>
                </div>
            </div>
            <div class="card mt-4" id="Personal-Details">
                <div class="card-body">
                    <h5 class="card-title">Personal Details
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#personalDetailsModal">
                    <i aria-hidden="true" class="fas fa-plus-circle"></i>
                    </button>
                    
                    <div class="modal" tabindex="-1" role="dialog" id="personalDetailsModal">
                        
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="personalDetailsForm" action="personal-details.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Personal Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputMobile">Mobile</label>
                                                    <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile" required
                                                    value="<?php if(!empty($arr3['Mobile'])) {echo $arr3['Mobile'];}?>">
                                                    <label id="errMobile" class="text-danger d-none"></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDOB">Date of Birth</label>
                                                    <input type="text" class="form-control" id="inputDOB" name="inputDOB" required
                                                    value="<?php if(!empty($arr3['DOB'])) { $dob = explode("-",$arr3['DOB']);$dob = "$dob[2]/$dob[1]/$dob[0]";echo  $dob;}?>">
                                                    <label id="errDOB" class="text-danger d-none"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="rdGender">Gender:</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="rdMale" name="rdGender" value="Male" <?php if(!empty($arr3) && $arr3['Gender']=='Male'){ ?> checked <?php } ?> >
                                                    <label class="form-check-label" for="rdMale">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"  id="rdFemale" name="rdGender" value="Female"  <?php if(!empty($arr3) && $arr3['Gender']=='Female'){ ?> checked <?php } ?>>
                                                    <label class="form-check-label" for="rdFemale">Female</label>
                                                </div>
                                                <label id="errGender" class="text-danger d-none"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="selectMaritulStatus">Maritul Status</label>
                                                <select id="selectMaritulStatus" name="selectMaritulStatus" class="form-control" required>
                                                    <option value="-1"  <?php if(empty($arr3['Maritus_Status'])){ ?> selected <?php } ?>>Choose...</option>
                                                    <option value="Single"  <?php if(!empty($arr3['Maritus_Status']) && $arr3['Maritus_Status']=='Single'){ ?> selected <?php } ?>> Single</option>
                                                    <option value="Married"  <?php if(!empty($arr3['Maritus_Status']) && $arr3['Maritus_Status']=='Married'){ ?> selected <?php } ?>>Married</option>
                                                    <option value="Other" <?php if(!empty($arr3['Maritus_Status']) && $arr3['Maritus_Status']=='Other'){ ?> selected <?php } ?>> Other</option>
                                                </select>
                                                <label id="errMaritulStatus" class="text-danger d-none"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress1">Address 1</label>
                                                <input type="text" class="form-control" id="inputAddress1" name="inputAddress1" placeholder="1234 Main St" required value="<?php if(!empty($arr3['Address_Line1'])){ echo $arr3['Address_Line1']; } ?>">
                                                <label id="errAddress1" class="text-danger d-none"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress2">Address 2</label>
                                                <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Apartment, studio, or floor" value="<?php if(!empty($arr3['Address_Line2'])){ echo $arr3['Address_Line2']; }?>">
                                                <label id="errAddress2" class="text-danger d-none"></label>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">City</label>
                                                    <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?php if(!empty($arr3['City'])){ echo $arr3['City']; }?>">
                                                    <label id="errCity" class="text-danger d-none" required></label>
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputState">State</label>
                                                    <select id="inputState" name="inputState" class="form-control" required>
                                                        <?php if(!empty($arr3['State'])){ $state=$arr3["State"];echo "<option value='$state' selected>$state</option>"; } ?>
                                                        <option value="-1">Choose...</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Orissa">Orissa</option>
                                                        <option value="Pondicherry">Pondicherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttaranchal">Uttaranchal</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                    <label id="errState" class="text-danger d-none"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputCountry">Country</label>
                                                    <select id="inputCountry" name="inputCountry" class="form-control">
                                                        <option selected>India</option>
                                                    </select>
                                                    <label id="errCountry" class="text-danger d-none"></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputZip">Zip</label>
                                                    <input type="text" class="form-control" id="inputZip" name="inputZip" required value="<?php if(!empty($arr3['Zip_Code'])){ echo $arr3['Zip_Code']; }?>">
                                                    <label id="errZip" class="text-danger d-none"></label>
                                                </div>
                                            </div>
                                            <div  id="msgPersonalDetails"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="btnSavePersonalDetails" name="btnSavePersonalDetails">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/update-profile.js">
</script>
<script type="text/javascript">

var isValid=false;
var id='';
function getTextId(clicked_id)
{
id=clicked_id;
if ($('#'+id).val() == "") {
$('#errKeySkills').html('*skills is/are required!');
$('#errKeySkills').removeClass('d-none');;
$('#'+id).focus();
}
if (!$('#'+id).val().match(/^[a-zA-Z ]*$/)) {
$('#errKeySkills').html('*only letters and whitespace can be used for skills');
$('#errKeySkills').removeClass('d-none');;
$('#'+id).focus();
} else {
$('#errKeySkills').html('');
isValid=true;

}

}

function getClickedId(clicked_id)
{
$('#'+clicked_id).click(function(event){
event.preventDefault();
var str=$('#'+clicked_id).val();
var sid=str.charAt(str.length-1); 
var sid=$('#skillId'+sid).val();
if(isValid)
{
$.post(
"edit-key-skills.php",
{ txtInput:$('#'+id).val(),skillId:sid,action:clicked_id },
 function (data, status, xhttp) {
$('#errKeySkills').html(data);
}
);
}
});


}

function getDeleteId(clicked_id)
{

$('#'+clicked_id).click(function(event){
event.preventDefault();
var str=$('#'+clicked_id).val();
var sid=str.charAt(str.length-1); 
var sid=$('#skillId'+sid).val();
$.post(
"delete-key-skills.php",
{ skillId:sid,action:clicked_id },
 function (data, status, xhttp) {
$('#errKeySkills').html(data);
}
);
});
}

</script>