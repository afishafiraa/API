<?php
    include 'koneksi.php';

    $sql = "SELECT * FROM mahasiswa";
    $result = $conn->query($sql);

    $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    echo json_encode($json);

    mysqli_close($conn);

    //print_r($result);

?>