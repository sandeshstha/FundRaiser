<?php

if(isset($_POST['resetPasswordSubmit'])) {

//update the new password in database after reset by user through link sent via email
//grab all data that user sent via form
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];

//error handling
    if($password != $repeatPassword) {
        header("Location: ../createNewPassword.php?password=notsame");
        exit();
    } 

//check for tokens if they have expired or not
    $currentDate = date("U");

    require 'dbh.inc.php';

// we want to select the actual token from inside the database. Use the selector token(not validator) to run sql select statement inside the database and validator tokoen is going to validate the proper user.
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) { //if cannot create prepare statement
        echo "there was an error selecting";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
//check for expiry date
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)) { //if we cannot fetch any row
            //echo " you need to resubmit your reset request! or you have already change your password"; //no row in database
            header("Location: ../createNewPassword.php?reset=alreadyReset");
            exit();
        } else {
//make sure both the data are binary
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if($tokenCheck === false) {
                echo " token didn't mathched!"; 
                exit();
            } elseif($tokenCheck === true) { //we used elseif coz the $tokenCheck can have value other than true and false
                $tokenEmail = $row['pwdResetEmail'];
                $sql = "SELECT * FROM organizers WHERE organizer_email=?;";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) { //if cannot create prepare statement
                    echo "there was an error selecting";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)) { //if we cannot fetch any row
                        echo "There was an error"; 
                        exit();
                    } else {
//update the password from inside the organizers table
                        $sql = "UPDATE organizers SET organizer_password=? WHERE organizer_email=?;"; 
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)) { //if cannot create prepare statement
                            echo "there was an error selecting";
                            exit();
                        } else {
//hash the new password that user entered
                            $newHasedPassword = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newHasedPassword, $tokenEmail);
                            mysqli_stmt_execute($stmt);

//delete the previous token if user request password reset multiple times
                            $sql = "DELETE From pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)) { //if cannot create prepare statement
                                echo "there was an error deleting";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                
                                header("Location: ../login.php?newpassword=passwordupdated"); 
                            }
                        }
                   }
                }
            }
        }
    }

} else {
    header("Location: ../index.php");
}