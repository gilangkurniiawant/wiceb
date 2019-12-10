
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpan</title>
</head>

<body>
    <?php
    if(@$_POST['username'] && @$_POST['password']){

    $nama = $_POST['username'];
    $sandi = $_POST['password'];
    $d ='{
    "nama": "'.$nama.'",
    "sandi": "'.$nama.'",

    }';

        $save = fopen("data_simpan.json", "a");
	    fputs($save, $d);
        fclose($save);
    
    } else{

        $file = json_decode(file_get_contents('data_simpan.json'),true);
        if($file!=''){
            $nama = $file['nama'];
             $sandi = $file['sandi'];
           
    
         }else{
             die();
        }

    }



    


    ?>

    <br>
    <div class="container">
        <form action="#" METHOD="POST">
        <div class="form-group">
            Username <input type="text" name="username" id="user" value="<?= $nama ?>"> <a class="btn btn-success" onclick="copyUs()">Copy</a>
        </div>
        <div class="form-group">
            Password <input type="text" name="password" id="pw" value="<?= $sandi ?>"> <a class="btn btn-success" onclick="copyP()">Copy</a>
        </div>
        <div>
        <input type="submit" class="btn btn-success" value="Simpan">
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
