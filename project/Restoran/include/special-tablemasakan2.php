<img src="image/tablemasakan.gif" alt="" height="45">
    <table class="responsive-table highlight">
        <thead>
          <tr>
              <th>No</th>
              <th>Makanan</th>
              <th>Harga</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
<?php 
$masakan = "SELECT * FROM masakan";
$masakanresult = mysqli_query($dbh,$masakan);
$nomasakan = 0;
while($mas = mysqli_fetch_array($masakanresult)){
  $nomasakan++;
?>
          <tr>
            <td><?php echo $nomasakan?></td>
            <td><?php echo $mas[1]; ?></td>
            <td><?php echo $mas[3]; ?></td>
            <?php if($mas[4] == "ada"){ ?>
                <td><span class="new badge blue" data-badge-caption=" "><?php echo $mas[4]; ?></span></td>
            <?php }else{ ?>
                <td><span class="new badge red" data-badge-caption=" "><?php echo $mas[4]; ?></span></td>
            <?php } ?>
          </tr>
<?php } ?>
        </tbody>
      </table>