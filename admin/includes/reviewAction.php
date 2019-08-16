<?php
$conn=mysqli_connect("localhost","root","","FundRaiser");
?>
<?php


if (isset($_POST['accept'])) {
	  	$id =$_POST['id'];
	  	$row=$id;
	  	$campaignName=$_POST['campaignName'];
	  	$campaignType=$_POST['campaignType'];
	  	$campaignDays=$_POST['campaignDays'];
	  	$campaignAmount=$_POST['campaignAmount'];
	  	$campaignDesription=$_POST['campaignDescription'];
	  	$campaignPhone=$_POST['campaignPhone'];
	  	$approval='1';
	  	

	  	$sql="UPDATE `campaigns` SET `campaign_name`='$campaignName',`campaign_type`='$campaignType',`campaign_days`='$campaignDays',`campaign_amount`='$campaignAmount',`campaign_description`='$campaignDesription',`campaignPhone`='$campaignPhone' `campaignApproval`='$approval' WHERE campaign_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	if($result1)
	  	{
	  		
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

	  	$sql="DELETE FROM `campaigns` WHERE campaign_id=$id ";
	  	$result1=mysqli_query($conn,$sql);

	  }

	  ?>
	  <?php
	  include'../dashboard.html';
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