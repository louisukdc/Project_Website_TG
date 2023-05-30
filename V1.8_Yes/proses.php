<?php 
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["kode"];
    $dosen = $_POST["dosen"];


    $sql = "INSERT INTO t_dosen (kode, dosen)
    VALUES ('$kode', '$dosen')";

    if (mysqli_query($con, $sql)) {
        header("Location: dosen.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
 ?>