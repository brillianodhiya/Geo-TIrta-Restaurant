<table class="responsive-table highlight ">
        <thead>
          <tr>
            <th>No</th>
            <th>Meja</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Total(RP)</th>
          </tr>
        </thead>

        <tbody>
        <?php
    $detail = "SELECT * FROM orderan";
    $detailres = mysqli_query($dbh,$detail);
    $no = 0;
    while($order = mysqli_fetch_array($detailres)){
        $no++;
    ?>
      <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $order[1]; ?></td>
        <td><?php echo $order[2]; ?></td>
        <td>
        <?php 
        $user = "SELECT * FROM user WHERE id_user = $order[3]";
        $userres = mysqli_query($dbh,$user);
        while($use = mysqli_fetch_array($userres)){
           echo $use[1];
        }
        ?>
        </td>
        <td><?php echo $order[4]; ?></td>
        <td align="right"><?php echo $order[5]; ?></td>
        <td align="right">
        <?php
        error_reporting(0);
             $sdazz = "SELECT * FROM detail_order WHERE id_order = '".$order[0]."' ";
             $qesz = mysqli_query($dbh,$sdazz);
             $ni = 0;
             while($l = mysqli_fetch_array($qesz)){
              $as = "SELECT harga FROM masakan WHERE id_masakann = $l[2]";
              $sda = mysqli_query($dbh,$as);
              $ni++;
              while($zs = mysqli_fetch_array($sda)){
                $harga[] = $zs['harga'];
              }
             }
             $total = array_sum($harga);
             echo $total;
             unset($harga);
             ?>
        </td>
      </tr>
    <?php } ?>
        </tbody>
      </table>