<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat"rel="stylesheet">
		<link rel="stylesheet"type="text/css"href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet"type="text/css"href="fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<style type="text/css">
			.profile {
				border: 1px solid #fff;
				margin: 30px 0;
				background-color: #fff;
			}
			.profile_edit:hover {
				background-color: grey;
				cursor: default;
			}
			.card-header{
				font-size: 22px;
				font-weight: 500;
			}
			.card-text {
				font-weight: 500;
			}
			.sub-container {
				background-color: whitesmoke;
				border-radius: 10px;
			}
			
		</style>
	</head>
	<body>
		<!-- Navbar -->
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
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
								Post a Project
								</button>
							</form>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link ml-2"href="#"><i class="fas fa-user-circle" style="font-size: 2.5em;"></i></a>
								</li>
								<li class="nav-item">
									<span class="nav-link">username</span>
								</li>
								<a class="nav-item nav-link" href="#">Sign out</a>
								
							</ul>
						</div>
					</nav>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<a class="navbar-brand offset-1" href="#">MY PROFILE</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link active mr-4" href="#">Improve Profile <span class="sr-only">(current)</span></a>
								<a class="nav-item nav-link" href="#">Get Certified</a>
								<a class="nav-item nav-link" href="#">My Projects</a>
								<a class="nav-item nav-link" href="#">Messages</a>
								<a class="nav-item nav-link" href="#">All Jobs</a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- profile section -->
		<section class="profile">
			<div class="container my-5">
				<div class="row">
					<div class="col-md-2 text-center">
						<i class="fas fa-user-circle" style="font-size: 10em; color: grey;"></i>
						<button type="button" class="btn btn-outline-success my-2">Upload photo</button>
						<p>@ username</p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span>date</span></p>
						<p>0 recommendations</p>
					</div>
					<div class="col-md-6 offset-1">
						<h3>username</h3>
						<h4 class="profile_edit">Professional Headline <i class="fas fa-pencil-alt"></i></h4>
						<form method="get" action="#" name="prof_headline">
							<textarea placeholder="Enter your professional Headline" cols="50" rows="4"></textarea> <br>
							<button class="btn  btn-sm btn-success">Save</button>
						</form>
						<p class="profile_edit">Profile summary <i class="fas fa-pencil-alt"></i></p>
						<form method="get" action="#" name="prof_summary">
							<textarea placeholder="Enter your profile summary" cols="50" rows="4"></textarea> <br>
							<button class="btn  btn-sm btn-success">Save</button>
						</form>
					</div>
					<div class="col-md-3 sub-container">
						<button class="btn btn-sm btn-dark">View employer profile</button>
						<form>
							<button class="btn btn-success my-4 form-control"><i class="fas fa-user"></i> View Profile</button>
							<button class="btn btn-success form-control" style="display:none;"><i class="fas fa-pencil-alt"></i> Edit Profile</button>
						</form>
							<div class="freelancer">
								<p style="border-bottom: 1px solid grey; margin: 30px;"></p>
							<span>N/A</span>
							<span>Jobs completed</span>
							</div>
							<div style="display:none;">
								<p><span>0</span> Open Projects</p>
								<p>0</span>Active Projects</p>
								<p>0</span> Past Projects</p>
								<p>0</span>Total Projects</p>
							</div>
					</div>
				</div>
			</div>
		</section>
		<section class="portfolio">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="card bg-light mb-3 w-100" >
							<div class="card-header">Portfolio
								<button class="btn btn-success btn-sm">Add</button>
							</div>

							<div class="card-body">
								<p class="card-text">Add your recents works</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- reviews & certs -->
		<section class="reviews">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="card bg-light mb-3 w-100" >
							<div class="card-header">Reviews</div>
							<div class="card-body">
								<p class="card-text">You have no reviews</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-light mb-3 w-100" >
							<div class="card-header">Certificates
							<button class="btn btn-success btn-sm">Add</button></div>
							<div class="card-body">
								<p class="card-text">You do not have any certifications</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- education & skills -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header">Education
						<button class="btn btn-success btn-sm">Add</button></div>
						<div class="card-body">
							<p class="card-text">Add your Education</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header">My Skills
						<button class="btn btn-success btn-sm">Add</button></div>
						<div class="card-body">
							<p class="card-text">Add skills</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- experience & qualification-->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header">Experience
						<button class="btn btn-success btn-sm">Add</button></div>
						<div class="card-body">
							<p class="card-text">Add your experience</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header">Certificates
						<button class="btn btn-success btn-sm">Add Certificate</button>
						</div>
						<div class="card-body">
							<p class="card-text">You do not have any certifications</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- footer -->
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col footer_content">
						<p style="border-bottom: 1px solid white;"></p>
					</div>
				</div>
				<div class="row">
					<div class="col footer_list">
						<ul>
							<li>Freelance<span class="logo">NG</span></li>
							<li><a href="#">Categories</a></li>
							<li><a href="#">Projects</a></li>
							<li><a href="#">Freelancers</a></li>
							<li><a href="#">Local Jobs</a></li>
						</ul>
					</div>
					<div class="col footer_list">
						<ul>
							<li>About</li>
							<li><a href="#">How it works</a></li>
							<li><a href="#">Security</a></li>
							<li><a href="#">Terms of service</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Fees and charges</a></li>
						</ul>
					</div>
					<div class="col footer_list">
						<ul>
							<li>Browse</li>
							<li><a href="#">Freelancer by skill</a></li>
							<li><a href="#">Jobs in Nigeria</a></li>
							<li><a href="#">Find jobs</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<p style="border-bottom: 1px solid white;"></p>
						<span style="color: white; margin-right: 30px;">Follow us</span>
						<i class="fab fa-facebook" style="font-size: 1.5em;"></i>
						<i class="fab fa-twitter mx-3" style="font-size: 1.5em;"></i>
						<i class="fab fa-instagram" style="font-size: 1.5em;"></i>
						<i class="fab fa-linkedin-in mx-3" style="font-size: 1.5em;"></i>
						<p style="border-top: 1px solid white;"></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col d-flex justify-content-center">
					<p style="font-size: 14px;">&copy; FreelanceNG All rights reserved</p>
				</div>
			</div>
		</section>
		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Tell Us What You Would Like Done</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="exampleFormControlInput1">Choose a name for your project</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="need a developer to build a game">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Tell us more about your project</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="I am looking to build an RPG game based on an African comic"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success"><a href="jobdetails.html" style="text-decoration: none; color: white;">Next</a></button>
					</div>
				</div>
			</div>
		</div>
		<!-- jquery -->
		<script type="text/javascript"src="bootstrap/js/jquery-3.4.0.js"></script>
		<!-- popper -->
		<script type="text/javascript"src="bootstrap/js/popper.min.js"></script>
		<!-- Bootstrap JS>-->
		<script type="text/javascript"src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>