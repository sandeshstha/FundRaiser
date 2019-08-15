<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/campaigns.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Philosopher" rel="stylesheet">
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

    <div class="main-container">

            <h2>Here below are some campaigns where you can Donate Funds as much as you like.</h2>


        
            <div class="all-campaigns">
                <?php
                    include_once 'includes/dbh.inc.php';
                    $sql = "SELECT * FROM campaigns WHERE campaignApproval = 1 and campaignExpiry = 1;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);            
                    if($resultCheck > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $_SESSION['c_id'] = $row['campaign_id'];
                            $_SESSION['c_name'] = $row['campaign_name'];
                            $_SESSION['c_type'] = $row['campaign_type'];
                            $_SESSION['c_days'] = $row['campaign_days'];
                            $_SESSION['c_amount'] = $row['campaign_amount'];
                            $_SESSION['c_description'] = $row['campaign_description'];
                            $_SESSION['c_phone'] = $row['campaignPhone'];
                            $_SESSION['c_image'] = $row['campaignImage']; //image path
                            $_SESSION['c_creator'] = $row['campaignCreator'];
                            $date = $row['campaign_reg_date'];
                            $date = strtotime($date);
                            $date = date('M D Y',$date);
                            $_SESSION['c_reg_date'] = $date;


                ?>
                <div class="preview-box">
                    <span id='campaign-name'><?php echo $_SESSION['c_name']; ?></span><br><br>
                    <span id='campaign-type'><?php echo $_SESSION['c_type']; ?></span><br><br>
                    <button class="btn">Donate</button>
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

    <!-- Footer section -->

    <div class="footer">
          <a href="about.html">About | </a>
         <a href="privacy-policy.html">Privacy Policy | </a>
         <a href="terms.html">Terms and Conditions | </a>
         <a href="help.html">Help (FAQs) |</a>
        <span id="footer-trademark">&copy; Fund Raiser, 2019 |</span>
    </div>

</body>
</html>