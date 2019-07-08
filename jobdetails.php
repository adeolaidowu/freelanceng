<!-- navbar-->
<?php include('navbarprof.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$projectname = User::sanitize($_POST['projectname']);
		$projectdetails = User::sanitize($_POST['projectdetails']);
		$reqskills = User::sanitize($_POST['reqskills']);
		$budget = User::sanitize($_POST['budget']);
		$timeofdelivery = User::sanitize($_POST['projectdelivery']);
		$paymentmethod = User::sanitize($_POST['paymentmethod']);
		$myuserid = $_SESSION['userid'];
		//var_dump($_POST);
		//instantiate job class
		$jobobj = new Job;
		$output = $jobobj->createJob($projectname,$projectdetails,$reqskills,$timeofdelivery,$myuserid,$budget,$paymentmethod);
	}

 ?>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<a class="navbar-brand offset-1" href="#">Job description</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link mr-4" href="profile.php">Back to profile <span class="sr-only">(current)</span></a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- Job details form -->
		<div class="container mt-5 w-50">
			<h1>Tell Us What You Would Like Done</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="jobform" style="margin-top: 70px;">
				<div class="form-group row">
					<div class="col">
						<label for="projectname">Choose a name for your project</label>
						<input type="text" class="form-control" name="projectname" id="projectname" placeholder="need a developer to build a game">
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="projectdetails">Tell us more about your project</label>
						<textarea class="form-control" name="projectdetails" id="projectdetails" rows="3" placeholder="I am looking to build an RPG game based on an African comic"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="reqskills">What skills do you require for this project</label>
						<input type="text" class="form-control" name="reqskills" id="reqskills" placeholder="asp.NET, JavaScript, Python...">
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>What is your estimated budget</label>
						<select class="form-control" id="budget" name="budget">
							<option value="">Select an option</option>
							<option value="N15,000 - 30,000">micro-project (N15,000 to N30,000)</option>
							<option value="N30,000 - 50,000">simple-project (N30,000 to N50,000)</option>
							<option value="N50,000 - 75,000">very small-project (N50,000 to N75,000)</option>
							<option value="N75,000 - 100,000">medium-project (N75,000 to N100,000)</option>
							<option value="N100,000 - 250,000">large-project (N100,000 to N250,000)</option>
							<option value="N250,000 - 1M">very large-project (N250,000 to N1,000,000)</option>
							<option value="N1,000,000 above">major-project (N1,000,000+)</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>What is your expected time of delivery</label>
						<select class="form-control" id="projectdelivery" name="projectdelivery">
							<option value="">Select an option</option>
							<option value="less than a wk">Less than a week</option>
							<option value="2-3 wks">2 - 3 weeks</option>
							<option value="4-6 wks">4 - 6 weeks</option>
							<option value="6-8 wks">6 - 8 weeks</option>
							<option value="8-12 wks">8 - 12 weeks</option>
							<option value="negotiatiable">To be negotiated</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>Choose your preferred payment method for this project</label>
						<select class="form-control" id="paymentmethod" name="paymentmethod">
							<option value="">Select an option</option>
							<option value="mobiletrans">Mobile Transfer</option>
							<option value="wiretrans">Wire Transfer</option>
							<option value="directdep">Direct deposit</option>
							<option value="paymntpart">Our secure payment partner</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<button type="submit" class="btn btn-success" id="post" >
						Confirm and Post Project
						</button>
					</div>
				</div>
			</form>
		</div>
		
		<?php include_once('footer.php'); ?>