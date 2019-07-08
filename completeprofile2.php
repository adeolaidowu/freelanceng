<!-- Navbar -->
		<?php include('navbarprof.php');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$headline = $_POST['headline'];
				$summary = $_POST['summary'];
				//var_dump($_POST);
				//var_dump($_SESSION);
				$userobj = new User;
				$userprofile = $userobj->completeProfile($headline,$summary,$_SESSION['userid']);
			}

		?>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<div class="navbar-nav offset-1">
				<a class="navbar-brand mynav" href="#">MY PROFILE</a>
			<a class="nav-item nav-link" href="profile2.php">Back to profile</a>
			</div>
		</nav>	
		<!-- profile section -->
		<section class="profile">
			<div class="container my-5">
				<div class="row">
					 <?php 
					 	$userobj = new User;
					 	$userdetails = $userobj->getUserDetails($_SESSION['userid']);
					  ?>
					<div class="col-md-2 text-center jumbotron jumbotron-fluid bg-dark rounded text-white">
						<?php if(isset($userprofile)){echo $userprofile;} 
						 	//var_dump($_SESSION); ?>
						<?php 
							if(empty($_SESSION['profilepic'])) {
						 ?>
						
						  <i class="fa fa-user fa-9x" style="width: 180px;height: 180px;"></i>
						<!-- <img src="images/avatar.png" style="width: 180px;height: 180px;" alt="profile photo"> -->
						<?php }else{ ?>
						<img src="<?php echo $_SESSION['profilepic'] ?>" style="width: 180px;height: 180px;border-radius: 50%;" alt="profile photo">
						<?php }; ?>
						<p>@ <?php echo $_SESSION['firstname']; ?></p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span><?php echo date('jS, F Y', strtotime($userdetails['date_registered']));?></span></p>
						<p>0 recommendations</p>
					</div>
					<div class="col-md-6 offset-1">
						<h3>Complete your profile information</h3>
						<div class="edit">
							<h5 class="profile_edit">Professional Headline <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" name="prof_details">
							<textarea placeholder="Enter your professional Headline" class="form-control" name="headline"></textarea> <br>
						
						<h5 class="profile_edit">Profile summary <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						
							<textarea placeholder="Enter your profile summary" class="form-control" name="summary"></textarea> <br>
							<button class="btn btn-sm btn-success">Complete</button>
							<button class="btn btn-sm btn-success">I'll do this Later</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="portfolio container edit">
			<div class="row">
					<div class="col">
						<div class="card bg-light mb-3 w-100" >
							<div class="card-header d-flex justify-content-between">Portfolio
								<button class="btn btn-success btn-sm">Add</button>
							</div>

							<div class="card-body">
								<p class="card-text">Add your recents works</p>
							</div>
						</div>
					</div>
				</div>
		</section>
		<!-- reviews & certs -->
		<section class="reviews container edit">
			<div class="row">
					<div class="col-md-8">
						<div class="card bg-light mb-3 w-100" >
							<div class="card-header d-flex justify-content-between">Reviews
							<button class="btn btn-success btn-sm">Add</button></div>
							<div class="card-body">
								<p class="card-text">You have no reviews</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-light mb-3 w-100" >
							<div class="card-header d-flex justify-content-between">Certificates
							<button class="btn btn-success btn-sm">Add</button></div>
							<div class="card-body">
								<p class="card-text">You do not have any certifications</p>
							</div>
						</div>
						
					</div>
				</div>
		</section>
		<!-- education & skills -->
		<div class="container edit">
			<div class="row">
				<div class="col-md-8">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header d-flex justify-content-between">Education
						<button class="btn btn-success btn-sm">Add</button></div>
						<div class="card-body">
							<p class="card-text">Add your Education</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header d-flex justify-content-between">My Skills
						<button class="btn btn-success btn-sm">Add</button></div>
						<div class="card-body">
							<p class="card-text">Add skills</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- experience & qualification-->
		<div class="container edit">
			<div class="row">
				<div class="col-md-8">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header d-flex justify-content-between">Experience
						<button class="btn btn-success btn-sm">Add</button></div>
						<div class="card-body">
							<p class="card-text">Add your experience</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-light mb-3 w-100" >
						<div class="card-header d-flex justify-content-between">Certificates
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
		<?php include('footer.php'); ?>
		
		