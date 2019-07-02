<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
	<title>Heart Failure Awareness</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/normalize.css">
</head>
	<body>
		<div class="content">
			<header>
				<a href="index.html"><img src="images/logo3.png" alt="logo" class="logo"></a> <!--logo1 height="200" width="250"--> <!--logo2 height="70" width="250"-->
			</header>
			<nav id="nav_menu">
				<ul class="nav_bar">
				  <li><a href="index.html">Home</a></li>
					  <li class="dropdown">
						<a href="#" class="dropbtn">About Heart Failure</a>
						<div class="dropdown-content">
						  <a href="heartfailure.html">What is Heart Failure?</a>
						  <a href="treatment.html">Treatment of Heart Failure</a>
						</div>
					  </li>
				  <li><a href="healthtips.html">Tips for Staying Healthy</a></li>
				  <li><a href="moreinfo.html">More Information</a></li>
				  <li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
				<main>
					<div class="test">
						<div class="text2">
						<h2>Contact Us</h2>
							<p>
								We are dedicated to spreading knowledge and awareness of Heart Failure. If you would like to contact us, please fill out the form below.
							</p>
							<?php
								if(filter_has_var(INPUT_POST, 'submit')){
									$firstName = htmlspecialchars($_POST['firstname']);
									$lastName = htmlspecialchars($_POST['lastname']);
									$email = htmlspecialchars($_POST['email']);
									$subject = htmlspecialchars($_POST['subject']);
									
									if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
										echo "Please enter in a valid email";
									}
									else{
										$toEmail = "krn_saint@yahoo.com";
										$message = "You have received an email from " .$firstName;
										$body ="<h2>Contact Form Submission<h2>
												<p>".$firstName. " ".$lastName."</p>
												<p>".$email."</p>
												<p>".$subject."</p>";
												
										$headers = "MIME-Version: 1.0" ."\r\n";
										$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
										
										
										$headers .= "From: " .$firstName. "<" .$email. ">" . "\r\n";
										
										if(mail($toEmail, $message, $body, $headers)){
											echo "Your form has been sent!";
										}
										else{
											echo "Your form could not be sent. Please try again";
										}
									}
									
								}

							?>
						</div>
					<figure class="caption2">
					<img src="images/holdhands.jpg" alt="holding hands">
					</figure>
					<figure class="caption2">
					<img src="images/heart2.jpg" alt="holding a heart">
					</figure>
					<div class="test2">
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<label for="fname">*First Name</label>
								<input type="text" id="fname" name="firstname"  value="<?php echo isset($_POST['firstname']) ? $firstName : ''; ?>" required>

								<label for="lname">*Last Name</label>
								<input type="text" id="lname" name="lastname" value="<?php echo isset($_POST['lastname']) ? $lastName : ''; ?>" required>

								<label for="email">*Email address</label>
								<input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required>


								<label for="subject">*Subject</label>
								<textarea id="subject" name="subject" class="subjectheight"  required><?php echo isset($_POST['subject']) ? $subject : ''; ?></textarea>

								<input type="submit" name="submit" value="Submit">
							</form>
					</div>
					</div>
				</main>
				<footer>
					<p>	&copy; Heart Failure Awareness 2019 </p>
				</footer>
		</div>
	</body>
</html>
