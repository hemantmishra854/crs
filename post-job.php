<?php
session_start();
if(!isset($_SESSION['Employer']))
{
header("location:employer-login.php");
}
?>
<?php include("employer-header.php"); ?>
<div class="container" style="margin-top: 100px;margin-bottom: 100px;">
    <div class="row">
    <div class="col-12 col-lg-10 offset-lg-1">
        
        <form id="jobPostingForm" action="save-posted-job.php" method="post">
            <h3 class="text-primary text-center mb-5">Post a Job</h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCompanyName">Company Name</label>
                    <input type="text" class="form-control" id="inputCompanyName" name="inputCompanyName" placeholder="Company Name" required>
                    <label id="errCompanyName" class="text-danger d-none"></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputDesignation">Designation</label>
                    <input type="text" class="form-control" id="inputDesignation" name="inputDesignation" placeholder="Designation" required>
                    <label id="errDesignation" class="text-danger d-none"></label>
                </div>
                <div class="form-group col-md-4">
                <label for="inputIndustry">Industry</label>
                <select id="inputIndustry" name="inputIndustry" class="form-control" required>
                    <option value="-1" selected>Choose...</option>
                    <option value="IT">IT</option>
                    <option value="Retail">Retail</option>
                    <option value="Education">Education</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Banking">Banking</option>
                    <option value="Insurance">Insurance</option>
                    <option value="Manufacturing">Manufacturing</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Others">Others</option>
                </select>
                <label id="errIndustry" class="text-danger d-none"></label>
               </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputVacancies">Number of Vacancies</label>
                    <input type="text" class="form-control" id="inputVacancies" name="inputVacancies" placeholder="Number of vacancies" required>
                    <label id="errVacancies" class="text-danger d-none"></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputSalary">Salary</label>
                    <input type="text" class="form-control" id="inputSalary" name="inputSalary" placeholder="salary" required>
                    <label id="errSalary" class="text-danger d-none"></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="selecetJobType">Job Type</label>
                    <select class="form-control" id="selecetJobType" name="selecetJobType">
                        <option value="-1">Choose job type...</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Permanent">Permanent</option>
                        <option value="Others">Others</option>
                    </select>
                    <label id="errJobType" class="text-danger d-none"></label>
                </div>
            </div>
            <div class="form-row">
                

                <div class="form-group col-md-4">
                    
                <label for="inputSkills">Desired Skills</label>
                <input type="text" class="form-control" id="inputSkills" name="inputSkills" placeholder="skills" required>
                <label id="errSkills" class="text-danger d-none"></label>
                </div>
                <div class="form-group col-md-4">
                <label for="inputEducation">Desired Education</label>
                <select id="inputEducation" name="inputEducation" class="form-control" required>
                    <option value="-1" selected>Choose...</option>
                    <option value="UG">UG</option>
                    <option value="PG">PG</option>
                    <option value="Doctrate">Doctrate</option>
                    <option value="Others">Others</option>
                </select>
                <label id="errEducation" class="text-danger d-none"></label>  
                </div>

                <div class="form-group col-md-4">
                    
                <label for="inputDegree">Desired Degree</label>
                <input type="text" class="form-control" id="inputDegree" name="inputDegree" placeholder="degree" required>
                <label id="errDegree" class="text-danger d-none">hi</label>
                </div>
            </div>

            <div class="form-group">
                <label for="inputJobDesc">Job Description</label>
                <textarea  class="form-control" id="inputJobDesc" name="inputJobDesc" placeholder="short job description" required>
                </textarea>
                <label id="errJobDesc" class="text-danger d-none"></label>
            </div>
            <div class="form-group">
                <label for="inputAddress1">Address 1</label>
                <input type="text" class="form-control" id="inputAddress1" name="inputAddress1" placeholder="1234 Main St" required>
                <label id="errAddress1" class="text-danger d-none"></label>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Apartment, studio, or floor">
                <label id="errAddress2" class="text-danger d-none"></label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity">
                    <label id="errCity" class="text-danger d-none" required></label>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <select id="inputState" name="inputState" class="form-control" required>
                        <option value="-1" selected>Choose...</option>
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
                    <input type="text" class="form-control" id="inputZip" name="inputZip" required>
                    <label id="errZip" class="text-danger d-none"></label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="btnJobPosting" id="btnJobPosting">Post job</button>
        </form>
        <div class="row mt-3">
            <div class="col-12">
                <p id="msgJobPosting"></p>
            </div>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript" src="js/validate-job-posting.js"></script>