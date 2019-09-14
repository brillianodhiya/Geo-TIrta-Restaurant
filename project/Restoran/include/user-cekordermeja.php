<?php
include_once 'koneksi.php';
session_start();
if(isset($_POST['action'])){
    $meja = implode(",",$_POST['meja']);
    $keterangan = $_POST['keterangan'];
    $tgl = date('Y-m-d');
    $idu = $_SESSION['id_user'];
    $status_or = "menunggu";
    if(!empty($meja)){
        if($keterangan == ""){
            $keterangan = "Pesanan Biasa";
        }
        $query_in = "INSERT INTO orderan (no_meja, tanggal, id_user, keterangan, status_order)
        VALUES ('".$meja."','".$tgl."','".$idu."','".$keterangan."','".$status_or."')";
        mysqli_query($dbh, $query_in);
        echo "<script>alert('Anda Telah Memesan Meja Tanggal $tgl $keterangan')</script>";
        echo "<script>document.location='../index.php'</script>";
    }else{
        echo "<script>alert('Anda Belum Memilih Meja')</script>";
        echo "<script>document.location='user-ordermeja.php'</script>";
    }
}
?>