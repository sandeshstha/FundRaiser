<?php

$campaigncreator ="Admin";

if(!isset($_POST['submit'])) { //if one try to access this file direct
    header("Location: ../addEventByAdmin.php");
    exit();
} else {

    include_once 'dbh.inc.php'; //creating connection to database

    $campaignName = $_POST['campaignName'];
    $campaignType = $_POST['campaignType'];
    $campaignDays = $_POST['campaignDays'];
    $campaignAmount = $_POST['campaignAmount'];
    $campaignDescription = $_POST['campaignDescription'];
    $campaignPhone = $_POST['phone'];
    $campaignApproval = '1';

    // error handling
    if(!preg_match("/^[a-zA-Z'. -]+$/", $campaignName)) {    
        header("Location: ../addEventByAdmin.php?campaign=invalidname");
        exit();
    } else {
        // check if there is already a campaign with same inputted campaignName by the organizer
        $sql = "SELECT * FROM campaigns WHERE campaign_name = '$campaignName'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../addEventByAdmin.php?campaign=camapignNameTaken");
            exit();
        } else {

            // for campaign photo part

            $filename = $_FILES['campaignPhoto']['name'];
            $tempname = $_FILES['campaignPhoto']['tmp_name'];
            $filename = md5($filename.time());
            $campaignImagePath = "assets/images/campaignImages/".$filename;
            
            move_uploaded_file($tempname,$campaignImagePath);

             // insert the input value into database
             $sql = "INSERT INTO campaigns(campaign_name, campaign_type, campaign_days, campaign_amount, campaign_description,campaignPhone,campaignImage,`campaignCreator`,`campaignApproval`) VALUES('$campaignName','$campaignType',$campaignDays,$campaignAmount,'$campaignDescription',$campaignPhone,'$campaignImagePath','$campaigncreator','$campaignApproval');";
             $insertSuccess = mysqli_query($conn, $sql);
// to-do
             // if campaign input data successfully inserted in database then redirect him to success page with link of organizer profile
             if($insertSuccess) {
                echo "<h1>inserted into database</h1>";
                header("Location: ../includes/successEvent.php");
             } else {
                 echo $conn->error;
             }
        }
    }

}