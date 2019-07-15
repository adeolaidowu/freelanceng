<!-- Navbar -->
		<?php include('navbarprof.php');
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$headline = User::sanitize($_POST['headline']);
				$summary = User::sanitize($_POST['summary']);
				$profid = User::sanitize($_POST['profid']);
				$userobj = new User;
				$userprofile = $userobj->editProfile($headline,$summary,$_SESSION['userid'],$profid);
				
			}
		?>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="profile.php">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="myjobs.php">My Projects</a>
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>	
		<!-- profile section -->
		<section class="profile">
			<div class="container my-5">
				<?php 
					$profileobj = new User;
					$userdetails = $profileobj->getUserDetails($_SESSION['userid']);
				 ?>
				<?php if(isset($userprofile)){echo $userprofile;} ?>
				<div class="row">
					<div class="col-md-2 text-center">
						<?php 
							if(empty($_SESSION['profilepic'])) {
						 ?>
						 <i class="fa fa-user fa-9x" style="width: 180px;height: 180px;"></i>
						<!-- <img src="images/avatar.png" style="width: 180px;height: 180px;" alt="profile photo"> -->
						<?php }else{ ?>
						<img src="<?php echo $_SESSION['profilepic'] ?>" style="width: 180px;height: 180px;border-radius: 50%;" alt="profile photo">
						<?php }; ?>
						<div>
							<a href="uploadprofilepic.php">Upload picture</a>
						</div>
						<p>@ <?php echo $_SESSION['firstname']; ?></p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span><?php echo date('jS, F Y', strtotime($userdetails['date_registered']));?></span></p>
						<p>0 recommendations</p>
					</div>
					<div class="col-md-6 offset-1">
						<?php 
							$profobj = new User;
							$prof = $profobj->getProfileDetails($_SESSION['userid']);
							//var_dump($prof);


						 ?>
						<div class="edit">
							<h5 class="profile_edit">Professional Headline <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="prof_details">
							<textarea placeholder="Enter your professional Headline" cols="50" rows="4" name="headline"><?php if(isset($prof['headline'])){echo $prof['headline'];} ?></textarea> <br>
						
						<h5 class="profile_edit">Profile summary <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						
							<textarea placeholder="Enter your profile summary" cols="50" rows="4" name="summary"><?php if(isset($prof['summary'])){echo $prof['summary'];} ?></textarea> <br>
							<input type="hidden" name="profid" value="<?php echo $prof['profile_id']; ?>">
							<button class="btn btn-sm btn-success" id="editprof">Save Changes</button>
						</form>
						</div>
					</div>
					<div class="col-md-3 sub-container mt-4">
						<button class="btn btn-sm btn-dark shadow-none" id="change">View employer profile</button>
						<form>
							<a class="btn btn-success mt-4 editprofile shadow-none" type="button" href="profile.php">View Profile</a>
						</form>
							<div class="freelancer">
								<p style="border-bottom: 1px solid grey; margin: 30px;"></p>
							<span>N/A</span>
							<span>Jobs completed</span>
							</div>
							<div style="display:none;padding-top: 10px;" id="employerinfo">
								<p><span>0</span> Open Projects</p>
								<p><span>0</span> Active Projects</p>
								<p><span>0</span> Past Projects</p>
								<p><span id="totaljobs">0</span> Total Projects</p>
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
		
		