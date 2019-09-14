<div class="row">
    <div class="col s12 m9 l10">
      <div id="perkenalan" class="section scrollspy">
        <div class="row">
            <div class="col s12 m5">
                <?php include_once 'include/user-perkenalan.php' ?>
            </div>
            <div class="col s12 m7">
                <blockquote>
                    <h3>Geo Tirta Restaurant</h3>
                </blockquote>
                <blockquote>
                <p>Restaurant ini di jalankan oleh pemilik yang biasa di panggil dengan nama Ami. Dia menjalakankan usaha ini mulai dari nol hingga saat ini. Tiap musim baru Ami menyediakan menu-menu baru. Restaurant ini dijalankan dengan mementingkan kepuasan para pelanggan dan kenyamanan dalam suasana makan.</p>
                </blockquote>
                <blockquote>
                <p>NB: Cara memesan makanan adalah dengan mengeklik gambar atau link - link nama makanan yang tersedia.</p>
                </blockquote>
            </div>
        </div>
            <div class="parallax-container">
                <div class="parallax"><img src="image/parallax.jpg"></div>
            </div>
            <style>
            .parallax-container {
              height: 200px;
            }
            </style>
      </div>

      <div id="masakan" class="section scrollspy">
        <div class="row">
            <div class="col s12 m4" style='height:400px; overflow-y:scroll'> 
            <!--<iframe src="include/user-iframe.php" framspacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" frameborder="0" height="400px" scrolling="yes"></iframe>-->
                <?php include_once 'include/user-iframe.php';?>
            </div>
            <div class="col s12 m8">
                <?php include_once 'user-slide.php' ?>
            </div>
        </div>
      </div>
      <div class="parallax-container">
                <div class="parallax"><img src="image/parallax1.jpg"></div>
      </div>
      <div id="masukan" class="section scrollspy">
      <div class="container">
          <div class="row">
          <img src="image/kritik.gif" height="50">
          <blockquote>
      Isikan Kritik & Saran anda terhadap Restoran kami di kolom.
      </blockquote>
        <form class="col s12" method="post" action="include/user-kritik.php">
            <div class="row">
            <div class="input-field col s12 m8">
              <i class="material-icons prefix">mode_edit</i>
              <textarea id="icon_prefix2" class="materialize-textarea" name="kritik"></textarea>
              <label for="icon_prefix2">Kritik & Saran</label>
            </div>
            <button class="waves-effect waves-light btn-large blue darken-4">Kirim</button>
            <a class="waves-effect waves-light btn-large blue btn modal-trigger" href="#modal1">Komentar</a>
          </div>
        </form>
        </div>
  </div>
      </div>
    </div>
    <div class="col hide-on-small-only m3 l2">
      <ul class="section table-of-contents fixed">
        <li><a href="#perkenalan">Perkenalan</a></li>
        <li><a href="#masakan">Masakan</a></li>
        <li><a href="#masukan">Kritik & Saran</a></li>
      </ul>
    </div>
  </div>

  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4 class="pink-text">Komentar</h4>
      <ul class="collection">
<?php 
$speh = "SELECT * FROM kritik WHERE star = 1";
$querykritik = mysqli_query($dbh,$speh);
while($kri = mysqli_fetch_array($querykritik)){
?>
    <li class="collection-item avatar">
      <i class="material-icons circle red">person</i>
      <span class="title"><?php echo $kri[1]; ?></span>
      <p><?php echo $kri[2]; ?></p>
      <a class="secondary-content"><i class="material-icons">star</i></a>
    </li>
<?php }
?>
  </ul>
    </div>
  </div>
  <div class="parallax-container" style="height: 80px;">
                <div class="parallax"><img src="image/parallax3.jpg"></div>
      </div>