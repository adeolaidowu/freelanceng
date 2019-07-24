
		<?php 
		$pagetitle = "FreelanceNG";
		include_once('navbar.php');
		 ?>
		<!-- Top Section -->
		<div class="container-fluid" >
			<div class="row">
				<div class="col" id="intro">
					<div class="bd-example">
						<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
							
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="images/img7.jpg" class="d-block w-100 carousel-img" alt="carouselimage">
									
									<div class="carousel-caption d-md-block h-75 animated fadeInUp">
										<h1>Hire Freelancers</h1>
										<p>Get your work done by talented freelancers</p>
									</div>
								</div>
								<div class="carousel-item">
									<img src="images/img7.jpg" class="d-block w-100 carousel-img" alt="carouselimage">
									<div class="carousel-caption d-md-block h-75">
										<h1>Post your project for free</h1>
										<p>Get the best talents to deliver for you</p>
									</div>
								</div>
							</div>

						</div>
						<div class="input-group mb-3 col-sm-6 mx-auto carousel-search" style="position: relative; bottom:200px;z-index: 1;">
						  <input type="text" class="form-control w-50 mx-auto" placeholder="Search Jobs" aria-label="" aria-describedby="indexsearch" id="indexform" name="indexform">
						  <div class="input-group-append">
						    <a class="btn btn-success" type="submit" href="indexjobs.php">Search</a>
						  </div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- How it works -->
		<section class="how_it_works" style="margin-top: -10px;">
			<div class="container">
				
				<div class="row">
					<div class="col mb-3">
						<h2 style="font-size:2rem;" id="how_it_works">How it works</h2>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<i class="fas fa-tasks" style="font-size: 5em;color:#498467;"></i>
						<h3>Post a job</h3>
						<p>Tell us about your project. You'll begin to receive bids from freelancers around the country within a few minutes of posting.You can also choose to apply to Jobs and work as a freelancer</p>
					</div>
					<div class="col-md">
						<i class="fas fa-users" style="font-size: 5em;color:#498467;"></i>
						<h3>Hire a freelancer</h3>
						<p>Receive bids from freelancers. Compare bids, get freelancer contact details to hash out specific project details. Hire freelancer</p>
					</div>
					<div class="col-md">
						<i class="fas fa-money-bill-alt" style="font-size: 5em;color:#498467;"></i>
						<h3>Payment</h3>
						<p>Only pay when you are 100% satisfied with the job. Payments are made outside the platform and is based on the amount the freelancer quotes in his bid proposal</p>
					</div>
				</div>
			</div>
		</section>
		<!-- call to action -->
		<section class="cta">
			<h3>Let us help make your dream a reality</h3>
			<p>Find freelancers with the skills your project requires</p>
			<a class="btn btn-lg btn-dark shadow-none" href="signup.php">Get Started</a>
		</section>
		<!-- Services -->
		<div class="container">
			<section class="services">
				<div class="row">
					<div class="col">
						<h2 style="font-size:2rem;">COLLECTIONS</h2>
						<hr>
						<p>Choose from our services</p>
					</div>
				</div>
				<div class="row" style="text-align: center;">
					<div class="col-md">
						<div class="card" style="width: 18rem;">
							<img src="images/pet.jpg" class="card-img-top" alt="cat_pic">
							<div class="card-body">
								<h5 class="card-title"><a href="#">ILLUSTRATE YOUR PET</a></h5>
								<p class="card-text">Pet | Caricature | Photoshop</p>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card" style="width: 18rem;">
							<img src="images/game.jpg" class="card-img-top" alt="game_dev">
							<div class="card-body">
								<h5 class="card-title"><a href="#">DEVELOP YOUR GAME</a></h5>
								<p class="card-text">Game Illustration | C++ | Python</p>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card" style="width: 18rem;">
							<img src="images/logo.jpg" class="card-img-top" alt="logo_design">
							<div class="card-body">
								<h5 class="card-title"><a href="#">HIRE A LOGO DESIGNER</a></h5>
								<p class="card-text">Logo | Business Cards | Illustrator</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="categories">
				<div class="row">
					<div class="col" id="categories">
						<h2 style="font-size:2rem;">Browse Top Job Categories</h2>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-lg col-sm-6 categories_list">
						<ul>
							<li><a href="" class="categories_link">HTML</a></li>
							<li><a href="indexjobs.php?keyword=<?php echo "css"; ?>" class="categories_link">CSS</a></li>
							<li><a href="indexjobs.php" class="categories_link">Photoshop</a></li>
							<li><a href="#" class="categories_link">Web Design</a></li>
							<li><a href="#" class="categories_link">Mobile App Development</a></li>
							<li><a href="#" class="categories_link">Desktop Application</a></li>
							<li><a href="#" class="categories_link">Javascript</a></li>
							<li><a href="#" class="categories_link">React.js</a></li>
							<li><a href="#" class="categories_link">OOP</a></li>
							<li><a href="#" class="categories_link">NoSQL</a></li>
						</ul>
					</div>
					<div class="col-lg col-sm-6 categories_list">
						<ul>
							<li><a href="#" class="categories_link">Jquery</a></li>
							<li><a href="#" class="categories_link">React Native</a></li>
							<li><a href="indexjobs.php?keyword=<?php echo "python"; ?>" class="categories_link">Python</a></li>
							<li><a href="#" class="categories_link">Logo Design</a></li>
							<li><a href="#" class="categories_link">Web Development</a></li>
							<li><a href="#" class="categories_link">Game Development</a></li>
							<li><a href="#" class="categories_link">PHP</a></li>
							<li><a href="#" class="categories_link">Flutter</a></li>
							<li><a href="#" class="categories_link">MongoDB</a></li>
							<li><a href="#" class="categories_link">Node.js</a></li>
						</ul>
					</div>
					<div class="col-lg col-sm-6 categories_list bottom-cat">
						<ul>
							<li><a href="#" class="categories_link">C++ Programming</a></li>
							<li><a href="#" class="categories_link">HTML5</a></li>
							<li><a href="#" class="categories_link">Adobe Illustrator</a></li>
							<li><a href="#" class="categories_link">C# Programming</a></li>
							<li><a href="#" class="categories_link">Graphic Design</a></li>
							<li><a href="#" class="categories_link">Software Development</a></li>
							<li><a href="#" class="categories_link">MySQL</a></li>
							<li><a href="#" class="categories_link">SEO</a></li>
							<li><a href="#" class="categories_link">AWS</a></li>
							<li><a href="#" class="categories_link">Blockchain</a></li>
						</ul>
					</div>
					<div class="col-lg col-sm-6 categories_list bottom-cat">
						<ul>
							<li><a href="#" class="categories_link">Wordpress</a></li>
							<li><a href="#" class="categories_link">Banner Design</a></li>
							<li><a href="#" class="categories_link">Heroku</a></li>
							<li><a href="#" class="categories_link">Ecommerce</a></li>
							<li><a href="#" class="categories_link">Java</a></li>
							<li><a href="#" class="categories_link">Android Apps</a></li>
							<li><a href="#" class="categories_link">Iphone Apps</a></li>
							<li><a href="#" class="categories_link">Angular.js</a></li>
							<li><a href="#" class="categories_link">NumPy</a></li>
							<li><a href="#" class="categories_link">R</a></li>
						</ul>
					</div>
				</div>
			</section>
		</div>
		<!-- footer -->
		<?php include('footer.php'); ?>