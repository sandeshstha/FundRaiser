<?php

if(isset($_GET['vkey'])) {

    $vkey = $_GET['vkey'];
    include 'dbh.inc.php';
    $sql = "SELECT vkey,verified FROM organizers WHERE verified = 0 AND vkey = '$vkey' LIMIT 1"; //limit 1 means to return only 1 result
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck == 1) { 
        //validate the email and update the table
        $sql = "UPDATE organizers SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";
        $updated = mysqli_query($conn,$sql);
        if($updated) {
            header("Location: ../login.php?emailverified=success");
        } else {
            echo $conn->error;
        }
    } else {
        header("Location: ../assets/html/invalidemail.html");
    }
} else {
    header("Location: ../signup.php");
}