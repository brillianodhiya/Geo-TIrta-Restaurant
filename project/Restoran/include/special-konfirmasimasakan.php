<?php 
include_once 'koneksi.php';

$konfirmasi = "UPDATE detail_order SET status_detail_order = 'konfirmasi' WHERE id_detail_order = '".$_GET['id_konfirmasimasakan']."' ";
if(mysqli_query($dbh,$konfirmasi)){
    echo"<script>alert('Meja Selesai Dilayani!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}else{
    echo"<script>alert('Meja Gagal Berhasil!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}
?>