<?php 
include('signinFunctions.php');


if (!isAdmin()) {
	$_SESSION['msg'] = "You must log as a Admin to access this";
	header('location: signin.php');
}


?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png" />
<title>Private Medical Center-Kalutara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">


<!--for nav bar-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="admin.css">


<style>
.btn {
  background-color: darkgrey;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  width:400px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: grey;
}
</style>
 <!-- Animate css -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
</head>

<body>


<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" style="text-align: center;">
				<nav style="background-color:black;color:white;font-family:calibri;;">
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</nav>
			</div>
    <?php endif ?>
    
	<?php if (isset($_SESSION['adminx'])) : ?>
			<div class="error success" style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['adminx'];
						unset($_SESSION['adminx']);
						
					?>
				</nav>
			</div>
    <?php endif ?>
	<?php if (isset($_SESSION['adminx2'])) : ?>
			<div  style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['adminx2']; 
						unset($_SESSION['adminx2']);
					?>
				</nav>
			</div>
    <?php endif ?>
<?php include('navbar.php') ?>

<img src="img/adminpanel.jpg" class="img-fluid" alt="Responsive image">





<div class="container">
    <div class="row animated fadeIn">
    <div class="col-md-3 col-sm-6">
      <div class="card-counter primary">
        <i class="fa fa-user icon"></i>
        <span class="count-numbers">125</span>
        <span class="count-name">Web Site Visitors</span>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card-counter danger">
	 	 <i class="fas fa-notes-medical icon"></i>
        <span class="count-numbers">22</span>
        <span class="count-name">Registered Patients</span>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card-counter success">
	  	<i class="fas fa-user-md icon"></i>
        <span class="count-numbers">25</span>
        <span class="count-name">Registered Doctors</span>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card-counter info">
        <i class="fa fa-users icon"></i>
        <span class="count-numbers">242</span>
        <span class="count-name">Total Users</span>
      </div>
    </div>
  </div>
</div>



<div class="container">
    <div class="row animated fadeIn">
    	<div class="col-md-6 ">
		
		<a href="createUser.php" ><button class="btn" ><i class="fa fa-bars"></i> CREATE USER</button></a>
		</div>
		<div class="col-md-6 ">
		
		<a href="announcementForAll.php"><button class="btn"><i class="fa fa-bars"></i> SEND Announcements to All Users</button></a>
		</div>
	</div>
	<div class="row animated fadeIn">
    <div class="col-md-6 ">
	<a href="deleteUser.php"><button class="btn"><i class="fa fa-bars"></i> DELETE USER</button></a>
		
		</div>
		<div class="col-md-6 ">
		<a href="announcementForPatients.php" ><button class="btn" ><i class="fa fa-bars"></i> SEND Announcements to Patients</button></a>
		
		
		</div>
	</div>

	<div class="row animated fadeIn">
    	<div class="col-md-6 ">
		
		<a href="deleteAppointments.php"><button class="btn"><i class="fa fa-bars"></i> DELETE Appoinments</button></a>
		</div>
		<div class="col-md-6 ">
		<a href="announcementForDoctors.php" ><button class="btn" ><i class="fa fa-bars"></i> SEND Announcements to All Doctors</button></a>
		
		</div>
	</div>
	</div>



<br>
<br>
<br>

<?php include 'footer.php';?>
</body>

</html>