<?php 
include_once('navbarprof.php');
include_once('classes.php');
$jobobj = new Job;
$mybid = $jobobj->sentBids($_SESSION['userid']);
// var_dump($_SESSION['userid']);
//var_dump($mybid);
	
 ?>
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark profile-nav shadow p-3 mb-5 bg-dark mynav">
			<a class="navbar-brand offset-1 mynav" href="profile.php">MY PROFILE</a>
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="joblistings.php">All Jobs</a>
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row mt-5">
				<div class="col-md">
					<table class="table table-bordered table-default table-striped">
						<thead>
							<th>S/N</th>
							<th>Job Name</th>
							<th>Job Description</th>
							<th>My Proposal</th>
							<th>My Fee</th>
							<th>Expected Time of Delivery</th>
							<th>Proposed Time of Delivery</th>
							<th>Status</th>
							<th>Application Date</th>
						</thead>
						<tbody>
					<?php 
					if(count($mybid) == 0){
						echo"<tr><td colspan ='9'>You have not applied to any jobs<td></tr>";
					}
					$serial=1;
					foreach ($mybid as $key => $value){ 
					?>
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $value['projectname']; ?></td>
								<td><?php echo substr($value['details'], 0,20); ?>....</td>
								<td><?php echo substr($value['bidDescription'], 0,20); ?>....</td>
								<td>&#8358;<?php echo number_format($value['fee'],2); ?></td>
								<td><?php echo $value['expectedDuration']; ?></td>
								<td><?php echo $value['deliveryTime']; ?></td>
								<td>
								<?php 
									if(isset($value['bidStatus'])){
										echo $value['bidStatus'];
									}
								 ?>								 	
								 </td>
								<td><?php echo date('jS,F Y',strtotime($value['bid_date'])); ?><br><a href="viewbid.php?jobid=<?php echo $value['jobId']; ?>">View More</a></td>
							</tr>
					<?php $serial++;} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>