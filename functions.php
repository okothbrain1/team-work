<?php 
session_start();


// connect to database
$db = mysqli_connect('localhost', 'root', 'Brain1996#', 'TeamWork');

// variable declaration
$errors   = array(); 

// REGISTER USER
function signUp(){
	// call these variables with the global keyword to make them available in function
	global $db, $username, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$date_of_birth = e($_POST['date_of_birth']);
	//$date_of_birth = date("Y-m-d", strtotime($_POST['date_of_birth']));


	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Your account should have a password"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	if (empty($date_of_birth)) { 
		array_push($errors, "Date of Birth is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		//checking whether the username and the email entered already exist in the database
		$sql_u = "SELECT * FROM user WHERE username='$username'";
  	    $sql_e = "SELECT * FROM user WHERE email='$email'";
  	    $res_u = mysqli_query($db, $sql_u);
  	    $res_e = mysqli_query($db, $sql_e);

		if(mysqli_num_rows($res_u) > 0){
			array_push($errors, "Sorry,username already taken"); 

		}
		if(mysqli_num_rows($res_e) > 0){
			array_push($errors, "Sorry,the email address already exists");
		}
		else{
			$query = "INSERT INTO user (username, email,password,date_of_birth) 
					  VALUES('$username', '$email','$password','$date_of_birth')";
			mysqli_query($db, $query);
			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
						
			}
}
}

// call the signUp() function if create_account button is clicked
if (isset($_POST['create_account'])) {
	signUp();
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}



// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}
// creating a function to display errors
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="input-group">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

// creating a login function
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required to login");
	}
	if (empty($password)) {
		array_push($errors, "Password is required to login");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are successfully logged in";
				header('location: mainpage.php');

			
		}else {
			array_push($errors, "Either username or password is incorrect");
		}
	}
}	
// calling the login() function when the user clicks login button
if(isset($_POST['login'])){
	login();
}
function getUserById($id){
	global $db;
	$query = "SELECT * FROM user WHERE user_id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function isUser()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// function to handle the publishing of events
function publish_event(){
	global $db;
	
	    $event_description = e($_POST['event_description']);
	    $event_type = e($_POST['event']);
	    $user_to_post_event = $_SESSION['user']['username'];
		$event_poster_id = $_SESSION['user']['user_id'];
		$event_post_query = "INSERT INTO events(event_description, event_type,post_owner, user_id, date_of_publishment)VALUES('$event_description','$event_type','$user_to_post_event','$event_poster_id',NOW())";
		$res_query = mysqli_query($db, $event_post_query);
		if( $event_post_query == true ) {
                                       echo'<script>swal("Success!", "your message was sent!", "success")</script>';
//SELECT * FROM Last10RecordsDemo ORDER BY id DESC LIMIT 10
 //SELECT * FROM table ORDER BY column LIMIT 5000                                      
                                   }else {
                                   echo "<h2>Oops! Message could not be sent... please try again</h2>";
                                   }
}
// calling the publish_event() function once the user clicks the publish button
if(isset($_POST['post_event'])){
	publish_event();
}

//function to retrieve the posted events
function retrieve_event(){
	global $db;
   $sql = 'SELECT event_description, event_type,post_owner, date_of_publishment FROM events';
   //mysql_select_db('test_db');
   $retval = mysql_query( $sql, $db );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while(mysql_fetch_array($retval)) {
      echo "Event description :{$row['event_description']}  <br> ".
         "Event type : {$row['event_type']} <br> ".
         "Posted by : {$row['post_owner']} <br> ".
         "published on: {$row['date_of_publishment']} <br> ";
        
   }
   
   echo "Fetched data successfully\n";
}

	


?>