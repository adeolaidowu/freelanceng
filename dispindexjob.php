<?php 
//var_dump($_POST);

include_once('classes.php');
$jobobj = new Job;

if(isset($_POST['budget']) && isset($_POST['deliverytime'])){
	$jobs = $jobobj->getJob3($_POST['budget'],$_POST['deliverytime']);
}elseif(isset($_POST['budget'])){
	$jobs = $jobobj->getJobIndex1($_POST['budget']);
}elseif(isset($_POST['deliverytime'])){
	$jobs = $jobobj->getJobIndex2($_POST['deliverytime']);
	//var_dump($_POST);
}else{
	$jobs = $jobobj->getIndexJob();
}
//var_dump($jobs)
 ?>
 <?php 
if(isset($jobs)){
	foreach ($jobs as $key => $value) {
		
	
  ?>
  <div class="list-group">
	<a href="signup.php" class="list-group-item list-group-item-action">
  	<div class="d-flex w-100 justify-content-between">
		<h4 class="mb-3"><?php echo $value['projectname']; ?></h4>
		<small>Posted on <?php echo date('dS, F Y', strtotime($value['posted_at'])); ?></small>
	</div>
	<p class="mb-1"><?php echo $value['details']; ?></p>
	<div class="d-flex w-100 justify-content-between">
		<small class="d-flex align-items-center"><?php echo "Budget: ".$value['budget']; ?></small>
	</div>
	<small><?php echo "Expected Time of Delivery: ".$value['expectedDuration']; ?></small>
	</a>
</div>

  <?php
  };
   };
  ?>