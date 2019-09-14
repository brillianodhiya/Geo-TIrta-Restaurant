<?php 
include_once 'koneksi.php';
session_start();
if(!isset($_SESSION['id_level'])){
    header("Location:special-login.php");
  }
if($_SESSION['id_level'] != 4){
  header("Location:special-login.php");
}
?>
<?php include_once 'head.php'; ?>
<?php include_once 'special-navbar.php'; ?>
<style>
    .parallax-container {
      height: 300px;
    }
</style>
<div>
<div class="row">
    <div class="col s12 m6 z-depth-2" style='height:430px; overflow-y:scroll;'> <!--style='height:500px; overflow:scroll'-->
      <?php include_once 'special-tablemasakan2.php'; ?>
    </div><!-- data2 -->
    <div class="col s12 m6">
      <?php include_once 'special-pengguna.php'; ?>
    </div>
    <div class="col s12 m4 z-depth-2" style='border-radius: 28px;'>
      <br>
      <?php include_once 'special-tablemeja2.php'; ?>
    </div>
    <div class="col s12 m8">
        <div class="row">
            <img src="image/kritiksaran.gif" class="col s11 m11">
        </div>
      <iframe src="special-kritik.php" frameborder="0" display="block" outline="none" width="100%" height="350px"></iframe>
    </div>
    <div class="col s12 m8" style='height:430px; overflow-y:scroll;'>
     <div class="row">
            <img src="image/pemesanan.gif" class="col s11 m11">
        </div>
      <?php include_once 'special-masakanyangdipesan2.php'; ?>
    </div>
    <div class="col s12 m12">
    <div class="row">
            <img src="image/orderan.gif" class="col s11 m5">
        </div>
      <?php include_once 'special-tableorderan2.php'; ?>
    </div>
</div>
</div>
<div class="parallax-container">
                <div class="parallax"><img src="image/parallax3.jpg"></div>
      </div>
<?php include_once 'footer.php' ?>
