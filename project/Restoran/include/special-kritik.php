<?php 
include_once 'head.php';
include_once 'koneksi.php';
?>
<ul class="collection">
<?php 
$speh = "SELECT * FROM kritik";
$querykritik = mysqli_query($dbh,$speh);
while($kri = mysqli_fetch_array($querykritik)){
?>
    <li class="collection-item avatar">
      <i class="material-icons circle red">person</i>
      <span class="title"><?php echo $kri[1]; ?></span>
      <p><?php echo $kri[2]; ?></p>
      <?php 
      if($kri[3] == 1){
      ?>
       <a href="special-unstar.php?id_kritik=<?php echo $kri[0]; ?>" class="secondary-content"><i class="material-icons">star</i></a>
      <?php }else{ ?>
        <a href="special-star.php?id_kritik=<?php echo $kri[0]; ?>" class="secondary-content"><i class="material-icons">star_border</i></a>
      <?php } ?>
    </li>
<?php }
?>
  </ul>