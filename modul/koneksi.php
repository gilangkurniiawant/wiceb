<?php
//$con = mysqli_connect('localhost', 'root', '', 'wifi') or die('Gagal');
//$con = mysqli_connect('localhost', 'id10993138_root', 'giLang123!', 'id10993138_wifi') or die('Gagal');




function tampil_data($user)
{
    $user = clean($user);
    global $con;
    $data =  mysqli_query($con, "SELECT * FROM orders where user='$user'") or die('Query Gagal');
    $jum = mysqli_num_rows($data);
    if ($jum >= 1) {
        return  mysqli_fetch_array($data);
    } else {
        return false;
    }
}

function cek_order($kode)
{
    global $con;
    $data =  mysqli_query($con, "SELECT * FROM orders where nama='$kode'") or die('Query Gagal');
    $jum = mysqli_num_rows($data);
    if ($jum >= 1) {
        return  $data;
    } else {
        return false;
    }
}
function simpan_voc($u, $p)
{
    global $con;
    date_default_timezone_set("Asia/Jakarta");
    $ex = date("d-m-Y", time());
    $data =  mysqli_query($con, "SELECT * FROM voucher where username='$u'") or die('Query Gagal');
    $jum = mysqli_num_rows($data);
    if ($jum >= 1) {
        return false;
    } else {
        $isi = "null,'$u','$p','$ex','-'";
        $q = "INSERT INTO voucher values($isi)";
        //"null,'ra4u71','WAL','Gilang','15-01-1999'";
        mysqli_query($con, $q) or die('Query Gagal ' . $q);
        return true;
    }
}


function order($nama)
{
    $nama = clean($nama);
    global $con;
    $data =  mysqli_query($con, "SELECT * FROM voucher where status='-' LIMIT 1") or die('Query select Gagal');
    $jum = mysqli_num_rows($data);
    if ($jum >= 1) {
        date_default_timezone_set("Asia/Jakarta");
        $ex = date("d-m-Y", time());
        $has =  mysqli_fetch_array($data);
        $isi = "null,'" . $has['username'] . "','" . $has['password'] . "','" . $nama . "','$ex'";
        $q = "INSERT INTO orders values($isi)";
        mysqli_query($con, $q) or die('Query order Gagal ' . $q);
        $q = 'UPDATE voucher set status="used" where username="' . $has['username'] . '"';
        mysqli_query($con, $q) or die('Query update Gagal ' . $q);
        return array($has['username'], $has['password']);
    } else {
        return false;
    }
}

function voc_kosong()
{

    global $con;
    $data =  mysqli_query($con, "SELECT * FROM voucher where status='-'") or die('Query select Gagal');
    $jum = mysqli_num_rows($data);
    return $jum;
}




function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
