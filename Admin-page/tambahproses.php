<?php

include "../config.php";

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
            $query = "INSERT INTO tb_program (judul_program, penyelenggara, id_jenisprogram, deskripsi, lokasi,
            tanggal_mulai, jam, biaya, kuota, gambar) VALUES ('$judul_program', '$penyelenggara', '$id_jenisprogram',
            '$deskripsi', '$lokasi', '$tanggal_mulai', '$jam', '$biaya', '$kuota', '$nama_gambar_baru')";
            $result = mysqli_query($conn, $query);

            header("location:index.php");
        }
        else{
            $query = "INSERT INTO tb_program (judul_program, penyelenggara, id_jenisprogram, deskripsi, lokasi,
            tanggal_mulai, jam, biaya, kuota, gambar) VALUES ('$judul_program', '$penyelenggara', '$id_jenisprogram',
            '$deskripsi', '$lokasi', '$tanggal_mulai', '$jam', '$biaya', '$kuota', 'null')";
            $result = mysqli_query($conn, $query);

            header("location:tambah.php");
        }
    }
?>