<?php
// menyertakan autoloader
require_once 'dompdf/autoload.inc.php';

// mengacu ke namespace DOMPDF
use Dompdf\Dompdf;

// menggunakan class dompdf
$dompdf = new Dompdf();

$html = file_get_contents("user-tiketpesanan.php");
$dompdf->loadHtml($html);

// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');

// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("TiketPesanan",array("Attachment"=>1));
?>