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
    $sql = "SELECT donor_id from donors WHERE `donor_name`='$fullname' and campaign_id=$campaignId and donor_email = '$email';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        // echo "inserted in database success. to-do: send mail to him with the link to submit proof";
        $url = "http://localhost:8080/FundRaiser/donationProof.php?campaignId=".$campaignId."&donorId=".$row['donor_id'];
        $to = $email;
        $subject = 'Donation Proof Submission';
        $message = '<p>You can submit the proof of donation via the link below:</br>';
        $message .= '<a href="' .$url. '">Submit Proof</a></p>';

        $headers = "From: Fund Raiser <rajeshhamaldai9824@gmail.com>\r\n";
        $headers .= "Reply-To: rajeshhamaldai9824@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n"; //to make the html work in email

        mail($to, $subject, $message, $headers);

        header("Location: ../assets/html/donorSubscribe.html");
        exit();
    } 
} else {
    echo $conn->error;
} 

