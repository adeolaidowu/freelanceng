<?php include_once('navbarprof.php'); ?>
<?php 
	$jobobj = new Job;
	$jobs = $jobobj->getJobDetails($_GET['id']);
 ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
	<a class="navbar-brand offset-1 mynav" href="profile.php">Job description</a>
	<div class="navbar-nav">
		<a class="nav-item nav-link" href="profile.php">Profile</a>
		<a class="nav-item nav-link" href="joblistings.php">Back</a>
	</div>
</nav>
<div class="card">
 <div class="card-body">
    <h5 class="card-title">Project Title: <?php echo $_GET['name']; ?></h5>
    <p class="card-text"><b>Project Details:</b> <?php echo $_GET['details']; ?>.</p>
    <p class="card-text"><b>Budget:</b> <?php echo $_GET['budget']; ?></p>
    <p class="card-text"><b>Expected Time of Delivery: </b><?php echo $_GET['duration']; ?></p>
    <p class="card-text"><b>Required skills: </b><?php echo $_GET['reqskills']; ?></p>
    <!-- Button trigger modal -->
<a href="makebid.php?jobid=<?php echo $jobs['jobId']; ?>" class="btn btn-success">
  Apply
</a>
  </div>
</div>
<?php include_once('footer.php'); ?>


