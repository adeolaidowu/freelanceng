
		
		<?php 
		$pagetitle = "Login";
		include('navbar.php');
			include('classes.php');
			$login_err = array();
		// check for server request method
		//if(isset($_POST['submit'])) {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $_POST['email'];
			$password = $_POST['pswd'];

			//check if email field is empty
			if(empty($email)){
				$login_err['email'] = "<div class='text text-danger'>Your email is required</div>";
			// validation of email
			} elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$login_err['email'] = "<div class='text text-danger'>You need to enter a valid email</div>";
			}
			//check if password field is empty
			if(empty($password)){
				$login_err['pswd'] = "<div class='text text-danger'>Your password is required</div>";
			}elseif(strlen($password) < 7) {
				$login_err['pswd'] = "<div class='text text-danger'>Your password is less the 7 characters</div>";
			}
			//check if email and password are valid
			if(empty($login_err)) {
				$userobj = new User;
				$user = $userobj->login($email,$password);
			}
			
		}	

			
			

		 ?>

		<div class="container">
			<div class="row">
				<div class="col offset-2">
					<div class="card bg-light mt-5 w-75" >
						<?php 
						if(isset($user)){
							echo $user;
						}
					 ?>
						<h5 class="card-header">Sign in to FreelanceNG</h5>
						<div class="card-body">
							<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="login_form">
								<div class="form-group row">
									<div class="col">
										<span id="errormsg"></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="text" class="col-md-2 col-form-label">Email</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="email" placeholder="Email" id="email" value="<?php 
											if(isset($_POST['email'])){
												echo $_POST['email'];
											}
										 ?>">
										<?php 
											if(isset($login_err['email'])){
												echo $login_err['email'];
											}
										 ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="pswd" class="col-md-2 col-form-label">Password</label>
									<div class="col-md-10">
										<input type="password" class="form-control" name="pswd" placeholder="Password" id="password">
										<?php 
										if(isset($login_err['pswd'])) {
											echo $login_err['pswd'];
										}
									 ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
									</div>
									<div class="col-md">
										<button type="submit" class="btn btn-success" name="submit">Sign in</button>
									</div>
									<div class="col-md-2">
									</div>
								</div>
							</form>
							<small class="text-muted">
							New to FreelanceNG? <a href="signup.php">Join now</a>.
							</small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<?php include('footer.php'); ?>
		<!-- <script type="text/javascript">
			$(document).ready(function(){
				$('form').submit(function(f) {
					var email = $('#email').val();
					var password = $('#password').val();
					if(email == "" || password == "") {
						$('#errormsg').html("You need to provide your email and password to log in");
						$('#errormsg').css('color','red');
						f.preventDefault();
					}
				});
			});
		</script> -->