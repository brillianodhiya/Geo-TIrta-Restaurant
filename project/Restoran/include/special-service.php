<?php
include_once 'koneksi.php';
$sdz = "UPDATE listmeja SET status_meja = 'dipesan' WHERE id_meja = '".$_GET['id_meja']."' ";
if(mysqli_query($dbh,$sdz)){
    echo"<script>alert('Service Berhasil!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}else{
    echo"<script>alert('Service Gagal!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}
?>