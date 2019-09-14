<?php
include_once 'koneksi.php';
$username = $_POST['username'];
$nama_user = $_POST['nama_user'];
$level = $_POST['level'];
$password = md5($_POST['password']);
$user_check = "SELECT * FROM user WHERE username = '$username'";
if(mysqli_fetch_array(mysqli_query($dbh, $user_check)) > 0){
    echo "<script>alert('Username Telah Terdaftar!')</script>";
    echo "<script>document.location='../index-admin.php'</script>";
}else{
    $tambahpengguna = "INSERT INTO user (username, password, nama_user, id_level)
    VALUES ('".$username."','".$password."','".$nama_user."','".$level."') ";
    mysqli_query($dbh, $tambahpengguna);
    echo "<script>alert('Berhasil Daftar!')</script>";
    echo "<script>document.location='../index-admin.php'</script>";
}
?>