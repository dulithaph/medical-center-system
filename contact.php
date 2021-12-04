<?php
include('signinFunctions.php');
include('emailsendContactUsForm.php');

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
<?php include('navbar.php') ?>

<div class="container-fluid">
<div class="row  animated fadeIndown">
<div id="myCarousel" class="carousel slide animated fadeInDown" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>
  
        <!-- The slideshow -->
<div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/contactus1.jpg" alt="Los Angeles" width="100%" height="100%"d-block w-100>
        </div>
          <div class="carousel-item">
            <img src="img/contactus2.jpg" alt="Chicago" width="100%" height="100%">
            </div>
          <div class="carousel-item">
             <img src="img/contactus3.jpg" alt="New York" width="100%" height="100%">
        </div>
</div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</div>






<div class="container-fluid">
  
<div class="row animated fadeInUp">
    <div class="column back">
        <iframe src="https://maps.google.com/maps?q=Kalutara&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen data-aos="fade-left" data-aos-duration="3000"></iframe>
    </div>
    <div class="column back">
    

      
        <h3 class="text">WRITE TO US...</h3>
      
				<div class="col-md-8 col-md-offset-3 col-sm-12 col-xs-12">
				<div class="panel panel-danger">
					<div class="panel-body">
						<form method="post" action="contact.php" >
						 	<div class="form-group">
						 		<label><i class="fa fa-user" aria-hidden="true"></i> Name</label>
						 		<input type="text" name="name" class="form-control" placeholder="Enter Name">
						 	</div>
						 	<div class="form-group">
						 		<label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
						 		<input type="email" name="email" class="form-control" placeholder="Enter Email">
						 	</div>
               <div class="form-group">
						 		<label><i class="fa fa-envelope" aria-hidden="true"></i> Subject</label>
						 		<input type="text" name="subject" class="form-control" placeholder="Subject">
						 	</div>
						 	<div class="form-group">
						 		<label><i class="fa fa-comment" aria-hidden="true"></i> Message</label>
						 		<textarea rows="3" name="msg" class="form-control" placeholder="Type Your Message"></textarea>
						 	</div>


						 	<div class="form-group">
						 		<button type="submit" class="btn btn-raised btn-block btn-danger" name="send_message_btn" >Post →</button>
						 	</div>
						</form>
            <h5>
            <?php 
           
           if (isset($_SESSION['mail']))
           {
            echo $_SESSION['mail']; 
						unset($_SESSION['mail']);
           }
                         ?>
          </h5>

					</div>
				</div>
			</div>
			</div>
	
	</div>
<!-- Form Ended -->




<footer>
<div class="row  ">
            <div class=" col md-6 col- sm-12 col-xs-12 text-center">
                <p style="color:white;font-family:calibri;font-size:15px;">Copyright &copy; 2020 Private Medical Center-Kalutara Pvt. Ltd. All Rights Reserved. </p>
            </div>
</div>
             </footer>
</body>
</html>