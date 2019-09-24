<?php

if(isset($_GET['logout']) && $_GET['logout'] == 'done') {
    session_start(); //we need to have the session running in order to destroy it
    session_unset();    // unset all the session variables inside the browser
    session_destroy(); //destroy the session
    header("Location: ../index.php");
    exit();
}