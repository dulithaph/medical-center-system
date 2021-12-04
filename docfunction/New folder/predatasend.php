<?php 
echo $x;
 
  if(isset($_POST['save']))
  {   
      if(empty($_SESSION['userp'])){
        $uname = $x;//get username that enter early
        //$uname = $_POST ['uname']; 
        $drugcode = $_POST ['drugcode'];
        $des = $_POST ['des'];
        $dosage = $_POST ['dosage'];
        $period = $_POST['period'];
        $co = $_POST['co'];
        $date = date('Y-m-d');
        $dname=$_SESSION['user']['fname'];
        
         
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    
        $sql = "INSERT INTO prescription (username,drugcode,description,dosage,period,comment,date,dname)
        VALUES ('$x','$drugcode','$des','$dosage','$period','$co','$date','$dname')";
    
        $result= mysqli_query($conn,$sql);
        unset($_SESSION['userp']);
      
 
      }

    else
    {
      
      $uname = $_SESSION['userp']; //get username in text field
      //$uname = $_POST ['uname']; 
      $drugcode = $_POST ['drugcode'];
      $des = $_POST ['des'];
      $dosage = $_POST ['dosage'];
      $period = $_POST['period'];
      $co = $_POST['co'];
      $date = date('Y-m-d');
      $dname=$_SESSION['user']['fname'];
      
       
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
  
      $sql = "INSERT INTO prescription (username,drugcode,description,dosage,period,comment,date,dname)
      VALUES ('$uname','$drugcode','$des','$dosage','$period','$co','$date','$dname')";
  
      $result= mysqli_query($conn,$sql);
      unset($_SESSION['userp']);
    }
}
  
?>