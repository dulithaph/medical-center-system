<?php
  
  $_SESSION['s']=$x;
 
  echo $_SESSION['s'];


  if(empty($_SESSION['userp'])){
    echo $_SESSION['s'];
    if(isset($_POST['save']))
    {   
       
        
        $uname =$_SESSION['s'];
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
  
        $result= mysqli_query($db,$sql);
        unset($_SESSION['userp']);

  }
}


else{
  if(isset($_POST['save']))
  {   
     
      
      $uname = $_SESSION['userp']; //get username that enter early
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
  
      $result= mysqli_query($db,$sql);
      unset($_SESSION['userp']);
  }
}
  
?>