<?php
include_once 'sessions.inc.php';
$organizer_id = $data['organizer_id'];
// echo $organizer_id;

if(!isset($_POST['submit'])) {
    header("Location: ../organizerInfoSetting.php");
} else {
    require 'dbh.inc.php';
    $new_organizer_fullname = $_POST['fullname'];
    $new_organizer_username = $_POST['username'];
    $new_organizer_email = $_POST['email'];
    $new_organizer_phone = $_POST['phone'];

    $sql = "UPDATE organizers SET organizer_fullname = '$new_organizer_fullname', organizer_username='$new_organizer_username', organizer_email='$new_organizer_email', organizer_phone= $new_organizer_phone WHERE organizer_id = $organizer_id;";
    $result = mysqli_query($conn,$sql);

    if($result) {
        header("Location: ../organizerInfoSetting.php?update=success");
        exit();
    }
}