<?php 
include("includes/config.php"); //because we needed session_start()

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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    
</head>
<body>
    


    <script src="main.js"></script>
</body>
</html>