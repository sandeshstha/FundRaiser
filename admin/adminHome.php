<?php
        require_once 'header.php';
        if(!isset($_SESSION['admin_username'])) { //if admin logout, he redirects to admin index page. If he press back button in browser then he must be redirected to admin index page
            header("Location: index.php");
        }
?>

</head>
<body>
        <?php //logout code
            echo "this is the admin Home page";
                
            if(isset($_SESSION['admin_username'])) { //if admin are logged in
                echo '<form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="submit">Logout</button>
                </form>';
            } else {
                // 
            }
        ?>
    
</body>
</html>