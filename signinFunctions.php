<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'private_medical_center');

// variable declaration




$username = "";
$Delusername="";
$email    = "";
$gender="";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}




// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $fname, $lname, $dob, $contactNo, $username, $email;
	

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$fname		=	mysqli_real_escape_string($db,trim($_POST['fname']));
	$lname		=	mysqli_real_escape_string($db,trim($_POST['lname']));
	$dob 		=	mysqli_real_escape_string($db,trim($_POST['age']));
	$contactNo = (is_numeric($_POST['contactNo']) ? (int)$_POST['contactNo'] : 0);
	
	$username    =  mysqli_real_escape_string($db,trim($_POST['username']));
	$email       =  mysqli_real_escape_string($db,trim($_POST['email']));
	$password_1  =  mysqli_real_escape_string($db,trim($_POST['password_1']));
	$password_2  =  mysqli_real_escape_string($db,trim($_POST['password_2']));
	$vkey=md5(time().$username);

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { 
		array_push($errors, "*First Name is required"); 
	}

	if (empty($dob)) { 
		array_push($errors, "*DOB is required"); 
	}

	if (empty($_POST["gender"])) {
		array_push($errors, "*Gender is required"); 
	  } else {
		$gender = test_input($_POST["gender"]);
	  }

	if (empty($username)) { 
		array_push($errors, "*Username is required"); 
	}

	if (empty($_POST["email"])) {
		array_push($errors, "*Email is required");
	  } else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors, "*Email is not valid");
		}
	  }
	   

	if (empty($password_1)) { 
		array_push($errors, "*Password is required"); 
	}
	if (empty($password_2)) { 
		array_push($errors, "*Password confirm is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "*The two passwords do not match");
	}
	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		
		//admin account creation
			if (isset($_POST['user_type'])) {
				$sql_u = "SELECT * FROM users WHERE username='$username'";
				$res_u = mysqli_query($db, $sql_u);
				$sql_e = "SELECT * FROM users WHERE email='$email'";
				$res_e = mysqli_query($db, $sql_e);

				$user_type = e($_POST['user_type']);

				if (mysqli_num_rows($res_u) > 0) {
					array_push($errors, "*Username is already taken please try another"); 	
				}
				
				else if(mysqli_num_rows($res_e) > 0){
					array_push($errors, "*E-Mail is already taken please try another"); 	
				  }

				  else{
				$query = "INSERT INTO users (fname, lname, dob, contactNo, gender, email, username, password, user_type,vkey,verified) 
					  	VALUES('$fname', '$lname', '$dob', $contactNo, '$gender', '$email', '$username', '$password', '$user_type','$vkey',1)";
				mysqli_query($db, $query);
				$_SESSION['adminx']  = "New $user_type successfully created!!";
				$_SESSION['adminx2']  = "Details of the $user_type is sent to $user_type's Email.!";
				header('location: adminPannel.php');
				  }
			
			}
			
			
			
			else{
				$sql_u = "SELECT * FROM users WHERE username='$username'";
				$res_u = mysqli_query($db, $sql_u);
				$sql_e = "SELECT * FROM users WHERE email='$email'";
				$res_e = mysqli_query($db, $sql_e);

				if (mysqli_num_rows($res_u) > 0) {
					array_push($errors, "*Username is already taken please try another"); 	
				}
				
				else if(mysqli_num_rows($res_e) > 0){
					array_push($errors, "*E-Mail is already taken please try another"); 	
				  }

				else{
				$query = "INSERT INTO users (fname, lname,dob,contactNo, gender, email, username, password, user_type,vkey) 
					  	VALUES('$fname', '$lname', '$dob', $contactNo,'$gender', '$email', '$username', '$password', 'user','$vkey')";
					$_SESSION['success']  = "Please go to Your Email *$email* and Verify your Account!!";
				
					$result_set1=mysqli_query($db, $query);
					if($result_set1){
						//send mail
						$to=$email;
						$subject="Email Verification";
						$message="<h4 style='color:darkblue;font-family:calibri;font-size:15px;'> ***Please Click the Link to Verify Your Account in Private Medical Center-Kaluatara*** </h4>
									<a href='http://localhost/project/signin.php?vkey=$vkey'>Verify your Account in Private Medical Center</a><br>
									<h4 style='color:black;font-family:calibri;font-size:12px;'> +9434 222 1363 Call us for if you have any problems or inquiries</h4>
									";
						$headers="From : mcenter@gmail.com \r\n";
						$headers.="MIME-Version: 1.0" . "\r\n";
						$headers.="Content-type:text/html;charset=UTF-8" . "\r\n";
						mail($to,$subject,$message,$headers);
						
						// header('Location:signin.php');
					}
					else{
						$error .="<p>err</P>";
					}
				
				
				
				// get id of the created user
				// $logged_in_user_id = mysqli_insert_id($db);

				// $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				
				// header('location: signup.php');				
				}
			
			
			}
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }



//do not edit above from this

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
// If the user is not logged in and tries to access this page, they are automatically redirected to the related
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}





// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}




// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login()
{
	global $db, $username, $errors;

	// grap form values
	
	$username=mysqli_real_escape_string($db,trim($_POST['username']));
    $password=mysqli_real_escape_string($db,trim($_POST['password']));
    

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "*Username is required");
	}
	if (empty($password)) {
		array_push($errors, "*Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) 
	{
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'  LIMIT 1";
		$results = mysqli_query($db, $query);
		$logged_in_user = mysqli_fetch_assoc($results);
		
		//check verified or not
		

		
		if (mysqli_num_rows($results) == 1)
		{
			if ($logged_in_user['verified'] == 1) { // user found
				// check if user is admin or user or other
			
				if ($logged_in_user['user_type'] == 'admin') 
				{
					$_SESSION['user'] = $logged_in_user;
					$ln=$_SESSION['user']['lname'];
				
					$_SESSION['uType']  = "Admin";
					// $_SESSION['success']  = "YOU ARE NOW LOGGED IN AS A ADMIN!";
					$_SESSION['aa']  = true;
					header('location: adminPannel.php');
					return true;
				}	  
				else if($logged_in_user['user_type'] == 'pharmacist')
				{
					$_SESSION['user'] = $logged_in_user;
					// $_SESSION['success']  = "YOU ARE NOW LOGGED IN AS A PHARMACIST!";
					$_SESSION['uType']  = "pharmacist";
					$_SESSION['pp'] =true;
					header('location: pharmacist.php');
					return false;
				}

				else if($logged_in_user['user_type'] == 'cashier')
				{
					$_SESSION['user'] = $logged_in_user;
					// $_SESSION['success']  = "YOU ARE NOW LOGGED IN AS A CASHIER!";
					$_SESSION['uType']  = "cashier";
					$_SESSION['cc'] =true;
					header('location: cashier.php');
					return false;
				}

				else if($logged_in_user['user_type'] == 'doctor')
				{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['uType']  = "doctor";
					// $_SESSION['success']  = "YOU ARE NOW LOGGED IN AS A DOCTOR!";
					$_SESSION['dd'] =true;
					header('location: patientForEachDay.php');
					return false;
				}

			
			
				else
				{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['uType']  = "user";
					// $_SESSION['success']  = "YOU ARE NOW LOGGED IN AS A USER!";
					header('location: index.php');
					return false;
				}
			}
			//created but not verified 
			else if($logged_in_user['verified'] == 0)
			{
				array_push($errors, "*Your Account is not Verified");
			}
			
		}
		else 
		{
			array_push($errors, "*Wrong Username or Password");
		}	
	}
}



function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


function isDoc()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'doctor' ) {
		return true;
	}else{
		return false;
	}
}

function isPhar()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'pharmacist' ) {
		return true;
	}else{
		return false;
	}
}

function isCashier()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'cashier' ) {
		return true;
	}else{
		return false;
	}
}


// call the deleteUserByAdmin() function if delete_user is clicked
if (isset($_POST['delBtn']))

{
	//  global $db,$DelUsername;
	 $DelUsername    =  e($_POST['delUsername']);


	 if(!empty($_POST['delUsername'])){
		$sql = "DELETE FROM users WHERE username='$DelUsername'";
		if(mysqli_query($db, $sql))
		{
		 	$_SESSION['deleteErr']= "User Deletion Successfull!";
		} 
		else{
			$_SESSION['deleteErr']= "User Deletion unsuccessfull!";
		}
	
	}
	else{
		$_SESSION['deleteErr']  = "*User Deletion unsuccessfull! <br>*Please enter a username to delete profile";
		
	}
}

if (isset($_POST['updateBtn']))
{

	$fname		=	e($_POST['fname']);
	$lname		=	e($_POST['lname']);
	
	$dob = (is_numeric($_POST['age']) ? (int)$_POST['age'] : 0);
	$contactNo = (is_numeric($_POST['contactNo']) ? (int)$_POST['contactNo'] : 0);
	$updateUser=$_SESSION['user']['username'];
	
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age']) && !empty($_POST['contactNo'])){

		$sql2 = "UPDATE users SET fname='$fname',lname='$lname',dob='$dob',contactNo='$contactNo' WHERE username='$updateUser'" ;
		if (mysqli_query($db, $sql2)) {
			$_SESSION['updateErr']  = "****Updated data Successfully and please logut and sign in to see changes****";
		
		} else {
			$_SESSION['updateErr']  = "*Not Updated Please check again";
			
		}
	}
	else{
		$_SESSION['updateErr']  = "*Please fill all fileds";
		
	}

}

if (isset($_POST['passwordReset'])){
	if(!empty($_POST['password_1']) && !empty($_POST['password_2'])){
			$password_1=e($_POST['password_1']);
			$password_2=e($_POST['password_2']);
			if ($password_1 != $password_2) {
				
				$_SESSION['resetErr']  = "both passwords not match";
			}
			else{
				$resetPassword=md5($password_1);
				$updateUser=$_SESSION['user']['username'];

				$sqll = "UPDATE users SET password='$resetPassword' WHERE username='$updateUser'" ;
				if (mysqli_query($db, $sqll)) {
						$_SESSION['resetErr']  = "****Password Successfully Changed****";
		
				} else {
					$_SESSION['resetErr']  = "*Not Updated password Please check again";
				}
			}
	}
	else{
		$_SESSION['resetErr']  = "please fill both fields";

	}

	
}

?>