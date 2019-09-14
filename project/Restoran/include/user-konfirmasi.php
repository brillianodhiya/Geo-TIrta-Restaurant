<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['id_level'] != 1){
    header("Location:./user-login.php");
  }
include 'phpqrcode/qrlib.php';
$tgl = date('Y-m-d');
$update = "UPDATE orderan SET status_order = 'dikonfirmasi', tanggal = '".$tgl."' WHERE id_order = '".$_GET['id_order']."' ";
if(mysqli_query($dbh,$update)){
    $tempdir = "qrcode/";
    if(!file_exists($tempdir)){
      mkdir($tempdir);
    }
    $sdazz = "SELECT * FROM detail_order WHERE id_order = '".$_GET['id_order']."' ";
    $qesz = mysqli_query($dbh,$sdazz);
    while($l = mysqli_fetch_array($qesz)){
     $as = "SELECT harga FROM masakan WHERE id_masakann = $l[2]";
     $sda = mysqli_query($dbh,$as);
     while($zs = mysqli_fetch_array($sda)){
       $harga[] = $zs['harga'];
     }
    }
    $total = array_sum($harga);
    $sqltransaksi = "INSERT INTO transaksi (id_user, id_order, tanggal, total_bayar) 
    VALUES ('".$_SESSION['id_user']."','".$_GET['id_order']."','".$tgl."','".$total."') ";
    mysqli_query($dbh,$sqltransaksi);

    $orderan = "SELECT * FROM orderan WHERE id_order = '".$_GET['id_order']."' ";
    $result = mysqli_query($dbh,$orderan);
    while($ord = mysqli_fetch_array($result)){
      $nomeja = $ord[1];
      $tanggal = $ord[2];
      $nama = $_SESSION['nama_user'];
      $updatemeja = "UPDATE listmeja SET status_meja = 'dipesan' WHERE no_meja IN($ord[1])";
    }
    mysqli_query($dbh,$updatemeja);
    $isi_teks = "Nama = ".$nama."
No Meja = ".$nomeja."
Tanggal = ".$tanggal."
Total Harga = ".$total."";
    $namafile = "qrcode".$_GET['id_order'].".png";
    $quality = 'H';
    $ukuran = 5;
    $padding = 0;
    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

    echo "<script>alert('Anda Mengkonfirmasi Pesanan Tanggal $tgl')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}else{
    echo "<script>alert('Orderan Gagal Dibatalkan')</script>";
    echo "<script>document.location='user-akun.php'</script>";
}
?>