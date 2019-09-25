<?php
    if(!isset($_POST['donate'])) { //if anyone try to access singlecampaignpost directly
        header("Location: campaigns.php");
    }
?>

<?php
    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];

        include 'includes/dbh.inc.php';

        $sql = "SELECT *,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
        DATE(campaign_reg_date) AS startDate
        FROM campaigns WHERE campaign_id = $campaignId;";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result); 
            $campaignName = $row['campaign_name'];
            $campaignType = $row['campaign_type'];
            $campaignStartDate = $row['startDate'];
            $campaignEndDate = $row['endDate'];
            $campaignAmount = $row['campaign_amount'];
            $campaignDescription = $row['campaign_description'];
            $campaignPhone = $row['campaignPhone'];
            $campaignImage = $row['campaignImage']; 

            $campaignCreator = $row['campaignCreator']; //this is organizer's username

            $sql = "SELECT organizer_fullname,organizer_phone FROM organizers WHERE organizer_username = '$campaignCreator';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                $data = mysqli_fetch_assoc($result); 
                $organizerPhone = $data['organizer_phone'];
                $campaignCreatorFullname =  $data['organizer_fullname'];    
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
    <link rel="stylesheet" href="assets/css/singleCampaignPost.css">
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

    <div class="container">
        <h1><?php echo $campaignName;?></h1><br><br>

        <div class="c-image">
            <img src="<?php echo $campaignImage; ?>" alt="" width="800"><br>

            <div class="image-caption">
                <span><?php echo $campaignType;?>:(<?php echo $campaignName;?>)</span>
            </div>
        </div><br><br>
        <table cell>
            <tr>
                <td style="width: 50%;"><strong>Type Of Campaign</strong></td>
                <td>:</td>
                <td><?php echo $campaignType;?></td>
            </tr>
            <tr>
                <td><strong>Campaign Stated On</strong></td>
                <td>:</td>
                <td><?php echo $campaignStartDate;?></td>
            </tr>
            <tr>
                <td><strong>Campaign will end On</strong></td>
                <td>:</td>
                <td><?php echo $campaignEndDate;?></td>
            </tr>
            <tr>
                <td><strong>Estimated Amount</strong></td>
                <td>:</td>
                <td>Rs. <?php echo $campaignAmount;?></td>
            </tr>
            <tr>
                <td><strong>Campaign organizer</strong></td>
                <td>:</td>
                <td><?php echo $campaignCreatorFullname;?></td>
            </tr>
            <tr>
                <td><strong>Phone(Campaign Specific)</strong></td>
                <td>:</td>
                <td><?php echo $campaignPhone;?></td>
            </tr>
            <tr>
                <td><strong>Phone(Organizer's)</strong></td>
                <td>:</td>
                <td><?php echo $organizerPhone;?></td>
            </tr>
        </table>

        <h2>About the Campaign</h2>
        <p><?php echo $campaignDescription;?></p>

        <div class="donate-text">Donate For this Camaign</div> <br>
        <button class="donate-btn" onclick="window.location.href='donate.php?campaignId=<?php echo $campaignId;?>'">Donate</button>
    </div>

    <?php
        include_once 'footer.php';
    ?>