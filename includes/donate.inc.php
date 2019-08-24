<?php

if(isset($_GET['campaignId'])) {
    $campaignId = $_GET['campaignId'];
} else {
    header("Location: ../campaigns.php");
}
$fullname = $_POST['fullname'];
$email = $_POST['email'];

include 'dbh.inc.php';
$sql = "INSERT INTO donors(`donor_name`,donor_email,campaign_id) VALUES('$fullname','$email',$campaignId);";
$insertSuccess = mysqli_query($conn,$sql);

if($insertSuccess) {
    echo "inserted in database success. to-do: send mail to him with the link to submit proof";

    header("Location: ../assets/html/donorSubscribe.html");
    exit();
} else {
    echo $conn->error;
} 

