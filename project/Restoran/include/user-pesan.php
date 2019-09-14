<?php
include_once 'koneksi.php';
session_start();
include_once 'head.php';
include_once 'navbar-index2.php';
if($_SESSION['id_level'] != 1){
    header("Location:./user-login.php");
  }
?>
<br>
<div class="row">
    <img src="image/pilihmasakan.gif" class="col s12 m4">
</div>
<div class="row container">
    <form action="user-cekpesanmasakan.php" method="post" enctype="multipart/form-data" >
    <div class="s12 m12">
        <div class="row">
        <div class="input-field col s12 m3">
                 <select name="meja">
                <?php
                    $listme = "SELECT * FROM orderan WHERE id_user = '".$_SESSION['id_user']."' AND NOT status_order = 'dikonfirmasi' AND NOT status_order = 'batal' AND NOT status_order = 'selesai' ";
                    $resli = mysqli_query($dbh, $listme);
                    while($meli = mysqli_fetch_array($resli)){
                ?>
                   <option value="<?php echo $meli[0]; ?>">Meja Nomor <?php echo $meli[1]; ?></option>

                <?php } ?>
                 </select>
                 <label>Pilih Meja yang akan di Order</label>
        </div>
        </div>
    </div>
    <blockquote>
                Silahkan Pilih Menu Di Awal Lagi Untuk Menambah Pesanan
    </blockquote>
        <div class="input-field col s12 m5">
            <textarea id="textarea1" class="materialize-textarea" name="keterangan"></textarea>
            <label for="textarea1">Keterangan Masakan</label>
        </div>
        
        <div class="col s12 m7">
            <div class="row">
            <h6 class="flow-text">Masakan Yang Dipilih</h6>
            <?php 
            $masakanlist = "SELECT * FROM masakan WHERE id_masakann = '".$_GET['id_masakan']."' ";
            $masres = mysqli_query($dbh, $masakanlist);
            while($mas = mysqli_fetch_array($masres)){
            ?>
                <p class="col s4 m2">
                    <label>
                        <input type="checkbox" checked="checked" name="masakan[]" value="<?php echo $mas[0]; ?>">
                        <span class="tooltipped" data-position="right" data-tooltip="<?php echo $mas[1]; ?>"><img src="<?php echo $mas[2]; ?>" class="circle" height="60"></span>
                    </label>
                </p>
            <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12"><br><br>
            <button class="btn waves-effect waves-light blue darken-4" type="submit" name="pesan">Pesan Masakan
                    <i class="material-icons right">send</i>
                </button> 
            </div>
        </div>
    </form>
</div>
<div class="parallax-container">
                <div class="parallax"><img src="image/parallax3.jpg"></div>
            </div>
<?php include_once 'footer.php'; ?>
<script>
M.textareaAutoResize($('#textarea1'));
$(document).ready(function(){
    $('.tooltipped').tooltip();
  });
  $(document).ready(function(){
    $('select').formSelect();
  });
        
</script>