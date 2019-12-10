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
    <?php
    $nama = @$_POST['no'] ? $_POST['no'] : '';
    if($nama!=''){
preg_match_all('/\(\+62\)(.*)/', $nama, $data);

if(@$data[1][0]){
preg_match_all('/(.*)\s/', $nama, $nas);    
$nak = $nas[0][0];
$no = "0".$data[1][0];
$no = str_replace(' ','',$no);
} else{
    $no='';
}
    
} else{
    $no='';
}
    session_start();
    $_SESSION['request'] = 'yes';

    ?>


    <div class="container">
        <div class="row">
           
            <br>
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-send"></i> Formulir</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="sirhuka_hasil.php">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Kode Pembelian</label>
                                <div class="col-md-10">
                                    <input type="text" name="kode" class="form-control">
                                <input type="hidden" name="jumlah" value="0" class="form-control">
                                <input type="hidden" name="nam" value="<?=str_replace('\n','',$nak)?>" class="form-control">
                            <input type="hidden" name="jenis" value="2" class="form-control">

                                </div>
                            </div>
                            


                            <div class="form-group">
                                <label class="col-md-2 control-label">Voucher</label>
                                <div class="col-md-10">
                                    <textarea name="user" class="form-control" rows="10%"></textarea>
                                </div>
                            </div>
                            <?php
                            if($no!=''){
                                echo'<div class="form-group">
                                <label class="col-md-2 control-label">No</label>
                                <div class="col-md-10">
                                    <input type="text" id="no" name="no" value="'.$no.'" class="form-control">
                                    
                                        <a onclick="copyU()" class="btn btn-info">Copy Nomer</a>
                                </div>
                            </div>';
                            }
                            ?>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <div class="pull-right">

                                        <button type="submit" name="submit" class="btn btn-info">Kirim</button>
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
                <a class="btn btn-success" href="https://sirhuka.000webhostapp.com/giLang123/">Kembali</a> <br>
            </div>
             <br>
            <br>
            <div class="card">
  <div class="card-body">
    #Sirhuka #Gilang K
  </div>


<script>

        
    window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}
 function copyU() {
            var copyText = document.getElementById("no").value;

            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = copyText;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            alert("Berhasil dicopy");
        }
    </script>    
   
</body>