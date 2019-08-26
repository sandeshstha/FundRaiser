<?php

if(!isset($_POST['submit'])) { 
    header("Location: ../donationProof.php"); //to-do ?donor_id = $donor_id
    exit();
} else {
    include 'dbh.inc.php';
    $donatedAmount = $_POST['donatedAmount'];
    $address = $_POST['address'];
    $donorId = $_GET['donorId']; 
    $campaignId = $_GET['campaignId'];
    
    // for image part
    $filename = $_FILES['proofImage']['name'];
    $tempname = $_FILES['proofImage']['tmp_name'];
    $filename = md5($filename.time());
    $proofImagePath = "../assets/images/proofImages/".$filename;
    
    move_uploaded_file($tempname,$proofImagePath);
    // insert the input value into database
    $sql = "INSERT INTO donationproof(donor_id, campaign_id, donate_amount, donor_address, proof_image) VALUES($donorId, $campaignId, $donatedAmount, '$address','$proofImagePath');";
    $insertSuccess = mysqli_query($conn, $sql);

    if($insertSuccess) {
        header("Location: ../assets/html/proof-submission-success.html");
    } else {
        echo $conn->error;
    }
}