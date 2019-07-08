<?php 
	session_start();

	session_destroy();
	//redirect to sign in page
	header("Location: http://localhost/freelanceng/login.php");
	exit;

 ?>