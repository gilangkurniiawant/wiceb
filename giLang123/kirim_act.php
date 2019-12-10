<?php
/*
$POST['data'] = "##riyani  kustiya

perum bekasi jaya indah jln mawar 1 blok f 36/26. bekasi timur 17111

0895 6144 30510##";
*/
if (@$_POST['data']) {
    $_POST['data'] = $_POST['data'] . "##";
    preg_match_all('/##((.|\n)*)##/', $_POST['data'], $hasil);
    if (@$hasil[1][0]) {
        $data = strtolower($hasil[1][0]);
        $string = array('data order', 'data', 'order');
        $ganti = array('', '', '');
        $data = str_replace($string, $ganti, $data);
        $data = preg_split('/\r\n|\r|\n/', $data);
        //explode('PHP_EOL', $data);
        $hasil = array();
        for ($x = 0; $x < count($data); $x++) {
            if (!empty($data[$x])) {
                $hasil[] = $data[$x];
            }
        }

        if ($hasil >= 3) {
            //nama
            $string = array('nama lengkap', 'nama', ':');
            $ganti = array('', '', '');
            $nama = ucwords(trim(str_replace($string, $ganti, $hasil['0'])));

            //alamat
            $string = array('alamat lengkap', 'alamat pengiriman', ':', 'alamat', 'pengiriman', 'alamat saya');
            $ganti = array('', '', '', '', '', '');
            $alamat = preg_replace('/\s+/', ' ', ucwords(trim(str_replace($string, $ganti, $hasil['1']))));

            //no_hp
            $string = array('no hp', 'nomer', ':', 'no', 'hp', 'tlp', ' ');
            $ganti = array('', '', '', '', '', '', '');
            $no_hp = ucwords(trim(str_replace($string, $ganti, $hasil['2'])));
        } else {
            $hasil = false;
        }
    } else {
        $hasil = false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='true' name='MSSmartTagsPreventParsing' />

    <title>Beli</title>
    <link rel="shortcut icon" href="fav.png" />
    <link href="https://gopaysender.com/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Quicksand', sans-serif;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-send"></i> Apakah Sudah Benar ? </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="cetak_kirim.php">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" class="form-control" value="<?= $nama ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Alamat</label>
                                <div class="col-md-10">
                                    <textarea name="alamat" class="form-control" rows="3%"><?= $alamat ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nomer HP</label>
                                <div class="col-md-10">
                                    <input type="text" name="no_hp" value="<?= $no_hp ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Jenis Paket</label>
                                <div class="col-md-10">
                                    <select name="jenis" class="form-control">
                                        <option value="" disabled>Pilih</option>
                                        <option value="ANAK BARU">ANAK BARU</option>
                                        <option value="CALON PUTRI">CALON PUTRI</option>
                                        <option value="SOBAT CANTIK">SOBAT CANTIK</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <div class="pull-right">

                                        <button type="submit" name="submit" class="btn btn-info">Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <center>
            <div class="form-group">
                <a class="btn btn-success" href="pengiriman.php">Kembali</a> <br>
            </div>



</body>

<script>
    window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}
</script>