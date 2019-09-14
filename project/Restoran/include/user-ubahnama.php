<?php 
include_once 'koneksi.php';
session_start();
$namabaru = $_POST['nama'];
$ubahnama = "UPDATE user SET nama_user = '".$namabaru."' WHERE id_user = '".$_SESSION['id_user']."' ";
if(!empty($namabaru)){
    mysqli_query($dbh,$ubahnama);
    echo "<script>alert('Berhasil Merubah, Silahkan  Log Out Terlebih Dahulu Untuk Melihat Perubahan')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}else{
    echo "<script>document.location='user-akun.php'</script>";
}
?>