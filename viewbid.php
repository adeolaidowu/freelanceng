<?php 
include_once('navbarprof.php');
include_once('classes.php');
$jobobj = new Job;
$mybid = $jobobj->getSpecificJobApplication($_SESSION['userid'],$_GET['jobid']);

 ?>
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="profile.php">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="sentbids.php">Back</a>
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-2 mr-5 text-center">
					<?php
						if(empty($_SESSION['profilepic'])) {
					 ?>
					  <i class="fa fa-user fa-9x mb-4" style="width: 180px;height: 180px;"></i>
					<!-- <img src="images/avatar.png" style="width: 180px;height: 180px;" alt="profile photo"> -->
					<?php }else{ ?>
					<img src="<?php echo $_SESSION['profilepic']; ?>" style="width: 180px;height: 180px;border-radius: 50%;" alt="profile photo" class="mb-4">
					<?php } ?>
					<p>@ <?php echo $userdetails['firstName']; ?></p>
					<p><i class="fas fa-envelope mr-2" title="email verification"></i> <i class="fas fa-phone" title="phone verification"></i></p>
					<p>member since <span><?php if(isset($userdetails['date_registered'])){echo date('jS, F Y', strtotime($userdetails['date_registered']));}?></span></p>
				</div>
				<div class="col-md">
					<div class="card">
					 <div class="card-body">
					    <p class="card-title"><b>Job Name:</b> <?php echo $mybid['projectname']; ?></p>
					    <p class="card-text"><b>Job Description: </b> <?php echo $mybid['details']; ?></p>
					    <p class="card-text"><b>My Proposal: </b> <?php echo $mybid['bidDescription']; ?></p>
					    <p class="card-text"><b>My Fee: </b>&#8358;<?php echo number_format($mybid['fee'],2); ?></p>
					    <p class="card-text"><b>Required skills: </b><?php echo $mybid['reqskills']; ?></p>
					    <p class="card-text"><b>Expected Time of Delivery: </b> <?php echo $mybid['expectedDuration']; ?></p>
					    <p class="card-text"><b>Proposed Time of Delivery: </b> <?php echo $mybid['deliveryTime']; ?></p>
					    <p class="card-text"><b>Status: </b><?php if(isset($mybid['bidStatus'])){echo $mybid['bidStatus'];} ?></p>
					    <p class="card-text"><b>Application Date: </b><?php echo date('jS,F Y', strtotime($mybid['bid_date'])); ?></p>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('footer.php'); ?>