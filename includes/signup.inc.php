<?php

if(!isset($_POST['submit'])) { //if one try to access signup.inc.php without access
    header("Location: ../signup.php");
    exit();
} else {
    include_once 'dbh.inc.php'; //creating connection to database

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // for email verification: generate vkey
    $vkey = md5(time().$username); //will generate a random verification string key

    // check if the input characters are valid
    if(!preg_match("/^[a-zA-Z'. -]+$/", $fullname)) {    
        header("Location: ../signup.php?signup=invalidname");
        exit();
    } else {
        // check if there is already a username with same inputted data by new user
        $sql = "SELECT * FROM organizers WHERE organizer_username = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../signup.php?signup=usernametaken");
            exit();
        } else {
            // password hashing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // insert the organizer into database
            $sql = "INSERT INTO organizers(organizer_fullname, organizer_username, organizer_email, organizer_password, organizer_phone, vkey) VALUES('$fullname','$username','$email','$hashedPassword','$phone','$vkey');";
            $insertSuccess = mysqli_query($conn, $sql);
            // if signup data successfully inserted in database then send email to him for verification using vkey

            if($insertSuccess) {
                // send mail
                $url = "http://localhost:8080/FundRaiser/includes/verifyEmail.inc.php?vkey=".$vkey;
                $to = $email;
                $subject = 'Email Verification';
                $message = '<p>You can verify the email from the link below:</br>';
                $message .= '<a href="' .$url. '">Verify Email</a></p>';

                $headers = "From: Fund Raiser <rajeshhamaldai9824@gmail.com>\r\n";
                $headers .= "Reply-To: rajeshhamaldai9824@gmail.com\r\n";
                $headers .= "Content-type: text/html\r\n"; //to make the html work in email

                mail($to, $subject, $message, $headers);

                header("Location: ../assets/html/thankyouemail.html");
                exit();
            } else {
                echo $conn->error;
            }        
        }
    }

}