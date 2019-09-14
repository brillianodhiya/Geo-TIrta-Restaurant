<?php

    include_once 'koneksi.php';
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $login = mysqli_query($dbh, "SELECT * FROM user WHERE username = '$username' AND password = '$pass' ");
    $row = mysqli_fetch_array($login);
    if($row['username'] == $username AND $row['password'] == $pass){
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['nama_user'] = $row['nama_user'];
        $_SESSION['id_level'] = $row['id_level'];
        if($_SESSION['id_level'] == 0){
            echo "<script>alert('Selamat datang Admin!')</script>";
            echo "<script>document.location='../index-admin.php'</script>";
        }else if ($_SESSION['id_level'] == 2){
            echo "<script>alert('Selamat datang Waiter!')</script>";
            echo "<script>document.location='index-waiter.php'</script>";
        }else if ($_SESSION['id_level'] == 3){
            echo "<script>alert('Selamat datang Kasir!')</script>";
            echo "<script>document.location='index-kasir.php'</script>";
        }else if ($_SESSION['id_level'] == 4){
            echo "<script>alert('Selamat datang Owner!')</script>";
            echo "<script>document.location='index-owner.php'</script>";
        }else{
            echo "<script>alert('Gagal Login, mungkin anda bukan special user!')</script>";
            echo "<script>document.location='special-login.php'</script>";
        }
    }else{
        echo "<script>alert('Gagal Login, akun anda belum terdaftar')</script>";
        echo "<script>document.location='special-login.php'</script>";
    }
?>