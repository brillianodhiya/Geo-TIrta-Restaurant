<?php
session_start();
session_destroy();
header('location:special-login.php');
?>