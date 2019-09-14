<?php
$dbh = mysqli_connect("localhost", "root", "", "restoran");
if($dbh === false){
    die("ERROR: Tidak Bisa Konek :V ".mysqli_connect_error());
}
?>