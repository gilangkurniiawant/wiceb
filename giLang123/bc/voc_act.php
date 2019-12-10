<?php
 session_start();

require_once('../modul/koneksi.php');
$nama = @$_POST['nama'] ? $_POST['nama'] : die();
$data = explode("\n", $nama);

for ($x = 0; $x < count($data); $x++) {
    $d = explode("|", $data[$x]);
    if (count($d) == 2) {
        $u = $d[0];
        $p = $d[1];
        if (strlen($p) >= 3) {
            if (!simpan_voc($u, $p)) {
                echo "Gagal <br><br>";
            }
        }
    }
}

echo "Selesai";
?>
<br>
<br>
<br>
<center>

<div class="form-group">
<a href="voc.php">Kembali</a>
    </div>
    
    <script>
    window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}
