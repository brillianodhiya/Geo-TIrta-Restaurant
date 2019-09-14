<?php
include_once 'koneksi.php';
session_start();
if($_SESSION['id_level'] != 1){
    header("Location:./user-login.php");
  }
if(isset($_POST['pesan'])){
    $masakan = implode(",",$_POST['masakan']);
    $keterangan = $_POST['keterangan'];
    $meja = $_POST['meja'];
    $status = "menunggu";
    if(!empty($masakan)){
        $query_pes = "INSERT INTO detail_order (id_order, id_masakan, keterangan, status_detail_order)
        VALUES ('".$meja."','".$masakan."','".$keterangan."','".$status."') ";
        mysqli_query($dbh, $query_pes);
        echo "<script>alert('Anda Telah Memesan Satu Menu Silahkan Ke Profil Untuk Konfirmasi Pembayaran')</script>";
        echo "<script>document.location='../index.php'</script>";
    }else{
        echo "<script>alert('Anda Belum Memilih Menu Masakan')</script>";
        echo "<script>document.location='user-ordermeja.php'</script>";
    }
}
?>