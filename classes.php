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
	//function to register users on platform upon completion/validation of reg form
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
			// Also we want to redirect the new user to his dashboard upon successful registration
			header('Location: http://localhost/project/profile.php');
			exit;
		}else {
			echo "Error ".$this->dbobj->dbcon->error;
		}
	}

	// function to validate and allow user login
	public function login($email,$password){
		$mypass = md5($password);
		// sql statement to query database 
		$mysql = "SELECT * FROM user WHERE user.email = '$email' AND user.password = '$mypass' LIMIT 1";
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


			//redirect to profile
			header("Location: http://localhost/project/profile.php");
			exit;
		}else {
			//display invalid login details 
			$result = "<div class='alert alert-danger'>Invalid Email address or Password</div>";

			return $result;
		}
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
				$errror[] = "File extension not allowed";
			}

			//change the name of the file to make it unique so it doesn't get overidden in the temp folder
			$filename = time();
			//specify the filepath
			$destination = $folder.$filename.".$fileExt";

			//to check if there is no error before uploading file
			if(!empty($error)){
				echo $error;
			}else {
				//upload to destination folder
				move_uploaded_file($filetempname, $destination);
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
					$result = "<div class='alert alert-danger'>You have not uploaded any image!!</div>".$this->dbobj->dbcon->error;
				}
			}
		}else {
			$result = "<div class='alert alert-danger'>There was an error with your file</div>";
		}
		return $result;
	}

}



 ?>