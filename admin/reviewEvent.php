<!DOCTYPE html>
<html>
<head>
	<title>Review Events</title>
	<link rel="stylesheet" type="text/css" href="assets/css/reviewEvent.css">
</head>
<body>
	<?php 
	include 'dashboard.html'
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
	  $sql1="SELECT * FROM campaigns WHERE campaign_id=$id";
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
		<form method="post" action="includes/reviewAction.php">
			<label class="label">Name Of Campaign:<br></label>
			<input type="text" name="campaignName" value="<?php echo $row['campaign_name'];?>"><br><br>
               <label class="label">Type <br></label>
               <select name="campaignType" >
                    <option value="<?php echo $row['campaign_type'];?>" selected><?php echo $row['campaign_type'];?></option>
                    <option value="natural disaster">Natural Disasters</option>
                    <option value="social">Social</option>
                    <option value="others">Others</option>  
                </select><br><br>
                <label class="label">Estimated Days:<br></label>
                <input type="number" min="1" name="campaignDays" value="<?php echo $row['campaign_days'];?>"><br><br>
                <label class="label">Estimated Amount:<br></label>
                <input type="text" name="campaignAmount" value="<?php echo $row['campaign_amount'];?>"><br><br>
                <label class="label">Description:<br></label>
                <textarea rows="5" cols="50" name="campaignDescription" ><?php echo $row['campaign_description'];?></textarea><br><br>
                <label class="label">Phone Nos.<br></label>
                <input type="tel" name="campaignPhone"  pattern="[0-9]{10}" value="<?php echo $row['campaignPhone'];?>" ><br><br>
                <input type="hidden" name="id" value="<?php echo $row['campaign_id'];?>">
                <!-- to-do upload file -upload image only-->
                <!-- <label class="label">Campaign Photo:<br></label> -->
                <!-- <input type="text" name="campaignPhoto" value="<?php echo $row['campaignImage'];?>"><br><br> -->
                <center><input type="submit" name="accept" value="Accept">
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