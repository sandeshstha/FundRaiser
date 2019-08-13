<?php

	if(!isset($_POST['submit'])) { //if one try to access createcampaign.inc.php without access
    header("Location: ../donor1.php");
    exit();
	} else {
		 include_once 'dbh.inc.php'; //creating connection to database

  		$projectName = $_POST['projectname'];
   		$donorName = $_POST['donorname'];
    	$amount = $_POST['amount'];
    	// $receiptImage = $_POST['receiptimage'];

    	$sql = "INSERT INTO donorslist(project_name, donor_name, amount ) VALUES('$projectName','$donorName','$amount');";
            $insertSuccess = mysqli_query($conn, $sql);
// to-do
            // if campaign input data successfully inserted in database then redirect him to success page with link of organizer profile
            if($insertSuccess) {
               echo "<h1>inserted into database</h1>";
            } else {
                echo $conn->error;
            }
	}