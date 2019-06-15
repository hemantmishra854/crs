$(document).ready(function () {


function checkCompanyName() {
if (!$('#inputCompanyName').val().match(/^[a-zA-Z ]*$/)) {
$('#errCompanyName').html('*only letters and whitespace can be used for company name');
$('#errCompanyName').removeClass('d-none');
$('#inputCompanyName').focus();
return false;
} else {
$('#errCompanyName').html('');
return true;
}
}
$('#inputCompanyName').keyup(function () {
checkCompanyName();
});
function checkDesignationName() {
if (!$('#inputDesignation').val().match(/^[a-zA-Z ]*$/)) {
$('#errDesignation').html('*only letters and whitespace can be used for designation');
$('#errDesignation').removeClass('d-none');
$('#inputDesignation').focus();
return false;
} else {
$('#errDesignation').html('');
return true;
}
}
$('#inputDesignation').keyup(function () {
checkDesignationName();
});
function checkVacancies() {
if ($('#inputVacancies').val() == "") {
$('#errVacancies').html('*number of vacancies is required!');
$('#errVacancies').removeClass('d-none');
$('#inputVacancies').focus();
return false;
}
if (!$('#inputVacancies').val().match(/^\d{1,4}$/) || $('#inputVacancies').val()==0 ) {
$('#errVacancies').html('*invalid number');
$('#errVacancies').removeClass('d-none');
$('#inputVacancies').focus();
return false;
} else {
$('#errVacancies').html('');
return true;
}
}
$('#inputVacancies').keyup(function () {
checkVacancies();
});

function checkSalary() {
if ($('#inputSalary').val() == "") {
$('#errSalary').html('*salary is required!');
$('#errSalary').removeClass('d-none');
$('#inputSalary').focus();
return false;
}
if (!$('#inputSalary').val().match(/^\d{1,8}$/) || $('#inputVacancies').val()==0 ) {
$('#errSalary').html('*invalid salary');
$('#errSalary').removeClass('d-none');
$('#inputSalary').focus();
return false;
} else {
$('#errSalary').html('');
return true;
}
}
$('#inputSalary').keyup(function () {
checkSalary();
});

function checkJobType() {
if ($('#selecetJobType option:selected').val() == -1) {
$('#errJobType').html('*select your job type');
$('#errJobType').removeClass('d-none');
$('#selecetJobType').focus();
return false;
} else {
$('#errJobType').html('');
return true;
}
}
$('#selecetJobType').change(function () {
checkJobType();
});
function checkIndustry() {
if ($('#inputIndustry option:selected').val() == -1) {
$('#errIndustry').html('*select your industry');
$('#errIndustry').removeClass('d-none');
$('#inputIndustry').focus();
return false;
} else {
$('#errIndustry').html('');
return true;
}
}
$('#inputIndustry').change(function () {
checkIndustry();
});


function checkSkills() {
if ($('#inputSkills').val() == "") {
$('#errSkills').html('*skills is/are required!');
$('#errSkills').removeClass('d-none');;
$('#inputSkills').focus();
return false;
}
if (!$('#inputSkills').val().match(/^[a-zA-Z ]*$/)) {
$('#errSkills').html('*only letters and whitespace can be used for skills');
$('#errSkills').removeClass('d-none');;
$('#inputSkills').focus();
return false;
} else {
$('#errSkills').html('');
return true;

}


}
$('#inputSkills').keyup(function () {
checkSkills();
});

function checkEducation() {
if ($('#inputEducation option:selected').val() == -1) {
$('#errEducation').html('*select your education');
$('#errEducation').removeClass('d-none');
$('#inputEducation').focus();
return false;
} else {
$('#errEducation').html('');
return true;
}
}
$('#inputEducation').change(function () {
checkEducation();
});

function checkDegree() {
if ($('#inputDegree').val() == "") {
$('#errDegree').html('*degree is/are required!');
$('#errDegree').removeClass('d-none');;
$('#inputDegree').focus();
return false;
}
if (!$('#inputDegree').val().match(/^[a-zA-Z ]*$/)) {
$('#errDegree').html('*only letters and whitespace can be used for degree');
$('#errDegree').removeClass('d-none');;
$('#inputSkills').focus();
return false;
} else {
$('#errDegree').html('');
return true;

}
}


$('#inputDegree').keyup(function () {
checkDegree();
});
function checkJobDesc() {
if ($('#inputJobDesc').val() == "") {
$('#errJobDesc').html('*job description is/are required!');
$('#errJobDesc').removeClass('d-none');;
$('#inputJobDesc').focus();
return false;
}
if (!$('#inputJobDesc').val().match(/^[a-zA-Z ]*$/)) {
$('#errJobDesc').html('*only letters and whitespace can be used for job description');
$('#errJobDesc').removeClass('d-none');;
$('#inputJobDesc').focus();
return false;
} else {
$('#errJobDesc').html('');
return true;

}


}
$('#inputJobDesc').keyup(function () {
checkJobDesc();
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
    
    $('#btnJobPosting').click(function (event) {
    event.preventDefault();
    var company = checkCompanyName();
    var designation = checkDesignationName();
    var vacancies = checkVacancies();
    var salary = checkSalary();
    var job = checkJobType();
    var industry=checkIndustry();
    var skills=checkSkills();
    var education=checkEducation();
    var degree=checkDegree();
    var jobdesc=checkJobDesc();
    var add1 = checkAddress1();
    var city=checkCity();
    var state=checkState();
    var zip=checkZip();
    if (company && designation && vacancies && salary && job && industry && skills && 
        education && jobdesc&& add1 && city && state && zip) {
    $.ajax({
    url: "save-posted-job.php",
    data: $('#jobPostingForm').serialize() + '&action=submit',
    type: 'post',
    success: function (data, status, xhttp) {
    $('#msgJobPosting').html(data);
    }
    });
    }
    });
    });