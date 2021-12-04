<?php

include('signinFunctions.php');

if (!isDoc()) {
	$_SESSION['msg'] = "You must log as a Doctor to access this";
   header('location: signin.php');
   global $x;
    
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


</head>

<body>
<?php 


?>

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
<br>
<div class="container-fluid">
    <div class="row ">
        <div class="col-xs-12 col-sm-6 col-md-4">
            
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center" >
        <h5 style='color:darkblue;font-family:Beauty Mountains Personal Use;font-size:28px;'>Welcome Dr.<?php echo $_SESSION['user']['fname']; ?> <?php echo $_SESSION['user']['lname']; ?></h5>
            
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 justify-content-center ">
        
        <a href="patientForEachDay.php" type="button" class="btn btn-secondary">Today Appointments</a>
        </div>
    </div>
</div>




<div class="container-fluid ">
<div class="row animated fadeIn">

<div class="col-md-6 sm-6 mb-5 mt-2 ">

<!--Find details using user name or *** -->

<div class="container justify-center card">
 

  <form class = "form-row align-item-center" action="doctor.php" method="POST">

       <div class="col-sm-4 my-1 ">
             <label class="sr-only" >UserName</label>
          <div class="input-group ">
              <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
              </div> 
              
              <?php 
              error_reporting(E_ERROR | E_PARSE); 
              $xy=$_GET[id]; ?> 
             <input type="text" class="form-control" name="username" placeholder="<?php echo $xy;?>" value="<?php echo $xy;?>">
        </div>
      </div>


     <div class="col-sm-4 my-1">
        <label class="sr-only">email</label>
         <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">Email</div>
              </div>   
           <input type="text" class="form-control" name="email" placeholder="email">
         </div>
      </div>

      <div class="col-sm-4 my-1">
        <label class="sr-only">LName</label>
         <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">LN</div>
              </div> 
              
         <input type="text" class="form-control" name="fname" placeholder="Last Name">
      </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 control-label"></label>
           <div class="col-lg-4">
              <input type="Submit" name="submit" placeholder="Name" value="Submit" class="btn btn-primary">
          </div>
    </div>

  </form>        
</div>


<!--patient details /from user table according to username-->

<div class="text-center one mt-2">
<h5 style='color:black;font-family:Bebas Neue Bold;font-size:24px;'>Patient Details</h5>
</div>

<div class="container-fluid mt-2">


   <table class="table table-responsive-sm table-striped">
      <thead class="thead-dark">
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th scope="col">Contact</th>
            <th scope="col">Gender</th>
           <th scope="col">Email</th>
        </tr>

      </thead>
  
      <tbody> 

       <?php 
       error_reporting(E_ERROR | E_PARSE); //for disable warnings
               // error_reporting(0);
               $x=$_GET[id];
               $_SESSION['xxy']=$_GET[id];
       include('docfunction/phistorydisplay1.php'); ?>
      
      </tbody>
   </table>
</div>

<hr>

<!--prescription history according to enter user name and account owner/from prescription table and sesson for account owner-->


<div class="text-center one">
<h5 style='color:darkblue;font-family:Bebas Neue Bold;font-size:24px;'>Treated Given By Me</h5>
</div>

<div class="container-fluid mt-2 ">

   <table class="table table-striped table-hover  table-responsive-sm ">
      <thead class="thead-dark" >
        <tr>
        
           <th scope="col">DrugCode</th> 
           <th scope="col">Description</th>
           <th scope="col">Dosage</th>
           <th scope="col">Period</th>
           <th scope="col">Comment</th>
           <th scope="col">Date</th>
           
        </tr>

      </thead>
  
      <tbody> 
      
       <?php include('docfunction/phistorydisplay2.php'); ?>
      
      </tbody>
   </table>

</div>

<hr>

<!--prescription history acoording enter user name/from prescription table-->

<div class="text-center one ">
<h5 style='color:darkblue;font-family:Bebas Neue Bold;font-size:24px;'>Treated Given By Other Doctors</h5>
</div>


<div class="container-fluid mt-2 ">

   <table class="table table-striped table-hover  table-responsive-sm ">
      <thead class="thead-dark" >
        <tr>
        
           <th scope="col">DrugCode</th> 
           <th scope="col">Description</th>
           <th scope="col">Dosage</th>
           <th scope="col">Period</th>
           <th scope="col">Comment</th>
           <th scope="col">Date</th>
           <th scope="col">Doctor Name</th>
           
        </tr>

      </thead>
  
      <tbody> 
     
       <?php include('docfunction/phistorydisplay3.php'); ?>
      
      </tbody>
   </table>

</div>




</div>  <!-- end first col-->


<div class="col-md-6 sm-6">

<div class="container-fluid mt-2">
<form action="doctor.php" method="post">


  <div class="form-group">
      <label for="exampleFormControlTextarea1">Drug Code</label>
      <textarea  class="form-control" rows="2"  name="drugcode"></textarea>
  </div>


  <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea  class="form-control" rows="2"  name="des"></textarea>
  </div>

  
  <div class="form-group">
      <label for="exampleFormControlTextarea1">Dosage</label>
      <textarea  class="form-control" rows="1"  name="dosage"></textarea>
  </div>

  <div class="form-group">
      <label for="exampleFormControlTextarea1">Period</label>
      <textarea  class="form-control" rows="1"  name="period"></textarea>
  </div>

  <div class="form-group">
      <label for="exampleFormControlTextarea1">Comments</label>
      <textarea  class="form-control" rows="3"  name="co"></textarea>
  </div>
  

  

  
     <div class="form-group">    
     
           <input type="Submit" name="save" placeholder="save" value="save" class="btn btn-primary">
     </div>      
     <!--  -->
     <?php include('docfunction/predatasend.php'); ?>
  
</form>  
</div>

<div class="container-fluid mt-5 mb-4">
<a class ="links" href="createUser.php">Create Acount for New Patient </a></h6>
</div>

</div> <!-- end second column-->

</div> <!-- end row and first div -->
</div>


<?php include 'footer.php';?> 

</body>
</html>