<?php 
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	
	$account = new Account($connection);

	include("includes/handlers/register-handler.php"); //point same as "import"
	include("includes/handlers/login-handler.php");

	function getInputValue($name){   //remembers inputted data, so you wouldnt type again name example
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}

?>

<!DOCTYPE html>
<html lang="et">
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/register.js"></script>

</head>
<body>


<div id="background">
	<div id="loginContainer">
		<div id="inputContainer">
			<form id="loginForm" action="register.php" method="POST">
				<h2>Log in to your account</h2>
				<p>
					<?php echo $account->getError(Constants::$loginFailed); ?>
					<label for="loginUsername"></label>
					<input type="text" id="loginUsername" name="loginUsername" placeholder="Your username" required>
				</p>
				<p>
					<label for="loginPassword"></label>
					<input type="password" id="loginPassword" name="loginPassword" placeholder="Your password" required>	
				</p>
				<button type="submit" name="loginButton">Log in</button>

				<div class="hasAccount">
					<span class="hideLogin">Don't have account yet? Sign up here.</span>
				</div>
			</form>

		<!-- Sign up form -->

			<form id="registerForm" action="register.php" method="POST">
				<h2>Create your free account</h2>
				<h4>It's free</h4>
				<p>
					<?php echo $account->getError(Constants::$usernameCharacters); ?>
					<?php echo $account->getError(Constants::$usernameTaken); ?>
					<label for="username"></label>
					<input type="text" id="username" name="username" placeholder="Username" value="<?php getInputValue('username') ?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$firstnameCharacters); ?>
					<label for="firstName"></label>
					<input type="text" id="firstName" name="firstName" placeholder="First name" value="<?php getInputValue('firstName') ?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$lastnameCharacters); ?>
					<label for="lastName"></label>
					<input type="text" id="lastName" name="lastName" placeholder="Last name" value="<?php getInputValue('lastName') ?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
					<?php echo $account->getError(Constants::$emailInvalid); ?>
					<?php echo $account->getError(Constants::$emailTaken); ?>
					<label for="Email"></label>
					<input type="email" id="email" name="email" placeholder="Email" value="<?php getInputValue('email') ?>" required>
				</p>

				<p>
					<label for="email2"></label>
					<input type="email" id="email2" name="email2" placeholder="Confirm email" value="<?php getInputValue('email2') ?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
					<?php echo $account->getError(Constants::$passwordsNotAlphanumeric); ?>
					<?php echo $account->getError(Constants::$passwordCharacters); ?>
					<label for="password"></label>
					<input type="password" id="password" name="password" placeholder="Your password" required>	
				</p>
				<p>
					<label for="password2"></label>
					<input type="password" id="password2" name="password2" placeholder="Confirm password" required>	
				</p>
				<button type="submit" name="registerButton">Sign up</button>
				
				<div class="hasAccount">
					<span class="hideRegister">Already have an account? Log in Here.</span>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>

