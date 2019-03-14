<?php 
function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText); //Eliminates the possibility to insert code into like 'html' into form
	return $inputText;
}
function sanitizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);  // Replaces white space between username(writes them together)
	return $inputText;
}
function santitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText)); // Makes input lowercase and then uppercases the first letter
	return $inputText;
}



if(isset($_POST['registerButton'])){
//register button pressed
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = santitizeFormString($_POST['firstName']);
	$lastName = santitizeFormString($_POST['lastName']);
	$email = santitizeFormString($_POST['email']);
	$email2 = santitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);
	
	if($wasSuccessful == true){
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}

}

?>