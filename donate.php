<?php

    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];
        // echo $campaignId;
    } else {
        header("Location: campaigns.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/donate.css">
</head>
<body>

    <!-- navigation section -->
    <div class="nav-bar">
        <a href="index.php">
            <img src="assets/images/logo.png" alt="Fund Raiser logo">
        </a>
         
        <div class="nav-links">
            <a href="campaigns.php">CAMPAIGNS</a>
            <a href="#">DONORS</a>
        </div>

        <div class="btn-login-signup">
            <button type="submit" id="btn-login" onclick="window.location.href='login.php'">LOGIN</button>
            <button type="submit" id="btn-signup" onclick="window.location.href='signup.php'">SIGN UP</button>
        </div>
    </div>

    <!-- body part -->
    <div class="main-container">
        <h1>You can make donation in this campaign via two methods as:</h1>
        <div class="methods">
            <li>Donate via Bank | Wire transfer</li>
            <li>Donate via Khalti | Online Payment Gateway</li>
        </div>
        <br><br><br>
        <h1>Donate via Bank | Wire transfer</h1>

        <div class="bank-details">
            <h2>You can donate in this campaign via Bank Transfer. The Bank details are below:</h2>
                <div class="banks">
                    <table>
                        <tr>
                            <th colspan="3">NIC Asia Bank</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Suraj Make</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <th colspan="3">NIC Asia Bank</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Suraj Make</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <th colspan="3">NIC Asia Bank</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Suraj Make</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                </div>
            <br>
            <div class="donor-notice">Subscribe to Fund Raiser, So that we can track your donation and guide you for the donatation process. Once you submit your details, We will send you an email and you can submit the proof of the donation that you made. By doing this, you will be listed in our donor list as an donor.
                The proof file can simply be:
                <ul>
                    <li><strong>Bank deposit voucher or receipt</strong> </li>
                    <li><strong>Screenshot of the fund transfer success page(If donated via onine Banking or online payment wallet)</strong></li>
                </ul>
            </div><br>
            <h2>Be in touch with us</h2>
            <div class="donor-form">
                <div class="boxtwo">
                <br><br>
                    <form action="includes/donate.inc.php?campaignId=<?php echo $campaignId;?>" method="POST">
                    <!-- to-do full name html pattern -->
                        <input type="text" name="fullname" placeholder="Enter full Name" required><br><br>
                        <input type="email" name="email" placeholder="E-mail" required><br><br>
                        <input type="submit" name="submit" value="Subscribe" id="submit">
                    </form>
                </div>
            </div>
        </div>
        <h1>Donate via Khalti | Online Payment Gateway</h1>

        <div class="khalti-details">
            <h2>You can donate in this campaign via online payment gateway like Khalti.</h2>
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