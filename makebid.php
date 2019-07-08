
		<!-- Navbar -->
		<?php include('navbarprof.php');		
				$bid_error = array();
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				//sanitize input(potential malicious code) from user and store in variable
				$biddesc = User::sanitize($_POST['biddesc']);
				$fee = User::sanitize($_POST['fee']);
				$projectdelivery = User::sanitize($_POST['projectdelivery']);
				$jobid = $_POST['jobid'];
				$freelancerid = $_POST['freelancerid'];
				$employerid = $_POST['employerid'];
				$projectname = $_POST['prjctname'];
				$details = $_POST['details'];
				//var_dump($_POST);
				//test and validate form input fields
				if(empty($biddesc)){
					$bid_error['biddesc'] = "<div class='text text-danger'>You need to describe the service(s) you plan to offer this employer</div>";
				}
				if(empty($fee)){
					$bid_error['fee'] = "<div class='text text-danger'>You have to state how much you are willing to complete this job</div>";
				}
				if(empty($projectdelivery)){
					$bid_error['projectdelivery'] = "<div class='text text-danger'>Please make a selection</div>";
				}
				//create account after form validation
				$bid_error_count = count($bid_error);
				if($bid_error_count == 0){
					//var_dump($_POST);
					$jobobj = new Job;
					$mybid =$jobobj->makeBid($biddesc,$jobid,$projectdelivery,$fee,$freelancerid,$employerid,$projectname,$details);
				}
				

			} 		


		?>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="profile.php">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="#">Messages</a>
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-2 mr-5 text-center">
						<?php 
						 	$userobj = new User;
						 	$userdetails = $userobj->getUserDetails($_SESSION['userid']);
						 	$jobobj = new Job;
						 	$jobs = $jobobj->getJobDetails($_GET['jobid']);
						  ?>
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
						<p>0 recommendations</p>
						<div>
							<a href="receivedbids.php" class="btn btn-success mb-2">Received Bids</a>
						</div>
						<div>
							<a href="sentbids.php" class="btn btn-outline-success">Sent Bids</a>
						</div>
					</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<p><b>Job Name:</b> <?php echo $jobs['projectname'];  ?></p>
							<p><b>Job details:</b> <?php echo $jobs['details'];  ?></p>
							<p><b>Expected Time of Delivery:</b> <?php echo $jobs['expectedDuration'];  ?></p>
						</div>
						<div class="col-md">
							<div class="card bg-light mb-3 w-100" >
						<h4 class="card-header">Make your Bid for this Job</h4>
						<div class="card-body">
							<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="bidform">
								<div class="row">
									<div class="col d-flex justify-content-center">
									<p id="errormsg"></p>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Describe the Service you plan to offer</label>
										<textarea placeholder="Describe what you plan to do and what sets you apart" class="form-control" name="biddesc" value="<?php if(isset($biddesc)){echo $biddesc;} ?>"></textarea>
										<?php 
											if(isset($bid_error['biddesc'])){
												echo $bid_error['biddesc'];
											}
										 ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md">
										<label for="lname">How much are you going to charge for this job(Naira)</label>
										<input type="text" class="form-control" id="fee" name="fee" placeholder="Type your fee" value="<?php if(isset($fee)){echo $fee;} ?>">
										<?php 
											if(isset($bid_error['fee'])){
												echo $bid_error['fee'];
												} 
											?>
									</div>
								</div>
								<div class="row form-group">
									<div class="col">
										<label>When will you deliver?</label>
										<select class="form-control" id="projectdelivery" name="projectdelivery">
											<option value="">Select an option</option>
											<option value="less than a wk">Less than a week</option>
											<option value="2-3 wks">2 - 3 weeks</option>
											<option value="4-6 wks">4 - 6 weeks</option>
											<option value="6-8 wks">6 - 8 weeks</option>
											<option value="8-12 wks">8 - 12 weeks</option>
											<option value="notsure">Not Sure</option>
										</select>
										<?php 
											if(isset($bid_error['projectdelivery'])){
												echo $bid_error['projectdelivery'];
											}
										 ?>
									</div>
								</div>
								<input type="hidden" name="employerid" value="<?php echo $jobs['userId'] ?>">
								<input type="hidden" name="jobid" value="<?php echo $jobs['jobId'] ?>">
								<input type="hidden" name="freelancerid" value="<?php echo $_SESSION['userid'] ?>">
								<input type="hidden" name="prjctname" value="<?php echo $jobs['projectname'] ?>">
								<input type="hidden" name="details" value="<?php echo $jobs['details'] ?>">
								<button type="submit" class="btn btn-success" id="sndbid">Send Bid</button>
							</form>
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--footer-->
		<?php include('footer.php'); ?>
		