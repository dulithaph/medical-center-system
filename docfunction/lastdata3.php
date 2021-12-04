<?php
include("db.php");

if(isset($_POST['cal'])){
      $usercal =$_SESSION['usn'];
    
    

    if($usercal != "" ){


   $query = "SELECT * FROM users WHERE username='$usercal'  ";

       $data = mysqli_query($conn, $query) ;
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    
                    
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                           
                    echo $fname , $lname;
                
                ?>

             <?php
                    
            }
        }
        else{
            ?>
           <tr>
              <td>Record not Found!</td>
           </tr>
           <?php
        }
    }
}

?>