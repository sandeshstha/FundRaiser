
<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="assets/css/donorList.css">
    <link rel="stylesheet" type="text/css" href="ad.css">

</head>
<body>
     <!-- navigation section -->
    <div class="nav-bar">
        <a href="index.php">
            <img src="assets/images/logo.png" alt="Fund Raiser logo">
        </a>
         
        <div class="nav-links">
            <a href="#">CAMPAIGNS</a>
            
        </div>

        <div class="btn-login-signup">
            <button type="submit" id="btn-login" onclick="window.location.href='login.php'">LOGIN</button>
            <button type="submit" id="btn-signup" onclick="window.location.href='signup.php'">SIGN UP</button>
        </div>
    </div>
    <!-- Body Part -->

    <div class="tableOfDonorList">
        <div><div class="titleOfTable">Donor Name List</div>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Donor Name</th>
                    <th>Address</th>
                    <th>Donated Amount</th>
        
                </tr>
                <?php
                $conn=mysqli_connect("localhost","root","","FundRaiser");
                if($conn)  
                {
            // echo("Connected Successfully");
                }
                else
                    echo("failed");
                ?>
               <?php
                $sql1="SELECT * FROM donors ";
                $result1=mysqli_query($conn,$sql1);
                

                                  
                    $num=1;
                    while($row= mysqli_fetch_assoc($result1))
                        {
                            $approval = $row['donor_approval']; 
                            if($approval == 1) {
                        
                                echo "<tr>";
                                echo "<td>".$num;
                                echo "<td>".$row['donor_name'];
                                echo "<td>".$row['donor_address'];
                                echo "<td>".$row['donated_amount'];
                            }
                ?>

                            <?php echo "</tr>";
                            $num++;
                        }
                            ?>
            </table>
        </div>

    </div>

<?php
    include_once 'footer.php';
?>