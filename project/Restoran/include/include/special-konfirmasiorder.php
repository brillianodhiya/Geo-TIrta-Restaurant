<?php 
include_once '../koneksi.php';
$orderan = "UPDATE orderan SET status_order = 'selesai' WHERE id_order = '".$_GET['id_order']."' ";
if(mysqli_query($dbh,$orderan)){
    echo"<script>alert('Orderan Telah Selesai!')</script>";
	echo"<script>document.location='../index-kasir.php'</script>";
}else{
    echo"<script>alert('Orderan Belum Selesai!')</script>";
	echo"<script>document.location='../index-kasir.php'</script>";
}
?>