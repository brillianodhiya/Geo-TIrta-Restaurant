<nav class="nav-extended blue darken-4">
<div class="nav-wrapper">
      <a href="#!" class="brand-logo"><img src="image/logo.png" height="60"></a>
      <ul class="right hide-on-med-and-down">
      <?php if($_SESSION['id_level'] == 0){ ?>
        <li><a href="include/special-pesananhariini.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Pemesanan Masakan?">Pemesanan Makanan</a></li>
        <li><a href="include/special-penjualanhariini.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Penjualan Hari Ini?">Hasil Penjualan Hari Ini</a></li>
        <li><a href="include/special-penjualan.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Semua Penjualan?">Hasil Semua Penjualan</a></li>
      <?php }else if($_SESSION['id_level'] == 2){ ?>
        <li><a href="special-pesananhariini.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Pemesanan Masakan?">Pemesanan Makanan</a></li>
      <?php }else if($_SESSION['id_level'] == 3){ ?>
        <li><a href="special-penjualanhariini.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Penjualan Hari Ini?">Hasil Penjualan Hari Ini</a></li>
        <li><a href="special-penjualan.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Semua Penjualan?">Hasil Semua Penjualan</a></li>
      <?php }else{ ?>
        <li><a href="special-pesananhariini.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Pemesanan Masakan?">Pemesanan Makanan</a></li>
        <li><a href="special-penjualanhariini.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Penjualan Hari Ini?">Hasil Penjualan Hari Ini</a></li>
        <li><a href="special-penjualan.php" class="tooltipped" data-position="bottom" data-tooltip="Print Out Semua Penjualan?">Hasil Semua Penjualan</a></li>
      <?php } ?>
      </ul>
    </div>
    <div class="nav-content">
      <span class="nav-title tooltipped" data-position="bottom" data-tooltip="Nama Pengguna"><h5><?php echo $_SESSION['nama_user']; ?></h5></span>
      <?php if($_SESSION['id_level'] == 0){ ?>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light red pulse modal-trigger" href="#tambahmasakan">
        <i class="material-icons">add</i>
      </a>
      <div id="tambahmasakan" class="modal">
        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s6 active"><a href="#tambah1">Tambah Masakan</a></li>
              <li class="tab col s6"><a href="#tambah2">Tambah Meja</a></li>
            </ul>
          </div>
          <div id="tambah1">
            <div class="modal-content black-text">
            <br><br>
            <form action="include/special-tambahmasakan.php" method="post" enctype="multipart/form-data">
              <div class="row">
                 <div class="input-field col s6">
                   <i class="material-icons prefix">restaurant</i>
                   <input id="masakan" type="text" class="validate" name="masakanbaru">
                   <label for="masakan">Nama Masakan</label>
                 </div>
                 <div class="input-field col s6">
                   <i class="material-icons prefix">attach_money</i>
                   <input id="harga" type="number" class="validate" name="hargabaru">
                   <label for="harga">Harga</label>
                 </div>
                 <div class="input-field col s12"><br>
                  <div class="file-field">
                     <div class="btn blue darken-4">
                       <span><i class="material-icons">add_a_photo</i></span>
                       <input type="file" name="gambar">
                     </div>
                     <div class="file-path-wrapper">
                       <input class="file-path validate" type="text" placeholder="Gambar Refrensi">
                     </div>
                   </div>
                 </div>
              </div>
            <div class="modal-footer">
              <button type="submit" name="tmasakanbaru" class="modal-close waves-effect waves-green btn-flat">Tambah</button>
              </form>
            </div>
          </div>
        </div>
        <div id="tambah2">
            <div class="modal-content black-text">
            <br><br>
            <form action="include/special-tambahmeja.php" method="post">
              <div class="row">
                 <div class="input-field col s12 m6">
                   <i class="material-icons prefix">weekend</i>
                   <input id="meja" type="number" class="validate" name="meja">
                   <label for="meja">Tambah Nomor Meja</label>
                 </div>
                 <div class="col s12 m6">
                  Daftar Meja Yang Sudah Ada
                  <div class="row">
                  <?php 
                  $meja = "SELECT * FROM listmeja";
                  $resme = mysqli_query($dbh,$meja);
                  while($mj = mysqli_fetch_array($resme)){
                  ?>
                    <div class="col s3">
                      <?php echo $mj[1]; ?>
                    </div>
                  <?php } ?>
                  </div>
                 </div>
              </div>
              
            <div class="modal-footer">
              <button type="submit" name="tambahmeja" class="modal-close waves-effect waves-green btn-flat">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      <?php }else{ ?>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light red pulse" onclick="M.toast({html: 'Anda Bukan Admin', completeCallback: function(){alert('Permintaan Anda Ditolak Karena Anda Bukan Admin')}})">
        <i class="material-icons">add</i>
      </a>
      <?php } ?>
</div>
</nav>
<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="image/background.jpg">
      </div>
      <?php if($_SESSION['id_level'] == 0){ ?>
      <a href="#user"><img class="circle" src="image/admin.png"></a>
      <?php }else if($_SESSION['id_level'] == 2){ ?>
      <a href="#user"><img class="circle" src="image/waiter.jpg"></a>
      <?php }else if($_SESSION['id_level'] == 3){ ?>
      <a href="#user"><img class="circle" src="image/kasir.jpg"></a>
      <?php }else{ ?>
      <a href="#user"><img class="circle" src="image/owner.png"></a>
      <?php } ?>

      <a href="#name"><span class="white-text name"><?php echo $_SESSION['username'] ?></span></a>
      <a href="#nama"><span class="white-text email"><?php echo $_SESSION['nama_user'] ?></span></a>
    </div></li>
    <?php if($_SESSION['id_level'] == 0){ ?>
    <li><a href="include/special-pesananhariini.php"><i class="material-icons">print</i>Pemesanan Masakan</a></li>
    <li><a href="include/special-penjualanhariini.php"><i class="material-icons">print</i>Hasil Penjualan Hari Ini</a></li>
    <li><a href="include/special-penjualan.php"><i class="material-icons">print</i>Hasil Semua Penjualan</a></li>
    <?php }else if($_SESSION['id_level'] == 2){ ?>
      <li><a href="special-pesananhariini.php"><i class="material-icons">print</i>Pemesanan Masakan</a></li>
    <?php }else if($_SESSION['id_level'] == 3){ ?>
    <li><a href="special-penjualanhariini.php"><i class="material-icons">print</i>Hasil Penjualan Hari Ini</a></li>
    <li><a href="special-penjualan.php"><i class="material-icons">print</i>Hasil Semua Penjualan</a></li>
    <?php }else{ ?>
      <li><a href="special-pesananhariini.php"><i class="material-icons">print</i>Pemesanan Masakan</a></li>
    <li><a href="special-penjualanhariini.php"><i class="material-icons">print</i>Hasil Penjualan Hari Ini</a></li>
    <li><a href="special-penjualan.php"><i class="material-icons">print</i>Hasil Semua Penjualan</a></li>
    <?php } ?>
    <li><div class="divider"></div></li>
    <li><a class="subheader">User Action</a></li>
    <li><a href="special-keluar.php"><i class="material-icons">exit_to_app</i>Keluar</a></li>
  </ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="small material-icons">menu</i></a>