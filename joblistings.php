<?php session_start(); ?>
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
	<style type="text/css">
		.cont {
			border: 1px solid lightgrey;
			margin-top: 50px;
			border-radius: 5px;
			box-shadow: 2px 4px 5px 0px rgba(0,0,0,0.75);
		}
		
	</style>
	<body>
		<!-- Navbar -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow p-3 mb-5 bg-dark rounded">
						<a class="navbar-brand offset-1"href="#">Freelance<span class="logo">NG</span></a>
						<button class="navbar-toggler"type="button"data-toggle="collapse"data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent"aria-expanded="false"aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link mr-4" href="profile.php">Profile <span class="sr-only">(current)</span></a>
							</div>
						</div>
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
									<?php
									if(empty($_SESSION['profilepic'])) {
									?>
									<img src="images/male_avatar.png" style="width: 50px;height: 50px;margin-left:10px;" alt="profile photo">
									<?php }else{ ?>
									<img src="<?php echo $_SESSION['profilepic'] ?>" style="width: 50px;height: 50px;border-radius: 50%;margin-left:10px;" alt="profile photo">
									<?php }; ?>
								</li>
								<li class="nav-item">
									<span class="nav-link">username</span>
								</li>
								<a class="nav-item nav-link" href="index.php">Sign out</a>
								
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- Joblists column -->
		<div class="container">
			<div class="row">
				<div class="col" style="text-align: center;">
					<h3>View All Listed Jobs</h3>
					<hr>
				</div>
			</div>
		</div>
		<div class="container cont mt-2">
			<div class="row">
				<!-- searchbar for jobs -->
				<div class="col-8 offset-1 mt-4">
					<form name="jobsearch" method="GET" action="#">
						<label class="sr-only" for="inlineFormInputGroup">Find jobs</label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-search"></i></div>
							</div>
							<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="find jobs">
						</div>
					
				</div>
				<div class="col-1 mt-4 mr-3">
					<button type="submit" class="btn btn-success">Filter</button>
				</div>
				<div class="col-1 mt-4">
					<button type="submit" class="btn btn-outline-success mr-1">Submit</button>
				</div>
				</form>
			</div>
			<form>
				<div class="row form-group">
					<div class="col ml-2">
						<label>Budget</label>
						<select class="form-control" id="budget">
							<option value="">Select an option</option>
							<option value="micro">micro-project (N15,000 to N30,000)</option>
							<option value="simple">simple-project (N30,000 to N50,000)</option>
							<option value="vsmall">very small-project (N50,000 to N75,000)</option>
							<option value="medium">medium-project (N75,000 to N100,000)</option>
							<option value="large">large-project (N100,000 to N250,000)</option>
							<option value="vlarge">very large-project (N250,000 to N1,000,000)</option>
							<option value="major">major-project (N1,000,000+)</option>
						</select>
					</div>
					<div class="col">
						<label>Project Length</label>
						<select class="form-control" id="projectdelivery">
							<option value="">Select an option</option>
							<option value="1">Less than a week</option>
							<option value="2">2 - 3 weeks</option>
							<option value="3">4 - 6 weeks</option>
							<option value="4">6 - 8 weeks</option>
							<option value="5">8 - 12 weeks</option>
							<option value="6">To be negotiated</option>
						</select>
					</div>
					<div class="col mr-2">
						<label>Category</label>
						<select class="form-control" id="projectdelivery">
							<option value="">Select an option</option>
							<option value="1">Web development</option>
							<option value="2">Web design</option>
							<option value="3">Mobile App development</option>
							<option value="4">Game development</option>
							<option value="5">Software development</option>
							<option value="6">Logo design</option>
						</select>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col">
					<div class="list-group mt-5">
						<a href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">List group item heading</h5>
								<small>3 days ago</small>
							</div>
							<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
							<small>Donec id elit non mi porta.</small>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">List group item heading</h5>
								<small class="text-muted">3 days ago</small>
							</div>
							<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
							<small class="text-muted">Donec id elit non mi porta.</small>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">List group item heading</h5>
								<small class="text-muted">3 days ago</small>
							</div>
							<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
							<small class="text-muted">Donec id elit non mi porta.</small>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">List group item heading</h5>
								<small class="text-muted">3 days ago</small>
							</div>
							<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
							<small class="text-muted">Donec id elit non mi porta.</small>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">List group item heading</h5>
								<small class="text-muted">3 days ago</small>
							</div>
							<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
							<small class="text-muted">Donec id elit non mi porta.</small>
						</a>
					</div>
				</div>
			</div>
			<!-- Pagination -->
			<nav aria-label="Page navigation example">
				<ul class="pagination d-flex justify-content-center mt-3">
					<li class="page-item"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</nav>
		</div>
		<!-- footer -->
		<?php include('footer.php'); ?>
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
						<button type="button" class="btn btn-success"><a href="jobdetails.php" style="text-decoration: none; color: white;">Next</a></button>
					</div>
				</div>
			</div>
		</div>
		<!-- jquery -->
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.0.js"></script>
		<!-- popper -->
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<!-- Bootstrap JS>-->
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>