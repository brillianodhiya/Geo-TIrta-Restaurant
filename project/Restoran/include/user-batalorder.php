<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['id_level'] != 1){
    header("Location:./user-login.php");
  }
$update = "UPDATE orderan SET status_order = 'batal' WHERE id_order = '".$_GET['id_order']."' ";
if(mysqli_query($dbh,$update)){
    $kontolll = "DELETE FROM detail_order WHERE id_order = '".$_GET['id_order']."' ";
    mysqli_query($dbh,$kontolll);
    echo "<script>alert('Orderan Berhasil Dibatalkan')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}else{
    echo "<script>alert('Orderan Gagal Dibatalkan')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}
?>