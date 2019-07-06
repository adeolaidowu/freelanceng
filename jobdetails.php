<!-- navbar-->
<?php include('navbarprof.php') ?>
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
			<form method="get" action="#" name="jobdescription" style="margin-top: 70px;">
				<div class="form-group row">
					<div class="col">
						<label for="projectname">Choose a name for your project</label>
						<input type="text" class="form-control" id="projectname" placeholder="need a developer to build a game">
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="projectdetails">Tell us more about your project</label>
						<textarea class="form-control" id="projectdetails" rows="3" placeholder="I am looking to build an RPG game based on an African comic"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="reqskills">What skills do you require for this project</label>
						<input type="text" class="form-control" id="reqskills" placeholder="asp.NET, JavaScript, Python...">
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>What is your estimated budget</label>
						<select class="form-control" id="budget">
							<option value="">Select an option</option>
							<option value="micro">micro-project (N15,000 to N30,000)</option>
							<option value="simple">simple-project (N30,000 to N50,000)</option>
							<option value="vsmall">very small-project (N50,000 to N75,000)</option>
							<option value="medium">medium-project (N75,000 to N100,000)</option>
							<option value="large">large-project (N100,000 to N250,000)</option>
							<option value="vlarge">very large-project (N250,000 to N1,000,000)</option>
							<option value="major">major-project (N1,000,000+)</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>What is your expected time of delivery</label>
						<select class="form-control" id="projectdelivery">
							<option value="">Select an option</option>
							<option value="1">Less than a week</option>
							<option value="2">2 - 3 weeks</option>
							<option value="3">4 - 6 weeks</option>
							<option value="4">6 - 8 weeks</option>
							<option value="5">8 - 12 weeks</option>
							<option value="6">To be negotiated</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<label>Choose your preferred payment method for this project</label>
						<select class="form-control" id="paymentmethod">
							<option value="">Select an option</option>
							<option value="micro">Mobile Transfer</option>
							<option value="simple">Wire Transfer</option>
							<option value="vsmall">Direct deposit</option>
							<option value="medium">Our secure payment partner</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<button type="submit" class="btn btn-success" >
						Confirm and Post Project
						</button>
					</div>
				</div>
			</form>
		</div>
		
		<!-- jquery -->
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.0.js"></script>
		<!-- popper -->
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<!-- Bootstrap JS>-->
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>