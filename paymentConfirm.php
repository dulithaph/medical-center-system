<?php
include("db.php");
error_reporting(E_ERROR | E_PARSE); //for disable warnings
               // error_reporting(0);
               $z=$_GET[x];
              $d=date('Y-m-d');
              $ok='Payment OK';
              
               $q1 = "UPDATE appointments
               SET payementStatus = 'Payment Ok'
               WHERE username='$z'";
               
              if( mysqli_query($conn, $q1))
              {
                //   echo 'ok';
                
                header('location: cashier.php');

                 
                }




              
              else{
                //   echo 'Not Ok';
              }
               ?>