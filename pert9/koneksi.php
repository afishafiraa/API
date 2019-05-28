<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "homestead";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//Check connnection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>