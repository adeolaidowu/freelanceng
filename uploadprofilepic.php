<?php include('navbarprof.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	echo "<pre>";
	print_r($_FILES['profilephoto']);
	echo "</pre>";
	$userobj = new User;
	$userpic = $userobj->uploadPicture();
}

 ?>
<section class="profile">
			<div class="container my-5">
				<div class="row">
					<div class="col-md-2 text-center">
					<!-- <?php if(isset($userpic)){
						echo $userpic;
					} ?> -->
						<img src="images/male_avatar.png" style="width: 180px;height: 180px;" alt="profile photo">
						<a href="uploadprofilepic.php">Upload picture</a>
						<p>@ <?php echo $_SESSION['firstname']; ?></p>
						<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
						<p>member since <span><?php echo date('dS, F Y', strtotime($_SESSION['joindate']));?></span></p>
						<p>0 recommendations</p>
					</div>
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype='multipart/form-data'>
						<div class="form-group">
							<input type="file" name="profilephoto" id="profilephoto" class="form-control">
							<button class="btn btn-success mt-3">Upload Photo</button>
						</div>
					</form>
					<div class="col-md-3 sub-container mt-4 ml-auto" style="">
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