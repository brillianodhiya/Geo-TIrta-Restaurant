<?php 
include_once 'koneksi.php';
session_start();
$foto_profil = $_FILES['foto']['name'];
if(!empty($foto_profil)){
    $target_dir = "upload/avatar/";
    $target_file = $target_dir.basename($_FILES['foto']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extension_arr = array("jpg","jpeg","png","gif","JPG");
    if(in_array($imageFileType, $extension_arr)){
        $gantifoto = "UPDATE user SET foto_profil = '".$target_file."' WHERE id_user = '".$_SESSION['id_user']."' ";
        mysqli_query($dbh,$gantifoto);
        move_uploaded_file($_FILES['foto']['tmp_name'],$target_dir.$foto_profil);
        echo "<script>alert('Berhasil Ubah Silahkan Log Out Terlebih Dahulu Untuk Melihat Perubahan!')</script>";
        echo "<script>document.location='user-akun.php'</script>";
    }else{
        echo "<script>alert('Gagal Ubah!')</script>";
        echo "<script>document.location='user-akun.php'</script>";
    }
}else{
    echo "<script>document.location='user-akun.php'</script>";
}
?>