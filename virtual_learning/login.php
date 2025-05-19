<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet">

</html>
<?php
session_start();
include "connection.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['verify'])) {
		$fetch = "select * from user where email='" . $_POST['email'] . "'";
		$q = mysqli_query($con, $fetch);
		if (mysqli_num_rows($q)) {
			$row = mysqli_fetch_assoc($q);
			$email = $_POST['email'];
			$otp = mt_rand(100000, 999999);

			//Load Composer's autoloader	
			require 'PHPMailer-master\src\PHPMailer.php';
			require 'PHPMailer-master\src\SMTP.php';
			require 'PHPMailer-master\src\Exception.php';

			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);
			try {
				//Server settings
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'skillup@gmail.com';                     //SMTP username
				$mail->Password   = 'kkdc anbi zpcc nzgb';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`	

				//Recipients
				$mail->setFrom('skillup@gmail.com', 'skillup.com');
				$mail->addAddress($email);     //Add a recipient    
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'OTP';
				$mail->Body    = "Your OTP is:-" . $otp;

				$mail->send();
				//echo 'Message has been sent';
				echo '<script>Swal.fire("OTP Sent!", "Please check your email for the OTP.", "success");</script>';

				$_SESSION['otp'] = $otp;
				$_SESSION['email'] = $email;
				$_SESSION['unm'] = $row['username'];
				$_SESSION['id'] = $row['id'];
			} catch (Exception $e) {
				// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				echo '<script>Swal.fire("Error", "Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '", "error");</script>';
			}
		} else {
			//echo "This email doesn't have an account please Sign up";
			echo '<script>Swal.fire("Error", "This email doesn\'t have an account. Please sign up.", "error");</script>';
		}
	}
}
//otp verification
if(isset($_POST['login'])) {
	$enteredOTP = $_POST['otp'];
	$storedOTP = $_SESSION['otp'];

	if ($enteredOTP == $storedOTP) {
		header("location:userdash.php");
		exit();
	} else {
		echo '<script>Swal.fire("Error", "Invalid OTP. Please try again.", "error");</script>';
	}
} 
?>
<html>

<head>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: arial;
			font-size: 16px;
		}

		body {
			height: 95vh;
			display: flex;
			align-items: center;
			justify-content: center;
			color: white;
			background-image: url("bg.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.container {
			margin-top: 17px;
			width: 400px;
			padding: 20px;
			border: 1px solid #eee;
			box-shadow: 0px 0px 20px white;
			border-radius: 10px;
			/* color:white; */
			background-color: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(10px);
		}

		a {
			color: black;
		}

		p {
			margin: 0;
			font-size: 25px;
			font-weight: bold;
			color: black;
			margin-bottom: 20px;
			text-align: center;
		}

		u {
			color: black;
		}

		input {
			width: 90%;
			height: 40px;
			margin-top: 10px;
			margin-bottom: 10px;
			padding: 5px;
			outline: none;
			border: none;
			background-color: #d3d3d3;
			border-radius: 10px;
			border-bottom: 1.5px solid white;
			background-color: transparent;
			transition: background-color 0.3s ease;
		}

		input:hover {
			background-color: #fefde2;
		}

		button {
			margin-bottom: 15px;
			border: none;
			padding: 5px 20px;
			background-color: white;
			color: black;
			cursor: pointer;
			border-radius: 10px;
		}

		button:hover {
			background-color: #eee;
			color: black;
			box-shadow: 0 0 50px black;
		}

		input[type="submit"] {
			margin-bottom: 15px;
			border: none;
			padding: 5px 20px;
			background-color: black;
			color: white;
			cursor: pointer;
			border-radius: 10px;
		}

		input[type="submit"]:hover {
			background-color: #fefde2;
			color: black;
			box-shadow: 0 0 10px white;
		}

		label {
			display: flex;
			color: white;
			align-items: center;
		}

		@media screen and (max-width: 600px) {
			.container {
				width: 80%;
			}

			.show_pass {
				height: 44px;
				display: flex;
				align-items: center;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<u>
			<p>LOGIN!!!</p>
		</u>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<br><label for="email"><img src="reg_email.png" height="25px"></img>&nbsp;&nbsp;
				Email:-</label><input type="text" id="email" name="email" placeholder="Enter email."><br><br>
			<button name="verify">Send otp</button><br><br>
			<label for="otp"><img src="reg_otp.png" height="25px"></img>&nbsp;&nbsp;Otp:-</label>
			<input type="text" id="otp" name="otp" placeholder="Enter Password.">
			<input type="submit" name="login" value="Login"><br><br><br>
			<b>Not have an account?&nbsp;<a href="signup.php">Sign in</a></b>
		</form>
	</div>
</body>
</html>