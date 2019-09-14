<?php
include_once 'koneksi.php';
$sdz = "DELETE FROM listmeja WHERE id_meja = '".$_GET['id_meja']."' ";
if(mysqli_query($dbh,$sdz)){
    echo"<script>alert('Hapus Meja Berhasil!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}else{
    echo"<script>alert('Hapus Meja Gagal!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}
?>