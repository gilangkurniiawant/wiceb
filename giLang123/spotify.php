<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='true' name='MSSmartTagsPreventParsing' />

    <title>VOC</title>
    <link rel="shortcut icon" href="fav.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY$">

    <style type="text/css">
        body {
            font-family: 'Quicksand', sans-serif;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    require_once('../modul/koneksi.php');

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

                        <form class="form-horizontal" role="form" method="POST" action="spotify_kirim.php">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tipe</label>
                                <div class="col-md-10">
                                    <select name="tipe" id="">
                                        <option value="Baru">Baru</option>
                                        <option value="Baru">Lama</option>
                                        <option value="Baru">Family</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Detail</label>
                                <div class="col-md-10">
                                    <textarea name="detail" class="form-control" rows="8%"></textarea>
                                </div>
                            </div>

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
                <a class="btn btn-success" href="index.php">Kembali</a> <br>
            </div>


</body>
