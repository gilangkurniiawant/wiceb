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
    if (@$_POST['tipe'] && @$_POST['detail']) {
        date_default_timezone_set("Asia/Jakarta");
        $ex = date("d-m-Y", time());
        preg_match('/(.*), (.*)/', $_POST['detail'], $isi);
        $nama_asli = $isi['1'];
        $nama = strtolower(str_replace(' ', '', $isi['1']));
        $nama = $nama . rand(11, 99) . "@sirhuka.com";
        $data = "
| $ex - $nama_asli |
    
Hi $nama_asli,

Pesanan kamu telah selesai diproses, 

Detail akun :
------------------------------------------------
Username : $nama 
Password : sirhuka123
------------------------------------------------
Masa aktif 3 bulan dimulai tanggal $ex.

Demi keamanan data kami menyarankanmu mengganti katasandi ataupun email ya kak,

Kami tunggu orderan selanjutnya 🙂


Terimakasih.";
    }
    ?>

    <br>
    <div class="container">

        <div class="form-group">
            <a class="btn btn-success" onclick="copyU()">Copy</a> <a style="float:right" ; class="btn btn-primary" href="sirhuka.php">Kembali</a>
        </div>
        <div class="form-group">
            Username <input type="text" name="username" id="user" value="<?= $nama ?>"> <a class="btn btn-success" onclick="copyUs()">Copy</a>
        </div>
        <div class="form-group">
            Password <input type="text" name="password" id="pw" value="sirhuka123"> <a class="btn btn-success" onclick="copyP()">Copy</a>
        </div>


        <div class="form-group">
            <textarea class="form-control" id='hasha' rows="20%" cols="80%"><?= $data ?></textarea>
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

        function copyP() {
            var copyText = document.getElementById("pw").value;

            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = copyText;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            alert("Berhasil dicopy");
        }

        function copyUs() {
            var copyText = document.getElementById("user").value;

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

</html>
