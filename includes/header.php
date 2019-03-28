<?php 
include("includes/config.php"); //because we needed session_start()
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Songs.php");



/*session_destroy();*/

if(isset($_SESSION['userLoggedIn'])){
	$userLoggedIn = $_SESSION['userLoggedIn'];
}else{
	header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <script src = "assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/app.js"></script>
    
</head>
<body>


<div id="mainContainer">
	<div id="topContainer">

		<?php include("includes/navBarContainer.php")?> 

		<div id="mainViewContainer">
			
			<div id="mainContent">