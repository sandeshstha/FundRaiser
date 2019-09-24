<!DOCTYPE html>
<html>
<head>
	<title>Admin||Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<?php
	include 'dashboard.html';
	?>
	<?php
                $conn=mysqli_connect("localhost","root","","FundRaiser");
    ?>            
	<div class="home">
	<div class="titleOfTable">
	<center>Profile Of Fund Raiser</center>
	<div class="main_div">
		<div class="numberOfCamp">
			<div class="countCampaign">Campaigns<br><br>
				<span><?php $sql1="SELECT COUNT(campaign_id) AS noOfCamp FROM campaigns WHERE campaignApproval=1;";
				    $result1=mysqli_query($conn,$sql1);
				    $row= mysqli_fetch_assoc($result1);
				    echo $row['noOfCamp'];
				     ?></span></div>
		</div>

		<div class="numberOfOrganizer">
			<div class="countOrganizer">Organizers<br><br>
				<span><?php $sql2="SELECT COUNT(organizer_id) AS noOfOrg FROM organizers WHERE verified=1;";
				    $result2=mysqli_query($conn,$sql2);
				    $row= mysqli_fetch_assoc($result2);
				    echo $row['noOfOrg'];
				     ?></span></div>
		</div>

		<div class="amountCollected">
			<div class="countAmount">Collected<br><br>
				<span><?php $sql3="SELECT SUM(donate_amount) AS amnt FROM donationproof";
				    $result3=mysqli_query($conn,$sql3);
				    $row= mysqli_fetch_assoc($result3);
				    echo $row['amnt'];
				     ?></span></div>
		</div>

		<div class="totalDonors">
			<div class="countDonors">Donors<br><br>
				<span><?php $sql4="SELECT Count(donor_id) AS noOfDonor FROM donationproof";
				    $result4=mysqli_query($conn,$sql4);
				    $row= mysqli_fetch_assoc($result4);
				    echo $row['noOfDonor'];
				     ?></span>
			</div>
		</div>


	</div>
</div>
</div>

</body>
</html>