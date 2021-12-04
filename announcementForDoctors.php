<?php 
include('signinFunctions.php');


if (!isAdmin()) {
	$_SESSION['msg'] = "You must log as a Admin to access this";
	header('location: signin.php');
}


?>
<?php
//For Contact us Submit Form 
if (isset($_POST['emailFordoc'])) {
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    // Content-Type helps email client to parse file as HTML 
    // therefore retaining styles
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = "<html>
    <head>
        <title>Announcment from Private Medical Center Kalutara</title>
    </head>
    <body>
        <h3>Announcment from Private Medical Center Kalutara to All the Patients </h3>
        <h4>" . $subject . "</h4>
        <p>".$msg."</p>
        <h5>From:Private Medical Center - Kalutara </h5>
    </body>
    </html>";

  $sql3 = "SELECT email FROM users WHERE user_type='doctor'";
  $res3 = mysqli_query($db, $sql3);
 
if (mysqli_num_rows($res3) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($res3))
    {
        $addresses[] = $row['email'];
    }
$to = implode(", ", $addresses);
        
                mail($to, $subject, $message, $headers); 
                $_SESSION['mail']  = "Your message has been sent to the Doctors Successfully!";
   
 
 }
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
<link rel="stylesheet" type="text/css" href="contact.css">
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

</head>







<body>
<?php if (isset($_SESSION['mail'])) : ?>
			<div class="error mail" style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['mail']; 
						unset($_SESSION['mail']);
						
					?>
				</nav>
			</div>
    <?php endif ?>
<?php include('navbar.php') ?>
<div class="row animated fadeIn">
    <img src="img/allDoctors.jpg" class="img-fluid" alt="Responsive image">
</div>
<br><br>

<div class="row animated fadeInUp">
<div class="container-fluid">
    <div class="row ">
        <div class=" col-md-2">
        </div>
        <div class=" col-md-8">
            <H4> Enter Message to Send to the all Doctors who are registered in System</h4><br>
<form method="post" action="announcementForDoctors.php" >
					
					
               <div class="form-group">
						 		<label><i class="fa fa-envelope" aria-hidden="true"></i> Subject</label>
						 		<input type="text" name="subject" class="form-control" placeholder="Subject">
						 	</div>
						 	<div class="form-group">
						 		<label><i class="fa fa-comment" aria-hidden="true"></i> Message</label>
						 		<textarea rows="3" name="msg" class="form-control" placeholder="Type Your Message"></textarea>
						 	</div>


						 	<div class="form-group">
						 		<button type="submit" class="btn btn-raised btn-block btn-danger" name="emailFordoc" >Announcement For Doctors</button>
						 	</div>
                        </form>
                        
            </div>
                <div class=" col-md-2">
            </div>
</div>
</div>
</body>
</html>