<?php

session_start();

include 'dbh.inc.php';

$organizerId = $_SESSION['o_id'];
if(!isset($organizerId)) { //try direct access
    header("Location: ../index.php");
    exit();
} 

$sql = "SELECT * FROM organizers WHERE organizer_id = $organizerId;";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result); //this is  $row = resultset


