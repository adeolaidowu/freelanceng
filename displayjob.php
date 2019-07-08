<?php 
//var_dump($_POST);
session_start();
include_once('classes.php');
$jobobj = new Job;

if(isset($_POST['budget']) && isset($_POST['deliverytime'])){
	$jobs = $jobobj->getJob3($_POST['budget'],$_POST['deliverytime'],$_SESSION['userid']);
}elseif(isset($_POST['budget'])){
	$jobs = $jobobj->getJob1($_POST['budget'],$_SESSION['userid']);
}elseif(isset($_POST['deliverytime'])){
	$jobs = $jobobj->getJob2($_POST['deliverytime'],$_SESSION['userid']);
	//var_dump($_POST);
}else{
	$jobs = $jobobj->getJobInfo($_SESSION['userid']);
}
//var_dump($jobs)
 ?>
 <?php 
if(isset($jobs)){
	foreach ($jobs as $key => $value) {
		
	
  ?>
  <div class="list-group">
	<a href="jobpage.php?id=<?php echo $value['jobId']; ?>&name=<?php echo $value['projectname']; ?>&details=<?php echo $value['details']; ?>&budget=<?php echo $value['budget']; ?>&duration=<?php echo $value['expectedDuration'] ?>&reqskills=<?php echo $value['reqskills']; ?>" class="list-group-item list-group-item-action">
  	<div class="d-flex w-100 justify-content-between">
		<h4 class="mb-3"><?php echo $value['projectname']; ?></h4>
		<small>Posted on <?php echo date('dS, F Y', strtotime($value['posted_at'])); ?></small>
	</div>
	<p class="mb-1"><?php echo substr($value['details'],0,80); ?>...</p>
	<div class="d-flex w-100 justify-content-between">
		<small class="d-flex align-items-center"><?php echo "Budget: ".$value['budget']; ?></small>
		<button class="btn btn-success btn-sm">View Details</button>
	</div>
	<small><?php echo "Expected Time of Delivery: ".$value['expectedDuration']; ?></small>
	</a>
</div>

  <?php
  };
   };
  ?>