<?php
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('signinFunctions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log as a Admin to access this";
	header('location: signin.php');
}


 error_reporting(E_ERROR | E_PARSE);
$idtoDelete = $_GET['idd'];

$sql5 = "DELETE FROM users WHERE username= '$idtoDelete'";
if(mysqli_query($db, $sql5))
		{
             $_SESSION['success']= "User Deletion Successfull!";

		}
		else{
			$_SESSION['success']= "User Deletion Successfull!";
		}
			 ?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png" />
<title>Private Medical Center-Kalutara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="doctor.css">
<link rel="stylesheet" type="text/css" href="footer.css"> 
<link rel="stylesheet" type="text/css" href="b.js">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--for nav bar-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    

<style>
.prescribeBtn{
    align-content:center;
}
 </style>

</head>

<body>



<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['success']; 
                  unset($_SESSION['success']);
                  // echo $ln;
					?>
				</nav>
			</div>
    <?php endif ?>
<?php include('navbar.php') ?>
<div class="row animated fadeIn">
    <img src="img/deleteUsers.jpg" class="img-fluid" alt="Responsive image">
</div>
<div class="row animated fadeInUp">
<!-- details of PAtient for each day -->
<?php
$todayDate=date("Y-m-d"); 
$sql1 = "SELECT * FROM users";
$res1 = mysqli_query($db, $sql1);?>
 

 <div class="container-fluid">
    <div class="row ">
        <div class=" col-md-2">
        </div>
        <div class=" col-md-8">
       
<br>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Fname</th>
        <th>LName</th>
        <th>ContactNo</th>
        <th>Gender</th>
		<th>Email</th>
		<th>Username</th>
		<th>UserType</th>
        <th>Click to Delete</th>
      </tr>
    </thead>


<?php
if (mysqli_num_rows($res1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res1)) {
      ?>
      <?php 

        $id=$row["id"];
        $fname=$row["fname"];
        $lname=$row["lname"];
        
        $contactNo=$row["contactNo"];
		$gender=$row["gender"];
		$Email=$row["email"];
		$Username=$row["username"];
		$Usertype=$row["user_type"];
        
        echo '<tr> 
                  <td>'.$id.'</td> 
                  <td>'.$fname.'</td> 
                  <td>'.$lname.'</td>  
                  <td>'.$contactNo.'</td>
				  <td>'.$gender.'</td>
				  <td>'.$Email.'</td>
				  <td>'.$Username.'</td>
				  <td>'.$Usertype.'</td>';
?>

    <td>

    <a href="deleteUser.php?idd=<?php echo $row["username"]; ?>"  type="button" class="btn btn-danger btn-sm" > Delete</a> </td>
              
              </tr>

<?php 
    }

} else {
    echo "0 results";
}
?>





</table>
</div>
        <div class=" col-md-2">
        </div>
        </div>
        </div>


<br>
<div class="container-fluid">
<br>

    <div class="row ">
    <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center" >
            
           
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center" >
            <a href="adminPannel.php" type="button" class="btn btn-secondary">Adminal Panel</a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            
        </div>
    </div>
    <br>

</div>
<br>

<?php include 'footer.php';?>
</div>
</body>
</html>