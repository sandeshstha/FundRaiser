<?php

session_start();

if(isset($_POST['submit'])) {

    require 'dbh.inc.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminlogin WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck == 1) { //as there is only one admin
        $_SESSION['admin_username'] = $username;
        header("Location: ../home.php");
    } else {
        header("Location: ../index.php?login=failed");
    }

} else {
    
    header("Location: ../index.php?login=cannotaccess");
}