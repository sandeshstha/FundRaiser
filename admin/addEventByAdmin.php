<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Admin</title>
    <link rel="stylesheet" href="../assets/css/createCampaign.css">
</head>

<body>
    <?php 
    include 'dashboard.html';
    ?>
    <!-- body part -->

    <div class="signupbox">
        <div class="boxone">
            <span id="create">Create Campaigns </span>
        </div>

        <div class="boxtwo" style="background:rgba(40,57,101,.9);">
        <br>
            <form action="includes/createCampaign.inc.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="campaignName" placeholder="Campaign name" required><br><br>
                <select name="campaignType" required>
                    <option disabled selected>Type of Campaign</option>
                    <option value="natural disaster">Natural Disasters</option>
                    <option value="social">Social</option>
                    <option value="others">Others</option>  
                </select><br><br>
                <input type="number" min="1" name="campaignDays" placeholder="Estimated Days" required><br><br>
                <input type="text" name="campaignAmount" placeholder="Estimated Amount" required><br><br>
                <textarea rows="5" cols="50" name="campaignDescription" placeholder="Description of your campaign" required></textarea><br><br>
                <input type="tel" name="phone" placeholder="Phone: 98********" pattern="[0-9]{10}" required><br><br>
                <!-- to-do upload file -upload image only-->
                <span id="campaignImage">Upload image of campaign</span> <br>
                <input type="file" name="campaignPhoto" accept="image/*"><br><br>
                <input type="checkbox" required><span id="agreeterms"> Agree all terms and conditions</span><br>
                <input type="hidden" name="approval" value="1">
                <input type="submit" name="submit" value="Create Campaign">
            </form>
              
                
            
        </div>
    </div>
</body>
</html>