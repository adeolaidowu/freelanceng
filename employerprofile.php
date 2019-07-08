<!-- Navbar -->
		<?php include('navbarprof.php');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$headline = $_POST['headline'];
				$summary = $_POST['summary'];
				$userobj = new User;
				$userprofile = $userobj->editProfile($headline,$summary,$_SESSION['userid']);
			}
		?>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="#">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link active mr-4" href="#">Improve Profile <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="#">Get Certified</a>
				<a class="nav-item nav-link" href="myjobs.php">My Projects</a>
				<a class="nav-item nav-link" href="#">Messages</a>
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>
		<!-- profile section -->
		<section class="profile">
			<div class="container my-5">
				<div class="row">
					<div class="col-md-2 text-center">
						<?php 
							if(empty($_SESSION['profilepic'])) {
						 ?>
						<img src="images/male_avatar.png" style="width: 180px;height: 180px;" alt="profile photo">
						<?php }else{ ?>
						<img src="<?php echo $_SESSION['profilepic'] ?>" style="width: 180px;height: 180px;border-radius: 50%;" alt="profile photo">
						<?php }; ?>
						<div>
							<a href="uploadprofilepic.php">Upload picture</a>
						</div>
						<p>@ <?php echo $_SESSION['firstname']; ?></p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span><?php echo date('dS, F Y', strtotime($_SESSION['joindate']));?></span></p>
						<p>0 recommendations</p>
					</div>
					<div class="col-md-6 offset-1">
						<h3>Welcome, <?php echo $_SESSION['firstname'];if(isset($_SESSION['userid'])){
							echo "Welcome your userid is ".$_SESSION['userid'];
						} ?></h3>
						<p class="text text-primary" id="msg"></p>
						<p>To get started, click the button at the top right to post your job</p>
						<div class="edit">
							<?php 
						if(isset($_POST['headline'])){
							echo "<div class='' style='font-size:28px'>".$_POST['headline']."</div>";
						}
						if(isset($_POST['summary'])){
							echo "<div>".$_POST['summary']."</div>";
						} 
						?>
							<h5 class="profile_edit1">Professional Headline <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" name="prof_details">
							<textarea placeholder="Enter your professional Headline" cols="50" rows="4" name="headline"></textarea> <br>
						
						<h5 class="profile_edit1">Profile summary <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						
							<textarea placeholder="Enter your profile summary" cols="50" rows="4" name="summary"></textarea> <br>
							<button class="btn  btn-sm btn-success">Save Changes</button>
						</form>
						</div>
					</div>
					<div class="col-md-3 sub-container mt-4">
						<button class="btn btn-sm btn-dark shadow-none" id="change">View employer profile</button>
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<button class="btn btn-success mt-4 editprofile shadow-none" type="button" name="freelance" id="freelance">Become a Freelancer</button>
						</form>
							<div class="freelancer">
								<p style="border-bottom: 1px solid grey; margin: 30px;"></p>
							<span>N/A</span>
							<span>Jobs completed</span>
							</div>
							<div style="display:none; padding-top: 10px;" id="employerinfo">
								<p><span>0</span> Open Projects</p>
								<p>0</span> Active Projects</p>
								<p>0</span> Past Projects</p>
								<p>0</span> Total Projects</p>
							</div>
					</div>
				</div>
			</div>
		</section>
		<section class="portfolio container edit1">
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
		<section class="reviews container edit1">
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
		<div class="container edit1">
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
		<div class="container edit1">
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

		
		