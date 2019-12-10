<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil</title>
</head>

<body>

    <?php
    session_start();
    $kode = @$_POST['kode'] ? $_POST['kode'] : '';
    $jumlah = @$_POST['jumlah'] ? $_POST['jumlah'] : '';
    $hasil = array();
    $ls = array();
    $li = explode("\n",str_replace(' ','',strtolower($_POST['user'])));
    
    for($p=0;$p<count($li);$p++){
        $ls[] = explode("-",$li[$p]);
        
    }
     for($p=0;$p<count($ls);$p++){
       
       $lo .= "Username : ".$ls[$p][0]. " \nPassword : ".$ls[$p][1];
        $lo .= "\n\n";
        
    }
    
    
    if(@$_POST['no']){
        $no = $_POST['no'];
    } else{
        $no="";
    }
 if($_POST['jenis']!=1){
     
 
     $dts .= $lo;
 } else{
     $jumlah=1;
 }  
    /*
if ($_SESSION['request'] == 'no') {
    echo "<center>Gagal! Dilarang refresh page!";
    echo '<br><a ; class="btn btn-primary" href="sirhuka.php">Menu Utama</a>';
    die();
}
*/

        for ($x = 1; $x <= $jumlah; $x++) {
            $hasil[] = order($kode);
        }

        foreach ($hasil as $d) {
            $dts .= "Username : " . $d[0] . "\nPassword : " . $d[1] . "\n\n";
        }
    

    date_default_timezone_set("Asia/Jakarta");
    $ex = date("d-m-Y", time());
    $nam = 	substr_replace($_POST['nam'],"", -2);
    $dts = 	substr_replace($dts,"", -2);

    $otp = "| $ex - No Order. $kode |
    
Hi $nam,

Pesanan kamu telah selesai diproses, 

Detail Voucher :
------------------------------------------------
$dts

Masa aktif  30 hari.
------------------------------------------------

Kami juga telah mengirimkan detail voucher melalui sms ke nomer hp kamu $no,


Kami tunggu orderan selanjutnya :)


Terimakasih.";

    $_SESSION['request'] = 'no';

    ?>
    <br>
    <div class="container">

        <div class="form-group">
            <a class="btn btn-success" onclick="copyU()">Copy</a> <a style="float:right" ; class="btn btn-primary" href="http://order.wifi-id.my.id/giLang123/index.php">Kembali</a>
        </div>
        <div class="form-group">
            <textarea class="form-control" id='hasha' rows="20%" cols="80%"><?= $otp ?></textarea>
        </div>
    </div>
 <br>
            <br>
            <div class="card">
  <div class="card-body">
    #Sirhuka #Gilang K
  </div>

    <script>
        function copyU() {
            var copyText = document.getElementById("hasha").value;

            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = copyText;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            alert("Berhasil dicopy");
        }
    </script>
    <script>
    window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}
</body>

</html>
