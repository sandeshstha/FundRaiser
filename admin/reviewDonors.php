<!DOCTYPE html>
<html>
<head>
	<title>Review Events</title>
	<link rel="stylesheet" type="text/css" href="assets/css/reviewDonors.css">
</head>
<body>
	<?php 
	include 'dashboard.html';
	  ?>
	  <?php
       $conn=mysqli_connect("localhost","root","","FundRaiser");	  
       ?>
	  <?php
	  if (isset($_POST['review'])) {
	  	$id =$_POST['id'];
	  	$row=$id;

	  }
	  ?>
	  <?php
	  $sql1="SELECT * FROM donors WHERE donor_id=$id";
      $result1=mysqli_query($conn,$sql1); 
	  
	  ?>
	<div class="titleDiv">
		<h3 class='titleOftable'>Review Campaign</h3>
	</div>	
		<div class="review-section">
		<?php
		while($row= mysqli_fetch_assoc($result1))
          {
          	?>
		<form method="POST" action="includes/reviewDonorAction.php">
			    <label class="label">Donor Name:</label><br>
			    <input type="text" name="donorName" value="<?php echo $row['donor_name'];?>"><br><br>
               
                <label class="label">Donated Amount<br></label>
                <input type="text" min="1" name="donatedAmount" value="<?php echo $row['donated_amount'];?>"><br><br>
                <label class="label">Campaign Name:<br></label>
                <input type="text" name="campaignName" value="<?php echo $row['campaign_name'];?>"><br><br>
                <label class="label">Address:<br></label>
                <input type="text" name="dAddress"  value="<?php echo $row['donor_address'];?>" ><br><br>
                <input type="hidden" name="id" value="<?php echo $row['donor_id'];?>">

                <!-- to-do upload file -upload image only-->
                <label class="label">Upload Proof<br></label>
                <input type="text" name="campaignPhoto" value="<?php echo $row['proof_image'];?>"><br><br>
                <center>
                	<input type="submit" name="accept" value="Accept">
                    <input type="submit" name="delete" value="Delete">
                </center>    
		</form>
		<?php
	   }
	?>
		<!-- $sql="UPDATE `campaigns` SET `campaign_name`=,`campaign_type`=[value-3],`campaign_days`=[value-4],`campaign_amount`=[value-5],`campaign_description`=[value-6],`camapignPhone`=[value-7],`campaign_reg_date`=[value-8] WHERE 1" -->
	</div>

</body>
</html>