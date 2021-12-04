<?php 
	

	// initialize variables
	$fname = "";
	$email = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$fname = $_POST['fname'];
		$email = $_POST['email'];

		mysqli_query($db, "INSERT INTO users (name, city) VALUES ('$fname', '$email')"); 
		$_SESSION['message'] = "Record saved"; 
		header('location: deleteUser.php');
    }
    
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
    
        mysqli_query($db, "UPDATE users SET name='$fname', email='$email' WHERE id=$id");
        $_SESSION['message'] = "Record updated!"; 
        header('location: deleteUser.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM users WHERE id=$id");
        $_SESSION['message'] = "Record deleted!"; 
        header('location: deleteUser.php');
    }