<?php 
include_once('navbarprof.php');
include_once('classes.php');
$jobobj = new Job;
$mybid = $jobobj->receivedBids($_SESSION['userid']);
// var_dump($_SESSION['userid']);
 //var_dump($mybid);
	
 ?>
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow p-3 mb-5 bg-dark">
	<a class="navbar-brand offset-1" href="profile.php">MY PROFILE</a>
	<div class="navbar-nav">
		<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
	</div>
</nav>
<div class="container-fluid">
	<?php
	if(isset($_GET['msg'])){
		echo "<div class=\"alert alert-success alert-dismissible\">".$_GET['msg']."<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;
				  </button>
				</div>";
	}
		
	 ?>
		<h2 style="text-align: center;" class="manage-bids">Manage Bids</h2>
		<hr>
	<div class="row mt-5">
		<div class="col-md-12">
			<table class="table table-bordered table-default table-striped">
				<thead>
					<th>S/N</th>
					<th>Job Name</th>
					<th>Job Description</th>
					<th>Applicant Name</th>
					<th>Applicant Proposal</th>
					<th>Applicant Fee</th>
					<th>Proposed Time of Delivery</th>
					<th>Status</th>
					<th>Application Date</th>
				</thead>
				<tbody>
			<?php
			if(count($mybid) == 0){
				echo "<tr><td colspan ='9'>You have not applied to any jobs<td></tr>";
			}else{
			$serial=1;
			foreach ($mybid as $key => $value){ 
			?>
					<tr>
						<td><?php echo $serial; ?></td>
						<td><?php echo $value['job_name']; ?></td>
						<td><?php echo substr($value['job_desc'], 0,20); ?>....</td>
						<td><?php echo $value['firstName']." ".$value['lastName']; ?></td>
						<td><?php echo substr($value['bidDescription'], 0,20); ?>....</td>
						<td>&#8358;<?php echo number_format($value['fee'],2); ?></td>
						<td><?php echo $value['deliveryTime']; ?></td>
						<td></td>
						<td><?php echo date('jS,F Y',strtotime($value['bid_date'])); ?><br><a href="biddetails.php?appid=<?php echo $value['freelancerId']; ?>&jobid=<?php echo $value['jobId']; ?>">View More</a></td>
					</tr>
			<?php $serial++;}} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- jquery -->
<script type="text/javascript"src="bootstrap/js/jquery-3.4.0.js"></script>
<!-- popper -->
<script type="text/javascript"src="bootstrap/js/popper.min.js"></script>
<!-- Bootstrap JS>-->
<script type="text/javascript"src="bootstrap/js/bootstrap.js"></script>