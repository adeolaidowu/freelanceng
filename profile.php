<!-- Navbar -->
		<?php 
		include('navbarprof.php');
		
			$userobj = new User;
			$user = $userobj->getProfileDetails($_SESSION['userid']);
			//var_dump($user);
			//var_dump($_SESSION);
		?> 
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5">
			<a class="navbar-brand offset-1" href="#">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="myjobs.php">My Projects</a>
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>	
		<!-- profile section -->
		<section class="profile">
			<div class="container my-5">
				<div class="row">
					<div class="col-md-2 text-center">
						<?php 
						 	$userobj = new User;
						 	$userdetails = $userobj->getUserDetails($_SESSION['userid']);
						  ?>
						<?php
							if(empty($_SESSION['profilepic'])) {
						 ?>
						 <i class="fa fa-user fa-9x" style="width: 180px;height: 180px;"></i>
						<!-- <img src="images/avatar.png" style="width: 180px;height: 180px;" alt="profile photo"> -->
						<?php }else{ ?>
						<img src="<?php echo $_SESSION['profilepic']; ?>" style="width: 180px;height: 180px;border-radius: 50%;" alt="profile photo">
						<?php } ?>
						<div>
							<a href="uploadprofilepic.php">Upload picture</a>
						</div>
						<p>@ <?php echo $userdetails['firstName']; ?></p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span><?php if(isset($userdetails['date_registered'])){echo date('jS, F Y', strtotime($userdetails['date_registered']));}?></span></p>
						<div>
							<a href="receivedbids.php" class="btn btn-success mb-2">Received Bids</a>
						</div>
						<div>
							<a href="sentbids.php" class="btn btn-outline-success mb-3">Sent Bids</a>
						</div>
					</div>
					<div class="col-md-6 offset-1 welcome">
						<?php 
							if(isset($_SESSION['profilepic'])){
						 ?>
						<h2 style='margin-bottom: 40px;'>Welcome back, <?php echo $userdetails['firstName']; ?></h2>
					<?php }else{ ?>
						<h2 style='margin-bottom: 40px;'>Welcome, <?php echo $userdetails['firstName']; ?></h2>
						<?php ;} ?>
						<?php  
							if(isset($_GET['msg'])){

							echo "<div class=\"alert alert-success alert-dismissible\">".$_GET['msg']."<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;
							  </button>
							</div>";
							}
					    ?>
						<?php 
						if(isset($user['headline']) && $user['headline'] != ""){
							echo "<h4 style='text-align:center;'>".$user['headline']."</h4><hr>";
						}
						if(isset($user['summary']) && $user['summary'] != ""){
							echo "<div style='margin-top: 40px;'>".$user['summary']."</div>";
						}else{
						?>
						<p>To post a job, click the button at the top right of your screen.</p>
						<p>To search for and apply to jobs, visit the All Jobs link on your profile bar</p>
						<?php } ?>
						<div class="edit" style="display:none;">
							<h5 class="profile_edit">Professional Headline <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" name="prof_details">
							<textarea placeholder="Enter your professional Headline" cols="50" rows="4" name="headline"></textarea> <br>
						
						<h5 class="profile_edit">Profile summary <i class="fas fa-pencil-alt" style="font-size: 16px;"></i></h5>
						
							<textarea placeholder="Enter your profile summary" cols="50" rows="4" name="summary"></textarea> <br>
							<button class="btn btn-sm btn-success" id="editprof">Save Changes</button>
						</form>
						</div>
					</div>
					<div class="col-md-3 sub-container mt-4">
						<button class="btn btn-sm btn-dark shadow-none" id="change">View employer details</button> <br>
							<a class="btn btn-success mt-4 editprofile shadow-none" type="button" href="editprofile.php?userid=<?php echo $_SESSION['userid']; ?>">Edit Profile</a>
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
		<!-- footer -->
		<?php include('footer.php'); ?>
		
		