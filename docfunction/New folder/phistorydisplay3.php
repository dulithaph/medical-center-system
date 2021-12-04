<?php
    include("db.php");

    //prescription history acoording enter user name/from prescription table
    

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        

        if($username != "" || $email != ""  || $fname != "" ){
           // $dname=$_SESSION['user']['fname'];
            $query = "SELECT drugcode,description,dosage,period,comment,date,dname FROM prescription  WHERE  username='$username' AND dname!='$dname'  ORDER BY prescription_id DESC LIMIT 5";
            

            $data = mysqli_query($conn, $query) ;
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    
                    
                    $drugcode = $row['drugcode'];
                    $description= $row['description'];
                    $dosage= $row['dosage'];
                    $period= $row['period'];
                    $comment= $row['comment'];

                    $date = $row['date'];
                    $docname = $row['dname'];

                    ?>

                   

                 <tr>
                
                    <td>
                    <?php
                     $query="select drugcode from prescription";
                     
                        
                                if($mark=explode("/", $row['drugcode'] )){
                                  foreach($mark as $drugcode){
                                    echo $drugcode."<br/>"; }} ?>
                    
                    </td>
                    
                    <td>
                         <?php 
                         $query="select description from prescription";
                     
                        
                             if($mark=explode("/", $row['description'] )){
                               foreach($mark as $description){
                                  echo $description."<br/>"; } }   ?>
                    
                    </td> 


                    <td>
                           <?php 
                           $query="select dosage from prescription";
                           
                              
                                 if($mark=explode("/", $row['dosage'] )){
                                    foreach($mark as $dosage){
                                       echo $dosage."<br/>"; } } ?>
                    </td> 


                    <td>
                          <?php 
                           $query="select period from prescription";
                           
                              
                                 if($mark=explode("/", $row['period'] )){
                                    foreach($mark as $period){
                                       echo $period."<br/>"; } } ?>
                    </td> 


                    <td>
                           <?php 
                           $query="select comment from prescription";
                           
                              
                                 if($mark=explode("/", $row['comment'] )){
                                    foreach($mark as $comment){
                                       echo $comment."<br/>"; } } ?>
                    </td> 


                    <td>
                    <?php echo $date;?>
                    </td> 

                    <td>
                           <?php 
                           $query="select dname from prescription";
                           
                              
                                 if($mark=explode("/", $row['dname'] )){
                                    foreach($mark as $docname){
                                       echo $docname."<br/>"; } } ?>
                    </td> 
                    
                 </tr>

                 

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


   //  With Click previous page Autofill
   // 
else{

   $username = $x;
      
        

        if($username != "" || $email != ""  || $fname != "" ){
           // $dname=$_SESSION['user']['fname'];
            $query = "SELECT drugcode,description,dosage,period,comment,date,dname FROM prescription  WHERE  username='$username'   ORDER BY prescription_id DESC LIMIT 5";
            

            $data = mysqli_query($conn, $query) ;
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    
                    
                    $drugcode = $row['drugcode'];
                    $description= $row['description'];
                    $dosage= $row['dosage'];
                    $period= $row['period'];
                    $comment= $row['comment'];

                    $date = $row['date'];
                    $docname = $row['dname'];

                    ?>

                   

                 <tr>
                
                    <td>
                    <?php
                     $query="select drugcode from prescription";
                     
                        
                                if($mark=explode("/", $row['drugcode'] )){
                                  foreach($mark as $drugcode){
                                    echo $drugcode."<br/>"; }} ?>
                    
                    </td>
                    
                    <td>
                         <?php 
                         $query="select description from prescription";
                     
                        
                             if($mark=explode("/", $row['description'] )){
                               foreach($mark as $description){
                                  echo $description."<br/>"; } }   ?>
                    
                    </td> 


                    <td>
                           <?php 
                           $query="select dosage from prescription";
                           
                              
                                 if($mark=explode("/", $row['dosage'] )){
                                    foreach($mark as $dosage){
                                       echo $dosage."<br/>"; } } ?>
                    </td> 


                    <td>
                          <?php 
                           $query="select period from prescription";
                           
                              
                                 if($mark=explode("/", $row['period'] )){
                                    foreach($mark as $period){
                                       echo $period."<br/>"; } } ?>
                    </td> 


                    <td>
                           <?php 
                           $query="select comment from prescription";
                           
                              
                                 if($mark=explode("/", $row['comment'] )){
                                    foreach($mark as $comment){
                                       echo $comment."<br/>"; } } ?>
                    </td> 


                    <td>
                    <?php echo $date;?>
                    </td> 

                    <td>
                           <?php 
                           $query="select dname from prescription";
                           
                              
                                 if($mark=explode("/", $row['dname'] )){
                                    foreach($mark as $docname){
                                       echo $docname."<br/>"; } } ?>
                    </td> 
                    
                 </tr>

                 

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