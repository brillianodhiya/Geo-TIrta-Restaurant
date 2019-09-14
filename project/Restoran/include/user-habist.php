<div class="row">
    <?php
    $join = "SELECT * FROM masakan WHERE status_masakan = 'habis' ";
    $resjoin = mysqli_query($dbh, $join);
    while($jon = mysqli_fetch_array($resjoin)){
     ?>
        <img src="<?php echo $jon[3]; ?>" class="materialboxed col s3 m3" data-caption="test" height="200px">
    <?php } ?>
</div>