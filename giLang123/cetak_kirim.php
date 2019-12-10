<?php

use Dompdf\Dompdf;

date_default_timezone_set('Asia/Jakarta');
$date = date('d M Y', time());
session_start();
if (@$_GET['cetak']) {
    
    require_once '../dompdf/autoload.inc.php';
    $data = file_get_contents('data.txt');
    $dompdf = new Dompdf();
    $dompdf->loadHtml($data);
    // (Opsional) Mengatur ukuran kertas dan orientasi kertas
    $dompdf->setPaper('A4', 'landscape');
    // Menjadikan HTML sebagai PDF
    $dompdf->render();
    // Output akan menghasilkan PDF ke Browser
    $dompdf->stream($date.'-'.$_SESSION['nama']);
} else {
    $_SESSION = $_POST;
    $jenis = $_SESSION['jenis'];
    $nama = $_SESSION['nama'];

    $alamat = $_SESSION['alamat'];
    $no_hp = $_SESSION['no_hp'];
}
$data = <<<EOT

<table width="700px" border="1" style="border-collapse:collapse;">
    <tr>
        <th>
            <img src="../img/logo.png" width="100px" height="70px" alt="">

        </th>
        <th width="500px">MASKER SPIRULINA <br>
            PAKET  $jenis <br></th>
        <th>
            <img src="../img/logo.png" width="100px" height="70px" alt="">

        </th>


    </tr>

    <tr>
        <td colspan="3">
            <br>

            Dikirim oleh Sirhuka - 0895363065244
            <div style="float:right">Surakarta, $date </div>
            <!-- <hr style="border-top: dotted 1px;"> -->
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <br>
            <b>PENERIMA :<br></b>
            <br>
            <b>Nama : </b>  $nama  <br><br>

            <b>Alamat Lengkap : </b>  $alamat 
            <br><br>
            <b>Nomer HP :</b>  $no_hp
        </td>




    </tr>



</table>
EOT;
echo $data;
//$_SESSION['hasil'] = $data;
$var = fopen("data.txt", "w");
fwrite($var, $data);
fclose($var);


?>


<a href="cetak_kirim.php?cetak=1">CETAK PDF</a>