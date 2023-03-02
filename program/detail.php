<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Program</title>
    <link rel="stylesheet" href="../CSS/detail_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
</head>

<body>
<?php 
		session_start();
	
		// cek apakah yang mengakses halaman ini sudah login
		if($_SESSION['level']==""){
			header("location:index.php?pesan=gagal");
		}
	?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-light sticky-top">
        <div class="container">
            <div class="logo">
                <a href='../index2.php'><img src="../assets/header logo.png" alt="Logo" width="124px"></a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item"><a href="../index2.php" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">Tentang Kami</a></li>
                <li class="nav-item"><a href="bootcamp.php" class="nav-link">Program</a></li>
                <li class="nav-item" style="padding-top: 7px;"><a href="../logout.php" class="tombol-log"><?php echo $_SESSION['email']; ?></a></li>
            </ul>
        </div>
    </nav>

    <!-- Detail Program -->
    <section>
        <div class="container">
            <div class="row mt-5 mb-4">
                <div class="col-1">
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="2em"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                <path class="back" fill="#000000"
                                    d="M2.614 5.426A1.5 1.5 0 0 1 4 4.5h10a7.5 7.5 0 1 1 0 15H5a1.5 1.5 0 0 1 0-3h9a4.5 4.5 0 1 0 0-9H7.621l.94.94a1.5 1.5 0 0 1-2.122 2.12l-3.5-3.5a1.5 1.5 0 0 1-.325-1.634Z" />
                            </g>
                        </svg></a>
                </div>
                <div class="col-11">
                    <h4><b>Detail Program</b></h4>
                </div>
            </div>
            <div class="row">
            <?php
                    include "../config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM tb_program INNER JOIN tb_jenisprogram ON 
                    tb_program.id_jenisprogram = tb_jenisprogram.id_jenisprogram AND id_program='$_GET[id]'");
                    $data = mysqli_fetch_array($sql);
                    ?>
                <div class="col-6">
                    <img src="../Admin-page/gambar/<?php echo $data['gambar']; ?>" alt="Poster" class="rounded-lg mb-5 ml-5" width="80%"
                        style="max-width: 540px;">
                </div>
                <div class="col-6">
                
                    <h3><?php echo $data['judul_program']; ?></h3>
                    <h6 class="kategori mb-5">Kategori : <?php echo $data['nama_jenis']; ?></h6>
                    <div>
                        <p id="tanggal"><img src="../assets/tanggal.png" alt="" width="4%" class="mr-4"><?php echo $data['tanggal_mulai']; ?></p>
                    </div>
                    <div class="mt-3">
                        <p id="jam"><img src="../assets/jam.png" alt="" width="4%" class="mr-4"><?php echo $data['jam']; ?></p>
                    </div>
                    <div class="mt-3">
                        <p id="waktu"><img src="../assets/lokasi.png" alt="" width="4%" class="mr-4"><?php echo $data['lokasi']; ?></p>
                    </div>
                    <div class="mt-3">
                        <p id="speaker"><img src="../assets/speaker.png" alt="" width="4%" class="mr-4"><?php echo $data['penyelenggara']; ?></p>
                    </div>
                    <div class="mt-3">
                        <p id="speaker"><img src="../assets/speaker.png" alt="" width="4%" class="mr-4"><?php echo $data['kuota']; ?></p>
                    </div>
                    <p class="mt-5"><a href="../transaksi.php?id=<?php echo $data['id_program']; ?>" class="tombol-3">Register</a></p>
                    <div class="more mt-5 mb-5">
                        <div class="row">
                            <div class="col-5">
                                <h5><b>More Information</b>
                                    
                                </h5>
                            </div>
                            <div class="col-7">
                                <hr style="height:2px;border-width:0;color:gray;background-color:rgb(0, 0, 0)">
                            </div>
                        </div>

                        <p class="text-justify mt-4">
                            <?php echo $data['deskripsi']; ?>
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section id="about">
        <div class="container ">
            <div class="row">
                <div class="col-2">
                    <a href='../Homepage/homepage.html'><img src="../assets/logo putih.png" alt="About" width="62%"
                            class="m-5"></a>
                </div>
                <div class="col-7">
                    <h3 class="mt-5 text-left" style="padding-top: 8px;"><b>Dives</b></h3>
                    <p class="text-left">2023 Copyright Dives. All Right Reserved.</p>
                </div>
                <div class="col-3">
                    <div class="footerMedsos">
                        <h5 class="mt-5 ml-2" style="padding-top: 8px;">Our Social Media</h5>
                        <table class="mt-4">
                            <tr>
                                <td><a href="https://www.instagram.com" target="_blank"><svg
                                            xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;"
                                            width="1em" height="1em" preserveAspectRatio="xMidYMid meet"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z" />
                                        </svg></a></td>
                                <td><a href="https://www.youtube.com" target="_blank"><svg
                                            xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;"
                                            width="1em" height="1em" preserveAspectRatio="xMidYMid meet"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19.606 6.995c-.076-.298-.292-.523-.539-.592C18.63 6.28 16.5 6 12 6s-6.628.28-7.069.403c-.244.068-.46.293-.537.592C4.285 7.419 4 9.196 4 12s.285 4.58.394 5.006c.076.297.292.522.538.59C5.372 17.72 7.5 18 12 18s6.629-.28 7.069-.403c.244-.068.46-.293.537-.592C19.715 16.581 20 14.8 20 12s-.285-4.58-.394-5.005zm1.937-.497C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5v-7l6 3.5l-6 3.5z" />
                                        </svg></a></td>
                                <td><a href="https://mobile.twitter.com" target="_blank"><svg
                                            xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;"
                                            width="1em" height="1em" preserveAspectRatio="xMidYMid meet"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M22.991 3.95a1 1 0 0 0-1.51-.86a7.48 7.48 0 0 1-1.874.794a5.152 5.152 0 0 0-3.374-1.242a5.232 5.232 0 0 0-5.223 5.063a11.032 11.032 0 0 1-6.814-3.924a1.012 1.012 0 0 0-.857-.365a.999.999 0 0 0-.785.5a5.276 5.276 0 0 0-.242 4.769l-.002.001a1.041 1.041 0 0 0-.496.89a3.042 3.042 0 0 0 .027.439a5.185 5.185 0 0 0 1.568 3.312a.998.998 0 0 0-.066.77a5.204 5.204 0 0 0 2.362 2.922a7.465 7.465 0 0 1-3.59.448A1 1 0 0 0 1.45 19.3a12.942 12.942 0 0 0 7.01 2.061a12.788 12.788 0 0 0 12.465-9.363a12.822 12.822 0 0 0 .535-3.646l-.001-.2a5.77 5.77 0 0 0 1.532-4.202Zm-3.306 3.212a.995.995 0 0 0-.234.702c.01.165.009.331.009.488a10.824 10.824 0 0 1-.454 3.08a10.685 10.685 0 0 1-10.546 7.93a10.938 10.938 0 0 1-2.55-.301a9.48 9.48 0 0 0 2.942-1.564a1 1 0 0 0-.602-1.786a3.208 3.208 0 0 1-2.214-.935q.224-.042.445-.105a1 1 0 0 0-.08-1.943a3.198 3.198 0 0 1-2.25-1.726a5.3 5.3 0 0 0 .545.046a1.02 1.02 0 0 0 .984-.696a1 1 0 0 0-.4-1.137a3.196 3.196 0 0 1-1.425-2.673c0-.066.002-.133.006-.198a13.014 13.014 0 0 0 8.21 3.48a1.02 1.02 0 0 0 .817-.36a1 1 0 0 0 .206-.867a3.157 3.157 0 0 1-.087-.729a3.23 3.23 0 0 1 3.226-3.226a3.184 3.184 0 0 1 2.345 1.02a.993.993 0 0 0 .921.298a9.27 9.27 0 0 0 1.212-.322a6.681 6.681 0 0 1-1.026 1.524Z" />
                                        </svg></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>