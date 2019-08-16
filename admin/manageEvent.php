<!DOCTYPE html>
<html>
<head>
	<title>Manage Events</title>
	<link rel="stylesheet" type="text/css" href="assets/css/manageEvent.css">
	<link rel="stylesheet" type="text/css" href="ad.css">
</head>
<body >
	<?php
	include'dashboard.html';
	?>
<div class="tableOfCampaign">
        <div><div class="titleOfTable">Events On Review.</div>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Campaign Name</th>
                    <th>Date & Time</th>
                    <th>Category</th>
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
                 $sql1="SELECT * FROM campaigns WHERE campaignApproval='0'";
                 $result1=mysqli_query($conn,$sql1);
                 $num=1;
                 while($row= mysqli_fetch_assoc($result1))
                 	{
                        
                 		echo "<tr>";
                 		echo "<td>".$num;
                 		echo "<td>".$row['campaign_name'];
                 		echo "<td>".$row['campaign_reg_date'];
                 		echo "<td>".$row['campaign_type'];
                        ?>
                 		<td><form method='post' action='reviewEvent.php'>
                            <input type="hidden" name="id" value="<?php echo $row['campaign_id'];?> "><button type="submit" name="review" class="reviewButton">Review</button></form>
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