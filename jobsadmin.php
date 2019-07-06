<!--Navbar -->
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
							<a class="nav-item nav-link control" href="admindash.php"><i class="fas fa-chart-line mr-1"></i>Dashboard</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link control" href="adminusers.php"><i class="fa fa-users mr-1"></i>Users</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a class="nav-item nav-link activecust control" href="#"><i class="fas fa-briefcase mr-1"></i>Jobs</a>
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
							<h5>Total Jobs:</h5>
						</div>
						<div class="col">
							<button type="button" class="btn btn-outline-success">Search</button>
						</div>
					</div>
					<!-- job rows in admindash -->
					<div class="row mt-2 ml-3">
						<div class="col">
							<div class="list-group mt-2">
								<a href="#" class="list-group-item list-group-item-action">
									<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">List group item heading</h5>
										<small>3 days ago</small>
									</div>
									<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
									<small>Donec id elit non mi porta.</small>
								</a>
							</div>
						</div>
					</div>
					<div class="row mt-2 ml-3">
						<div class="col">
							<div class="list-group mt-2">
								<a href="#" class="list-group-item list-group-item-action">
									<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">List group item heading</h5>
										<small>3 days ago</small>
									</div>
									<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
									<small>Donec id elit non mi porta.</small>
								</a>
							</div>
						</div>
					</div>
					<div class="row mt-2 ml-3">
						<div class="col">
							<div class="list-group mt-2">
								<a href="#" class="list-group-item list-group-item-action">
									<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">List group item heading</h5>
										<small>3 days ago</small>
									</div>
									<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
									<small>Donec id elit non mi porta.</small>
								</a>
							</div>
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