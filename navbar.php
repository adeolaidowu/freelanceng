<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title><?php echo $pagetitle; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="animate.css">
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<style type="text/css">
			@media screen(min-width:320px){
				.services{
					background-color: orange;
				}
			}
		</style>
	</head>
	<body>
		<?php session_start(); ?>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Freelance<span class="logo">NG</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#indexnav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="indexnav">
				<ul class="nav navbar-nav ml-auto">
					<li class="nav-item <?php if($pagetitle == "FreelanceNG"){echo "active";} ?>">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?php if($pagetitle == "Jobs"){echo "active";} ?>">
						<a class="nav-link" href="indexjobs.php">Jobs</a>
					</li>
					<li class="nav-item <?php if($pagetitle == "Sign up"){echo "active";} ?>">
						<a class="nav-link" href="signup.php">Join</a>
					</li>
					<li class="nav-item <?php if($pagetitle == "Login"){echo "active";} ?>">
						<a class="nav-link" href="login.php">Sign In</a>
					</li>
					
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
