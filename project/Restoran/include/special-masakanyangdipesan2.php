<table class="responsive-table highlight centered">
        <thead>
        <tr>
            <th>No</th>
            <th>Meja</th>
            <th>Makanan</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        <?php 
    $masakan = "SELECT * FROM detail_order";
    $result = mysqli_query($dbh, $masakan);
    $no = 0;
    while($mas = mysqli_fetch_array($result)){
        $no++;
    ?>
      <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td>
        <?php 
        $meja = "SELECT * FROM orderan WHERE id_order = $mas[1]";
        $mejares = mysqli_query($dbh,$meja);
        while($me = mysqli_fetch_array($mejares)){
            echo $me[1];
        }
        ?>
        </td>
        <td>
        <?php 
        $masakan2 = "SELECT * FROM masakan WHERE id_masakann = $mas[2]";
        $res = mysqli_query($dbh,$masakan2);
        while($z = mysqli_fetch_array($res)){
            echo $z[1];
        }
        ?>
        </td>
        <td><?php echo $mas[3]; ?></td>
        <td><?php 
        $meja = "SELECT * FROM orderan WHERE id_order = $mas[1]";
        $mejares = mysqli_query($dbh,$meja);
        while($me = mysqli_fetch_array($mejares)){
            echo $me[2];
        }
        ?></td>
        <?php if($mas[4] == "konfirmasi"){ ?>
                <td><span class="new badge blue" data-badge-caption=" "><?php echo $mas[4]; ?></span></td>
            <?php }else{ ?>
                <td><span class="new badge red" data-badge-caption=" "><?php echo $mas[4]; ?></span></td>
            <?php } ?>
      </tr>
    <?php } ?>
        </tbody>
      </table>