$(document).ready(function () {
$('#btnUploadPhoto').click(function(){
$('#msgUploadPhoto').html('');
});
$('#profilePhoto').on('change', function () {
var photo = document.getElementById('profilePhoto').files[0];
var photo_name = photo.name;
var extension = photo_name.split(".").pop().toLowerCase();
if (jQuery.inArray(extension, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
alert('invalid image file!');
return false;
}
var photo_size = photo.size;
if (photo_size > 2000000) {
alert('image file size is greater than 2mb!');
return false;
} else {
var formData = new FormData();
formData.append('file', photo);
$.ajax({
url: 'upload-photo.php',
data: formData,
type: 'post',
processData: false,
contentType: false,
cache: false,
success: function (data, status, xhr) {
$('#msgUploadPhoto').html(data);
$('#profile-img').attr("src","uploads/"+photo_name);
}
});
}
});

function validateSkills()
{
if ($('#searchKeySkills').val() == "") {
$('#errSkills').html('*skills is/are required!');
$('#errSkills').removeClass('d-none');;
$('#searchKeySkills').focus();
return false;
}
if (!$('#searchKeySkills').val().match(/^[a-zA-Z ]*$/)) {
$('#errSkills').html('*only letters and whitespace can be used for skills');
$('#errSkills').removeClass('d-none');;
$('#searchKeySkills').focus();
return false;
} else {
$('#errSkills').html('');
return true;
}

}

$('#searchKeySkills').keyup(function(){
validateSkills();

});
$('#btnKeySkillsDetails').click(function(event){
event.preventDefault();  
$('#msgKeySkills').html('');
var skills=validateSkills();
if(skills)
{
$.ajax({
url: "key-skills.php",
data: $('#keySkillsForm').serialize() + '&action=submit',
type: 'post',
success: function (data, status, xhttp) {
$('#msgKeySkills').html(data);
}
});
}
});

/*
*/
function checkName() {
if ($('#inputName').val() == "") {
$('#errName').html('*name is required!');
$('#errName').removeClass('d-none');;
$('#inputName').focus();
return false;
}
if (!$('#inputName').val().match(/^[a-zA-Z ]*$/)) {
$('#errName').html('*only letters and whitespace can be used for name');
$('#errName').removeClass('d-none');;
$('#inputName').focus();
return false;
} else {
$('#errName').html('');
return true;
}
}

function validateMobile() {
if ($('#mobile').val() == "") {
$('#errorMobile').html('*mobile number is required!');
$('#errorMobile').removeClass('d-none');
$('#mobile').focus();
return false;
}
if (!$('#mobile').val().match(/^[6-9]\d{9}$/)) {
$('#errorMobile').html('*invalid mobile number');
$('#errorMobile').removeClass('d-none');
$('#mobile').focus();
return false;
} else {
$('#errorMobile').html('');
return true;
}
}

function validateState() {
if ($('#state option:selected').val() == -1) {
$('#errorState').html('*select your state');
$('#errorState').removeClass('d-none');
$('#state').focus();
return false;
} else {
$('#errorState').html('');
return true;
}
}

$('#inputName').keyup(function(){
checkName();
});
$('#mobile').keyup(function(){
validateMobile();
});
$('#state').change(function(){
validateState();
});

$('#btnBasicDetails').click(function(){
$('#msgBasicDetails').html('');
event.preventDefault();
var mobile = validateMobile();
var name = checkName();
var state = validateState();
if (mobile && name && state ) {
$.ajax({
url: "basic-details.php",
data: $('#basicDetailsForm').serialize() + '&action=submit',
type: 'post',
success: function (data, status, xhttp) {
$('#msgBasicDetails').html(data);
}
});
}

});

$('#resume').on('change', function () {
$('#msgUploadResume').html('');
var resume = document.getElementById('resume').files[0];
var resume_name = resume.name;
var extension = resume_name.split(".").pop().toLowerCase();
if (jQuery.inArray(extension, ['doc', 'docx', 'pdf', 'rtf']) == -1) {
alert('invalid resume file!');
return false;
}
var resume_size = resume.size;
if (resume_size > 2000000) {
alert('resume file size is greater than 2mb!');
return false;
} else {
var formData = new FormData();
formData.append('resume', resume);
$.ajax({
url: 'upload-resume.php',
data: formData,
type: 'post',
processData: false,
contentType: false,
cache: false,
success: function (data, status, xhr) {
$('#msgUploadResume').html(data);
}
});
}
});
$('#inputDOB').datepicker({
dateFormat:'dd/mm/yy',
changeMonth:true,
changeYear:true,
minDate:new Date(1990,0,1),
maxDate:new Date(2000,11,31)
});
function validateDOB(){
var dob = $('#inputDOB').val();
var data = dob.split("/");
// using ISO 8601 Date String
if(dob=="")
{
$('#errDOB').html('*date of birth is required!');
$('#errDOB').removeClass('d-none');
$('#inputDOB').focus();
return false;
}
if (data[0]>31 || data[0]<1) {
$('#errDOB').html('invalid day!');
$('#errDOB').removeClass('d-none');
$('#inputDOB').focus();
return false;
}
if (data[1]>12 || data[1]<1) {
$('#errDOB').html('invalid month!');
$('#errDOB').removeClass('d-none');
$('#inputDOB').focus();
return false;
}
if (data[2]>2000 || data[2]<1900) {
$('#errDOB').html('invalid year!');
$('#errDOB').removeClass('d-none');
$('#inputDOB').focus();
return false;
}
else
{
$('#errDOB').html('');
return true;
}
}
$('#inputDOB').keyup(function(){
validateDOB();
});
function checkMobile() {
if ($('#inputMobile').val() == "") {
$('#errMobile').html('*mobile number is required!');
$('#errMobile').removeClass('d-none');
$('#inputMobile').focus();
return false;
}
if (!$('#inputMobile').val().match(/^[6-9]\d{9}$/)) {
$('#errMobile').html('*invalid mobile number');
$('#errMobile').removeClass('d-none');
$('#inputMobile').focus();
return false;
} else {
$('#errMobile').html('');
return true;
}
}
$('#inputMobile').keyup(function () {
checkMobile();
});
function checkGender()
{
if($('input[type=radio][name=rdGender]:checked').length == 0)
{
$('#errGender').html('*please select your gender');
$('#errGender').removeClass('d-none');
$('#rdMale').focus();
return false;
}
else
{
$('#errGender').html('');
return true;
}
}
function checkMaritulStatus() {
if ($('#selectMaritulStatus option:selected').val() == -1) {
$('#errMaritulStatus').html('*select your maritul status');
$('#errMaritulStatus').removeClass('d-none');
$('#selectMaritulStatus').focus();
return false;
} else {
$('#errMaritulStatus').html('');
return true;
}
}
$('#selectMaritulStatus').change(function () {
checkMaritulStatus();
});
function checkAddress1() {
if (!$('#inputAddress1').val().match(/^[#.0-9a-zA-Z\s,-]+$/)) {
$('#errAddress1').html('*special charaters are not allowed');
$('#errAddress1').removeClass('d-none');
$('#inputAddress1').focus();
return false;
} else {
$('#errAddress1').html('');
return true;
}
}
$('#inputAddress1').keyup(function () {
checkAddress1();
});
function checkAddress2() {
if ($('#inputAddress2').val() != "") {
if (!$('#inputAddress2').val().match(/^[#.0-9a-zA-Z\s,-]+$/)) {
$('#errAddress2').html('*special charaters are not allowed.');
$('#errAddress2').removeClass('d-none');
$('#inputAddress2').focus();
return false;
} else {
$('#errAddress2').html('');
return true;
}
} else {
return true;
}
}
$('#inputAddress2').keyup(function () {
checkAddress2();
});
function checkCity() {
if (!$('#inputCity').val().match(/^[a-zA-Z ]*$/)) {
$('#errCity').html('*only letters and whitespace can be used for city name');
$('#errCity').removeClass('d-none');
$('#errCity').focus();
return false;
} else {
$('#errCity').html('');
return true;
}
}
$('#inputCity').keyup(function () {
checkCity();
});
function checkState() {
if ($('#inputState option:selected').val() == -1) {
$('#errState').html('*select your state');
$('#errState').removeClass('d-none');
$('#inputState').focus();
return false;
} else {
$('#errState').html('');
return true;
}
}
$('#inputState').change(function () {
checkState();
});
function checkZip() {
if (!$('#inputZip').val().match(/^[1-9][0-9]{5}$/)) {
$('#errZip').html('*invalid zip code');
$('#errZip').removeClass('d-none');
$('#inputZip').focus();
return false;
} else {
$('#errZip').html('');
return true;
}
}
$('#inputZip').keyup(function () {
checkZip();
});
$('#btnSavePersonalDetails').click(function (event) {
$('#msgPersonalDetails').html('');
event.preventDefault();
var mobile = checkMobile();
var dob = validateDOB();
var gender = checkGender();
var maritul_status = checkMaritulStatus();
var add1=checkAddress1();
var city = checkCity();
var state = checkState();
var zip=checkZip();
if (mobile && dob && gender && maritul_status && add1 && city && state && zip) {
$.ajax({
url: "personal-details.php",
data: $('#personalDetailsForm').serialize() + '&action=submit',
type: 'post',
success: function (data, status, xhttp) {
$('#msgPersonalDetails').html(data);
}
});
}
});
});