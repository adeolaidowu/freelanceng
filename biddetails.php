<?php include_once('navbarprof.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$status = $_POST['status'];
		$applicantid = $_POST['appid'];
		$jobid = $_POST['jobid'];
		$jobhandler = new Job;
		$updatejob = $jobhandler->updateBid($applicantid,$jobid,$status);
	}

 ?>
<?php 
	$jobobj = new Job;
	$mybid = $jobobj->receivedBids2($_GET['appid'],$_GET['jobid']);
	//var_dump($mybid);
 ?>
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow p-3 mb-5 bg-dark">
	<a class="navbar-brand offset-1" href="profile.php">Job description</a>
	<div class="navbar-nav">
		<a class="nav-item nav-link mr-4" href="profile.php">Profile <span class="sr-only">(current)</span></a>
		<a class="nav-item nav-link" href="receivedbids.php">Back</a>
	</div>
</nav>
<?php 
	foreach ($mybid as $key => $value) {
 ?>
<div class="card">
 <div class="card-body">
    <h5 class="card-title">Project Title: <?php echo $value['job_name']; ?></h5>
    <p class="card-text"><b>Project Details:</b> <?php echo $value['job_desc']; ?>.</p>
    <p class="card-text"><b>Applicant Name:</b> <?php echo $value['firstName']." ".$value['lastName']; ?></p>
    <p class="card-text"><b>Proposal:</b> <?php echo $value['bidDescription']; ?></p>
    <p class="card-text"><b>Applicant Fee:</b> &#8358;<?php echo number_format($value['fee'],2); ?></p>
    <p class="card-text"><b>Applicant Email:</b> <?php echo $value['email']; ?>.</p>
    <p class="card-text"><b>Applicant Phone:</b> <?php echo $value['phone']; ?>.</p>
    <p class="card-text"><b>Date of Delivery:</b> <?php echo $value['deliveryTime']; ?></p>
    <p class="card-text"><b>Date Applied:</b> <?php echo date('jS,F Y',strtotime($value['bid_date'])); ?></p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    	<input type="hidden" name="status" value="Accepted">
    	<input type="hidden" name="appid" value="<?php echo $_GET['appid'] ?>">
    	<input type="hidden" name="jobid" value="<?php echo $_GET['jobid'] ?>">
		<button class="btn btn-success" name="accept_bid">Accept Bid</button>
    </form>
  </div>
</div>
<?php } ?>
<?php include_once('footer.php'); ?>


