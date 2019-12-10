<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>SiRhuka - Formulir Pemesanan</title>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <?php
    $no_order = date("dmY", time()) . rand(11111, 99999);
    if (@$_POST['nama']) {
        if (!empty($_POST['nama'])) {
            date_default_timezone_set("Asia/Jakarta");
            $ex = date("d-m-Y", time());
            $nama = $_POST['nama'];
            $hp = $_POST['hp'];
            $alamat = $_POST['alamat'];
            $detail = $_POST['detail'];
            $varian = $_POST['varian'];
            if ($varian != 1) {
                $varian = "Beli 2 Rp.265.000";
            } else {
                $varian = "Beli 1 Rp.175.000";
            }

            $data = "$ex
No Order : $no_order 
Nama : $nama
No HP : $hp
Alamat : $alamat

Patokan : $detail

Varian : $varian

Saya $nama , ingin mengkonfirmasi orderan yang saya buat.";

            $data = rawurlencode($data);
            $url =  "https://api.whatsapp.com/send?phone=62895363065244&text=$data";
            echo $url;

//            header("Location:$url");
            echo "<script>window.location.href='$url';</script>";
            $_POST = "";
        }
    }

    ?>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Formulir Pemesanan</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="#">

                        <div class="form-row">
                            <div class="name">Nama Lengkap</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nomer HP/WA</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="hp" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea name="alamat" class="input--style-5 " cols="27px" rows="3%" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Patokan Rumah</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="detail" placeholder="Contoh : timur toko kue">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Varian</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="varian" required>
                                            <option disabled="disabled" selected="selected">Pilih</option>
                                            <option value="1">Beli 1 Rp.175.000</option>
                                            <option value="2">Beli 2 Rp.265.000</option>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn--radius-2 btn--red" type="submit">Pesan Sekarang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

<script>
    window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}
</body>

</html>
<!-- end document-->