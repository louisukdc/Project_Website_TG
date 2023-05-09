<?php 
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["kode"];
    $semester = $_POST["semester"];
    $matakuliah = $_POST["matakuliah"];
    $dosen = $_POST["dosen"];
    $ruang = $_POST["matakuliah"];
    $waktu = $_POST["waktu"];

    $sql = "UPDATE t_dosen SET semester = '$semester', matakuliah = '$matakuliah', dosen = '$dosen', ruang = '$ruang', hari = '$waktu' WHERE kode = '$kode'";

    if (mysqli_query($con, $sql)) {
    echo "<script>alert('Data Berhasil Diedit');
                    document.location='dosen.php';
        </script>";
    } else {
        echo "<script>alert('Data Gagal Diedit');
            document.location='dosen.php';        
        </script>";
    }
}

?>