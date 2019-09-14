<img src="image/tablemasakan.gif" alt="" height="45">
    <table class="responsive-table highlight">
        <thead>
          <tr>
              <th>No</th>
              <th>Makanan</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
<?php 
$masakan = "SELECT * FROM masakan";
$masakanresult = mysqli_query($dbh,$masakan);
$nomasakan = 0;
while($mas = mysqli_fetch_array($masakanresult)){
  $nomasakan++;
?>
          <tr>
            <td><?php echo $nomasakan?></td>
            <td><?php echo $mas[1]; ?></td>
            <td><?php echo $mas[3]; ?></td>
            <td><?php echo $mas[4]; ?></td>
            <td><a class="waves-effect waves-light btn modal-trigger btn-flat" href="#ss<?php echo $mas[0]; ?>">Ubah</a></td>

            <div id="ss<?php echo $mas[0]; ?>" class="modal">
              <div class="modal-content">
                <h4>Aksi Untuk Masakan Ini</h4>
                <form action="include/special-proseseditmakanan.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">restaurant</i>
                      <input id="nama_masakan" type="text" class="validate" name="nama_masakan" value="<?php echo $mas[1]; ?>">
                      <label for="nama_masakan">Nama Masakan</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">attach_money</i>
                      <input id="ubahharga" type="number" class="validate" name="harga" value="<?php echo $mas[3]; ?>">
                      <label for="ubahharga">Harga</label>
                    </div>
                    <?php if($mas[4] == 'ada'){ ?>
                    <div class="switch col s6">
                        <label>
                            Habis
                            <input type="checkbox" name="status_masakan" value="ada" checked="checked">
                            <span class="lever"></span>
                            Ada
                        </label>
                    </div>
                    <?php }else{ ?>
                      <div class="switch col s6">
                        <label>
                            Habis
                            <input type="checkbox" name="status_masakan" value="ada">
                            <span class="lever"></span>
                            Ada
                        </label>
                    </div>
                    <?php } ?>
                    <div class="input-field col s6 hide">
                      <input id="id_makanan" type="text" class="validate" name="id_masakan" value="<?php echo $mas[0]; ?>">
                      <label for="id_makanan">Id</label>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="ubah" class="modal-close waves-effect waves-green btn-flat">Ubah</button>
                </form>
              </div>
            </div>
          </tr>
<?php } ?>
        </tbody>
      </table>