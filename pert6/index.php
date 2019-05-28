<?php

    @$key = $_GET['key'];
    if ($key!='1234'){
        exit();
    }

$servername ="localhost";
$username   ="root";
$password   ="";
$database   ="homestead";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//Check connnection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql = "SELECT mahasiswa.id, mahasiswa.nama, user.username FROM mahasiswa INNER JOIN user ON mahasiswa.id = user.id";
$result = $conn -> query($sql);

//print_r($result);

$rows = array();
while($r = mysqli_fetch_assoc($result)){
    $rows[] = $r;
}

//print_r($rows);
$rows = json_encode($rows);
print_r($rows);

?>