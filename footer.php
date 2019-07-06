<!-- footer -->
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col footer_content">
						<p style="border-bottom: 1px solid white;"></p>
					</div>
				</div>
				<div class="row">
					<div class="col footer_list">
						<ul>
							<li>Freelance<span class="logo">NG</span></li>
							<li><a href="#">Categories</a></li>
							<li><a href="#">Projects</a></li>
							<li><a href="#">Freelancers</a></li>
							<li><a href="#">Local Jobs</a></li>
						</ul>
					</div>
					<div class="col footer_list">
						<ul>
							<li>About</li>
							<li><a href="#">How it works</a></li>
							<li><a href="#">Security</a></li>
							<li><a href="#">Terms of service</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Fees and charges</a></li>
						</ul>
					</div>
					<div class="col footer_list">
						<ul>
							<li>Browse</li>
							<li><a href="#">Freelancer by skill</a></li>
							<li><a href="#">Jobs in Nigeria</a></li>
							<li><a href="#">Find jobs</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col">
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
					if($(this).html() == 'View employer profile'){
						$('#employerinfo').show();
						$('.freelancer').hide();
						$(this).html('View freelancer profile');
					}else{
						$('.freelancer').show();
						$('#employerinfo').hide();
						$(this).html('View employer profile');
					}
				});
			});
		</script>
	</body>
</html>