<?php 
include_once 'include/koneksi.php';
session_start();
if(!isset($_SESSION['id_level'])){
  header("Location:include/special-login.php");
}
if($_SESSION['id_level'] != 0){
  header("Location:include/special-login.php");
}
?>
<?php include_once 'include/head.php'; ?>
<?php include_once 'include/special-navbar.php'; ?>
<style>
    .parallax-container {
      height: 300px;
    }
</style>
<div>
<div class="row">
    <div class="col s12 m6 z-depth-2" style='height:430px; overflow-y:scroll;'> <!--style='height:500px; overflow:scroll'-->
      <?php include_once 'include/special-tablemasakan.php'; ?>
    </div><!-- data2 -->
    <div class="col s12 m6">
      <?php include_once 'include/special-pengguna.php'; ?>
    </div> <br> <br>
    <div class="col s12 m5 z-depth-2" style='border-radius: 28px;'>
      <?php include_once 'include/special-tablemeja.php'; ?>
    </div>
    <div class="col s12 m7">
    <div class="row">
            <img src="image/kritiksaran.gif" class="col s11 m11">
        </div>
      <iframe src="include/special-kritik.php" frameborder="0" display="block" outline="none" width="100%" height="350px"></iframe>
    </div>
    <div class="col s12 m7" style='height:550px; overflow-y:scroll;'>
    <div class="row">
            <img src="image/pemesanan.gif" class="col s11 m11">
        </div>
      <?php include_once 'include/special-masakanyangdipesan.php'; ?>
    </div>
    <div class="col s12 m12">
    <div class="row">
            <img src="image/orderan.gif" class="col s11 m5">
        </div>
      <?php include_once 'include/special-tableorderan.php'; ?>
    </div>
</div>
</div>
<div class="parallax-container">
                <div class="parallax"><img src="image/parallax3.jpg"></div>
      </div>
<?php include_once 'include/footer.php' ?>
