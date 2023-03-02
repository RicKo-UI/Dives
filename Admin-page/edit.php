<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Program</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <div class="card mx-auto p-3" style="width: 50%;">
                    <h3 class="mb-3">Edit Data</h3>
                    <?php
                    include "../config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM tb_program INNER JOIN tb_jenisprogram ON 
                    tb_program.id_jenisprogram = tb_jenisprogram.id_jenisprogram AND id_program='$_GET[id]'");
                    $data = mysqli_fetch_array($sql);
                    ?>
                    <form action="editproses.php" method="post" enctype="multipart/form-data">
                        <input name="id" value="<?php echo $data['id_program']; ?>"  hidden />
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="judul_program" value="<?php echo $data['judul_program']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Penyelenggara</label>
                            <input type="text" name="penyelenggara" value="<?php echo $data['penyelenggara']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Program</label>
                            <select name="id_jenisprogram" id="" class="form-control">
                                <?php
                                    echo "<option value=$data[id_jenisprogram]> $data[nama_jenis] </option>";
                                    $query = mysqli_query($conn, "SELECT * FROM tb_jenisprogram") or die (mysqli_error($conn));
                                    while($data = mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_jenisprogram]> $data[nama_jenis] </option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <?php
                            include "../config.php";
                            $sql = mysqli_query($conn, "SELECT * FROM tb_program INNER JOIN tb_jenisprogram ON
                            tb_program.id_jenisprogram = tb_jenisprogram.id_jenisprogram AND id_program='$_GET[id]'");
                            $data = mysqli_fetch_array($sql);
                        ?>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <input type="text" name="lokasi" value="<?php echo $data['lokasi']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal_mulai" value="<?php echo $data['tanggal_mulai']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jam</label>
                            <input type="text" name="jam" value="<?php echo $data['jam']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Biaya</label>
                            <input type="text" name="biaya" value="<?php echo $data['biaya']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kuota</label>
                            <input type="text" name="kuota" value="<?php echo $data['kuota']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;">
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Simpan" name="proses" class="btn btn-primary">
                            <a href="index.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>