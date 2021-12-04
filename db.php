<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "private_medical_center";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if(!$conn){
    die("connection Failed!." .  mysqli_connect_error());
}

?>