<?php 
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["kode"];
    $semester = $_POST["semester"];
    $matakuliah = $_POST["matakuliah"];
    $dosen = $_POST["dosen"];
    $ruang = $_POST["matakuliah"];
    $waktu = $_POST["waktu"];

    $sql = "INSERT INTO t_dosen (kode, semester, matakuliah, dosen, ruang, hari)
    VALUES ('$kode', '$semester', '$matakuliah', '$dosen', '$ruang', '$waktu')";

    if (mysqli_query($con, $sql)) {
        header("Location: dosen.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
 ?>