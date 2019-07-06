<!-- Navbar -->
<?php include('navbaradmin.php') ?>
		<!-- admin control panel -->
		<div class="container mt-5">
			<div class="row">
				<div class="col-4 jumbotron">
					<div class="row">
						<div class="col">
							<i class="fas fa-user-circle" style="font-size: 7em; color: grey;"></i>
							<button type="button" class="btn btn-outline-success my-2">Upload photo</button>
						</div>
						<div class="col">
							<span>Admin</span>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="admindash.php"><i class="fas fa-chart-line mr-1"></i>Dashboard</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link activecust" href="#"><i class="fa fa-users mr-1"></i>Users</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="jobsadmin.php"><i class="fas fa-briefcase mr-1"></i>Jobs</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="#"><i class="fas fa-clock mr-1"></i>Ongoing Jobs</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="#"><i class="fas fa-check mr-1"></i>Completed</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="#"><i class="fas fa-envelope mr-1" title="email verification"></i>Messages</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="#"><i class="fas fa-exclamation-circle mr-1"></i>Reports</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="#"><i class="fa fa-cog mr-1" title="email verification"></i>Settings</a>
						</div>
					</div>
				</div>
				<div class="col-8 ">
					<div class="row">
						<div class="col">
							<label class="sr-only" for="inlineFormInputGroup">Search</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-search"></i></div>
								</div>
								<input type="text" class="form-control" id="inlineFormInputGroup">
							</div>
							<h5>Total Users:</h5>
						</div>
						<div class="col">
							<button type="button" class="btn btn-outline-success">Search</button>
						</div>
					</div>
					<div class="row mt-3 ml-3">
						<div class="col">
							<i class="fas fa-user" style="font-size: 3em; color: grey;"></i>
						</div>
						<div class="col">
							<span>firstname</span>
							<span>@username</span>
						</div>
						<div class="col-4">
							<span>since: date joined</span> <br>
							<span>account status: enabled</span>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success"><i class="far fa-eye mr-1"></i>View</button>
						</div>
						<div class="col">
							<button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Delete</button>
						</div>
					</div>

					<div class="row mt-5 ml-3">
						<div class="col">
							<i class="fas fa-user" style="font-size: 3em; color: grey;"></i>
						</div>
						<div class="col">
							<span>firstname</span>
							<span>@username</span>
						</div>
						<div class="col-4">
							<span>since: date joined</span> <br>
							<span>account status: enabled</span>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success"><i class="far fa-eye mr-1"></i>View</button>
						</div>
						<div class="col">
							<button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Delete</button>
						</div>
					</div>
					<div class="row mt-5 ml-3">
						<div class="col">
							<i class="fas fa-user" style="font-size: 3em; color: grey;"></i>
						</div>
						<div class="col">
							<span>firstname</span>
							<span>@username</span>
						</div>
						<div class="col-4">
							<span>since: date joined</span> <br>
							<span>account status: enabled</span>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success"><i class="far fa-eye mr-1"></i>View</button>
						</div>
						<div class="col">
							<button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Delete</button>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		<!-- footer -->
		<?php include('footer.php'); ?>
		<!-- jquery -->
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.0.js"></script>
		<!-- popper -->
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<!-- Bootstrap JS>-->
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>