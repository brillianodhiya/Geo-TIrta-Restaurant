<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['id_level'] != 1){
    header("Location:./user-login.php");
  }
$delete = "DELETE FROM detail_order WHERE id_detail_order = '".$_GET['id_detailorder']."'";
if(mysqli_query($dbh,$delete)){
    echo "<script>alert('Masakan Berhasil Dibatalkan')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}else{
    echo "<script>alert('Masakan Gagal Dibatalkan')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}
?>