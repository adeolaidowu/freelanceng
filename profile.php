<!-- Navbar -->
		<?php include('navbarprof.php');
		?>
					
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
						<h3><?php echo $_SESSION['firstname']; ?></h3>
						<h4 class="profile_edit">Professional Headline <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h4>
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
					<div class="col-md-3 sub-container mt-4">
						<button class="btn btn-sm btn-dark shadow-none" id="change">View employer profile</button>
						<form>
							<button class="btn btn-success my-4 form-control"><i class="fas fa-user"></i> View Profile</button>
							<button class="btn btn-success form-control" style="display:none;"><i class="fas fa-pencil-alt"></i> Edit Profile</button>
						</form>
							<div class="freelancer">
								<p style="border-bottom: 1px solid grey; margin: 30px;"></p>
							<span>N/A</span>
							<span>Jobs completed</span>
							</div>
							<div style="display:none;" id="employerinfo">
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
							<div class="card-header d-flex justify-content-between">Portfolio
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
			</div>
		</section>
		<!-- education & skills -->
		<div class="container">
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
		<div class="container">
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
		
		