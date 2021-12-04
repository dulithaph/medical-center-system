<?php 
include('signinFunctions.php');


if (isDoc()) {
	
}
else{
    $_SESSION['msg'] = "You must log as a Doctor to access this";
	header('location: signin.php');

}


?>
<?php 
 error_reporting(E_ERROR | E_PARSE);
$idtoDelete = $_GET['idDel'];

$sql4 = "DELETE FROM appointments WHERE appointmentId = $idtoDelete";
if(mysqli_query($db, $sql4))
		{
             $_SESSION['success']= "Appointment Deletion Successfull!";
                     
             //mail
             $u=$_SESSION['uuname'];
 
 $sql5 = "SELECT email FROM users where username='$u' ";
 $res5 = mysqli_query($db, $sql5);
 if (mysqli_num_rows($res5) ==1) {
    // output data of each row
    $details = mysqli_fetch_assoc($res5);
    $mail= $details['email'];
        
    unset($_SESSION['uuname']);
    }




//mail
 $subject="YOur";
 // Content-Type helps email client to parse file as HTML 
 // therefore retaining styles
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $message = "<html>
 <head>
     <title></title>
 </head>
 <body>
       <h4 style='color:darkblue;font-family:calibri;font-size:15px;'> ***Your Appointment ID- $idtoDelete in Kalutara Medical Center is Canceled Please call us for more Information*** </h4>
    
       <h5 style='color:black;font-family:calibri;font-size:12px;'> +9434 222 1363 Call us for if you have any problems or inquiries</h5>
       
       </body>
       </html>";

    mail($mail, $subject, $message, $headers);
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

<!--for nav bar-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
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
    <img src="img/delA.jpg" class="img-fluid" alt="Responsive image">
</div>



<?php
$sql1 = "SELECT * FROM appointments";
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
        <th>AppointmentID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Appointment Date</th>
        <th>TimeSlot</th>
        <th>Click to Prescribe</th>
      </tr>
    </thead>


<?php
if (mysqli_num_rows($res1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res1)) {
      ?>
      <?php 

        $appointmentId=$row["appointmentId"];
        $_SESSION['uuname']=$row["username"];
        $Pusername=$row["username"];
        $name=$row["name"];
        
        $date=$row["date"];
        $timeSlott=$row["timeslot"];
        
        echo '<tr> 
                  <td>'.$appointmentId.'</td> 
                  <td>'.$Pusername.'</td> 
                  <td>'.$name.'</td>  
                  <td>'.$date.'</td>
                  <td>'.$timeSlott.'</td>';
?>

    <td>

    <a href="deleteAppointments.php?idDel=<?php echo $row["appointmentId"]; ?>"  type="button" class="btn btn-info btn-sm" > Delete Appointment</a> </td>
              
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
    <div class="row ">
        <div class="col-xs-12 col-sm-6 col-md-4">
            
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center" >
            <a href="patientForEachDay.php" type="button" class="btn btn-secondary">Doctor Pannel</a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            
        </div>
    </div>
</div>
<br>

<?php include 'footer.php';?>
</div>
</body>
</html>




