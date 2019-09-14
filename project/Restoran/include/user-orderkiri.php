<div class="container">
<img src="image/formorder.gif" class="col s10 m10">
            <form method="post" enctype="multipart/form-data" class="row" action="user-cekordermeja.php">
                <div class="row">
                <?php 
                    $pilih = "SELECT * FROM listmeja WHERE status_meja = 'kosong'";
                    $pres = mysqli_query($dbh, $pilih);
                    while($p = mysqli_fetch_array($pres)){
                ?>
                <p class="col s4 m4">
                 <label>
                   <input id="indeterminate-checkbox" type="checkbox" name="meja[]" value="<?php echo $p[1]; ?>"/>
                   <span>Table <?php echo $p[1]; ?></span>
                 </label>
                </p>
                    <?php } ?>
                </div>
                <div class="input-field col s12">
                   <textarea id="textarea1" class="materialize-textarea" name="keterangan"></textarea>
                    <label for="textarea1">Keterangan</label>
                </div>
                <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Pesan Meja
                    <i class="material-icons right">send</i>
                </button> 
            </form>
</div> 

<!-- UPDATE staff
    SET salary = 1200
    WHERE name IN ('Bob', 'Jane', 'Frank', 'Susan', 'John'); -->