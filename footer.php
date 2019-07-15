<!-- footer -->
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col footer_content">
						<p style="border-bottom: 1px solid white;"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm footer_list">
						<ul>
							<li>Freelance<span class="logo">NG</span></li>
							<li><a href="#">Categories</a></li>
							<li><a href="#">Projects</a></li>
							<li><a href="#">Freelancers</a></li>
							<li><a href="indexjobs.php">Local Jobs</a></li>
						</ul>
					</div>
					<div class="col-sm footer_list">
						<ul>
							<li>About</li>
							<li><a href="#how_it_works">How it works</a></li>
							<li><a href="#">Security</a></li>
							<li><a href="#">Terms of service</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Fees and charges</a></li>
						</ul>
					</div>
					<div class="col-sm footer_list">
						<ul>
							<li>Browse</li>
							<li><a href="#">Freelancer by skill</a></li>
							<li><a href="#">Jobs in Nigeria</a></li>
							<li><a href="#">Find jobs</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<p style="border-bottom: 1px solid white;"></p>
						<span style="color: white; margin-right: 30px;">Follow us</span>
						<i class="fab fa-facebook" style="font-size: 1.5em;"></i>
						<i class="fab fa-twitter mx-3" style="font-size: 1.5em;"></i>
						<i class="fab fa-instagram" style="font-size: 1.5em;"></i>
						<i class="fab fa-linkedin-in mx-3" style="font-size: 1.5em;"></i>
						<p style="border-top: 1px solid white;"></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col d-flex justify-content-center">
					<p style="font-size: 14px;">&copy; <?php echo date('Y'); ?> FreelanceNG All rights reserved</p>
				</div>
			</div>
		</section>
		<!-- jquery -->
		<script type="text/javascript"src="bootstrap/js/jquery-3.4.0.js"></script>
		<!-- popper -->
		<script type="text/javascript"src="bootstrap/js/popper.min.js"></script>
		<!-- Bootstrap JS>-->
		<script type="text/javascript"src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#change').click(function(){
					if($(this).html() == 'View employer details'){
						$('#employerinfo').show();
						$('.freelancer').hide();
						$(this).html('View freelancer details');
					}else{
						$('.freelancer').show();
						$('#employerinfo').hide();
						$(this).html('View employer details');
					}
				});
				
				$('#freelance').click(function(){
					$('.msg').html('You should edit and update your profile for full benefits of the freelancer account');
				});
				// $('#post').click(function(){
				// 	var projectname = $('#projectname').val();
				// 	var projectdetails = $('#projectdetails').val();
				// 	var reqskills = $('#reqskills').val();
				// 	var timeofdelivery = $('#projectdelivery').val();
				// 	var budget = $('#budget').val();
				// 	var paymentmethod = $('#paymentmethod').val();
				// $.ajax({
				// 	type: "POST",
				// 	url: "displayjob.php",
				// 	data: "projectname=" + projectname + "&details=" + projectdetails + "&skills=" + reqskills + "&deliverytime=" + timeofdelivery + "&budget=" + budget + "&paymentmethod=" + paymentmethod
				// 	});
				// });
				//to enable the page get the information from displayjob.php and display it inside myjob id
				$.ajax({
					type: "GET",
					url: "displayjob.php",
					data: "",
					success: function(response){
						console.log(response);
						$('#myjob').html(response);
						}
					});
				//to display jobs without being able to apply(index)
				$.ajax({
					type: "GET",
					url: "dispindexjob.php",
					data: "",
					success: function(response){
						console.log(response);
						$('#indexjob').html(response);
						}
					});//display jobs when we choose/change budget(outside the app/without signing in)
				$('#budget').change(function(){
					var budget = $(this).val();
					//send the parameters to displaydevpro.php using $.ajax method
					$.ajax({
						type: "POST",
						url: "dispindexjob.php",
						data: "budget=" + budget,
						success: function(response){
							$('#indexjob').html(response);
						}
					});
				});
				//display jobs with respect to delivery time outside the app/without signing in
				$('#projectdelivery').change(function(){
					var deliverytime = $(this).val();
					//send the parameters to displaydevpro.php using $.ajax method
					$.ajax({
						type: "POST",
						url: "dispindexjob.php",
						data: "deliverytime=" + deliverytime,
						success: function(response){
							$('#indexjob').html(response);
						}
					});
				});

				//to asynchronously display jobs as user types on index page without signin in
				$('#findjobsindx').keyup(function(){
					//declare variable(s) to be sent from this page
					//alert('keyup working');
					var keyword = $(this).val();
					// send the variable/paramenter to another page(search.php) for async using jquery load
					$('#indexjob').load('search3.php',{keyword: keyword});
				});
				//search for jobs from index page
				$('#indexsearch').click(function(){
					//declare variable(s) to be sent from this page
					//alert('keyup working');
					var keyword = $('#indexform').val();
					// send the variable/paramenter to another page(search.php) for async using jquery load
					$('#indexjob').load('search4.php',{keyword: keyword});
				});
				//display jobs when we choose/change budget
				$('#budget').change(function(){
					var budget = $(this).val();
					//send the parameters to displaydevpro.php using $.ajax method
					$.ajax({
						type: "POST",
						url: "displayjob.php",
						data: "budget=" + budget,
						success: function(response){
							$('#myjob').html(response);
						}
					});
				});
				//display jobs with respect to delivery time chosen by user
				$('#projectdelivery').change(function(){
					var deliverytime = $(this).val();
					//send the parameters to displaydevpro.php using $.ajax method
					$.ajax({
						type: "POST",
						url: "displayjob.php",
						data: "deliverytime=" + deliverytime,
						success: function(response){
							$('#myjob').html(response);
						}
					});
				});
				//display jobs when we choose/change budget inside myjobs
				$('#budget').change(function(){
					var budget = $(this).val();
					//send the parameters to displaydevpro.php using $.ajax method
					$.ajax({
						type: "POST",
						url: "displaymyjob.php",
						data: "budget=" + budget,
						success: function(response){
							$('#mypostedjobs').html(response);
						}
					});
				});
				//display jobs with respect to delivery time chosen by specific user to filter through their posted jobs
				$('#projectdelivery').change(function(){
					var deliverytime = $(this).val();
					//send the parameters to displaydevpro.php using $.ajax method
					$.ajax({
						type: "POST",
						url: "displaymyjob.php",
						data: "deliverytime=" + deliverytime,
						success: function(response){
							$('#mypostedjobs').html(response);
						}
					});
				});
				//to asynchronously display jobs as user types
				$('#findjobs').keyup(function(){
					//declare variable(s) to be sent from this page
					//alert('keyup working');
					var keyword = $(this).val();
					// send the variable/paramenter to another page(search.php) for async using jquery load
					$('#myjob').load('search.php',{keyword: keyword});
				});
				//to asynchronously display jobs when a user searches for their posted jobs
				$('#findmyjobs').keyup(function(){
					//declare variable to be sent to the page that will work async
					var keyword = $(this).val();
					$('#mypostedjobs').load('search2.php', {keyword: keyword});
				});
				//to enable the page get the information from displaymyjob.php and display it inside myjob id
				$.ajax({
					type: "GET",
					url: "displaymyjob.php",
					data: "",
					success: function(response){
						console.log(response);
						$('#mypostedjobs').html(response);
						}
					});
				//to enable the page get the information from gettotaljobs.php and display it inside myjob id
				$.ajax({
					type: "GET",
					url: "gettotaljobs.php",
					data: "",
					success: function(response){
						console.log(response);
						$('#totaljobs').html(response);
						}
					});
				//script to make intro hide when profile has been updated/edited
				$('#editprof').click(function(){
					$('.intro').hide();
				});
			});
		</script>
	</body>
</html>