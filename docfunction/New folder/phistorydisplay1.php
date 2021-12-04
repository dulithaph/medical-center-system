<?php

//patient details /from user table according to username

    include("db.php");
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $_SESSION['userp']=$_POST['username']; //save username when enter once
        
        if($username != "" || $email != ""  || $fname != "" ){
            
            $query = "SELECT * FROM users WHERE  username='$username' OR email ='$email' OR fname='$fname'  ";
            

            $data = mysqli_query($conn, $query) or die('error');
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    $fname= $row['fname'];
                    $lname= $row['lname'];
            
                    $age= $row['age'];
                    $contactNo= $row['contactNo'];
                    $gender= $row['gender'];
                    $email= $row['email'];
                   ?>
                   
                <tr>
                    <td><?php echo $fname;?></td>
                    <td><?php echo $lname;?></td>
                    <td><?php echo $age;?></td>
                    <td><?php echo $contactNo;?></td>
                    <td><?php echo $gender;?></td>
                    <td><?php echo $email;?></td> 
                    
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
    else{
        $username=$x;
        $_SESSION['userp']=$x; //save username when enter once
        
        if($username != "" || $email != ""  || $fname != "" ){
            
            $query = "SELECT * FROM users WHERE  username='$username' OR email ='$email' OR fname='$fname'  ";
            

            $data = mysqli_query($conn, $query) or die('error');
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    $fname= $row['fname'];
                    $lname= $row['lname'];
            
                    $age= $row['age'];
                    $contactNo= $row['contactNo'];
                    $gender= $row['gender'];
                    $email= $row['email'];
                   ?>
                   
                <tr>
                    <td><?php echo $fname;?></td>
                    <td><?php echo $lname;?></td>
                    <td><?php echo $age;?></td>
                    <td><?php echo $contactNo;?></td>
                    <td><?php echo $gender;?></td>
                    <td><?php echo $email;?></td> 
                    
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