<?php
include_once 'koneksi.php';
if(isset($_POST['tmasakanbaru'])){
    $namamasakan = $_POST['masakanbaru'];
    $hargabaru = $_POST['hargabaru'];
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "upload/";
    $target_dir2 = "../upload/";
    $target_file = $target_dir.basename($_FILES['gambar']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extension_arr = array("jpg", "jpeg", "png");
    if(in_array($imageFileType,$extension_arr)){
        $query = "INSERT INTO masakan (nama_masakan, gambar_refrensi, harga)
        VALUES ('".$namamasakan."','".$target_file."','".$hargabaru."') ";
        mysqli_query($dbh,$query);
        move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir.$gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir2.$gambar);
        echo "<script>alert('Daftar Masakanan telah di upload!')</script>";
        echo "<script>document.location='../index-admin.php'</script>";
    }else{
        echo "<script>alert('Daftar Masakan gagal di upload!')</script>";
    }
}
?>