<?php
include_once('classes.php'); 
session_start();
//var_dump($_GET);
//var_dump($_SESSION);
$jobobj = new Job;
$jobs = $jobobj->getMyJobs($_SESSION['userid']);


 ?>
 <?php 
if(isset($jobs)){
	echo count($jobs);
}

  ?>