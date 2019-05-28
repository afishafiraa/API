<?php

$servername ="localhost";
$username   ="root";
$password   ="";
$database   ="";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"])){
    $first_name = $_POST ["first_name"];
    $last_name = $_POST ["last_name"];

    $sql = "INSERT INTO actor (first_name, last_name) VALUES ('$first_name','$last_name');";
    if($conn->query($sql)=== TRUE){
        echo "berhasil menambahkan data";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else {
    echo "first_name dan last_name harus diisi";
}

mysqli_close($conn);