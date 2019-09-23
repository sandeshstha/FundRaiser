<!-- logic to remove expired campaign -->
<?php
    $currentDate = date('Y-m-d');

    include_once 'includes/dbh.inc.php';
    $sql = "SELECT campaign_id,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
        DATE(campaign_reg_date) AS startDate
        FROM campaigns;";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $campaignId = $row['campaign_id'];
            $campaignStartDate = $row['startDate'];
            $campaignEndDate = $row['endDate'];
            if($currentDate > $campaignEndDate) {
                $sql = "UPDATE campaigns
                        SET campaignExpiry = 0 
                        WHERE campaign_id = '$campaignId';";
                mysqli_query($conn, $sql);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/campaigns.css">
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
            <h2>Here below are some campaigns where you can Donate Funds as much as you like.</h2>

            <div class="all-campaigns">
                <?php
                    $sql = "SELECT * FROM campaigns WHERE campaignApproval = 1 and campaignExpiry = 1 ORDER BY campaign_id DESC;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);            
                    if($resultCheck > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $campaignId = $row['campaign_id'];
                            // echo "$campaignId";               
                ?>
                <div class="preview-box">
                    <form action="singleCampaignPost.php?campaignId=<?php echo $campaignId;?>" method="POST">
                        <span id='campaign-name'><?php echo $row['campaign_name']; ?></span><br><br>
                        <span id='campaign-type'><?php echo $row['campaign_type']; ?></span><br><br>
                        <button class="btn" type="submit" name="donate">View Campaign</button>
                    </form>
                </div>   
                <?php
                    }
                } else if($resultCheck == 0) {
                    echo "<p>There are no active Campaign right now</p>";
                } else {
                    exit();
                }
                ?>    
            </div>        
    </div>

    <?php
        include_once 'footer.php';
    ?>