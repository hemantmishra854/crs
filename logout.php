<?php

session_start();
if(isset($_SESSION["Student"]))
{
    session_destroy();
    header('location:index.php');
}
?>