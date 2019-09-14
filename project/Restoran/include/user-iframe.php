
<ul class="collection">
<?php 
  $colection = "SELECT * FROM masakan WHERE status_makanan = 'ada' ";
  $colres = mysqli_query($dbh, $colection);
  while($col = mysqli_fetch_array($colres)){
?>
    <li class="collection-item avatar">
      <img src="<?php echo "include/".$col[2]; ?>" alt="" class="circle">
      <span class="title"><?php echo $col[1]; ?></span>
      <p>Rp.<?php echo $col[3]; ?></p>
      <?php 
        $checkin = "SELECT * FROM orderan WHERE id_user = '".$_SESSION['id_user']."' AND NOT status_order = 'batal' AND NOT status_order = 'selesai' ";
        $resc = mysqli_query($dbh, $checkin);
        $ch = mysqli_fetch_array($resc);
        if ($ch > 0){
      ?>
      <a href="include/user-pesan.php?id_masakan=<?php echo $col[0]; ?>" class="secondary-content"><i class="material-icons">add_shopping_cart</i></a>
        <?php }else{ ?>
          <a onclick="M.toast({html: toastHTML})" class="secondary-content"><i class="material-icons">add_shopping_cart</i></a>
        <?php } ?>
    </li>
  <?php }?>
</ul>