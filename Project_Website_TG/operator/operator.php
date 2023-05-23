<?php
session_start(); // Memulai session
include('koneksi/koneksi.php');


if (!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
    header("Location: login.php"); // Redirect ke halaman login
    exit;
}

if (isset($_GET['hal']) && $_GET['hal'] == "hapus" && isset($_GET['id'])) {
    $id = $_GET['id'];
    // $hapus = mysqli_query($conn, "DELETE FROM t_admin WHERE kode = '$id'");
    if (hapus($id) > 0) {
        echo "<script>alert('Data Berhasil Dihapus');
            window.location='operator.php';        
            </script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
            window.location='operator.php';        
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link rel="stylesheet" href="style/navbar_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include('../navbar/navbar.php') ?>
    <div class="content">
        <div class="">
            <input type="text" name="show" id="show">
            <label for="show">Show</label>

            <input type="text" name="show" id="show">
            <label for="show">Entries</label>

            <input type="text" name="show" id="show">
            <label for="show">Search</label>
            <br>
            <br>
            <table border="2">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM t_admin";
                $tampil = mysqli_query($con, $sql);
                if (mysqli_num_rows($tampil) == 0) {
                    echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
                } else {
                    while ($data = mysqli_fetch_array($tampil)) :
                ?>
                        <tr>
                            <td><?= $data['ID_Admin']; ?></td>
                            <td><?= $data['Namadosen']; ?></td>
                            <td><?= $data['Email']; ?></td>
                            <td>
                                <a href="operator.php?hal=hapus&id=<?= $data['ID_Admin'] ?>"><button class="btn btn-danger p-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg></button></a>
                            </td>
                        </tr>
                <?php endwhile;
                } ?>
            </table>
        </div>
    </div>
</body>

</html>