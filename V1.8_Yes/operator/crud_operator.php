<?php
include '../koneksi.php';

if (isset($_POST['btntambah'])) {
    $nama = $_POST['lnama'];
    $id = $_POST['lid'];
    $pass = $_POST['lpass'];

    $qry = "INSERT INTO t_admin (ID_Admin, NamaOperator, Password) 
    VALUES ('$id','$nama', '$pass')";

    $simpan = mysqli_query($con, $qry);

    if ($simpan) {
        echo "<script>
        alert('Berhasil Input Operator');
        document.location='operator.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Input Data');
        document.location='operator.php';
        </script>";
    }
}

if (isset($_POST['btnhapus'])) {
    $id = $_POST['lid'];

    $qry = "DELETE FROM t_admin WHERE ID_Admin ='$id'";

    $ubah = mysqli_query($con, $qry);

    if ($ubah) {
        echo "<script>
        alert('Berhasil Hapus Operator');
        window.location.href='operator.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Hapus Operator');
        window.location.href='operator.php';
        </script>";
    }
}
