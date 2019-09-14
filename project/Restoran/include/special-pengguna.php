<div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="image/people.png">
        </div>
        <div class="card-content">
        <?php 
          $pengguna = "SELECT COUNT(id_user) FROM user";
          $tampilpengguna = mysqli_query($dbh, $pengguna);
          while($peng = mysqli_fetch_array($tampilpengguna)){
        ?>
          <span class="card-title activator grey-text text-darken-4">Pengguna Saat Ini <?php echo $peng[0]; ?><i class="material-icons right">more_vert</i></span>
        <?php } ?>
        <?php if($_SESSION['id_level'] == 0){ ?>
          <p><a href="#tambahpengguna" class="modal-trigger">Tambah Pengguna</a></p>
        <?php } else {?>

        <?php } ?>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Detail Pengguna<i class="material-icons right">close</i></span>
        <?php 
          $pengguna = "SELECT COUNT(id_user) FROM user WHERE id_level = '0'";
          $tampilpengguna = mysqli_query($dbh, $pengguna);
          while($peng = mysqli_fetch_array($tampilpengguna)){
        ?>
          <p>Admin <?php echo $peng[0]; ?></p>
        <?php } ?>
        <?php 
          $pengguna = "SELECT COUNT(id_user) FROM user WHERE id_level = '3'";
          $tampilpengguna = mysqli_query($dbh, $pengguna);
          while($peng = mysqli_fetch_array($tampilpengguna)){
        ?>
          <p>Kasir <?php echo $peng[0]; ?></p>
          <?php } ?>
        <?php 
          $pengguna = "SELECT COUNT(id_user) FROM user WHERE id_level = '2'";
          $tampilpengguna = mysqli_query($dbh, $pengguna);
          while($peng = mysqli_fetch_array($tampilpengguna)){
        ?>
          <p>Waiter <?php echo $peng[0]; ?></p>
          <?php } ?>
        <?php 
          $pengguna = "SELECT COUNT(id_user) FROM user WHERE id_level = '1'";
          $tampilpengguna = mysqli_query($dbh, $pengguna);
          while($peng = mysqli_fetch_array($tampilpengguna)){
        ?>
          <p>User <?php echo $peng[0]; ?></p>
          <?php }?>
        </div>
</div>
<div id="tambahpengguna" class="modal">
<form action="include/special-tambahuser.php" method="post">
    <div class="modal-content">
      <div class="row">
      <h5>Form Tambah User</h5>
        <div class="input-field col s6">
            <input id="username" type="text" class="validate" data-length="8" name="username">
            <label for="username">Username</label>
        </div>
        <div class="input-field col s6">
            <input id="nama" type="text" class="validate" name="nama_user">
            <label for="nama">Nama Lengkap</label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
            <select name="level">
              <option value="" disabled selected>Pilih Role</option>
              <option value="0">Admin</option>
              <option value="1">User</option>
              <option value="2">Waiter</option>
              <option value="3">Kasir</option>
              <option value="4">Owner</option>
            </select>
            <label>Pilih Role</label>
          </div>
        <div class="input-field col s6">
            <input id="password" type="password" class="validate" name="password">
            <label for="password">Password</label>
        </div>  
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" name="tambahuser" class="modal-close waves-effect waves-green btn-flat">Tambah</button>
    </div>
</form>
</div>