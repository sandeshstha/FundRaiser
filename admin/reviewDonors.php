<?php
	if(!isset($_POST['review'])) {
		header("Location: manageDonors.php");
		exit();
	}
?>

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
	  }
	  ?>
	  <?php
	  $sql1="SELECT * FROM donors,donationproof
                        WHERE donors.donor_id = donationproof.donor_id
                        AND donors.campaign_id = donationproof.campaign_id ;";
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
                <input type="text" min="1" name="donatedAmount" value="<?php echo $row['donate_amount'];?>"><br><br>
                <label class="label">Campaign Name:<br></label>
                <input type="text" name="campaignName" value="<?php 
               				$c_id = $row['campaign_id'];
                            $sql1 = "SELECT campaign_name,campaign_id FROM campaigns
                            WHERE campaign_id = '$c_id';";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $c_name = $row1['campaign_name'];

                            echo $c_name;
                            ?>"><br><br>
                <label class="label">Address:<br></label>
                <input type="text" name="dAddress"  value="<?php echo $row['donor_address'];?>" ><br><br>
                <input type="hidden" name="id" value="<?php echo $row['donor_id'];?>">
                <center>
                	<input type="submit" name="accept" value="Accept">
                    <input type="submit" name="delete" value="Delete">
				</center>    
				<div class="imgclass"><img src="../<?php echo $row['proof_image'];?>" style="width: 300px; height: 300px;"></div>
		</form>
		<?php
	   }
	?>
	</div>
</body>
</html>