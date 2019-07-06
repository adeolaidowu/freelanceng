<?php include('navbaradmin.php'); ?>
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
							<a class="nav-item nav-link activecust control" href="#"><i class="fas fa-chart-line mr-1"></i>Dashboard</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="adminusers.php"><i class="fa fa-users mr-1" title="email verification"></i>Users</a>
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
					<div class="row mb-5">
						<div class="col box btn btn-success mx-5">
							<h3>5000 registered users</h3>
						</div>
						<div class="col box btn btn-danger mx-5">
							<h3>2300 users online</h3>
						</div>
						<div class="col box btn btn-warning">
							<h3>3800 Jobs Posted</h3>
						</div>
					</div>
					<div class="row">
						<div class="col box btn btn-dark mx-5">
							<h3>Total Profit</h3>
						</div>
						<div class="col box btn btn-primary mx-5">
							<h3>991 New Users</h3>
						</div>
						<div class="col box btn btn-secondary">
							<h3>770 Active Projects</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
		<!-- jquery -->
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.0.js"></script>
		<!-- popper -->
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<!-- Bootstrap JS>-->
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>