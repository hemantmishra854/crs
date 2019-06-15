<?php

session_start();
if(isset($_SESSION["Employer"]))
{
    session_destroy();
    header('location:employer-login.php');
}
?>