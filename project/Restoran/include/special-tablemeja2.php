<div class="row ">
    <img src="image/tablemeja.gif" class="col s12 m7">
    <div class="col s12">
     <table class="responsive-table highlight centered">
        <thead>
          <tr>
              <th>No Meja</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
        <?php 
        $mejalist = "SELECT * FROM listmeja";
        $resmlist = mysqli_query($dbh,$mejalist);
        while($mm = mysqli_fetch_array($resmlist)){
        ?>
          <tr>
            <td><?php echo $mm[1]; ?></td>
            <?php if($mm[2] == "kosong"){ ?>
                <td><span class="new badge blue" data-badge-caption=" "><?php echo $mm[2]; ?></span></td>
            <?php }else{ ?>
                <td><span class="new badge red" data-badge-caption=" "><?php echo $mm[2]; ?></span></td>
            <?php } ?>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
</div>