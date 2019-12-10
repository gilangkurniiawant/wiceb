<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil</title>
</head>

<body>
    <style>
        .btn-block {
            padding: 10% 0;
            /* define values in pixels / Percentage or em. whatever suits 
       your requirements */
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <br>
    <br>
    <div class="container">
     
<?php
 session_start();

require_once('../modul/koneksi.php');
$nama = @$_POST['nama'] ? $_POST['nama'] : die();
preg_match_all('/\(\+62\)(.*)/', $nama, $data);

$no = "0".$data[1][0];
$no = str_replace(' ','',$no);

$target = "sirhuka.php?no".$no;
header("Location: $target");
   exit;
?>
  <div class="form-group">
        <div class="form-group">
            <a class="btn btn-success" onclick="copyU()">Copy</a> <a style="float:right" ; class="btn btn-primary" href="sirhuka.php/?no=<?=$no?>">Lanjutkan</a>
        </div>
                                <label class="col-md-2 control-label">Voucher</label>
                                <div class="col-md-10">
                                    <input type="text" id="hasha" value="<?=$no?>" name="user" class="form-control">
                                </div>
                            </div>
                            
<br>
<br>
<br>

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
        
    window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}
</script>
</body>

</html>

