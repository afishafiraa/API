<?php
    include 'koneksi.php';

if(!empty($_POST["id"]) && !empty($_POST["nama"]) && !empty($_POST["email"]) && !empty($_POST["nohp"]) && !empty($_POST["alamat"])){
    $id = $_POST ["id"];
    $nama = $_POST ["nama"];
    $email = $_POST ["email"];
    $nohp = $_POST ["nohp"];
    $alamat = $_POST ["alamat"];

    $sql = "INSERT INTO mahasiswa (id, nama, email, nohp, alamat) VALUES ('$id','$nama','$email','$nohp','$alamat');";
    if($conn->query($sql)=== TRUE){
        echo "berhasil menambahkan data";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else {
    echo "id, nama, email, nohp, alamat harus diisi";
}

mysqli_close($conn);

?>