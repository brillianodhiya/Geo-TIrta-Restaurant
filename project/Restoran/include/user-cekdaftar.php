<?php
include_once 'koneksi.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$id_level = 1;
$password = md5($_POST['password']);
$user_check = "SELECT * FROM user WHERE username = '$username'";
if(mysqli_fetch_array(mysqli_query($dbh, $user_check)) > 0){
    echo "<script>alert('Username Anda Telah Terdaftar!')</script>";
    echo "<script>document.location='user-login.php'</script>";
}else{
    $foto_profil = $_FILES['foto_profil']['name'];
    if($foto_profil > ""){
        $targetdir = "upload/avatar/";
        $targetfile = $targetdir.basename($_FILES['foto_profil']['name']);
        $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
        $extension_arr = array("jpg", "jpeg", "png", "gif", "JPG");
        if(in_array($imageFileType, $extension_arr)){
            $query_p = "INSERT INTO user (username, password, foto_profil, nama_user, id_level)
            VALUES ('".$username."','".$password."','".$targetfile."','".$nama."','".$id_level."')";
            mysqli_query($dbh, $query_p);
            move_uploaded_file($_FILES['foto_profil']['tmp_name'],$targetdir.$foto_profil);
            echo "<script>alert('Daftar Berhasil!')</script>";
            echo "<script>document.location='user-login.php'</script>";
        }else{
            echo "<script>alert('Daftar Gagal!')</script>";
            echo "<script>document.location='user-login.php'</script>";
        } 
    }else{
        $query_n = "INSERT INTO user (username, password, nama_user, id_level)
        VALUES ('".$username."','".$password."','".$nama."','".$id_level."')";
        if(mysqli_query($dbh, $query_n)){
            echo "<script>alert('Daftar Berhasil!')</script>";
            echo "<script>document.location='user-login.php'</script>";
        }else{
            echo "<script>alert('Daftar Gagal!')</script>";
            echo "<script>document.location='user-login.php'</script>";
        }
    }
}
?>