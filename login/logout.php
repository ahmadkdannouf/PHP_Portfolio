<?php 
    require_once('../connection.php'); 
    session_unset(); 
    session_destroy(); 
    echo '<script>alert("You Successfully Logged Out!")</script>';
    header("Location:../home/home.php"); 
?>    