<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="css/swiper.min.css">

  <!-- Demo styles -->
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .ss {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
      height: 400px;
    }
    .s2s {
      background-position: center;
      background-size: cover;
      width: 300px;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container ss">
    <div class="swiper-wrapper">
    <?php 
      $slide = "SELECT * FROM masakan WHERE status_makanan = 'ada' LIMIT 10";
      $resslide = mysqli_query($dbh, $slide);
      while($sli = mysqli_fetch_array($resslide)){
    ?>
      <?php 
        $checkin = "SELECT * FROM orderan WHERE id_user = '".$_SESSION['id_user']."' AND NOT status_order = 'batal' AND NOT status_order = 'selesai' ";
        $resc = mysqli_query($dbh, $checkin);
        $ch = mysqli_fetch_array($resc);
        if ($ch > 0){
      ?>
      <a href="include/user-pesan.php?id_masakan=<?php echo $sli[0]; ?>" class="swiper-slide s2s" style="background-image:url(<?php echo "include/".$sli[2] ?>)"></a>
        <?php }else{ ?>
          <a onclick="M.toast({html: toastHTML})" class="swiper-slide s2s" style="background-image:url(<?php echo "include/".$sli[2] ?>)"></a>
        <?php } ?>
      <?php }?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.ss', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
</body>
</html>