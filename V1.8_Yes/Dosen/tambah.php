<?php
include '../koneksi.php';

if (isset($_POST['btntambah'])) {
    $nidn = $_POST['lnidn'];
    $dosen = $_POST['ldosen'];

    $qry = "INSERT INTO tb_dosen (nidn, nama) 
    VALUES ('$nidn', '$dosen')";

    $simpan = mysqli_query($con, $qry);

    if ($simpan) {
        echo "<script>
        alert('Berhasil Input Data');
        document.location='dosen.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Input Data');
        document.location='dosen.php';
        </script>";
    }
}

if (isset($_POST['btnubah'])) {
    $nidn = $_POST['lnidn'];
    $dosen = $_POST['ldosen'];
    $id = $_POST['lid'];

    $qry = "UPDATE tb_dosen SET nidn = '$nidn', nama = '$dosen' WHERE id_dosen ='$id'";

    $ubah = mysqli_query($con, $qry);

    if ($ubah) {
        echo "<script>
        alert('Ubah Data Berhasil');
        window.location.href='dosen.php';
        </script>";
    } else {
        echo "<script>
        alert('Ubah Data Gagal');
        window.location.href='dosen.php';
        </script>";
    }
}

if (isset($_POST['btnhapus'])) {
    $id = $_POST['lid'];

    $qry = "DELETE FROM tb_dosen WHERE id_dosen ='$id'";

    $ubah = mysqli_query($con, $qry);

    if ($ubah) {
        echo "<script>
        alert('Berhasil Hapus Data');
        window.location.href='dosen.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Hapus Data');
        window.location.href='dosen.php';
        </script>";
    }
}
