<?php session_start();
include_once('classes.php');
if(!isset($_SESSION['userid'])){
	//if the userid session is not set, meaning the user logged out and didnt log back in,redirect to login
	header("Location: http://localhost/project/login.php");
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet"type="text/css"href="fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
						<a class="navbar-brand offset-1"href="#">Freelance<span class="logo">NG</span></a>
						<button class="navbar-toggler"type="button"data-toggle="collapse"data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent"aria-expanded="false"aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse"id="navbarSupportedContent">
							
							<form class="form-inline my-2 my-lg-0 ml-auto">
								<input class="form-control mr-sm-2"type="search"placeholder="Search"aria-label="Search">
							</form>
							<!-- link to post project -->
							<a class="btn btn-success" href="jobdetails.php">
								Post a Project
							</a>
							<ul class="navbar-nav">
								<li class="nav-item">
									<?php
									if(empty($_SESSION['profilepic'])) {
									?>
									<img src="images/male_avatar.png" style="width: 50px;height: 50px;margin-left:10px;" alt="profile photo">
									<?php }else{ ?>
									<img src="<?php echo $_SESSION['profilepic'] ?>" style="width: 50px;height: 50px;border-radius: 50%;margin-left:10px;" alt="profile photo">
									<?php }; ?>
								</li>
								<li class="nav-item">
									<span class="nav-link"><?php echo $_SESSION['firstname']; ?></span>
								</li>
								<a class="nav-item nav-link" href="logout.php">Sign out</a>
								
							</ul>
						</div>
					</nav>
					<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark rounded mynav">
						<a class="navbar-brand offset-1 mynav" href="#">MY PROFILE</a>
						<div class="navbar-nav">
							<a class="nav-item nav-link active mr-4" href="#">Improve Profile <span class="sr-only">(current)</span></a>
							<a class="nav-item nav-link" href="#">Get Certified</a>
							<a class="nav-item nav-link" href="#">My Projects</a>
							<a class="nav-item nav-link" href="#">Messages</a>
							<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
						</div>
					</nav>
				</div>
			</div>
		</div>