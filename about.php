<?php
include('signinFunctions.php');
if ( isset( $_SESSION['user'] ) ) {
  // Grab user data from the database using the user_id
  // Let them access the "logged in only" pages
} else {
  // Redirect them to the login page
  header("index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png" />
  <title>About|Private medical center-Kaluthara</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="about.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
  <!-- Animate css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<body>


<?php include('navbar.php') ?>



<!--About us using jumbotron 
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">About Us</h1>
  </div>
</div> -->


<!--History using card -->
<div class='animated fadeInDown'>
  <div class="container">
    <div class="row">
      <div class="col-12 sm-4 d-flex justify-content-center ">
        <div class="card border-black mt-5 mx-width topcard">  
          <div class="row no-gutters">
            <div class="col-sm-4">
             <img src="img/History1.jpg" class="card-img" alt="history">
            </div>
            <div class="col-sm-8">
              <div class="topcard">
              <br>
              <h3>Our History</h3>
              <p> Kalutara Medical(Pvt)Ltd which initiated in 2007,
             committed to building a healthy nation where everyone is capable to enjoy a healthy living.And we are happy to say that we 
             have been able to maintain a reputation from the beginning </p><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>


<!--values using grid-->
<div class='animated fadeInUp'>
<div class="container">
  <h1>Our values:</h1>
  <div class="row mt-5 ">
    <div class="col-sm-12 "> 
      <div class="row"> 
        <div class="col-sm-1 ">
          <img src="img/Wisdom1.png" class="img-rounded" alt="wisdom" width="80" height="80"></div><div class="col-sm-11 align-self-center ">
          <b>Wisdom–</b> we are knowledgeable and experienced and show insight, understanding and good judgement at all times.,</div>
          <div class="col-sm-1 mt-2">
          <img src="img/collaboration.png" class="img-rounded" alt="collabaration" width="80" height="80"></div><div class="col-sm-11 align-self-center mt-2">
          <b>Collaboration –</b> we work together as a team with our patients, partners and colleagues to achieve the best outcomes for all.</div>

          <div class="col-sm-1 mt-2">
          <img src="img/Empathy.png" class="img-rounded" alt="Empathy" width="80" height="80"></div><div class="col-sm-11 align-self-center mt-2">
          <b>Empathy –</b> we are aware of those around us and are observant and responsive to their feelings and needs. We always act with compassion.</div>

          <div class="col-sm-1 mt-2">
          <img src="img/courage.png" class="img-rounded" alt="courage" width="80" height="80"></div><div class="col-sm-11 align-self-center mt-2">
          <b>Courage –</b> we think differently and are not afraid to innovate to bring progression to what we do and how we do it.</div>

          <div class="col-sm-1 mt-2">
          <img src="img/simplicity.png" class="img-rounded" alt="simplicity" width="80" height="80"></div><div class="col-sm-11 align-self-center mt-2">
          <b>Simplicity –</b> we are clear in everything we do and how we do it. We are free from complexity and complication. We are friendly,approachable and easy to do business with.</div>

        </div>
      </div>
    </div>
  </div>
</div>

<br>
<br>

<!--for cards-->
<div class='animated fadeInUp'>
<div class="container-fluid">
  <div class="row">

    <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center">
      <div class="card border-primary mt-3 cdh" >
        <img src="img/doctor5.jpg" class="card-img-top img" alt="wisdom">
        <div class="card-header border-white ">Our vision</div>
          <div class="card-body ">
            <h5>Right care, in the right place</h5>
            <p class="card-text">Our Vision is to consistently deliver the right care, in the right place, at the right time and to be a premier organization to work, where patient care and saving lives remain our focus.</p>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center">
        <div class="card border-primary  mt-3 cdh" >
          <img src="img/family.jpg" class=" card-img-top img" alt="wisdom">
          <div class="card-header  border-white ">Our Mission</div>
            <div class="card-body ">
              <h5 class="card-title">Care our valued patients</h5>
              <p class="card-text">Our mission is to provide the best quality medical and care to our valued patients meeting the international standards.</p>
            </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center">
          <div class="card border-primary  mt-3 cdh">
          <img src="img/staff.jpg" class="card-img-top img" alt="wisdom">
            <div class="card-header  border-white ">Our Staff</div>
              <div class="card-body">
                <h5 class="card-title">Experienced,Friendly</h5>
                <p>We offer a wide range of opportunities in doctoring and are always looking for qulified doctors to join our team. </p>
              </div>
            </div>
      </div>
  </div>
</div>
</div>
 <br>
 <br> 



 
             



 <?php include 'footer.php';?> 

</body>
</html>

