<?php 
include_once 'head.php';
include_once 'koneksi.php';
session_start();
if($_SESSION['id_level'] != 1){
  header("Location:./user-login.php");
}
include_once 'navbar-index2.php';
?><br>
<div class="">
    <div class="row">
        <div class="col s12 m6">
          <?php include_once 'user-orderkiri.php';?>
        </div>
        <div class="col s12 m6">
          <div class="card horizontal">
            <div class="card-image">
              <img src="image/mejaa.jpg">
            </div>
            <div class="card-stacked">
              <div class="card-content">
              <blockquote>
                <p>Silahkan memilih nomor meja yang telah di sediakan di samping ini.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
    </div>
</div><br>
<div class="parallax-container">
                <div class="parallax"><img src="image/parallax2.jpg"></div>
            </div>
<?php
include_once 'footer.php'
?>
<script>  
  M.textareaAutoResize($('#textarea1'));
  $(document).ready(function(){
    $('.datepicker').datepicker();
  });
</script>