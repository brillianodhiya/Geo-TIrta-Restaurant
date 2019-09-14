<?php
include_once 'koneksi.php';
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Pemesanan Masakan </title>

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
        <td><?php echo $mas[4]; ?></td>
      </tr>
    <?php } ?>
    </tbody>
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
$dompdf->stream("DaftarPesanan",array("Attachment"=>1));
?>