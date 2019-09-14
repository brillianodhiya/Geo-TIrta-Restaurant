<?php 
include_once 'koneksi.php';
$meja = $_POST['meja'];
$select = "SELECT * FROM listmeja WHERE no_meja = '".$meja."' ";
$mys = mysqli_query($dbh,$select);
$x = mysqli_fetch_array($mys);
if($x > 0){
    echo"<script>alert('Meja Sudah Ada')</script>";
    echo"<script>document.location='../index-admin.php'</script>";
}else{
    $tambahmeja = "INSERT INTO listmeja (no_meja, status_meja) VALUES ('".$meja."','kosong')";
    mysqli_query($dbh,$tambahmeja);
    echo"<script>alert('List Meja Sudah Di Tambah')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}
?>