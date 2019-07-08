<?php include('navbarprof.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// echo "<pre>";
	// print_r($_FILES['profilephoto']);
	// echo "</pre>";
	$profilepic = $_FILES['profilephoto'];
	if($profilepic['name'] == ""){
		$errmsg = "<div class='text text-danger'>You need to select an image file.</div>";
	}
	$userobj = new User;
	$userpic = $userobj->uploadPicture();
}

 ?>
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="profile.php">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="myjobs.php">My Projects</a>
				<a class="nav-item nav-link" href="#">Messages</a>
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>	
		<!-- profile section -->
		<section class="profile">
			<div class="container my-5">
				<div class="row">
					<div class="col-md-2 text-center mr-5">
						<?php 
						 	$userobj = new User;
						 	$userdetails = $userobj->getUserDetails($_SESSION['userid']);
						  ?>
						<?php
							if(empty($_SESSION['profilepic'])) {
						 ?>
						 <i class="fa fa-user fa-9x" style="width: 180px;height: 180px;"></i>
						<!-- <img src="images/avatar.png" style="width: 180px;height: 180px;" alt="profile photo" class="mb-4"> -->
						<?php }else{ ?>
						<img src="<?php echo $_SESSION['profilepic']; ?>" style="width: 180px;height: 180px;border-radius: 50%;" alt="profile photo" class="mb-4">
						<?php } ?>
						<p>@ <?php echo $_SESSION['firstname']; ?></p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span><?php if(isset($userdetails['date_registered'])){echo date('jS, F Y', strtotime($userdetails['date_registered']));}?></span></p>
						<p>0 recommendations</p>
					</div>
					<div class="col-md-6">
						<?php 
							if(isset($userpic)){
								echo $userpic;
							}
						 ?>
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype='multipart/form-data'>
							<div class="form-group ml-auto">
								<input type="file" name="profilephoto" id="profilephoto" class="form-control">
								<?php 
									if(isset($errmsg)){
										echo $errmsg;
									}
								 ?>
								<button class="btn btn-success mt-3">Upload Photo</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- footer -->
		<?php include('footer.php'); ?>
