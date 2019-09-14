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
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 300px;
      height: 300px;
    }
    .swiper-slide {
      background-position: center;
      background-size: cover;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
    <?php
      $perkenalan = "SELECT * FROM masakan LIMIT 5";
      $res = mysqli_query($dbh, $perkenalan);
      while($per = mysqli_fetch_array($res)){
     ?>
      <div class="swiper-slide" style="background-image:url(<?php echo "include/".$per[2]; ?>)"></div>
      <?php } ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'cube',
      grabCursor: true,
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
</body>
</html>