<?php
session_start(); // Memulai session
include('koneksi/koneksi.php');


if (!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
    header("Location: login.php"); // Redirect ke halaman login
    exit;
}

// if (isset($_POST['daftar'])) {
//     if (tambah($_POST) > 0) {
//         echo "<script> 
//                 alert('Berhasil mendaftar akun');
//                 document.location.href='operator.php';
//             </script>";
//     } else {
//         echo "<script> 
//                 alert('Gagal Mendaftar akun');
//             </script>";
//     }
// }

// if (isset($_GET['hal']) && $_GET['hal'] == "hapus" && isset($_GET['id'])) {
//     $id = $_GET['id'];
//     // $hapus = mysqli_query($conn, "DELETE FROM t_admin WHERE kode = '$id'");
//     if (hapus($id) > 0) {
//         echo "<script>alert('Data Berhasil Dihapus');
//             window.location='operator.php';        
//             </script>";
//     } else {
//         echo "<script>alert('Data Gagal Dihapus');
//             window.location='operator.php';        
//             </script>";
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link rel="stylesheet" href="style/navbar_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include('../navbar/navbar.php') ?>
    <div class="content">
        <div class="container-sm">
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Operator
            </button>
            <form action="crud_operator.php" method="post">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tambah Operator</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">ID Operator</label>
                                    <input type="text" class="form-control" name="lid" id="exampleFormControlInput1" placeholder="Masukkan Nama Operator" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Operator</label>
                                    <input type="text" class="form-control" name="lnama" id="exampleFormControlInput1" placeholder="Masukkan Nama Operator" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="lpass" id="exampleFormControlInput1" placeholder="Masukkan Nama Operator" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="btntambah" class="btn btn-success">Tambah</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-bordered text-center float-start">
            <thead>
                <tr class="table-primary">
                    <th scope="col">No</th>
                    <th scope="col">ID Operator</th>
                    <th scope="col">Nama Operator</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php
            include "../koneksi.php";
            $no = 1;
            $sql = "SELECT * FROM t_admin";
            $tampil = mysqli_query($con, $sql);
            if (mysqli_num_rows($tampil) == 0) {
                echo "<tr><td colspan='4'>Tidak ada data yang tersedia.</td></tr>";
            } else {
                while ($data = mysqli_fetch_array($tampil)) :
            ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['ID_Admin']; ?></td>
                        <td><?= $data['NamaOperator']; ?></td>
                        <td>
                            <!-- <a href="operator.php?hal=hapus&id=<?= $data['ID_Admin'] ?>"><button class="btn btn-danger p-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></button></a> -->
                            <a href="#"><button class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></button></a>
                        </td>
                    </tr>

                    <!-- Delete Button -->
                    <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="crud_operator.php" method="post">
                                    <input type="hidden" name="lid" value="<?= $data['ID_Admin'] ?>">
                                    <div class="modal-body">
                                        <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                            <span class="text-danger"><?= $data['NamaOperator'] ?></span>
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="btnhapus" class="btn btn-success">Iya</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete Button -->
                    <?php $no++; ?>
            <?php endwhile;
            } ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>