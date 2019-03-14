<?php 
	ob_start();  //waiting all data before sending to the server
	session_start(); //enables use of sessions.


	$timezone = date_default_timezone_set("Europe/Tallinn");

	$connection = mysqli_connect("localhost", "root", "", "clone"); //connect ¦server, username, password, sqldb name

	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	} 
 ?>