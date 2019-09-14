<?php
include_once 'head.php';
include_once 'koneksi.php';
session_start();
if($_SESSION['id_level'] != 1){
    header("Location:./user-login.php");
  }
include_once 'navbar-index2.php';
?>
<?php 
  $profil = "SELECT * FROM user WHERE id_user = '".$_SESSION['id_user']."' ";
  $profils = mysqli_query($dbh,$profil);
  while ($pro = mysqli_fetch_array($profils)){
?>
<div class="row">
<div class="card col s12 m4">
    <div class="card-image waves-effect waves-block waves-light">
      <?php 
        if(empty($pro[3])){
      ?>
      <img class="activator" src="image/defaultprofil.jpg">
        <?php }else{ ?>
          <img class="activator" src="<?php echo $pro[3]; ?>">
        <?php }?>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $pro[1] ?><i class="material-icons right">more_vert</i></span>
      <p>Id User 20<?php echo $pro[0]; ?>191</p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php echo $pro[1] ?>(20<?php echo $pro[0]; ?>191)<i class="material-icons right">close</i></span>
      <p>Nama : <?php echo $pro[4]; ?></p>
      <p>Pesanan dilakukan : <?php 
        $orderan = "SELECT COUNT(id_order) FROM orderan WHERE id_user = '".$_SESSION['id_user']."'";
        $resorder = mysqli_query($dbh,$orderan);
        while($o = mysqli_fetch_array($resorder)){
          echo $o[0];
        }
      ?> kali</p>
       <a class="waves-effect waves-light btn modal-trigger red darken-3" href="#modal1">Ubah Nama</a>
       <a class="waves-effect waves-light btn modal-trigger deep-purple darken-3" href="#modal2">Ubah Foto</a>
    </div>
  </div>
  <?php } ?>
<div class="col s12 m8">
<table class="responsive-table highlight">
        <thead>
          <tr>
              <th>No</th>
              <th>No Meja</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          $listo = "SELECT * FROM orderan WHERE id_user = '".$_SESSION['id_user']."' AND NOT status_order = 'batal' ";
          $orderan = mysqli_query($dbh,$listo);
          $no = 0;
          while($olist = mysqli_fetch_array($orderan)){
            $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $olist[1]; ?></td>
            <td><?php echo $olist[2]; ?></td>
            <td><?php echo $olist[4]; ?></td>
            <?php 
              if($olist[5] == "menunggu"){
            ?>
            <td><button data-target="modal<?php echo $olist[0]; ?>" class="btn waves-effect waves-light modal-trigger red darken-3"><?php echo $olist[5]; ?></button></td>
              <?php } else if ($olist[5] == "dikonfirmasi"){ ?>
                <td><a href="user-tiketpesanan.php?id_order=<?php echo $olist[0]; ?>" class="btn waves-effect waves-light modal-trigger blue darken-3"><?php echo $olist[5]; ?></a></td>  
              <?php } else { ?>
                <td><a href="user-tiketpesanan.php?id_order=<?php echo $olist[0]; ?>" class="btn waves-effect waves-light modal-trigger blue darken-3 disabled"><?php echo $olist[5]; ?></a></td>  
              <?php } ?>
          </tr>
          
          <div id="modal<?php echo $olist[0]; ?>" class="modal">
            <div class="modal-content">
              <h4>Pesanan Di Meja Nomor <?php echo $olist[1]; ?></h4>
                <div class="collection">
                <?php 
                  $pesananmasakan = "SELECT * FROM detail_order WHERE id_order = $olist[0] ";
                  $respesanma = mysqli_query($dbh,$pesananmasakan);
                  $noma = 0;
                  while ($masali = mysqli_fetch_array($respesanma)){
                    $noma++
                ?>
                  <a href="user-deleteorder.php?id_detailorder=<?php echo $masali[0]; ?>" class="collection-item"><?php echo $noma; ?>. <?php 
                  $masakan = "SELECT * FROM masakan WHERE id_masakann = $masali[2]";
                  $poses = mysqli_query($dbh,$masakan);
                  while($pros = mysqli_fetch_array($poses)){
                    echo $pros[1];
                   ?> <?php echo $masali[3]; echo " RP. ".$pros[3]; }?></a>
                <?php }?>
                </div>  
           </div>
           <blockquote>
           Untuk Membatalkan Salah Satu Menu, Klik Menu Tersebut. <br>
           Mohon Berhati - Hati Jika Memencet.
           </blockquote>
           <div class="modal-footer">
             <a href="user-batalorder.php?id_order=<?php echo $olist[0]; ?>" class="modal-close waves-effect waves-green btn-flat">Batal Order</a>
             <a href="user-konfirmasi.php?id_order=<?php echo $olist[0]; ?>" class="modal-close waves-effect waves-green btn-flat">Konfirmasi</a>
           </div>
          </div>
          <?php }?>
        </tbody>
</table>
</div>
</div>


<div class="parallax-container">
    <div class="parallax"><img src="image/parallax3.jpg"></div>
</div>
<?php include_once 'footer.php'; ?>
<div id="modal1" class="modal modal-fixed-footer">
  <form action="user-ubahnama.php" method="post">
    <div class="modal-content">
      <h4>Ubah Nama</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="input-field col s12">
          <input id="nama" type="text" class="validate" name="nama" value="<?php echo $_SESSION['nama_user'] ?>">
          <label for="nama">Masukkan Nama</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" name="ubahnama" class="modal-close waves-effect waves-green btn-flat">Ubah</button>
    </div>
  </form>
</div>
<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Ubah Foto</h4>
      <div class="divider"></div>
<form enctype="multipart/form-data" action="user-ubahfoto.php" method="post">
      <div class="row">
        <div class="file-field input-field col s12">
          <div class="btn deep-purple darken-3">
            <span>Foto</span>
            <input type="file" name="foto">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div> <br>
          <?php if($_SESSION['foto_profil'] == ""){ ?>
            Belum Menambah Foto
          <?php } else { ?>
            <img class="responsive-img col s6" src="<?php echo $_SESSION['foto_profil'] ?>">
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" name="ubahfoto" class="modal-close waves-effect waves-green btn-flat">Ubah</button>
    </div>
</form>
</div>
<script>
  $(document).ready(function(){
    $('.modal').modal();
  });
     
</script>
