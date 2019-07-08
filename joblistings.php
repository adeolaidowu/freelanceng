<?php 
include_once('navbarprof.php'); ?>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="profile.php">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="#">Messages</a>
				<a class="nav-item nav-link" href="myjobs.php">My projects</a>
			</div>
		</nav>	
		<!-- Joblists column -->
		<div class="container">
			<div class="row">
				<div class="col" style="text-align: center;">
					<h3>View All Listed Jobs</h3>
					<hr>
					<?php 
						if(isset($_GET['msg'])){echo $_GET['msg'];}
						if(isset($_GET['bidmsg'])){echo $_GET['bidmsg'];}
					 ?>
				</div>
			</div>
		</div>
		<div class="container cont mt-2">
			<div class="row">
				<!-- searchbar for jobs -->
				<div class="col-8 offset-1 mt-4">
					<form name="jobsearch" method="GET" action="#">
						<label class="sr-only" for="inlineFormInputGroup">Find jobs</label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-search"></i></div>
							</div>
							<input type="text" class="form-control shadow-none" id="findjobs" placeholder="find jobs" name="findjobs">
						</div>
					
				</div>
				<div class="col mt-4">
					<button type="submit" class="btn btn-outline-success mr-1">Submit</button>
				</div>
				</form>
			</div>
			<form>
				<div class="row form-group mb-4">
					<div class="col ml-2">
						<label>Budget</label>
						<select class="form-control" id="budget" name="budget">
							<option value="">Select an option</option>
							<option value="N15,000 - 30,000">micro-project (N15,000 to N30,000)</option>
							<option value="N30,000 - 50,000">simple-project (N30,000 to N50,000)</option>
							<option value="N50,000 - 75,000">very small-project (N50,000 to N75,000)</option>
							<option value="N75,000 - 100,000">medium-project (N75,000 to N100,000)</option>
							<option value="N100,000 - 250,000">large-project (N100,000 to N250,000)</option>
							<option value="N250,000 - 1M">very large-project (N250,000 to N1,000,000)</option>
							<option value="N1,000,000+">major-project (N1,000,000+)</option>
						</select>
					</div>
					<div class="col">
						<label>Project Length</label>
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
					<div class="col mr-2">
						<label>Category</label>
						<select class="form-control" id="category" name="category">
							<option value="">Select an option</option>
							<option value="1">Web development</option>
							<option value="2">Web design</option>
							<option value="3">Mobile App development</option>
							<option value="4">Game development</option>
							<option value="5">Software development</option>
							<option value="6">Logo design</option>
						</select>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col" id="myjob">
					
				</div>
			</div>
			<!-- Pagination -->
			<nav aria-label="Page navigation example">
				<ul class="pagination d-flex justify-content-center mt-3">
					<li class="page-item"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</nav>
		</div>
		<!-- footer -->
		<?php include('footer.php'); ?>
		
		