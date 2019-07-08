<?php 
	include_once('classes.php');
	//capture data sent from jquery load method using POST global variable
	//var_dump($_POST);
	$keyword = $_POST['keyword'];
	$jobobj = new Job;
	if(empty($keyword)){
		$jobs = $jobobj->getIndexJob();
	}else{
		$jobs = $jobobj->findJobIndex($keyword);
	}
	
 ?>

 <?php 
if(isset($jobs)){
	foreach ($jobs as $key => $value) {
		
	
  ?>
  <div class="list-group">
	<a href="#" class="list-group-item list-group-item-action">
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