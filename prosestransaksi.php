<?php

if(isset($_POST['proses'])){
    $id_program = $_POST['id_program'];
    $nama_pendaftar = $_POST['nama_pendaftar'];
    $no_wa = $_POST['no_wa'];
    $jumlah = 1;

    include 'config.php';

    $jumlahseat = mysqli_query($conn, "SELECT * FROM tb_program WHERE id_program='$id_program'");
    $seat = mysqli_fetch_array($jumlahseat);
    $kuota = $seat['kuota'];

    $sisa = $kuota-$jumlah;
    $insert = mysqli_query($conn,"INSERT INTO tb_transaksi values('','$id_program','$nama_pendaftar','$no_wa')");

    if($insert){
        $insert1 = mysqli_query($conn, "UPDATE tb_program SET kuota='$sisa' WHERE id_program='$id_program'");
        header("location:index2.php");
    }
    else{
        echo "Error";
        header("location:index2.php");
    }
}
?>