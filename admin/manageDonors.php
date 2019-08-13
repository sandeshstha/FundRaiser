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
        <div ><div class="titleOfTable">Donors on Review</div>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Donors Name</th>
                    <th>Campaign Name</th>
                    <th>Amount</th>
                    <th>Time</th>
                    <th>Details</th>
                </tr>
                <?php
                $conn=mysqli_connect("localhost","root","","FundRaiser");
                if($conn)  
        {
            // echo("Connected Successfully");
        }
        else
            echo("failed");
                ?>
               <?php
                 $sql1="SELECT * FROM donors ";
                 $result1=mysqli_query($conn,$sql1);
                 while($row= mysqli_fetch_assoc($result1))
                 	{
                        $num=1;
                 		echo "<tr>";
                 		echo "<td>".$num;
                 		echo "<td>".$row['donor_name'];
                 		echo "<td>".$row['campaign_name'];
                 		echo "<td>".$row['donated_amount'];
                        echo "<td>".$row['donor_last_date'];
                        ?>
                            
                 		<td><form method='post' action='reviewDonors.php'>
                            <input type="text" name="id" value="<?php echo $row['donor_id'];?> "><button type="submit" name="review" class="reviewButton">Review</button></form>
                        <?php echo "</tr>";
                        $num++;
                
                 	
                 	}

                 	?>
                
    
 

            </table>
        </div>

    </div>
</div>
</div>

</body>
</html>