<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dives - Admin</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php 
		session_start();

		include "../komponen/navbar.php";
	
		// cek apakah yang mengakses halaman ini sudah login
		if($_SESSION['level']==""){
			header("location:index.php?pesan=gagal");
		}
	?>
	<div class="container-fluid pt-3">
		<div class="row mb-3">
			<div class="col-6">
				<h3>Data Program</h3>
			</div>
			<div class="col-6">
				<a href="tambah.php" class="btn btn-primary float-right">Tambah Program</a>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<table width="100%" class="table-hover table-bordered">
					<tr>
						<th class="py-3">No</th>
						<th>Judul</th>
						<th>Penyelenggara</th>
						<th>Jenis Program</th>
						<th>Deskripsi</th>
						<th>Lokasi</th>
						<th>Tanggal Mulai</th>
						<th>Durasi</th>
						<th>Biaya</th>
						<th>Kuota</th>
						<th>Gambar</th>
						<th>Opsi</th>
					</tr>
					<?php
						// Create database connection using config file
						include_once("../config.php");
						
						// Fetch all users data from database
						$result = mysqli_query($conn, "SELECT * FROM tb_program INNER JOIN tb_jenisprogram 
						ON tb_program.id_jenisprogram = tb_jenisprogram.id_jenisprogram");
						$nomor = 1;
						while($data = mysqli_fetch_array($result)){
					?>
					<tr>
						<td class="py-3"><?php echo $nomor++; ?></td>
						<td><?php echo $data['judul_program']; ?></td>
						<td><?php echo $data['penyelenggara']; ?></td>
						<td><?php echo $data['nama_jenis']; ?></td>
						<td><?php echo $data['deskripsi']; ?></td>
						<td><?php echo $data['lokasi']; ?></td>
						<td><?php echo $data['tanggal_mulai']; ?></td>
						<td><?php echo $data['jam']; ?></td>
						<td><?php echo $data['biaya']; ?></td>
						<td><?php echo $data['kuota']; ?></td>
						<td><img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px; height: 120px;"></td>
						<td>
							<a class="btn btn-outline-primary" href="edit.php?id=<?php echo $data['id_program']; ?>">Edit</a>
							<a class="btn btn-outline-danger" href="hapus.php?id=<?php echo $data['id_program']; ?>" onclick="return confirm('Apakah anda yakin ingin hapus ?')">Hapus</a>					
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>