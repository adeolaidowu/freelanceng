
		<?php
		$pagetitle = "Sign up";
		include('navbar.php'); 
				include('classes.php');			
				$reg_error = array();
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				//sanitize input(potential malicious code) from user and store in variable
				$fname = User::sanitize($_POST['fname']);
				$lname = User::sanitize($_POST['lname']);
				$phone = User::sanitize($_POST['phone']);
				$email = User::sanitize($_POST['email']);
				$pswd = User::sanitize($_POST['password']);
				$cpswd = User::sanitize($_POST['cpassword']);
				$gender = $_POST['gender'];
				//var_dump($_POST);
				//test and validate form input fields
				if(empty($fname)){
					$reg_error['fname'] = "<div class='text text-danger'>You need to fill out your first name</div>";
				}
				if(empty($lname)){
					$reg_error['lname'] = "<div class='text text-danger'>You need to fill out your last name</div>";
				}
				if(empty($phone)){
					$reg_error['phone'] = "<div class='text text-danger'>Your phone number is required</div>";
				}
				if(empty($email)){
					$reg_error['email'] = "<div class='text text-danger'>You need to fill out your email address</div>";
				}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$reg_error['email'] = "<div class='text text-danger'>Invalid email address</div>";
				}
				if(empty($pswd) || empty($cpswd)){
					$reg_error['pswd'] = "<div class='text text-danger'>You have to fill out both password fields</div>";
				} elseif(strlen($pswd) < 7){
					$reg_error['pswd'] = "<div class='text text-danger'>Your password should be 7 characters or more</div>";
				} elseif($pswd !== $cpswd){
					$reg_error['pswd'] = "<div class='text text-danger'>Both passwords must be the same</div>";
				}if(empty($gender)){
					$reg_error['gender'] = "<div class='text text-danger'>You must select your gender</div>";
				}
				//create account after form validation
				$reg_error_count = count($reg_error);
				if($reg_error_count == 0){
					$userobj = new User;
					$newuser = $userobj->register($fname,$lname,$phone,$email,$pswd,$gender);
				}

			} 		


		?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 mt-4">
					<div class="card bg-light mb-3 w-100" >
						<h4 class="card-header">Create your account</h4>
						<div class="card-body">
							<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="signup_form">
								<div class="row">
									<div class="col d-flex justify-content-center">
									<p id="errormsg"></p>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="fname">First Name</label>
										<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" autocomplete="on" value="<?php 
											if(isset($_POST['fname'])) {
												echo $_POST['fname'];
											}
										 ?>">
										<?php 
											if(isset($reg_error['fname'])){
												echo $reg_error['fname'];
											}
										 ?>	
									</div>
									<div class="form-group col-md-6">
										<label for="lname">Last Name</label>
										<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" autocomplete="on" value="<?php 
											if(isset($_POST['lname'])) {
												echo $_POST['lname'];
											}
										 ?>">
										<?php 
											if(isset($reg_error['lname'])){
												echo $reg_error['lname'];
												} 
											?>
									</div>
									<div class="form-group col-md-6">
										<label for="phone">Phone</label>
										<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php 
											if(isset($_POST['phone'])) {
												echo $_POST['phone'];
											}
										 ?>">
										<?php 
											if(isset($reg_error['phone'])){
											echo $reg_error['phone'];
											} 
										?>
									</div>
									<div class="form-group col-md-6">
										<label for="email">Email</label>
										<input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="on" value="<?php 
											if(isset($_POST['email'])) {
												echo $_POST['email'];
											}
										 ?>">
										<?php 
											if(isset($reg_error['email'])){
											echo $reg_error['email'];
											} 
										?>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword">Password</label> <small>(must be 7 characters or more)</small>
									<input type="password" class="form-control pwd" name="password" id="inputPassword" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="inputPassword1">Confirm Password</label>
									<input type="password" class="form-control pwd" name="cpassword" id="inputPassword1" placeholder="Confirm Password">
									<?php 
										if(isset($reg_error['pswd'])){
											echo $reg_error['pswd'];
										} 
									?>
									<input type="checkbox" name="show" class="show">
									<label for="show">Show password</label>
								</div>
								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-3 pt-0">Gender</legend>
										<div class="col-sm-9">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gender"  value="male" checked <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male'){echo "checked";} ?>>
												<label class="form-check-label" for="male">
													Male
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female'){echo "checked";} ?>>
												<label class="form-check-label" for="female">
													Female
												</label>
											</div>
											<?php 
												if(isset($reg_error['gender'])) {
													echo $reg_error['gender'];
												} 
											?>
										</div>
									</div>
								</fieldset>
								<button type="submit" class="btn btn-success" id="signup">Sign up</button>
								<span>Have an account? Sign in <a href="login.php">here</a> </span>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 mt-5">
					<div>
						<h5>Welcome to FreelanceNG</h5>
						<p>Create an account - it's simple and free!</p>
					</div>
					<div>
						<h5>Work without limits</h5>
						<p>We don't limit the number of freelancers you can hire or jobs you can have</p>
					</div>
					<div>
						<h5>Easily make payments</h5>
						<p>Use our secure payment partner to seamlessly make and receive payment</p>
					</div>
				</div>
			</div>
		</div>

		<!--footer-->
		<?php include('footer.php'); ?>
		<!-- <script type="text/javascript">
			$(document).ready(function(){
				// function to validate form input
				$('form').submit(function(f){
					var firstName = $('#fname').val();
					var lastName = $('#lname').val();
					var phone = $('#phone').val();
					var email = $('#email').val();
					var password = $('#inputPassword').val();
					var password1 = $('#inputPassword1').val();
					if(password !== password1) {
						$('#errormsg').html('Type in the same password in both fields');
						$('#errormsg').css('color','red');
						$('#inputPassword').css('border','1px solid red');
						$('#inputPassword1').css('border','1px solid red');
						f.preventDefault();
					}else if(firstName == "" || lastName == "" || phone == "" || email == "" || password == "" || password1 == "") {
						$('#errormsg').html('You need to fill out all fields to proceed*');
						$('#errormsg').css('color','red');
						f.preventDefault();
					}else {
						alert('Sign up completed. Kindly verify your email by clicking the link sent to you');
					}
				});
				$('.show').click(function(){
					if($('.pwd').attr('type') == 'password') {
						$('.pwd').attr('type','text');
					} else {
						$('.pwd').attr('type','password');
					}
				});
			});
		</script> -->
	</body>
</html>