<?php

// randombytes will be used to create random bytes for token
// bin2hex() will convert these random bytes to hexadecimal format that we can use it inside a link in email coz token in part of the link
if(isset($_POST['resetRequestSubmit'])) {
//here are the two tokens selector and validator(token used to validate the user)
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32); //this will help to authenticate the user and its 32 bit coz it must be longer to make it secure

//url to send to user in email
    $url = "http://localhost:8080/Fund-Raiser/createNewPassword.php?selector=".$selector."&validator=".bin2hex($token);
// expiry date for token
    $expires = date("U") + 1800; //1 hour ahead from now
//Insert into database
    require 'dbh.inc.php';

    $userEmail = $_POST['email'];
/*delete existing entry of token in database.i.e make sure there is no existing token from the same user in the database.
if the user try to reset the password say 20 minutes ago, then might still be a token inside the db if they didn't reset their password
already.if they reset twice they will going to have multiple tokens.   */
// so down here we will access the db and delete the existing token of this username.
    
    $sql = "DELETE From pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) { //if cannot create prepare statement
        echo "there was an error deleting";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) { 
        echo "There was an error inserting";
        exit();
    } else {
    //token is sensitive data so hash it
        $hashedToken = password_hash($token, PASSWORD_DEFAULT); //token is not is hexadecimal
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


//SENDING EMAIL PART

$to = $userEmail;
$subject = 'Reset your password as oraganizer for fund raiser';
$message = '<p>We received a password reset request. The link to reset your password     . Here is your password reset link:</br>';
$message .= '<a href="' .$url. '">' .$url.  '</a></p>';

$headers = "From: Fund Raiser <rajeshhamaldai9824@gmail.com>\r\n";
$headers .= "Reply-To: rajeshhamaldai9824@gmail.com\r\n";
$headers .= "Content-type: text/html\r\n"; //to make the html work in email

mail($to, $subject, $message, $headers);

header("Location: ../resetPassword.php?reset=success");


} else {
    header("Location: ../index.php");
}