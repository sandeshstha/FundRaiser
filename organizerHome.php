<?php
    include 'includes/sessions.inc.php';
    // echo $data['organizer_id'];
    // echo $data['organizer_fullname'];
    // echo $data['organizer_username'];
    // echo $data['organizer_email'];
    // echo $data['organizer_password'];
    // echo $data['organizer_phone'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/organizerHome.css">
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

        <?php
            if(!isset($_SESSION['o_id'])) { 
                header("Location: ../index.php");                
            } else { //if organizers are logged in
                echo '<form action="includes/logout.inc.php" method="POST">
                        <div class="btn-login-signup">
                            <button type="submit" id="btn-login" name="submit">LOGOUT</button>
                        </div>
                      </form>';
            }
        ?>
        <!-- <div class="btn-login-signup">
            <button type="submit" id="btn-login" onclick="window.location.href='includes/logout.inc.php'">LOGOUT</button>
        </div> -->
    </div>

    <!-- body part -->

    <div class="buttonContainer">
            <button class="organizerButtons" onclick="window.location.href='createCampaign.php'">Create Campaign</button>
            <button class="organizerButtons" onclick="window.location.href='organizerProfile.php'">View Profile</button>
    </div>

    <!-- Footer section -->

    <?php
        include_once 'footer.php';
    ?>