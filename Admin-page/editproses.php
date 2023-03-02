<?php

include "../config.php";

$id = $_POST['id'];
$judul_program = $_POST['judul_program'];
$penyelenggara = $_POST['penyelenggara'];
$id_jenisprogram = $_POST['id_jenisprogram'];
$deskripsi = $_POST['deskripsi'];
$lokasi = $_POST['lokasi'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$jam = $_POST['jam'];
$biaya = $_POST['biaya'];
$kuota = $_POST['kuota'];
$gambar = $_FILES['gambar']['name'];

if($gambar != ""){
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

        $query = "UPDATE tb_program SET judul_program = '$judul_program', penyelenggara = '$penyelenggara', 
        id_jenisprogram = '$id_jenisprogram', deskripsi = '$deskripsi', lokasi = '$lokasi', tanggal_mulai = '$tanggal_mulai', 
        jam = '$jam', biaya = '$biaya', kuota = '$kuota', gambar = '$nama_gambar_baru' WHERE id_program = '$id'";
        $result = mysqli_query($conn, $query);

        header("location:index.php");
    }
    else{
        $query = "UPDATE tb_program SET judul_program = '$judul_program', penyelenggara = '$penyelenggara', 
        id_jenisprogram = '$id_jenisprogram', deskripsi = '$deskripsi', lokasi = '$lokasi', tanggal_mulai = '$tanggal_mulai', 
        jam = '$jam', biaya = '$biaya', kuota = '$kuota' WHERE id_program = '$id'";
        $result = mysqli_query($conn, $query);

        header("location:index.php");
    }
}
else{
    $query = "UPDATE tb_program SET judul_program = '$judul_program', penyelenggara = '$penyelenggara', 
    id_jenisprogram = '$id_jenisprogram', deskripsi = '$deskripsi', lokasi = '$lokasi', tanggal_mulai = '$tanggal_mulai', 
    jam = '$jam', biaya = '$biaya', kuota = '$kuota' WHERE id_program = '$id'";
    $result = mysqli_query($conn, $query);

    header("location:index.php");
}

?>