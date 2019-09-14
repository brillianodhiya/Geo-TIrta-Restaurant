<?php 
include_once 'koneksi.php';
$orderan = "UPDATE orderan SET status_order = 'selesai' WHERE id_order = '".$_GET['id_order']."' ";
if(mysqli_query($dbh,$orderan)){
    $select = "SELECT * FROM orderan WHERE id_order = '".$_GET['id_order']."' ";
    $ress = mysqli_query($dbh,$select);
    while($mejaa = mysqli_fetch_array($ress)){
        $update = "UPDATE listmeja SET status_meja = 'kosong' WHERE no_meja IN('$mejaa[1]')";
    }
    mysqli_query($dbh,$update);
    $updateset = "UPDATE detail_order SET status_detail_order = 'konfirmasi' WHERE id_order = '".$_GET['id_order']."' ";
    mysqli_query($dbh,$updateset);
    echo"<script>alert('Orderan Telah Selesai!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}else{
    echo"<script>alert('Orderan Belum Selesai!')</script>";
	echo"<script>document.location='../index-admin.php'</script>";
}
?>