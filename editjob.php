<!-- navbar-->
<?php include('navbarprof.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$projectname = User::sanitize($_POST['projectname']);
		$projectdetails = User::sanitize($_POST['projectdetails']);
		$reqskills = User::sanitize($_POST['reqskills']);
		$budget = User::sanitize($_POST['budget']);
		$timeofdelivery = User::sanitize($_POST['projectdelivery']);
		$paymentmethod = User::sanitize($_POST['paymentmethod']);
		$jobid = $_GET['jobid'];
		//var_dump($_POST);
		//instantiate job class
		$jobobj = new Job;
		$output = $jobobj->editJob($projectname,$projectdetails,$reqskills,$timeofdelivery,$jobid,$budget,$paymentmethod);
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
		<!-- Job details form -->
		<div class="container mt-5 w-50">
			<h1>Edit your Project</h1>
			<?php if(isset($_GET['jobid'])){
				$job_info_obj = new Job;
				$jobinfo = $job_info_obj->getJobDetails($_GET['jobid']);
				//var_dump($jobinfo);
			} ?>			
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?jobid=".$jobinfo['jobId']; ?>"  name="jobform" style="margin-top: 70px;">
				<div class="form-group row">
					<div class="col">
						<label for="projectname">Choose a name for your project</label>
						<input type="text" class="form-control " name="projectname" id="projectname" placeholder="need a developer to build a game" value="
						<?php if(isset($_GET['name'])){
							echo $_GET['name'];
						} ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="projectdetails">Tell us more about your project</label>
						<textarea class="form-control" name="projectdetails" id="projectdetails" rows="3" placeholder="I am looking to build an RPG game based on an African comic"><?php if(isset($_GET['details'])){
							echo $_GET['details'];
						} ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="reqskills">What skills do you require for this project</label>
						<input type="text" class="form-control" name="reqskills" id="reqskills" placeholder="asp.NET, JavaScript, Python..." value="<?php if(isset($_GET['reqskills'])){
							echo $_GET['reqskills'];
						} ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>What is your estimated budget</label>
						<select class="form-control" id="budget" name="budget">
							<option value="">Select an option</option>
							<option value="N15,000 - 30,000"<?php if(isset($_GET['budget']) && $_GET['budget'] == 'N15,000 - 30,000'){echo "selected";} ?>>micro-project (N15,000 to N30,000)</option>
							<option value="N30,000 - 50,000" <?php if(isset($_GET['budget']) && $_GET['budget'] == 'N30,000 - 50,000'){echo "selected";} ?>>simple-project (N30,000 to N50,000)</option>
							<option value="N50,000 - 75,000" <?php if(isset($_GET['budget']) && $_GET['budget'] == 'N50,000 - 75,000'){echo "selected";} ?>>very small-project (N50,000 to N75,000)</option>
							<option value="N75,000 - 100,000" <?php if(isset($_GET['budget']) && $_GET['budget'] == 'N75,000 - 100,000'){echo "selected";} ?>>medium-project (N75,000 to N100,000)</option>
							<option value="N100,000 - 250,000" <?php if(isset($_GET['budget']) && $_GET['budget'] == 'N100,000 - 250,000'){echo "selected";} ?>>large-project (N100,000 to N250,000)</option>
							<option value="N250,000 - 1M" <?php if(isset($_GET['budget']) && $_GET['budget'] == 'N250,000 - 1M'){echo "selected";} ?>>very large-project (N250,000 to N1,000,000)</option>
							<option value="N1,000,000+" <?php if(isset($_GET['budget']) && $_GET['budget'] == 'N1,000,000+'){echo "selected";} ?>>major-project (N1,000,000+)</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>What is your expected time of delivery</label>
						<select class="form-control" id="projectdelivery" name="projectdelivery">
							<option value="">Select an option</option>
							<option value="less than a wk" <?php if(isset($_GET['duration']) && $_GET['duration'] == 'less than a wk'){echo "selected";} ?>>Less than a week</option>
							<option value="2-3 wks" <?php if(isset($_GET['duration']) && $_GET['duration'] == '2-3 wks'){echo "selected";} ?>>2 - 3 weeks</option>
							<option value="4-6 wks" <?php if(isset($_GET['duration']) && $_GET['duration'] == '4-6 wks'){echo "selected";} ?>>4 - 6 weeks</option>
							<option value="6-8 wks" <?php if(isset($_GET['duration']) && $_GET['duration'] == '6-8 wks'){echo "selected";} ?>>6 - 8 weeks</option>
							<option value="8-12 wks" <?php if(isset($_GET['duration']) && $_GET['duration'] == '8-12 wks'){echo "selected";} ?>>8 - 12 weeks</option>
							<option value="negotiatiable" <?php if(isset($_GET['duration']) && $_GET['duration'] == 'negotiatiable'){echo "selected";} ?>>To be negotiated</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>Choose your preferred payment method for this project</label>
						<select class="form-control" id="paymentmethod" name="paymentmethod">
							<option value="">Select an option</option>
							<option value="mobiletrans" <?php if(isset($_GET['payment']) && $_GET['payment'] == 'mobiletrans'){echo "selected";} ?>>Mobile Transfer</option>
							<option value="wiretrans" <?php if(isset($_GET['payment']) && $_GET['payment'] == 'wiretrans'){echo "selected";} ?>>Wire Transfer</option>
							<option value="directdep" <?php if(isset($_GET['payment']) && $_GET['payment'] == 'directdep'){echo "selected";} ?>>Direct deposit</option>
							<option value="paymntpart" <?php if(isset($_GET['payment']) && $_GET['payment'] == 'paymntpart'){echo "selected";} ?>>Our secure payment partner</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<button type="submit" class="btn btn-success" id="post" >
						Update and Post
						</button>
					</div>
				</div>
			</form>
		</div>
		
		<?php include_once('footer.php'); ?>