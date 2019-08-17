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
	  	echo $donorAddress;
	  	

	  	$sql="UPDATE `donors` SET `donor_name`='$donorName',`donated_amount`='$donatedAmount',`campaign_name`='$campaignName',`donor_address`='$donorAddress', `donor_approval`='$approval' WHERE donor_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	if($result1)
	  	{
	  		echo "accepted Successfully";
	  		
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

	  }

	  ?>
	  
	  <!DOCTYPE html>
	  <html>
	  <head>
	  	<title></title>
	  </head>
	  <body>
	  	<div>
	  	    Campaign has been 
	  	    <?php if (isset($_POST['accept']))
	  	    {
	  	    	echo "reviewed and accepted Successfully";
	  	    }
	  	    else{
	  	    	echo "reviewed and deleted Successfully";

	  	    }
	  	    ?>
	  	</div>
	  
	  </body>
	  </html>