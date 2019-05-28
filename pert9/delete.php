<?php
    include 'koneksi.php';

if(!empty($_POST["id"])){
    $id = $_POST ["id"];
    
    $sql ="SELECT id FROM mahasiswa WHERE id ='$id'";

    if(mysqli_num_rows($conn->query($sql))==1){
        $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
    
    if($conn->query($sql)=== TRUE){
        echo "berhasil menambahkan data";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    else{
        echo "data tidak ada";
    }
}else {
    echo "id harus diisi";
}

mysqli_close($conn);

?>