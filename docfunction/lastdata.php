<?php
include("db.php");


if(isset($_POST['show'])){
    $usern = $_POST['usern'];
    $_SESSION['usn']= $_POST['usern']; //create session acording to user name
    
    

    if($usern != "" ){


   $query = "SELECT * FROM prescription WHERE username='$usern' ORDER BY prescription_id DESC LIMIT 1  ";

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
                <?php echo $date;?>
                </td> 
                
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