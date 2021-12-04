<?php
include('signinFunctions.php');
if (!isCashier()) {
	$_SESSION['msg'] = "You must log as a Doctor to access this";
   header('location: signin.php');
  //  global $x;
    
}
global $y;
global $z;
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


<script type="text/javascript">
function fun()
 {
   document.getElementById('p1').innerHtml = "Paid";
 }
</script>

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
<img src="img/cashier.jpg" class="img-fluid" alt="Responsive image">

<!-- details of PAtient for each day -->
<?php
$todayDate=date("Y-m-d"); 
$sql1 = "SELECT * FROM appointments WHERE date='$todayDate'";
$res1 = mysqli_query($db, $sql1);?>
 

 <div class="container-fluid">
    <div class="row ">
        
        <div class=" col-md-6">
       
<br>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>AppointmentID</th>
        <th>Username</th>
        <th>Full Name</th>
        
        <th>TimeSlot</th>
        <th>Show Bill</th>
        <th>Confirm Payment</th>
        <th>Status</th>
        
        
      </tr>
    </thead>


<?php
if (mysqli_num_rows($res1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res1)) {
      ?>
      <?php 

        $appointmentId=$row["appointmentId"];
        $Pusername=$row["username"];
        $name=$row["name"];
        
        $date=$row["date"];
        $timeSlott=$row["timeslot"];
        $status=$row["payementStatus"];
        
        echo '<tr> 
                  <td>'.$appointmentId.'</td> 
                  <td>'.$Pusername.'</td> 
                  <td>'.$name.'</td>  
            
                  <td>'.$timeSlott.'</td>';
?>

    
   
      <td><a href="cashier.php?idx=<?php echo $row["username"]; ?>"  type="button" class="btn btn-info btn-sm" >Bill</a> </td>
      <td><a href="cashier.php?x=<?php echo $row["username"]; ?>"  type="button" class="btn btn-info btn-sm" >Pay</a> </td>
      <?php echo'<td>'.$status.'</td>' ?>
      <?php include('docfunction/bill3.php'); ?>
     
      
     
     
    
    

    </td>

              
              </tr>
               
<?php 
    }

} else {
    echo "0 results";
}

?>
</table>
<?php include('paymentConfirm.php');?>
</div>

<div class=" col-md-1 ">
</div>

<div class=" col-md-4 mt-5 mr-1">
<?php
//error_reporting(E_ERROR | E_PARSE); //for disable warnings
               // error_reporting(0);
               $y=$_GET[idx];
               $appuser=$y;
               
               ?>


 <form class="one">     
 <div class="container-fluid">
<div class="row">

<div class=" col-md-6 ">
<p><b>Kaluthara Medical</b>
     </p>
</div>

<div class=" col-md-6 ">
<pre> Kaluthara Medical,
     Srilanka.
 Phone: +94110570313</pre>
</div>



</div>
</div>

 <table class="table table-borderless ">
        
  <tbody>

    <tr class="table-active">
      <td>DR.<?php echo $dname ;?></td>
      <td></td>
    </tr>

    <tr>
      <td><b>Patient Name</td>
      <td> <?php echo $fname ," ", $lname;?></td>
    </tr>

    <tr>
      <td><b>Date</td>
      <td><?php  $date = date('Y-m-d'); echo $date;?></td>
    </tr>

    <tr>
      <td>Drugs:</td>
      <td>
            
                            <?php

$query2 = "SELECT * FROM prescription WHERE username='$y' ORDER BY prescription_id DESC LIMIT 1 ";
$data2 = mysqli_query($conn, $query2) ;
  while($row = mysqli_fetch_assoc($data2)){
    
               $drugcode=$row['drugcode'];
               $dosage=$row['dosage'];

               if($mark=explode("/", $row['drugcode'] )){
                foreach($mark as $drugcode){
                  echo $drugcode." <br/>"; }} 

                  
        }
                           
                                ?> </td>                       
                              
    </tr>
    <tr>
      <td>Drug fee:</td>
      <td><?php echo $drugfee; echo"/="?> </td>
    </tr>

    <tr>
      <td>Channaling fee:</td>
      <td><?php echo $ccfee; echo"/="?></td>
    </tr>
    
    <tr>
      <td>Doctor fee:</td>
      <td><?php  echo $docfee; echo"/="?></td>
    </tr>

    <tr class="table-active">
      <td><b>Total fee:</b></td>
      <td><b><?php echo $payment; echo"/=" ?></b>  </td>
    </tr>
    
  </tbody>
</table>



<div class="container-fluid">
<div class="row">
<div class=" col-md-12 ">
<pre><i>Thank you for choosing Private Medical Center-Kaluthara
                 as your heltcare provider.</i>
     </pre>
</div>
</div>
</div>

</form>
 <br>
     <div class="btn">    
          <button type="button" class="btn btn-primary" onclick="fun()">Print</button>
          <p id="p1"></p>
     </div> 

</div>


        </div>
        </div>


<br>

<br>







<?php include 'footer.php';?> 

</body>
</html>