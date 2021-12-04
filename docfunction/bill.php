<?php

$query = "SELECT ccfee,docfee FROM fee ";
           

		$data = mysqli_query($conn, $query) ;
			while($row = mysqli_fetch_assoc($data)){
				
				
				$ccfee =$row['ccfee'];
				$docfee= $row['docfee'];
				$_SESSION['fee1']=$row['ccfee'];
			    $_SESSION['fee2']=$row['docfee'];
			}


    if(isset($_POST['cal'])){

		$drugfee= $_POST['drugfee'];	
		
		$totalfee= $drugfee + $ccfee + $docfee;

		//echo "Sum: ",$totalfee;
		$_SESSION['sum']=$drugfee + $ccfee + $docfee;
		
		
	
		$usercal=$_SESSION['usn'];
		$date = date('Y-m-d');

		$sql = "INSERT INTO bill (username,Payment,Date,drugfee)
		VALUES ('$usercal','$totalfee','$date','$drugfee')";
	
		$result= mysqli_query($conn,$sql);



	}
	           
	

?>
 