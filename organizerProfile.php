<?php
    include 'includes/sessions.inc.php';
    // echo $data['organizer_id'];
    // echo $data['organizer_fullname'];
    // echo $data['organizer_username'];
    // echo $data['organizer_email'];
    // echo $data['organizer_password'];
    // echo $data['organizer_phone'];
    $campaignCreator = $data['organizer_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/organizerProfile.css">
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

    <div class="main-container">
            <div class="about">
                <h1>ABOUT</h1>

                <table>
                    <tr>
                        <td>Full Name</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_fullname'];?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_username'];?></td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_email'];?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_phone'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            <button onclick="window.location.href='organizerInfoSetting.php'"> <i class="fas fa-cog"></i>   Setting</button>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="created-campaigns">
                <h1>CAMPAIGNS CREATED</h1>
<!-- show campaign of logged in organizer -->
                <?php
                    include_once 'includes/dbh.inc.php';

                    $sql = "SELECT * FROM campaigns WHERE campaignCreator = '$campaignCreator';";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0) {  
                        while($row = mysqli_fetch_assoc($result)) {

              ?>
                <table cellpadding="10">
                    <tr>
                        <td style="width:20%;">Campaign Name</td>
                        <td>:</td>
                        <td style="width:80%;"><?php echo $row['campaign_name'];?></td>
                    </tr>
                    <tr>
                        <td>Campaign Type</td>
                        <td>:</td>
                        <td><?php echo $row['campaign_type'];?></td>
                    </tr>
                    <tr>
                    <!-- to-do -->
                        <td>Remaining Days(to-do)</td>
                        <td>:</td>
                        <td><?php echo $row['campaign_days'];?></td>
                    </tr>
                    <tr>
                        <td>Expected Amount</td>
                        <td>:</td>
                        <td><?php echo $row['campaign_amount'];?></td>
                    </tr>
                    <tr>
                        <td>Campaign Description</td>
                        <td>:</td>
                        <td><?php echo $row['campaign_description'];?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $row['campaignPhone'];?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php
                            if($row['campaignApproval']==0) {
                                echo "<span id='waiting'>Waiting for Approval</span>";
                            } else {
                                echo "<span id='approved'>Approved</span>";
                            }
                        ?></td>
                    </tr>
                </table><br><br>
           <?php    
                    }
                } else if($resultCheck == 0) {
                    echo "<p>you have not created any campaign.</p>";
            ?>
                    <button id="create-now-btn" onclick="window.location.href='createCampaign.php'">Create Now</button>
            <?php
                } else {
                    exit();
                }
            ?>
            
            </div>
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