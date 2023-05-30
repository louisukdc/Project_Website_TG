<?php 
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MataKuliah_ID = $_POST["MataKuliah_ID"];
    $NamaMataKuliah = $_POST["NamaMataKuliah"];


    $sql = "INSERT INTO t_matakuliah (MataKuliah_ID, NamaMataKuliah)
    VALUES ('$MataKuliah_ID', '$NamaMataKuliah')";

    if (mysqli_query($con, $sql)) {
        header("Location:matkul.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
 ?>