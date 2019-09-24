<?php
$conn=mysqli_connect("localhost","root","","FundRaiser");
?>
<?php


if (isset($_POST['accept'])) {
	  	$id = $_POST['id'];
	  	$row=$id;
	  	$donorName=$_POST['donorName'];
	  	$donatedAmount=$_POST['donatedAmount'];
	  	$campaignName=$_POST['campaignName'];
	  	$donorAddress=$_POST['dAddress'];
	  	$approval='1';
	  
	  	

	  	$sql="UPDATE donors,donationproof,campaigns SET `donor_name`='$donorName',`donate_amount`='$donatedAmount',`campaign_name`='$campaignName',`donor_address`='$donorAddress', `donor_approval`='$approval' WHERE donor_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	if($result1)
	  	{
	  		echo "hello";
	  		header("Location: ../successMessage1.php?message=accept");
	  		
	  	}

	  }
	  ?>
	  <?php
	  if (isset($_POST['delete'])) {
	  	$id =$_POST['id'];
	  	echo $id;
	  	$row=$id;
	  	$campaignName=$_POST['campaignName'];
	  	echo $campaignName;

	  	$sql="DELETE FROM `donors` WHERE donor_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	header("Location: ../successMessage1.php?message1=delete");

	  }

	  ?>
	  
	  