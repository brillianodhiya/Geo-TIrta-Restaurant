<?php
include_once 'koneksi.php';

$star = "UPDATE kritik SET star = '1' WHERE id_kritik = '".$_GET['id_kritik']."' ";
if(mysqli_query($dbh,$star)){
	echo"<script>document.location='special-kritik.php'</script>";
}else{
	echo"<script>document.location='special-kritik.php'</script>";
}
?>