<?php
    require_once 'includes/sessions.inc.php';
    $campaignOrganizer = $data['organizer_fullname'];
    $organizerPhone = $data['organizer_phone'];

    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];
        // echo $campaignId;
        $sql = "SELECT * FROM campaigns WHERE campaign_id = $campaignId;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            $row= mysqli_fetch_assoc($result); 
            $campaignName = $row['campaign_name'];
            $campaignType = $row['campaign_type'];
            $campaignDays = $row['campaign_days'];
            $campaignAmount = $row['campaign_amount'];
            $campaignDescription = $row['campaign_description'];
            $campaignImage = $row['campaignImage'];    
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
            <a href="#">CAMPAIGNS</a>
            <a href="#">DONORS</a>
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
            <img src="assets/images/banner.png" alt="" ><br>

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
                <td><strong>Estimated Days</strong></td>
                <td>:</td>
                <td><?php echo $campaignDays;?></td>
            </tr>
            <tr>
                <td><strong>Estimated Amount</strong></td>
                <td>:</td>
                <td>Rs. <?php echo $campaignAmount;?></td>
            </tr>
            <tr>
                <td><strong>Campaign organizer</strong></td>
                <td>:</td>
                <td><?php echo $campaignOrganizer;?></td>
            </tr>
            <tr>
                <td><strong>to-do Organizer's phone</strong></td>
                <td>:</td>
                <td><?php echo $organizerPhone;?></td>
            </tr>
        </table>

        <h2>About the Campaign</h2>
        <p>This is the description of the campaing.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur adipisci nihil, tempora cupiditate, possimus eveniet nemo totam corporis sit laudantium labore. Nihil recusandae numquam ipsum fuga officiis. Exercitationem, cumque quos?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, debitis nesciunt. Accusamus quasi veniam quo explicabo omnis consequatur illo nihil adipisci repellat quos tempora nisi expedita eos minima, labore aliquid!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem necessitatibus vel at facilis quae libero adipisci? Vitae nisi aut totam, suscipit, ratione consectetur obcaecati tempore sint sit ducimus, beatae aperiam.
        </p>

        <div class="donate-text">Donate For this Camaign</div> <br>
        <button class="donate-btn" onclick="window.location.href='sandesh.php'">Donate</button>

    </div>

  

    <!-- Footer section -->

    <div class="footer">
          <a href="assets/html/about.html">About | </a>
         <a href="assets/html/privacy-policy.html">Privacy Policy | </a>
         <a href="assets/html/terms.html">Terms and Conditions | </a>
         <a href="assets/html/help.html">Help (FAQs) |</a>
        <span id="footer-trademark">&copy; Fund Raiser, 2019 |</span>
    </div>

</body>
</html>