<?php
session_start(); // Memulai session
include 'koneksi/koneksi.php';
include('../navbar/navbar.php');

if (!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
    header("Location: login.php"); // Redirect ke halaman login
    exit;
}

$t_dosen = query("SELECT * FROM t_dosen");

if (isset($_POST['btntambah'])) {
    if (tambah($_POST) > 0) {
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
    if (edit($_POST) > 0) {
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
    if (hapus($_POST) > 0) {
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


?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="content">
            <span class="span-header">
                <h2>Tambah Data Dosen</h2>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah
            </button>
            <form method="post" action="" class="mb-5">
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tambah Data Dosen</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                                    <input type="text" class="form-control" name="lnidn" id="exampleFormControlInput1" placeholder="NIDN Dosen">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Dosen</label>
                                    <input type="text" class="form-control" name="ldosen" id="exampleFormControlInput1" placeholder="Nama Dosen Pengajar">
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

            <table class="table table-bordered text-center float-start">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    include "../koneksi.php";
                    $sql = "SELECT * FROM t_dosen";
                    $tampil = mysqli_query($con, $sql);
                    if (mysqli_num_rows($tampil) == 0) {
                        echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
                    } else {
                        foreach ($t_dosen as $row) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $row['nidn']; ?></td>
                                <td><?= $row['dosen']; ?></td>
                                <td>
                                    <div class="button d-flex justify-content-evenly">
                                        <!-- <a href="dosen.php?var=edit&id=<?= $row['nidn'] ?>"> -->
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Update<?= $i ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>
                                        </a>
                                        <!-- <a href="dosen.php?var=hapus&id=<?= $row['nidn'] ?>"> -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $i ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg></button>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                            <!-- Update Modal -->
                            <div class="modal fade" id="Update<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Data Dosen</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post">
                                            <input type="hidden" name="lid" value="<?= $row['id'] ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                                                    <input type="text" class="form-control" name="lnidn" value="<?= $row['nidn'] ?>" id="exampleFormControlInput1" placeholder="NIDN Dosen" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Dosen</label>
                                                    <input type="text" class="form-control" name="ldosen" value="<?= $row['dosen'] ?>" id="exampleFormControlInput1" placeholder="Nama Dosen Pengajar">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="btnubah" class="btn btn-success">Ubah</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Update Modal -->


                            <!-- Delete Modal -->
                            <div class="modal fade" id="modalHapus<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post">
                                            <input type="hidden" name="lid" value="<?= $row['nidn'] ?>">
                                            <div class="modal-body">
                                                <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                                    <span class="text-danger"><?= $row['nidn'] ?> - <?= $row['dosen'] ?></span>
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
                            <!-- End Delete Modal -->
                            <?php $i += 1 ?>
                        <?php endforeach ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>