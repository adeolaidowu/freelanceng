<?php
include_once('classes.php'); 
session_start();
$jobobj = new Job;

if(isset($_POST['budget']) && isset($_POST['deliverytime'])){
  $jobs = $jobobj->getMyJob3($_POST['budget'],$_POST['deliverytime'],$_SESSION['userid']);
}elseif(isset($_POST['budget'])){
  $jobs = $jobobj->getMyJob1($_POST['budget'],$_SESSION['userid']);
}elseif(isset($_POST['deliverytime'])){
  $jobs = $jobobj->getMyJob2($_POST['deliverytime'],$_SESSION['userid']);
  //var_dump($_POST);
}else{
  $jobs = $jobobj->getMyJobs($_SESSION['userid']);
}
//var_dump($jobs)
 ?>
 <?php 
if(isset($jobs)){
	foreach ($jobs as $key => $value) {
		
	
  ?>
  <div class="card">
   <div class="card-body">
    <h5 class="card-title"><?php echo $value['projectname']; ?></h5>
    <p class="card-text"><?php echo $value['details']; ?></p>
    <small style="display:block;">Posted on <?php echo date('jS, F Y', strtotime($value['posted_at'])); ?></small>
    <a href="editjob.php?jobid=<?php echo $value['jobId']; ?>&name=<?php echo $value['projectname']; ?>&details=<?php echo $value['details']; ?>&duration=<?php echo $value['expectedDuration']; ?>&budget=<?php echo $value['budget']; ?>&reqskills=<?php echo $value['reqskills']; ?>&payment=<?php echo $value['paymentmethod']; ?>" class="mr-3 badge badge-success">Edit</a><a href="deletejob.php?jobid=<?php echo $value['jobId']; ?>&name=<?php echo $value['projectname']; ?>" class="badge badge-success">Delete</a>
  </div>
 </div>
  

  <?php
  };
   };
  ?>