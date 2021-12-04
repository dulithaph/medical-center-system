<?php
include("db.php");
$query = "SELECT ccfee,docfee FROM fee ";
           

		$data = mysqli_query($conn, $query) ;
			while($row = mysqli_fetch_assoc($data)){
				
				
				$ccfee =$row['ccfee'];
				$docfee= $row['docfee'];
				$_SESSION['fee1']=$row['ccfee'];
			    $_SESSION['fee2']=$row['docfee'];
			}


    if(isset($_POST['cal2'])){

		$drugfee= $_POST['drugfee'];
		
		
				
					
		
		$totalfee= $drugfee + $ccfee + $docfee;

		//echo "Sum: ",$totalfee;
        $_SESSION['sum']=$totalfee;
	}

    ?>