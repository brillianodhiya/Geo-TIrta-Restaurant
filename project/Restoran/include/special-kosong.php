<?php
include_once 'koneksi.php';
$sdz = "UPDATE listmeja SET status_meja = 'kosong' WHERE id_meja = '".$_GET['id_meja']."' ";
if(mysqli_query($dbh,$sdz)){
    echo"<script>alert('Meja Berhasil Dikosongkan!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}else{
    echo"<script>alert('Gagal Dikosongkan!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}
?>