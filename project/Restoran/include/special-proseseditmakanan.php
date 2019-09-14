<?php
    error_reporting(0);
    include_once 'koneksi.php';
    $nama_masakan = $_POST['nama_masakan'];
    $harga = $_POST['harga'];
    $status_masakan = $_POST['status_masakan'];
    if($status_masakan == ""){
        $status_masakan = "habis";
    }
    $id_makanan = $_POST['id_masakan'];
    if(isset($_POST['ubah'])){
        $ubahmasakan = "UPDATE masakan SET nama_masakan='".$nama_masakan."', harga='".$harga."', status_makanan = '".$status_masakan."' WHERE id_masakann = '".$id_makanan."'";
        mysqli_query($dbh,$ubahmasakan);
        echo "<script>alert('Daftar Masakan telah di edit!')</script>";
        echo "<script>document.location='../index-admin.php'</script>";
    }else{
        echo "<script>alert('Daftar Masakan gagal di edit!')</script>";
        echo "<script>document.location='../index-admin.php'</script>";
    }
?>