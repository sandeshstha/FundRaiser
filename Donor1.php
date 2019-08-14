
<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="assets/css/donor.css">
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
    
    <!-- Body Part -->

     <!-- <img src="canvas.png" alt="" id="canvas-image"> -->
    <div class="banner">
        <img src="assets/images/banner.png" alt=""><br><br>
        <span id="banner-quote">
            <div id="banner-quote1">"No one has ever become</div> <div id="banner-quote2">poor by giving."</div>
        </span>
    </div>
   
    <div class="signupbox">
        <div class="boxone">
            <span id="create">Donation Form</span>
        </div>

        <div class="boxtwo">
            <br>
            <form  method="POST" action="includes/donor.inc.php">
    
                
                <input type="text" name="donorname" placeholder="Donor Name" required><br><br><br>
                <input type="text" name="amount" placeholder="Donated Amount"required><br><br><br>
                <input type="text" name="address" placeholder="Donor Address" required><br><br><br>
               
                <span id="receiptImage">Upload image of Bank-Receipt</span> <br>
                <input type="file" name="receiptPhoto" accept="image/*"><br><br>
                <input type="date" name="donorLastDate" placeholder="Donor Last Date" required><br><br><br>
                <input type="submit" name="submit" value="Donate">
            </form>
        </div>
    </div>
   
   <?php
    include_once 'footer.php';
?>