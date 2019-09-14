<?php
include_once 'koneksi.php';
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Semua Penjualan</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: xx-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: xx-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="image/logo.png" alt="" width="150"/></td>
        <td align="right">
            <h3>GEO TIRTA RESTAURANT</h3>
        </td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
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
    <tfoot>
        <tr>
            <td colspan="5"></td>
            <td align="right">Total (Dikonfirmasi)</td>
            <td align="right" class="gray">
            <?php
            $nun = "SELECT * FROM orderan WHERE status_order = 'dikonfirmasi' ";
            $nunres = mysqli_query($dbh,$nun);
            while($s = mysqli_fetch_array($nunres)){
             $sdazz2 = "SELECT * FROM detail_order WHERE id_order = $s[0]";
             $qesz2 = mysqli_query($dbh,$sdazz2);
             while($li = mysqli_fetch_array($qesz2)){
              $as2 = "SELECT harga FROM masakan WHERE id_masakann = $li[2]";
              $sda2 = mysqli_query($dbh,$as2);
              while($zsx = mysqli_fetch_array($sda2)){
                $hargas[] = $zsx['harga'];
              }
             }
            }
             $totals = array_sum($hargas);
             echo $totals;
             unset($hargas);
             ?>
            </td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td align="right">Total (Keseluruhan)</td>
            <td align="right" class="gray">
            <?php
            $nun = "SELECT * FROM orderan";
            $nunres = mysqli_query($dbh,$nun);
            while($s = mysqli_fetch_array($nunres)){
             $sdazz2 = "SELECT * FROM detail_order WHERE id_order = $s[0]";
             $qesz2 = mysqli_query($dbh,$sdazz2);
             while($li = mysqli_fetch_array($qesz2)){
              $as2 = "SELECT harga FROM masakan WHERE id_masakann = $li[2]";
              $sda2 = mysqli_query($dbh,$as2);
              while($zsx = mysqli_fetch_array($sda2)){
                $hargas[] = $zsx['harga'];
              }
             }
            }
             $totals = array_sum($hargas);
             echo $totals;
             unset($hargas);
             ?>
            </td>
        </tr>
    </tfoot>
  </table>

</body>
</html>
<?php
$html = ob_get_clean();
use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream("DataSemuaPenjualan",array("Attachment"=>1));
?>