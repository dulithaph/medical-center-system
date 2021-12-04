<DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png" />
<title>Private Medical Center-Kalutara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<style>
table{border-collapse:collapse;}
   td,th{border:1px solid black; padding:10px;}
</style>


<!--for nav bar-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="inc/footer.css">
<link rel="stylesheet" type="text/css" href="header.css">
<link rel="stylesheet" type="text/css" href="footer.css">  

</head>

<body>

<header > 
<nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  LOGO
               </div>
               <div class="menu">
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Contact</a></li>
                  </ul>
               </div>
            </nav>
         
         
</header>

<form method="post" action="test5.php">
Enter Username: <br><br><input type="text" name="FirstName"><br><br>
<input type="submit" name="submit" value="Show Prescription">
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $db=mysqli_connect("localhost","root","","private_medical_center");

    /*if($db){
        echo "Connecton established: <br>";
    }else{
        die("Connection failed. Reason: ". mysql_connect_error());
    }*/
?>

<table border="1" align="center">
<tr>
  <td>ID</td>
  <td>Firtst name</td>
  <td>Last Name</td>
</tr>

<?php
    $name = $_POST["FirstName"];
    

    $sql = "SELECT id,fname,lname FROM users WHERE username= '".$name."'";

    $results = mysqli_query($db,$sql);

    if(mysqli_num_rows($results)>0) {
        while($row=mysqli_fetch_array($results)) {
           //echo $row["id"]." ".$row["fname"]."<br><br> ".$row["lname"];

           echo
   "<tr>
    <td>{$row['id']}</td>
    <td>{$row['fname']}</td>
    <td>{$row['lname']}</td>
   </tr>\n";

            echo "<br>";
        }
    }
    mysqli_close($db);
}


?>

<?php include 'footer.php';?>
</body>

</html>