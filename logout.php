<?php 
	session_start();

	session_destroy();
	//redirect to sign in page
	header("Location: http://localhost/project/login.php");
	exit;

 ?>