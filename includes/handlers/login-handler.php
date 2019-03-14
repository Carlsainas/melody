<?php 

if(isset($_POST['loginButton'])){
//login button pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);
	if($result){
		$_SESSION['userLoggedIn'] = $username; //created a variable 'userLoggedIn with value of $username'
		header("Location: index.php");
	}
}

?>