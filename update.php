<?php 
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["kode"];
    $dosen = $_POST["dosen"];
    $sql = "UPDATE t_dosen SET  dosen = '$dosen' WHERE kode = '$kode'";

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