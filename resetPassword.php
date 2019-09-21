<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="assets/css/resetPassword.css">
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
            <button type="submit" id="btn-signup" onclick="window.location.href='signup.php'">SIGN UP</button>
        </div>
    </div>

    <!-- body part -->

    <div class="resetPasswordContainer">
        <div class="boxone">
            <span id="resetPasswordText">Reset your Password</span>
            <br>
            <span id="resetSmallText">"An email will be sent to you with instructions on how to reset your password."</span>
        </div>
        
        <div class="boxtwo">
            <br><br>
            <form action="includes/resetRequest.inc.php" method="POST">
                <input type="email" name="email" placeholder="enter your email address" required><br>
                <button type="submit" name="resetRequestSubmit">Receive new password by E-mail</button>
            </form>

            <?php
                if(isset($_GET['reset'])) {
                    if($_GET['reset'] == "success") {
                        echo '<p class="emailSentText">Check your email!</p>';
                    }
                }
            ?>
        </div>
    </div>


<?php
    include_once 'footer.php';
?>