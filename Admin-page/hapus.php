<?php

$data = $_GET['id'];
session_start();

//untuk memanggil koneksi
$conn = mysqli_connect("localhost", "root", "", "db_dives");
//syntaks sql untuk menghapus data
$delete = mysqli_query($conn, "delete FROM tb_program WHERE id_program=".$data);

$_SESSION["sukses"] = 'Data Berhasil Dihapus';

//berhasil larikan ke index.php
header('Location: index.php');

?>