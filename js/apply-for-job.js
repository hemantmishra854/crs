$(document).ready(function(){

$('#btnApplyForJob').click(function(event){
//event.preventDefault();
$('#msgApplyForJob').val('');
$.post(
"save-applied-job.php",
{action:btnApplyForJob},
function (data, status, xhttp) {
$('#msgApplyForJob').html(data);
}
);
});
});