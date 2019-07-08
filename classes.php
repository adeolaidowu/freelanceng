<?php 
	//create database connection class
class DbConfig{
	// member variables here
	public $dbcon; //this is the database connection handler through which we can connect to database

	//create constructor function to connect to our database immediately upon instantiating of DbConfig class
	//member functions here
	public function __construct(){
		$this->dbcon = new mysqli('localhost','root','','projectdb');
		//in order to test connection
		/*if($this->dbcon->connect_error){
			die('Connect error: ').$this->dbcon->connect_error;
		}else{
			echo "Connection successful";
		}*/

	}

} 


class User{
	//member variables include
	public $dbobj; //this is the DbConfig object handler

	//member methods go below here
	public function __construct(){
		$this->dbobj = new DbConfig;
	}
	// static function to clean out potential malicious code from users
	public static function sanitize($input){
		$input = trim($input);
		$input = htmlspecialchars($input);
		$input = addslashes($input);
		return $input;
	}
	//function to register freelancers on platform upon completion/validation of reg form
	public function register($fname,$lname,$phone,$email,$password,$gender){
		$mypswd = md5($password);
		//query to insert form inputs into our database
		$myquery = "INSERT INTO user(firstName,lastName,password,phone,email,gender) VALUES('$fname','$lname','$mypswd','$phone','$email','$gender')";
		//check if query runs and is valid
		if($this->dbobj->dbcon->query($myquery) == true){
			//in order to get userid incase we need to output it, we'll retrieve it and store in a session variable
			$userid = $this->dbobj->dbcon->insert_id;
			// store some necessary input fields in session
			$_SESSION['userid'] = $userid;
			$_SESSION['firstname'] = $fname;
			$_SESSION['lastname'] = $lname;
			$_SESSION['email'] = $email;
			$msg = "Welcome, As an employer, you do not necessarily need to fill out your profile but should you choose to apply for a job it is recommended that all freelancers fill their profile details to help them land jobs. You can click the edit button to update or complete your profile";
			// Also we want to redirect the new user to his dashboard upon successful registration
			header("Location: http://localhost/freelanceng/completeprofile.php?"."msg=".$msg);
		}else {
			echo "Error ".$this->dbobj->dbcon->error;
		}
	}
	//method to register and redirect employers appropriately
	public function register2($fname,$lname,$phone,$email,$password,$gender,$acctype){
		$mypswd = md5($password);
		//query to insert form inputs into our database
		$myquery = "INSERT INTO user(firstName,lastName,password,phone,email,gender,acc_type) VALUES('$fname','$lname','$mypswd','$phone','$email','$gender','$acctype')";
		//check if query runs and is valid
		if($this->dbobj->dbcon->query($myquery) == true){
			//in order to get userid incase we need to output it, we'll retrieve it and store in a session variable
			$userid = $this->dbobj->dbcon->insert_id;
			// store some necessary input fields in session
			$_SESSION['userid'] = $userid;
			$_SESSION['firstname'] = $fname;
			$_SESSION['lastname'] = $lname;
			$_SESSION['email'] = $email;
			$_SESSION['acctype'] = $acctype;
			//redirect to employerprofile
			$msg = "Welcome, as an employer you dont need to complete your profile but should you decide to also apply for jobs it is recommended to complete your profile to enhance your chances of landing the job. You can find the link to complete your profile in your profile bar";
			header("Location: http://localhost/freelanceng/profile2.php?"."msg=".$msg);
			exit;
			
		}else {
			echo "Error ".$this->dbobj->dbcon->error;
		}
	}

	// function to validate and allow user login
	public function login($email,$password){
		$mypass = md5($password);
		// sql statement to query database 
		$mysql = "SELECT * FROM user WHERE user.email = '$email' AND user.password = '$mypass'";
		//run the query
		$result = $this->dbobj->dbcon->query($mysql);
		// check if the number of rows returned is equal to one
		if($this->dbobj->dbcon->affected_rows == 1){
			$row = $result->fetch_assoc();
			//create session variable
			$_SESSION['userid'] = $row['userId'];
			$_SESSION['firstname'] = $row['firstName'];
			$_SESSION['lastname'] = $row['lastName'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['profilepic'] = $row['photograph'];
			$_SESSION['joindate'] = $row['date_registered'];
				//redirect to freelancer profile
				header("Location: http://localhost/freelanceng/profile.php");
				exit;
		}else {
			//display invalid login details 
			$result = "<div class='alert alert-danger'>Invalid Email address or Password</div>";

			return $result;
		}
	}
	//function to get details from user table
	public function getUserDetails($userid){
		$sql = "SELECT * FROM user WHERE userId = '$userid'";
		if($result = $this->dbobj->dbcon->query($sql)){
			$row = $result->fetch_assoc();
		}else{
			echo "Error: ".$this->dbonj->dbcon->error;
		}
		return $row;
	}

	//create function to upload profile picture
	public function uploadPicture(){
			if($_FILES['profilephoto']['error'] === 0){
				// declare variables
			$filename = $_FILES['profilephoto']['name'];
			$filetype = $_FILES['profilephoto']['type'];
			$filesize = $_FILES['profilephoto']['size'];
			$filetempname = $_FILES['profilephoto']['tmp_name'];
			// to specify where to upload files from
			$folder = "profilephotos/";

			//to check the size of the file or restrict to a limited size
			if($filesize > 2097152){
				$error[] = "File size must be 2MB or less";
			}

			//to get file extension and ensure this function uploads just images
			$fileExt = explode('.',$filename);// this converts the string of text to an array
			$fileExt = end($fileExt); // this gets the last element of the array
			$fileExt = strtolower($fileExt); // converts to lowercase

			// to specify file extensions allowed for upload
			$extensions = array('png','jpg','jpeg','jpe','bmp','gif');
			// to check if file extension is in the array of acceptable extensions
			if(in_array($fileExt, $extensions) === false){
				$error[] = "File extension not allowed";
			}

			//change the name of the file to make it unique so it doesn't get overidden in the temp folder
			$filename = time();
			//specify the filepath
			$destination = $folder.$filename.".$fileExt";

			//to check if there is no error before uploading file
			if(!empty($error)){
				echo $error;
			}else {
				//otherwise, upload to destination folder
				move_uploaded_file($filetempname, $destination);

				//update photograph column in user table based on the userid
				$myuserid = $_SESSION['userid'];
				// write query to update the table column
				$sql = "UPDATE user SET photograph = '$destination' WHERE userId = $myuserid";
				//run query
				$result = $this->dbobj->dbcon->query($sql);
				if($this->dbobj->dbcon->affected_rows == 1){
					//create session variable
					$_SESSION['profilepic'] = $destination;
					$result = "<div class='alert alert-success'>Profile photo uploaded</div>";
				}else {
					$result = "<div class='alert alert-danger'>Your image has not been uploaded</div>".$this->dbobj->dbcon->error;
				}
			}
		}else {
			$result = "<div class='alert alert-danger'>You have not uploaded any image</div>";
		}
		return $result;
	}
	public function completeProfile($headline,$summary,$userid){
		$sql = "INSERT INTO profile(headline,summary,user_id) VALUES('$headline','$summary','$userid')";
		if($this->dbobj->dbcon->query($sql) == true){
			//in order to get userid incase we need to output it, we'll retrieve it and store in a session variable
			$profileid = $this->dbobj->dbcon->insert_id;
			$_SESSION['profileid'] = $profileid;
			$_SESSION['headline'] = $headline;
			$_SESSION['summary'] = $summary;
			//redirect to profile.php
			header('Location: http://localhost/freelanceng/profile.php');
		}else{
			//display error
			$result = "<div class='alert alert-danger'>Oops something went wrong ".$this->dbobj->dbcon->error."</div>";

			return $result;
		}
	}
	public function editProfile($headline,$summary,$userid,$profileid){
		$sql = "UPDATE profile SET headline = '$headline', summary = '$summary' WHERE profile_id = '$profileid' AND user_id = '$userid'";
		$result = $this->dbobj->dbcon->query($sql);
		$_SESSION['headline'] = $headline;
		$_SESSION['summary'] = $summary;
		//how many rows affected(updated)
		$response = "";
		if($this->dbobj->dbcon->affected_rows == 1 && $result != ""){
			$response = "Your Profile was successfully updated.";
			  //redirect to profile.php
			header('Location: http://localhost/freelanceng/profile.php?'."msg=".$response);
			exit;
		}else{
			$response = "No update was made";
			header("Location: http://localhost/freelanceng/profile.php?msg=".$response);
			exit;
		} 
		// else{
		// 	echo "Error: oops".$this->dbobj->dbcon->error;
		// }
		return $response;
	}
	public function getProfileDetails($userid){
		$mysql = "SELECT * FROM profile WHERE user_id = '$userid' ";
		//run the query
		if($result = $this->dbobj->dbcon->query($mysql)){
			$row = $result->fetch_assoc();
			
		}else {
			//display invalid login details 
			$row = "Error: ".$this->dbobj->dbcon->error;
		}
			return $row;
	}
}


class Job{
	//member variable goes here
	public $dbobj; //this is the DbConfig object handler

	//member methods go below here
	public function __construct(){
		$this->dbobj = new DbConfig;
	}
	// method to insert new job into database
	public function createJob($projectname,$projectdetails,$reqskills,$deliverytime,$userid,$budget,$paymentmethod){
		$sql = "INSERT INTO job3(details,expectedDuration,budget,reqskills,userId,projectname,paymentmethod) VALUES('$projectdetails','$deliverytime','$budget','$reqskills','$userid','$projectname','$paymentmethod')";
		//check if query runs and is valid
		if($this->dbobj->dbcon->query($sql) == true){
			//in order to get userid incase we need to output it, we'll retrieve it and store in a session variable
			$jobid = $this->dbobj->dbcon->insert_id;
			// store some necessary input fields in session
			$_SESSION['jobid'] = $jobid;
			$_SESSION['projectname'] = $projectname;
			$_SESSION['projectdetails'] = $projectdetails;
			$_SESSION['reqskills'] = $reqskills;
			$_SESSION['deliverytime'] = $deliverytime;
			$_SESSION['budget'] = $budget;
			$_SESSION['paymentmethod'] = $paymentmethod;
			$msg = "<div class='alert alert-success'>Your job has been posted successfully. You should begin to receive bids within minutes</div>";
			//redirect to all jobs page
			header("Location: http://localhost/freelanceng/myjobs.php?"."msg=".$msg);
		}else {
			echo "Error: ".$this->dbobj->dbcon->error;
		}
	}
	public function getJobInfo($userid){
		//write query
		$sql = "SELECT * FROM job3 WHERE userId != $userid ORDER BY posted_at DESC";
		// execute the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	// //method to get job details using job id(this is so we can get the job details for the specific job user wants to apply for)
	// public function getJobDetails($jobid){
	// 	//write query
	// 	$sql = "SELECT * FROM job3 WHERE jobId = '$jobid'";
	// 	// execute the query
	// 	$result = $this->dbobj->dbcon->query($sql);
	// 	$row = [];
	// 	if($this->dbobj->dbcon->affected_rows == 1){
	// 		$row = $result->fetch_assoc();
	// 	}else{
	// 		//echo "Error: ".$this->dbobj->dbcon->error;
	// 		echo "<div class='alert alert-danger'>No record found</div>";
	// 	}
	// 	return $row;
	// }
	public function getIndexJob(){
		//write query
		$sql = "SELECT * FROM job3 ORDER BY posted_at DESC";
		// execute the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			$row = "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getJob1($budget,$userid){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE userId != $userid AND budget = '$budget' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getJob2($deliverytime,$userid){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE userId != $userid AND expectedDuration = '$deliverytime' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getJob3($budget,$deliverytime,$userid){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE userId != $userid AND budget = '$budget' AND expectedDuration = '$deliverytime' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	//methods to diplay jobs on the index page using filters
	public function getJobIndex1($budget){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE budget = '$budget' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getJobIndex2($deliverytime){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE expectedDuration = '$deliverytime' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getMyJob1($budget,$userid){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE userId = '$userid' AND budget = '$budget' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getMyJob2($deliverytime,$userid){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE userId = '$userid' AND expectedDuration = '$deliverytime' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	public function getMyJob3($budget,$deliverytime,$userid){
		// query to get job from database
		$sql = "SELECT * FROM job3 WHERE userId = '$userid' AND expectedDuration = '$deliverytime' AND budget = '$budget' ORDER BY posted_at DESC";
		//execute query
		$result = $this->dbobj->dbcon->query($sql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	// method to find jobs
	public function findJob($keyword,$userid){
		//write query
		$mysql = "SELECT * FROM job3 WHERE userId != '$userid' AND projectname LIKE '%$keyword%' OR details LIKE '%$keyword%'";
		//another query
		$sql = "SELECT job.projectname,job.details,job.jobId FROM job LEFT JOIN user ON job.userId=user.userId WHERE projectname LIKE '%$keyword%' OR details LIKE '%$keyword%'";
		$row = [];
		//run query
		if($result = $this->dbobj->dbcon->query($mysql)){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	// method to find jobs on the index page
	public function findJobIndex($keyword){
		//write query
		$mysql = "SELECT * FROM job3 WHERE projectname LIKE '%$keyword%' OR details LIKE '%$keyword%'";
		//$row = [];
		//run query
		if($result = $this->dbobj->dbcon->query($mysql)){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	// method to find jobs posted by a specific user on key up
	public function findMyJob($keyword,$userid){
		//write query
		$mysql = "SELECT * FROM job3 WHERE userId = '$userid' AND projectname LIKE '%$keyword%'";
		//another query
		$sql = "SELECT job.projectname,job.details,job.jobId FROM job LEFT JOIN user ON job.userId=user.userId WHERE projectname LIKE '%$keyword%' OR details LIKE '%$keyword%'";
		//run query
		$result = $this->dbobj->dbcon->query($mysql);
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			//echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-danger'>No record found</div>";
		}
		return $row;
	}
	//method to return all jobs posted by a specific user
	public function getMyJobs($userid){
		//write query
		$mysql = "SELECT * FROM job3 WHERE userId = '$userid' ORDER BY posted_at DESC";
		//execute query
		$row = [];
		$result = $this->dbobj->dbcon->query($mysql);
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			// "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-info'>You have not posted any jobs</div>";
		}
		return $row;
	}
	//method to edit jobs
	public function editJob($projectname,$projectdetails,$reqskills,$deliverytime,$jobid,$budget,$paymentmethod){
		//write query
		$myquery = "UPDATE job3 SET projectname='$projectname', paymentmethod='$paymentmethod', reqskills='$reqskills', budget='$budget', expectedDuration='$deliverytime', details='$projectdetails' WHERE jobId='$jobid'";
		//execute myquery
		$this->dbobj->dbcon->query($myquery);

		//check/confirm how many rows affected(updated)
		if($this->dbobj->dbcon->affected_rows == 1){
			// redirect to joblistings.php page
			$msg = "<div class='alert alert-success'>You have successfully edited your job</div>";
			header('Location: http://localhost/freelanceng/myjobs.php?'."msg=".$msg);
			exit;
		} else{
			echo "<div class='alert alert-danger'>You did not make any changes</div>";
		}
	}
	//method to get specific jobdetails from database
	public function getJobDetails($jobid){
		//write query to fetch the job details from job table based on the jobid
		$sql = "SELECT job3.*, user.firstName,user.lastName,user.email FROM job3 LEFT JOIN user ON job3.userId = user.userId WHERE job3.jobId = '$jobid'";
		$row = [];
		if($result = $this->dbobj->dbcon->query($sql)) {
			$row = $result->fetch_assoc();
		}else {
			echo "Error: ".$this->dbobj->dbcon->error;
			$row = "<div class='alert alert-danger'>No record Found</div>";
		}
		return $row;
	}
	public function deleteJob($jobid){
		//write query to delete job
		$sql = "DELETE FROM job3 WHERE jobId = '$jobid'";
		//execute query
		$this->dbobj->dbcon->query($sql);
		//check/confirm affected rows is one
		if($this->dbobj->dbcon->affected_rows == 1){
			// redirect to joblistings.php
			header("Location: http://localhost/freelanceng/myjobs.php");
			exit;
		}else{
			$errormsg = "<div class='alert alert-danger'>Something went wrong".$this->dbobj->dbcon->error."</div>";
		}
		return $errormsg;
	}
	public function makeBid($description,$jobid,$deliverytime,$fee,$freelancerid,$employerid,$projectname,$details){
		$sql = "INSERT INTO bid(bidDescription,jobId,freelancerId,deliveryTime,fee,employerid,job_name,job_desc) VALUES('$description','$jobid','$freelancerid','$deliverytime','$fee','$employerid','$projectname','$details')";
		//check if query runs and is valid
		if($this->dbobj->dbcon->query($sql) == true){
			//in order to get userid incase we need to output it, we'll retrieve it and store in a session variable
			$bidid = $this->dbobj->dbcon->insert_id;
			// store some necessary input fields in session
			$_SESSION['biddec'] = $$description;
			$_SESSION['biddelivery'] = $deliverytime;
			$_SESSION['bidfee'] = $fee;
			$_SESSION['bidid'] = $bidid;
			$msg = "<div class='alert alert-success'>Your bid has been made successfully. You will be informed if you are awarded the project</div>";
			//redirect to all jobs page
			header("Location: http://localhost/freelanceng/joblistings.php?bidmsg=".$msg);
		}else {
			echo "Error: ".$this->dbobj->dbcon->error;
		}

	}
	public function setJobRestriction($jobid,$userid){
		$sql = "SELECT * FROM bid WHERE jobId='$jobid' AND freelancerId = '$userid'";
		//execute above query
		$result= $this->dbobj->dbcon->query($sql);
		if($this->dbobj->dbcon->affected_rows == 1){
			echo "<div class='alert alert danger'>You have already applied to this job!</div>";
		}
	}
	public function sentBids($userid){
		$sql = "SELECT bid.*,details,projectname,expectedDuration FROM bid LEFT JOIN job3 ON bid.jobId=job3.jobId WHERE freelancerId = '$userid' ORDER BY bid_date";
		//run/execute the query
		$result = $this->dbobj->dbcon->query($sql);
		//fetch all rows
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$row = "<div class='alert alert-danger'>You have not applied to any jobs</div>";
		}
		return $row;

	}
	//method to fetch data for user to know details about bids they have recieved for their project
	public function receivedBids($userid){
		$sql = "SELECT bid.*,firstName,lastName,photograph FROM bid LEFT JOIN user ON freelancerId=userId WHERE employerId = '$userid' ORDER BY bid_date DESC";
		//run/execute the query
		$result = $this->dbobj->dbcon->query($sql);
		//fetch all rows
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$row = "<div alert alert-danger>You have not applied to any jobs</div>";
		}
		return $row;

	}
	public function receivedBids2($userid,$jobid){
		$sql = "SELECT bid.*,firstName,lastName,photograph,phone,email FROM bid LEFT JOIN user ON freelancerId=userId WHERE freelancerId = '$userid' AND jobId='$jobid'ORDER BY bid_date DESC";
		//run/execute the query
		$result = $this->dbobj->dbcon->query($sql);
		//fetch all rows
		$row = [];
		if($this->dbobj->dbcon->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$row = "<div alert alert-danger>You have not applied to any jobs</div>";
		}
		return $row;
	}
	public function updateBid($userid,$jobid,$status){
		$sql = "UPDATE bid SET bidStatus='$status' WHERE freelancerid='$userid' AND jobId='$jobid'";
		//execute myquery
		$this->dbobj->dbcon->query($sql);

		//how many rows affected(updated)
		if($this->dbobj->dbcon->affected_rows == 1){
			// redirect to allusers.php page
			$msg = "You have successfully awarded your job to the named Freelancer. Mark the job as complete upon project completion and then proceed to make payment";
			header("Location: http://localhost/freelanceng/receivedbids.php?msg=".$msg);
		} else{
			$msg = "You have already awarded this job";
			header("Location: http://localhost/freelanceng/receivedbids.php?msg=".$msg);
			//echo "Error: ".$this->dbobj->dbcon->error;
		}
	}
	public function getSpecificJobApplication($userid,$jobid){
		$sql = "SELECT bid.*,details,projectname,expectedDuration,reqskills FROM bid LEFT JOIN job3 ON bid.jobId=job3.jobId WHERE freelancerId = '$userid' AND bid.jobId='$jobid'";
		//run above query
		$row = [];
		if($result = $this->dbobj->dbcon->query($sql)){
			$row = $result->fetch_assoc();
		}else{
			$row = "<div class='alert alert-success'>You have not applied to this job</div>";
		}
		return $row;
	}
}



 ?>