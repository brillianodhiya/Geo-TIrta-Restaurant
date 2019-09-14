<?php error_reporting(0); ?>
  <nav class="blue darken-4">
    <div class="nav-wrapper">
      <a href="../index.php" class="brand-logo"><img src="image/logo.png" height="50"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if($_SESSION['id_level'] == 1){ ?>
        <li><a href="user-akun.php"><?php echo $_SESSION['nama_user']; ?></a></li>
        <li><a href="user-ordermeja.php">Order Meja</a></li>
        <li><a href="user-keluar.php">Keluar</a></li>
      <?php }else{ ?>
        <li><a href="include/user-login.php">Login/Daftar</a></li>
      <?php } ?>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
      <?php if($_SESSION['id_level'] == 1){ ?>
        <li><a href="user-akun.php"><?php echo $_SESSION['nama_user']; ?></a></li>
        <li><a href="user-ordermeja.php">Order Meja</a></li>
        <li><a href="user-keluar.php">Keluar</a></li>
      <?php }else{ ?>
        <li><a href="include/user-login.php">Login/Daftar</a></li>
      <?php } ?></li>
  </ul>
