
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="setting.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Philosopher" rel="stylesheet">
</head>

<body>
	<?php
	include 'dashboard.html';


	?>
    <?php
                    $conn = mysqli_connect("localhost","root","","FundRaiser");
                ?>
                <?php
                 $sql = "SELECT * FROM adminlogin;";
                 $result = mysqli_query($conn , $sql);?>

    <!-- navigation section -->
    
    <div class="main-container">
            <div class="about">
                <h1>Manage Account</h1>
                <table>
                    <tr>
                        <td>UserName</td>
                        <td>:</td>
                        <td><?php echo $data['admin_username'];?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_username'];?></td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_email'];?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $data['organizer_phone'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            <button onclick="window.location.href='organizerInfoSetting.php'"> <i class="fas fa-cog"></i>   Setting</button>
                        </td>
                    </tr>
                </table>
            </div>

