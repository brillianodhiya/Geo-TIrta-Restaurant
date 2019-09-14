<?php
include_once 'koneksi.php';
session_start();
ob_start();
?> <br>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Struk!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="qrcode/qrcode<?php echo $_GET['id_order']; ?>.png" alt="" width="150"/></td>
        <td align="right">
            <h3>GEO TIRTA RESTAURANT</h3>
            <pre>
            Nama <?php echo $_SESSION['nama_user']; ?> 
            No ID 20<?php echo $_SESSION['id_user']; ?>191 
            No Meja <?php 
            $adzx = "SELECT * FROM orderan WHERE id_order = '".$_GET['id_order']."' ";
            $ress = mysqli_query($dbh,$adzx);
            while($hapitt = mysqli_fetch_array($ress)){
              echo $hapitt[1];
            } 
            ?> 
            </pre>
        </td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No</th>
        <th>Makanan</th>
        <th>Keterangan</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sdazz = "SELECT * FROM detail_order WHERE id_order = '".$_GET['id_order']."' ";
    $qesz = mysqli_query($dbh,$sdazz);
    $no = 0;
    while($l = mysqli_fetch_array($qesz)){
      $no++;
    ?>
      <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td>
        <?php 
        $as = "SELECT * FROM masakan WHERE id_masakann = $l[2]";
        $sda = mysqli_query($dbh,$as);
        while($z = mysqli_fetch_array($sda)){
          echo $z[1];
        }
        ?>
        </td>
        <td align="right"><?php echo $l[3]; ?></td>
        <td align="right">
        <?php 
        $as = "SELECT * FROM masakan WHERE id_masakann = $l[2]";
        $sda = mysqli_query($dbh,$as);
        while($z = mysqli_fetch_array($sda)){
          echo $z[3];
        }
        ?>
        </td>
      </tr>
    <?php 
    }
    ?>
    </tbody>

    <tfoot>

        <tr>
            <td colspan="2"></td>
            <td align="right">Total Harga Rp</td>
            <td align="right" class="gray">
            <?php
             $sdazz = "SELECT * FROM detail_order WHERE id_order = '".$_GET['id_order']."' ";
             $qesz = mysqli_query($dbh,$sdazz);
             while($l = mysqli_fetch_array($qesz)){
              $as = "SELECT harga FROM masakan WHERE id_masakann = $l[2]";
              $sda = mysqli_query($dbh,$as);
              while($z = mysqli_fetch_array($sda)){
               $harga[] = $z['harga'];
              }
             }
             $total = array_sum($harga);
             echo $total;
             ?>
            </td>
        </tr>
    </tfoot>
  </table>
NB: Anda Akan Menerima Pesanan Setelah Memberikan Tiket Ini Ke Kasir
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
$tgl = date('Y-m-d');
$dompdf->stream("TiketPesanan ".$_SESSION['nama_user']." ".$tgl,array("Attachment"=>1));
?>