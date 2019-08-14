<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'Brain1996#', 'TeamWork');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['create_account'])) {
	signUp();
}

// REGISTER USER
function signUp(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

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
		array_push($errors, "Password is required"); 
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

		
			$query = "INSERT INTO user (username, email,password,date_of_birth) 
					  VALUES('$username', '$email','$password','$date_of_birth')";
			mysqli_query($db, $query);
			
			header('location: index.php');			
			
}
}


// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

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

?>