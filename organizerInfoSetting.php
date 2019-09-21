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
    <link rel="stylesheet" href="assets/css/organizerInfoSetting.css">
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
            <div class="main-container">
                <?php
                   
                    if(isset($_GET['update']) && $_GET['update']=='success') {
                        echo  "<br><br>";
                            echo "<div class='successMessage'>"; 
                        echo "Your information has been successfully updated.";
                        echo "<i class='fas fa-times-circle' id='close-btn'></i>";
                        echo "</div>";
                    }
                      
                ?>  
                <h2><i class="fas fa-edit"></i>  Update Your Account Info</h2><br>
                <form action="includes/organizerInfoSetting.inc.php" method="POST">
                    Full Name : <input required type="text" name="fullname" pattern="[A-Za-z]+\s[[A-Za-z\s]+" value="<?php echo $data['organizer_fullname']; ?>" onKeyPress="change();"><br><br>
                    Username : <input required type="text" name="username" value="<?php echo $data['organizer_username']; ?>" onKeyPress="change();"><br><br>
                    Email : <input required type="email" name="email" value="<?php echo $data['organizer_email']; ?>" onKeyPress="change();"><br><br>
                    Phone : <input required type="tel" name="phone" pattern="[9]{1}[0-9]{9}" value="<?php echo $data['organizer_phone']; ?>" onKeyPress="change();"><br><br>
                    <input type="submit" name="submit" value="Update Changes" class="submit-btn active" id="submit" disabled> 
                    <!-- id="submit" is for js -->
                </form>
            </div>
    
            <script src="assets/js/organizerInfoSetting.js"></script>


            <?php
                include_once 'footer.php';
            ?>