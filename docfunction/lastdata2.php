<?php
include("db.php");

if(isset($_POST['cal'])){
      $usercal =$_SESSION['usn'];
    
    

    if($usercal != "" ){


   $query = "SELECT * FROM prescription WHERE username='$usercal' ORDER BY prescription_id DESC LIMIT 1  ";

       $data = mysqli_query($conn, $query) ;
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                      
                    $drugcode = $row['drugcode'];
                    $dosage   = $row['dosage'];

                 $query="select * from prescription";
                 
                    ?> <table>
                         <tr>
                          <td>  <?php
                            if($mark=explode("/", $row['drugcode'] )){
                              foreach($mark as $drugcode){
                                echo $drugcode." <br/>"; }} 
                                ?> </td> 
                              <td> <?php 
                                
                                if($mark=explode("/", $row['dosage'] )){
                                    foreach($mark as $dosage){
                                       echo $dosage."<br/>"; } }  
                                ?> </td></tr> </table>
                

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