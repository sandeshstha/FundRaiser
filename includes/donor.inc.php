<?php

	if(!isset($_POST['submit'])) { //if one try to access createcampaign.inc.php without access
    header("Location: ../donor1.php");
    exit();
	} else {
		 include_once 'dbh.inc.php'; //creating connection to database

  		
   		$donorName = $_POST['donorname'];
    	$amount = $_POST['amount'];
      $address = $_POST['address'];
      // $image = $_POST['receiptPhoto'];
      $lastDate = $_POST['donorLastDate'];
    	// $receiptImage = $_POST['receiptimage'];

    	$sql = "INSERT INTO donors(donor_name,donated_amount,donor_address,donor_last_date)VALUES('$donorName','$amount','$address','$lastDate');";
      $insertSuccess = mysqli_query($conn, $sql);
// to-do
            // if campaign input data successfully inserted in database then redirect him to success page with link of organizer profile
            if($insertSuccess) {
               echo "<h1>inserted into database</h1>";
            } else {
                echo $conn->error;
            }
	}