<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "penjadwalan";

$con = mysqli_connect($host, $user, $pass, $db);
if (!$con) {
    die("Koneksi Error" . mysqli_connect_error());
}

?>