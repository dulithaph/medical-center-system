<?php
include('signinFunctions.php');
if ( isset( $_SESSION['user'] ) ) {
  // Grab user data from the database using the user_id
  // Let them access the "logged in only" pages
} else {
  // Redirect them to the index page
  header("index.php");
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
<!-- Animate css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   
<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="inc/footer.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="footer.css">    
<style>
/* Make the image fully responsive */
.carousel-inner img {
  width: 100%;
  height: 100%
  
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
					?>
				</nav>
			</div>
    <?php endif ?>

        <?php include('navbar.php') ?>




<div class="container-fluid ">

<div class="row">
  <div id="myCarousel" class="carousel slide animated fadeInDown " data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>
  
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/h1.jpg" alt="Los Angeles" width="1100" height="300"d-block w-100>
            <div class="carousel-caption ">

            
            <h1 Style="font-family:calibri;font-weight: bold;color: white;text-shadow: 2px 2px 7px #000000;">HEALING WITH FEELING</h1>  
            <h4 Style="font-family:calibri;font-weight: bold;color: rgb(204, 255, 227);letter-spacing: 2px;text-shadow: 2px 2px 5px #000000;">
              OFFERING THE MOST UP-TO-DATE HEALTHCARE SERVICES AND SUPPORT
            </h4>  
                 
            <a href="signin.php"><button class="button" style="vertical-align:middle"><span>Sign In</span></button>  </a>


                </div>  
            </div>
          <div class="carousel-item">
            <img src="img/h3.jpg" alt="Chicago" width="1100" height="500">
            <div class="carousel-caption"> 
            
               
                <h1 Style="letter-spacing: 0.5px;font-family:calibri;font-weight: bold;color: white;text-shadow: 2px 2px 7px #000000;">
                  MEET ALL YOUR MEDICAL NEEDS UNDER ONE ROOF
                  </h1> 
                  <h3 Style="letter-spacing: 2px;font-family:calibri;font-weight: bold;color: rgb(204, 255, 227);text-shadow: 2px 2px 7px #000000;">
                  WE ARE HERE TO TAKE CARE OF YOU..!
                  </h3>
                  
                  <a href="OurDoctors.php">
                  <button class="button" style="vertical-align:middle"><span>Our Doctors</span></button></A> 
                </div> 
            </div>
          <div class="carousel-item">
             <img src="img/h4.jpg" alt="New York" width="1100" height="500">
             <div class="carousel-caption">  
             <h1 Style="font-family:calibri;font-weight: bold;color: white;text-shadow: 2px 2px 7px #000000;">MEDICAL CENTER-KALUTARA</H1>
             <h3 Style="font-family:calibri;font-weight: bold;color: rgb(204, 255, 227);letter-spacing: 2px;text-shadow: 2px 2px 5px #000000;">
            A NAME THAT REDESIGNS
            THE DELIVERY  OF SPECIALITY CARE        
            </h3>  
                
                </div> 
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

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-6 animated fadeInUp ">
      <div class="cardx" style="width:100%;height:auto">
        <img class="card-img-top" src="img/welcome.jpg" alt="Card image" style="width:100%">

      </div>
    </div>


    <div class=" col-md-6  animated fadeInUp ">
      <div class="cardx" style="width:100%;height:auto">
        <img class="card-img-top" src="img/timeTable1.jpg" alt="Card image" style="width:100%">

      </div>
    </div>

  </div>
</div>
</div>







<div class="container-fluid">
  <div class="row ">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="card" style="width:100%;height:650px">
          <img class="card-img-top" src="img/indexCard1.jpg" alt="Card image" style="width:100%">
        <div class="card-body text-center">
          <h4 class="card-title">Prevention and Fast Diagnosis</h4>
          <p class="card-text">Quick identification of health problems provides you with the ability to proactively address them.</p><br>
          <img src="img/logowithFooter.png" width="80" height="80"  />
        </div>
      </div>
    </div>

  <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="card" style="width:100%;height:650px">
      <img class="card-img-top" src="img/indexCard2.jpg" alt="Card image" style="width:100%">
        <div class="card-body text-center">
          <h4 class="card-title">It's all about You</h4>
          <p class="card-text">World class patient care. Cutting edge medical technologies. Expert Staff. Private Medical Center-Kalutara has it all.</p>
          <img src="img/logowithFooter.png" width="80" height="80"  />
        </div>
    </div>
  </div>
 
  <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="card" style="width:100%;height:650px">
        <img class="card-img-top" src="img/indexCard3.jpg" alt="Card image" style="width:100%">
      <div class="card-body text-center">
        <h4 class="card-title ">Online Channeling</h4>
        <p class="card-text">The best doctors in the world are at your fingertips.
        Visit our channelling page today to channel the best doctor for you.</p>
        <img src="img/logowithFooter.png" width="80" height="80"  />
      </div>
    </div>
  </div>

</div>
</div>


<br>
<br>
<br>

<?php include 'footer.php';?>
</body>

</html>
