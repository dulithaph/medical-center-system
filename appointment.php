<?php

include('signinFunctions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "*You must Sign in in first*";
	header('location: signin.php');
}
?>

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'private_medical_center');
global $date;
if(isset($_GET['date'])){
    $date = $_GET['date'];

    $stmt = $mysqli->prepare("select * from appointments where date= ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $fname =$_SESSION['user']['fname']; 
    $lname =$_SESSION['user']['lname'];
    $username=$_SESSION['user']['username'];
    $name=$fname.$lname;
    $email = $_SESSION['user']['email'];
    $timeslot=$_POST['timeslot'];
    // $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');

    $stmtx = $mysqli->prepare("select * from appointments where date= ? AND username=?");
    $stmtx->bind_param('ss', $date,$username );
    if($stmtx->execute())
    {
        $resultx = $stmtx->get_result();
        if($resultx->num_rows>0){
            $msg = "<div class='alert alert-danger'>You can Only Book One timeslot for the Date - $date </div>";
        }

        else
        {
            $stmt = $mysqli->prepare("select * from appointments where date= ? AND timeslot=?");
            $stmt->bind_param('ss', $date,$timeslot );
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows>0){
                    $msg = "<div class='alert alert-danger'>Already Reserved Doctor for this time Slot </div>";
                }
                else{
        
                    //methanata dala balanna if ekak userta
                    $stmt = $mysqli->prepare("INSERT INTO appointments (username,name, email, date,timeslot) VALUES (?,?,?,?,?)");
                    $stmt->bind_param('sssss',$username, $name, $email, $date,$timeslot);
                    $stmt->execute();
                    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
                    $bookings[]=$timeslot;
                    $stmt->close();
                    $mysqli->close();
                    // header('location: index.php');
        
                }
            }
        }
    }




    
    

    

}

$duration=15;
$cleanup=0;
$start="18:00";
$end="21:00";



function timeslots($duration,$cleanup,$start,$end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval=new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");

   

    $slots=array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);

        if($endPeriod>$end){
            break;
        }
        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="img/logo.png" />
  <title>TIME SLOT | Private medical center-Kaluthara</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="index.css">
  

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <!-- Animate css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
    <style>
    .book {
        width:300px;
        height:55px;
       font-family:Bebas Neue;
       font-size:25px;
    }
 


    </style>
  </head>

  <body>
  <div class="row ">
  <h1 style="font-family:Arial Rounded MT Bold;font-size:2.5vw;" class="text-center">RESERVE YOUR TIME SLOT <br>FOR DATE: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
         
    <div class="container animated fadeIn">
        <div class="row">
        <div class="col-md-12">
        <?php echo isset($msg)?$msg:""; ?>
        </div>


           <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
           foreach($timeslots as $ts){
           ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                
                    <!-- <button class="btn btn-success book"data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button> -->
                    <?php if(in_array($ts, $bookings)){ ?>
                             <button title="Already Reserved This Time Slot" class="btn btn-danger book " disabled style="background-color:red;"><?php echo $ts; ?></button>
                    <?php }else{ ?>
                         <button title="Click here to Reserve a Doctor" class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"> <?php echo $ts; ?></button>

                    <?php } ?>
                </div>
            
            </div>

            <?php } ?>

        </div>
    </div>

    
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <!-- BOOKING FORM -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Doctor Appoinments for Timeslot - <span id="slot"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">timeslot </label>
                                <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Name </label>
                                <h6 Style="font-family:calibri;font-size:23px;"> <?php echo $_SESSION['user']['fname']; ?>  <?php echo $_SESSION['user']['lname']; ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="">Email </label>
                               <h6 Style="font-family:calibri;font-size:23px;"> <?php echo $_SESSION['user']['email']; ?></h6>
                            </div>
                            <div class="form-group pull-right">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    


</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <h5><img src="img/green.jpg" width="70" height="35" class="d-inline-block align-center" />  Available Time Slots</h6>
            <h5><img src="img/red.jpg" width="70" height="35" class="d-inline-block align-center" />  Already Reserved Time Slots</h6>
        </div>
           
        <div class="col-xs-12 col-sm-6 col-md-4"><br>
            <a href="calendar.php"><button style="text-align:center;" type="button" class="btn btn-primary">BACK TO APPOINTMENTS CALENDAR</button></a></div>
        <div class="col-xs-12 col-sm-6 col-md-4"></div>
    
    </div>
</div> 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
         

        })
    </script>



    </div>
</body>

</html>


<?php //For Contact us Submit Form 
if (isset($_POST['submit'])) {
    $db = mysqli_connect('localhost', 'root', '', 'private_medical_center');
    $query1 = "SELECT * FROM appointments WHERE timeslot='$timeslot' AND date='$date' LIMIT 1";
    $results = mysqli_query($db, $query1);
    $AppointmentsDetails = mysqli_fetch_assoc($results);
    $_SESSION['app'] = $AppointmentsDetails;
    $appointmentId=$_SESSION['app']['appointmentId'];
  

  $subject="Your Appintment Successfully Created";
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $message = "<html>
  <head>
  	<title>New message from website contact form</title>
  </head>
  <body>
        <h4 style='color:darkblue;font-family:calibri;font-size:15px;'> ***Your Appintment Successfully Created*** </h4>
        <h4 style='color:darkblue;font-family:calibri;font-size:15px;'> Date - $date</h4>
        <h4 style='color:darkblue;font-family:calibri;font-size:15px;'> Time Slot - $timeslot </h4>
        <p style='color:darkblue;font-family:calibri;font-size:20px'>Your Username is: '$username'</p>
        <p>Your appointment is created for '$email' email and stay connect with us to get latest news</p>
        <h5 style='color:red;font-family:calibri;font-size:15px;'> *****Don't forget your Appointment ID is :'$appointmentId'***** </h5>
        <h5 style='color:black;font-family:calibri;font-size:12px;'> +9434 222 1363 Call us for if you have any problems or inquiries</h5>
        
        </body>
        </html>";


        
          $email = test_input($email);
		        // check if e-mail address is well-formed
		        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              mail($email, $subject, $message, $headers);
            //    $_SESSION['signup']  = "Your Details send to your Email.<br>Please do not forget your credentials";
                }
                
  }

  ?>