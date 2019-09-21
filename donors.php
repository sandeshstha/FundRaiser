<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/donors.css">
</head>

<body>
    <!-- navigation section -->
    <div class="nav-bar">
        <a href="index.php">
            <img src="assets/images/logo.png" alt="Fund Raiser logo">
        </a>
         
        <div class="nav-links">
            <a href="campaigns.php">CAMPAIGNS</a>
            <a href="donors.php">DONORS</a>
        </div>

        <div class="btn-login-signup">
            <button type="submit" id="btn-login" onclick="window.location.href='login.php'">LOGIN</button>
            <button type="submit" id="btn-signup" onclick="window.location.href='signup.php'">SIGN UP</button>
        </div>
    </div>


    <!-- body part -->

    <div class="main-container">
        <div class="text-content">
            <h1>List of Donors</h1>
            <p>Here Below are the list of donors who donated in different campaigns created on our site.</p>
        </div>

        <table>
            <tr>
                <th width="5%">S.N</th>
                <th width="15%">Donor Name</th>
                <th width="30%">Address</th>
                <th width="25%">Donated Amount</th>
                <th width="25%">campaign</th>
            </tr>

                <tr>
                    <?php $counter = 1;?>
                        <td><?php echo $counter;?></td>
                    <?php $counter++;?>

                    <?php
                        include 'includes/dbh.inc.php';
                        $sql = "SELECT * FROM donationproof,donors 
                                WHERE donationproof.admin_approval = 1 
                                AND donors.donor_id = donationproof.donor_id 
                                ORDER BY donate_amount desc;";
                                //AND donors.donor_id = 30 //yo logic chaine nai ho ta?
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);            
                        if($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $donorId = $row['donor_id'];
                                echo $donorId;
                                $donorName = $row['donor_name'];
                                echo $donorName;
                                $donorAddress = $row['donor_address'];
                                echo $donorAddress;
                                $donatedAmount = $row['donate_amount'];
                                echo $donatedAmount;

                                $campaignId = $row['campaign_id'];
                                echo $campaignId;
                    ?>
                        <td><?php echo $donorName; ?></td>
                        <td><?php echo $donorAddress;?></td>
                        <td><?php echo $donatedAmount;?></td>
                    <?php 
                            }
                        } 
                    ?>


                    <?php
                        $sql2 = "SELECT campaign_name FROM campaigns,donationproof
                        WHERE campaigns.campaign_id = donationproof.campaign_id;";
                        $result2 = mysqli_query($conn, $sql2);
                        $resultCheck2 = mysqli_num_rows($result2);
                        if($resultCheck2 > 0) {
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                $campaignName = $row2['campaign_name'];
                                echo "</br>";
                                echo $campaignName;
                    ?>
                        <td><?php echo $campaignName;?></td>
                    <?php 
                            }
                        }
                    ?>
                </tr>
            
        </table>
    </div>

    <?php
        include_once 'footer.php';
    ?>