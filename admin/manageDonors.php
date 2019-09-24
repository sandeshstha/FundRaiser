<!DOCTYPE html>
<html>
<head>
	<title>Manage Events</title>
	<link rel="stylesheet" type="text/css" href="assets/css/manageEvent.css">
	<link rel="stylesheet" type="text/css" href="ad.css">
</head>
<body>
	<?php
	include'dashboard.html';
	?>
    <div class="tableoFCampaign">
        <div >
            <div class="titleOfTable">Donors on Review</div>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Donors Name</th>
                    <th>Campaign Name</th>
                    <th>Amount</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost","root","","FundRaiser");
                ?>
               <?php
                 $sql = "SELECT * FROM donors,donationproof
                        WHERE donors.donor_id = donationproof.donor_id
                        AND donors.campaign_id = donationproof.campaign_id ;";
                 $result = mysqli_query($conn , $sql);
                 while($row = mysqli_fetch_assoc($result))
                 	{
                        static $num=1;
                 		echo "<tr>";
                            echo "<td>".$num++."</td>";
                            echo "<td>".$row['donor_name']."</td>";

                            $c_id = $row['campaign_id'];
                            $sql1 = "SELECT campaign_name,campaign_id FROM campaigns
                            WHERE campaign_id = '$c_id';";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $c_name = $row1['campaign_name'];

                            echo "<td>".$c_name."</td>";
                            echo "<td>".$row['donate_amount']."</td>";
                            echo "<td>".$row['donor_address']."</td>";
                ?>
                            <td>
                                <form method='post' action='reviewDonors.php'>
                                    <input type="hidden" name="id" value="<?php echo $row['donor_id'];?> ">
                                    <button type="submit" name="review" class="reviewButton">Review</button>
                                </form>
                            </td>
                        </tr>
                <?php   
                    }
                ?>
                
            </table>
        </div>
    </div>
</div>
</div>

</body>
</html>