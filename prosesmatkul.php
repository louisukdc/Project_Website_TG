<?php 
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["MataKuliah_ID"];
    $matkul = $_POST["NamaMataKuliah"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];

    $sql = "INSERT INTO t_matakuliah (MataKuliah_ID, NamaMataKuliah, sks, semester)
    VALUES ('$kode', '$matkul', '$sks', '$semester')";

    if (mysqli_query($con, $sql)) {
        header("Location: matkul.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
 ?>