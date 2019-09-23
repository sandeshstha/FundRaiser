<?php
	include_once "dashboard.html";
?>
<!DOCTYPE html>
<html>
<head>
	<title>alskdjf</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Philosopher" rel="stylesheet">
    <style>
        @font-face 
        {
            font-family: HelveticaNeueMedium ;
            src : url(../fonts/HelveticaNeueMedium.otf);
        }
        div.message {
        	position: absolute;
            top: 36%;
            left: 30%; 
            text-align: center;
            font-family: HelveticaNeueMedium;
            color: #707070;
            /*border: 1px solid red; */
        }
        #tick-logo, .fas{ 
            /* consider it as a text */
            font-size: 80px;
            color: dodgerblue;
        }
    </style>
</head>
<body>

	<div class="message">
		<?php
			if(isset($_GET['message1']) && $_GET['message1']='delete') {
				echo "<i class='fas fa-trash-alt' ></i>";
				echo "<h1>";
				echo "THe campaign has been successfully Deleted.";
				echo "</h1>";
			}
			if(isset($_GET['message']) && $_GET['message']='accept') {
				echo "<i class='fas fa-check-circle' id='tick-logo'></i>";
				echo "<h1>";
				echo "THe campaign has been successfully Updated.";
				echo "</h1>";

			}
		?>
	</div>

</body>
</html>