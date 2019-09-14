<?php
    include_once 'koneksi.php';
    $username = $_POST['username'];
    $password = md5($_POST['passwordd']);
    $login = mysqli_query($dbh, "SELECT * FROM user WHERE username= '$username' AND password = '$password'");
    $log = mysqli_fetch_array($login);
    if($log[1] == $username AND $log[2] == $password){
    if ($log[5] != 1){
        echo "<script>alert('Gagal Login, akun anda belum terdaftar')</script>";
        echo "<script>document.location='user-login.php'</script>";
    }else{
        session_start();
        $_SESSION['id_user'] = $log[0];
        $_SESSION['username'] = $log[1];
        $_SESSION['password'] = $log[2];
        $_SESSION['foto_profil'] = $log[3];
        $_SESSION['nama_user'] = $log[4];
        $_SESSION['id_level'] = $log[5];
        header('location:../index.php');
    }
}else{
    echo "<script>alert('Gagal Login, akun anda belum terdaftar')</script>";
    echo "<script>document.location='user-login.php'</script>";
}
?>