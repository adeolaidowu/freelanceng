
<?php include('navbarprof.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$jobid = $_REQUEST['jobid'];
		var_dump($_POST);
		//instantiate job class
		$jobobj = new Job;
		$output = $jobobj->deleteJob($jobid);
	}

 ?>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<a class="navbar-brand offset-1" href="profile.php">Profile</a>
						<div id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link mr-4" href="myjobs.php">Back<span class="sr-only">(current)</span></a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- Job details form -->
		<div class="container mt-5 w-50">
			<h1>Delete Project, <br> "<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>"?</h1>
			<?php if(isset($output)){
				echo $output;
			} ?>			
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET['jobid']; ?>&name=<?php echo $_GET['name']; ?>" name="deletejobform" style="margin-top: 70px;">
				<div class="form-group row">
					<div class="col">
						<input type="text" class="form-control " name="jobid" value="
						<?php if(isset($_GET['jobid'])){
							echo $_GET['jobid'];
						} ?>" style='display:none;'>
					</div>
				</div>
				<div class="row form-group">
					<div class="col">
						<button type="submit" class="btn btn-outline-danger shadow-none" id="post" >
						Delete
						</button>
					</div>
				</div>
			</form>
		</div>
		
		<?php include_once('footer.php'); ?>