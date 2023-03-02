<?php 
    session_start();

    include 'config.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $login = mysqli_query($conn,"SELECT * FROM tb_user WHERE email='$email' and password='$password'");
    $cek = mysqli_num_rows($login);
    
    // cek apakah username dan password di temukan pada database
    if($cek > 0){
    
        $data = mysqli_fetch_assoc($login);
    
        // cek jika user login sebagai admin
        if($data['level']=="admin"){
    
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:Admin-page/index.php");
    
        // cek jika user login sebagai user biasa
        }else if($data['level']=="user"){
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "user";
            // alihkan ke halaman dashboard user
            header("location:index2.php");
    
        }else{
    
            // alihkan ke halaman login kembali
            header("location:index.php?pesan=gagal");
        }	
    }else{
        header("location:index.php?pesan=gagal");
    }
    
?>