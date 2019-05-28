<?php
    include 'koneksi.php';

    if(!empty($_POST["id"])){
        $id = $_POST ["id"];

    $sql = "SELECT * FROM mahasiswa where id='$id'";
    if (mysqli_num_rows($conn->query($sql))==1){
        $result = $conn->query($sql);

        $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        echo json_encode($json);
        }
    else{
        echo "data tidak ditemukan";
    }
}else{
    echo "id harus diisi";
}    

    mysqli_close($conn);
?>