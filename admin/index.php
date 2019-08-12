<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="assets/css/login.css">
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

    </div>

    <!-- body part -->

<!-- login box -->

   <!-- show message after user do complete signup -->
   <div class="successMessage">
        <?php 
                    if(isset($_GET['login'])) {
                        if($_GET['login'] == "failed") {
                            echo "OOPs! You entered the wrong credentials. Please enter valid informations.";
                        }
                    }
        ?>
    </div>

    <div class="loginbox">
        <div class="boxone">
            <span id="logintext">Admin Login</span>
        </div>

        <div class="boxtwo">
            <br><br><br>
            <form action="includes/login.inc.php" method="POST">
                <input type="text" name="username" placeholder="Admin username" required><br><br>
                <input type="password" name="password" placeholder="Admin password" required><br><br>
                <input type="submit" name="submit" value="Login">
            </form>
        </div>
    </div>
        
</body>
</html>
