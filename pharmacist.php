<?php
include('signinFunctions.php');
if (!isPhar()) {
	$_SESSION['msg'] = "You must log as a Pharmacist to access this";
   header('location: signin.php');
  //  global $x;
    
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
<link rel="stylesheet" type="text/css" href="pharmacist.js">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--for nav bar-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>




</head>
<body>
<?php include('navbar.php') ?>
<img src="img/ppp.jpg" class="img-fluid" alt="Responsive image">
<br>
<br>
<br>

<div class="container-fluid ">
<div class="row">


<div class="col-md-6 sm-6 mb-5 mt-2">
<div class="text-center one">
<h5 style='color:darkblue;font-family:Bebas Neue Bold;font-size:28px;'>prescription Area</h5>
</div>


<form class = "form-row align-item-center" action="pharmacist.php" method="POST">
<div class="col-sm-4 mt-3 ">
             <label class="sr-only" >UserName</label>
          <div class="input-group ">
              <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
              </div>   
             <input type="text" class="form-control" name="usern" placeholder="User Name">
        </div>
      </div>

<div class="form-group mt-3">    
           <input type="Submit" name="show" placeholder="save" value="Prescription Search" class="btn btn-primary">
     </div> 

     </form>     

<div class="container-fluid mt-2 ">

   <table class="table table-scriped table-hover  table-responsive-sm ">
      <thead class="thead-dark" >
        <tr>
           
           <th scope="col">Date</th>
           <th scope="col">DrugCode</th> 
           <th scope="col">Description</th>
           <th scope="col">Dosage</th>
           <th scope="col">Period</th>
           <th scope="col">Comment</th>
           <th scope="col">DoctorName</th>
           
           
        </tr>

      </thead>
  
      <tbody> 
     
       <?php include('docfunction/lastdata.php'); ?>
      
      </tbody>
   </table>

</div>
</div>

<!-- calculation-->

<div class="col-md-3 sm-6 mb-5 mt-2  ">

<div class="text-center one">
<h5 style='color:darkblue;font-family:Bebas Neue Bold;font-size:28px;'>Bill Calculation</h5>
</div>


<div class="container-fluid mt-2">
<form action="pharmacist.php" method="post">


  <div class="form-group">
      <label for="exampleFormControlTextarea1">Drug price</label>
      <input type="text" name="drugfee" placeholder="Total drug price "  class="form-control">
  </div>
  
  
   <div class="form-group">    
         <input type="Submit" name="cal" placeholder="save" value="Calculate" class="btn btn-primary">
    </div>      
    
     <?php include('docfunction/bill.php'); ?>
   

   <div>  
     <div class="form-group">
      <label>Chanalling Fee  </label>
      <input type="text" name="docfee" placeholder="<?php echo $_SESSION['fee1']; ?>/-"  class="form-control" readonly>
  </div>
     
 

  <div class="form-group">
      <label>Doctor Fee </label>
      <input type="text" name="docfee" placeholder="<?php echo $_SESSION['fee2']; ?>/-"  class="form-control" readonly>
  </div>

</div>


</form>  
</div>

</div>

<div class="col-md-3 sm-6 mb-5 mt-2  ">

<div class="text-center one">
<h5 style='color:darkblue;font-family:Bebas Neue Bold;font-size:28px;'>Bill</h5>
</div>



<table class="table table-borderless">
  
  <tbody>
    <tr>
      <td><b>Appoinment No:1</td>
      <td></td>
    </tr>

    <tr>
      <td><b>Patient Name</td>
      <td><?php include('docfunction/lastdata3.php'); ?></td>
    </tr>

    <tr>
      <td><b>Date</td>
      <td><?php if(isset($_POST['cal'])){  $date = date('Y-m-d'); echo $date;}?></td>
    </tr>

    <tr>
      <td>Drugs:</td>
      <td><?php include('docfunction/lastdata2.php'); ?></td>
    </tr>
    <tr>
      <td>Drug fee:</td>
      <td><?php if(isset($_POST['cal'])){echo $drugfee;?> /= <?php } ?></td>
    </tr>
    <tr>
      <td>Channaling fee:</td>
      <td><?php if(isset($_POST['cal'])){echo $ccfee;?> /= <?php } ?></td>
    </tr>
    <tr>
      <td>Doctor fee:</td>
      <td><?php if(isset($_POST['cal'])){echo $docfee;?> /= <?php } ?></td>
    </tr>
    <tr class="table-active">
      <td>Total fee:</td>
      <td><?php if(isset($_POST['cal'])){?> <b> <?php echo $totalfee; ?> <b>/= <?php } ?></td>
    </tr>
    

  </tbody>
</table>

     

</div>   

</div>
</div>








<?php include 'footer.php';?> 

</body>
</html>