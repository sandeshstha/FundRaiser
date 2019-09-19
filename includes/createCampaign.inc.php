<?php
include_once 'sessions.inc.php';
$campaigncreator = $data['organizer_username'];
if(!isset($_POST['submit'])) { //if one try to access createcampaign.inc.php without access
    header("Location: ../createCampaign.php");
    exit();
} else {
    include_once 'dbh.inc.php'; //creating connection to database
    $campaignName = $_POST['campaignName'];
    $campaignType = $_POST['campaignType'];
    $campaignDays = $_POST['campaignDays'];
    $campaignAmount = $_POST['campaignAmount'];
    $campaignDescription = $_POST['campaignDescription'];
    $campaignPhone = $_POST['phone'];
    // error handling
    if(!preg_match("/^[a-zA-Z'. -]+$/", $campaignName)) {    
        header("Location: ../createCampaign.php?campaign=invalidname");
        exit();
    } else {
        // check if there is already a campaign with same inputted campaignName by the organizer
        $sql = "SELECT * FROM campaigns WHERE campaign_name = '$campaignName'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../createCampaign.php?campaign=camapignNameTaken");
            exit();
        } else {
            // for campaign photo part
            $filename = $_FILES['campaignPhoto']['name'];
            $tempname = $_FILES['campaignPhoto']['tmp_name'];
            $filename = md5($filename.time());
            $campaignImagePath = "assets/images/campaignImages/".$filename;
            
            move_uploaded_file($tempname,$campaignImagePath);
             // insert the input value into database
             $sql = "INSERT INTO campaigns(campaign_name, campaign_type, campaign_days, campaign_amount, campaign_description,campaignPhone,campaignImage,`campaignCreator`) VALUES('$campaignName','$campaignType',$campaignDays,$campaignAmount,'$campaignDescription',$campaignPhone,'$campaignImagePath','$campaigncreator');";
             $insertSuccess = mysqli_query($conn, $sql);
// to-do
             // if campaign input data successfully inserted in database then redirect him to success page with link of organizer profile
             if($insertSuccess) {
                // echo "<h1>inserted into database</h1>";
                header("Location: ../assets/html/organizerCampaignSuccess.html");
             } else {
                 echo $conn->error;
             }
        }
    }
}