<?php
	require "header.php";
?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<div class="signup-wrap">
					<div class="signup-text">
						Welcome to FWF!
					</div>
					<div class="error-box">
						<?php
							/* print error */
							if (isset($_GET['error'])) {
								$ERROR = $_GET['error'];
								if ($ERROR == "emptyfields") {
									echo 'Fill in all fields!';
								}
								else if ($ERROR == "invaliduidmail") {
									echo 'Invalid username and e-mail!';
								}
								else if ($ERROR == "invaliduid") {
									echo 'Invalid username!';
								}
								else if ($ERROR == "invalidmail") {
									echo 'Invalid e-mail!';
								}
								else if ($ERROR == "passwordcheck") {
									echo 'Passwords do not match!';
								}
								else if ($ERROR == "uidtaken") {
									echo 'Username is already taken!';
								}
								else if($ERROR == "notnoblesemail") {
									echo 'Not a Nobles email!';
								}
							}
							else if (isset($_GET['signup'])) {
								echo 'Successfully signed up!';
							}
						?>
					</div>
					<div class="signup-form-box">
						<form action="includes/scuffed.signup.php" method="post" class="signup-form">
							<p id="form-text" style="font-size: 14px; font-family: 'Lato'; color: black; margin: 0 42px 10px 0;">Please enter your first and last name, Nobles Email, and any password (we have security measures, but just in case, do not use an important password). Correct spelling is crucial or the website will not work.</p>
							<p id="input-text">NICKNAME AND LAST NAME&nbsp i.e. (Alex Bao)</p>
							<input type="text" name="uid" autofocus="autofocus">
							<p id="input-text">NOBLES EMAIL</p>
							<input type="text" name="mail">
							<p id="input-text">PASSWORD</p>
							<input type="password" name="pwd">
							<p id="input-text">RETYPE PASSWORD</p>
							<input type="password" name="pwd-check">
							<br>
							<button type="submit" name="signup-submit" class="log-button">Signup</button>
						</form>
					</div>
					<div class="parent-credit">
						<div class="sign-credit">By Alex Bao '20 & Wyatt Ellison '20</div>
					</div>
				</div>
			</section>
		</div>
	</main>
<?php
	require "footer.php"
?>