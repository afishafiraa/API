<?php
    include 'koneksi.php';

if(!empty($_POST["id"]) && !empty($_POST["nama"]) && !empty($_POST["email"]) && !empty($_POST["nohp"]) && !empty($_POST["alamat"])){
    $id = $_POST ["id"];
    $nama = $_POST ["nama"];
    $email = $_POST ["email"];
    $nohp = $_POST ["nohp"];
    $alamat = $_POST ["alamat"];
    
    $sql ="SELECT id FROM mahasiswa WHERE id ='$id'";

    if(mysqli_num_rows($conn->query($sql))==1){
        $sql = "UPDATE mahasiswa SET nama ='$nama', email ='$email', nohp='$nohp', alamat='$alamat' WHERE id = '$id'";
    
    if($conn->query($sql)=== TRUE){
        echo "berhasil mengubah data";
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