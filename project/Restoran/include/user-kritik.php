<?php
include_once 'koneksi.php';
$kritik = $_POST['kritik'];
$tgl = date('Y-m-d');
$kritikan = "INSERT INTO kritik (tanggal_kritik, kritik) VALUES ('".$tgl."','".$kritik."')";
if(mysqli_query($dbh,$kritikan)){ 
    echo"<script>alert('Kritik Anda Telah Dikirim Pada $tgl')</script>";
	echo"<script>document.location='../index.php'</script>";
}else{
    echo"<script>alert('Gagal Mengkritik')</script>";
	echo"<script>document.location='../index.php'</script>";
}
?>