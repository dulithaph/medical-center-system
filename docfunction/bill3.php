<?php
include("db.php");


error_reporting(E_ERROR | E_PARSE); //for disable warnings
               // error_reporting(0);
               $y=$_GET[idx];
               $usernameb=$y;
               
            




       $query = "SELECT * FROM bill WHERE username='$y' ORDER BY Bill_Id DESC LIMIT 1 ";
		$data = mysqli_query($conn, $query) ;
			while($row = mysqli_fetch_assoc($data)){
				
			
				$payment= $row['Payment'];
			    $drugfee= $row['drugfee'];
			   
            }
            

        $query1 = "SELECT * FROM fee ";
        $data1 = mysqli_query($conn, $query1) ;
                while($row = mysqli_fetch_assoc($data1)){
                    
                    
                    $ccfee =$row['ccfee'];
                    $docfee= $row['docfee'];
                    $_SESSION['fee1']=$row['ccfee'];
                    $_SESSION['fee2']=$row['docfee'];
                   
                }   
                
                
        
       $query2 = "SELECT * FROM prescription WHERE username='$y' ORDER BY prescription_id DESC LIMIT 1 ";
		$data2 = mysqli_query($conn, $query2) ;
			while($row = mysqli_fetch_assoc($data2)){
				
                   $drugcode=$row['drugcode'];
			       $dname=$row['dname'];
            }


            $query3 = "SELECT * FROM users WHERE username='$y' ORDER BY username DESC LIMIT 1";
            $data3 = mysqli_query($conn, $query3) ;
                while($row = mysqli_fetch_assoc($data3)){
                    
                       $fname=$row['fname'];
                       $lname=$row['lname'];
                       $em=$row['email'];
                
                }
//billllllllllllllllllllllllllllllllllllllllll maillllllllllllllllll

            // echo $em;
                //email the Bill
                $subject="Bill For Treatments";
                // Content-Type helps email client to parse file as HTML 
                // therefore retaining styles
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message = "<html>
                <head>
                    <title>Bill For Treatments</title>
                </head>
                <body>
                <h4 style='color:red;font-family:calibri;font-size:15px;'> ***Private Medical Center - Kalutara*** </h4>
                      <h4 style='color:red;font-family:calibri;font-size:15px;'> ***Bill For Treatments - ".date('Y-m-d')."*** </h4>
                      <p style='color:darkblue;font-family:calibri;font-size:18px'>Doctor Name:".$dname."
                      <br>Date:".date('Y-m-d')."
                      <br>Drugs:".$drugcode."
                        <br>Drugs Fee:".$drugfee."/=
                        <br>Channeling Fee:".$ccfee."/=
                        <br>Doctor Fee:".$docfee."/=
                        <br>
                         </p>
                      <p style='color:red;font-family:calibri;font-size:20px'>Total Fee:".$payment."/=</p>
                      
                      <h5 style='color:red;font-family:calibri;font-size:17px;'> +9434 222 1363 Call us for if you have any problems or inquiries</h5>
                      
                      </body>
                      </html>";
              
              
                    
                            mail($em, $subject, $message, $headers);
                            //  $_SESSION['success']  = "Copy of Bill send to the patient's Mail";
                              
                            
    

   

    ?>