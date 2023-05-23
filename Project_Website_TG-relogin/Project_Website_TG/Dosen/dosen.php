<?php
session_start(); // Memulai session
include 'koneksi/koneksi.php';
include('../navbar/navbar.php');

if (!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
    header("Location: login.php"); // Redirect ke halaman login
    exit;
}

$t_dosen = query("SELECT * FROM t_dosen");

if (isset($_POST['submit'])) {
    if (isset($_GET['var']) and $_GET['var'] == 'edit') {
        if (edit($_POST)> 0 ){
            echo "<script> 
                    alert('Data Berhasil diubah');
                    document.location.href='dosen.php';
            </script>";
        } else {
            echo "<script> 
                    alert('Data gagal diubah');
                    document.location.href='dosen.php';
            </script>";
        }
    }
    else {
        if (tambah($_POST) > 0) {
            echo "<script> 
                    alert('Data Berhasil disimpan');
                    document.location.href='dosen.php';
                </script>";
        } else {
            echo "<script> 
                    alert('Data gagal disimpan');
                    document.location.href='dosen.php';
                </script>";
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $ubah = query("SELECT * FROM t_dosen WHERE nidn='$id'")[0];
    $nama_dosen = $ubah['dosen'];
} else {
    $id = "";
    $nama_dosen = "";
}


if (isset($_GET['hal']) && $_GET['hal'] == "hapus" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($con, "DELETE FROM t_dosen WHERE kode = '$id'");
    if ($hapus) {
        echo "<script>alert('Data Berhasil Dihapus');
        window.location='dosen.php';        
        </script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
        window.location='dosen.php';        
        </script>";
    }

    
}

if (isset($_GET['var']) and $_GET['var'] == 'hapus') {
    $id = $_GET['id'];
    if (hapus($id) > 0) {
        echo "<script> 
                alert('Data Berhasil dihapus');
                document.location.href='dosen.php';
            </script>";
    } else {
        echo "<script> 
                alert('Data gagal dihapus');
                document.location.href='dosen.php';
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
            <form method="post" class="mb-5">
                <div class="mb-4">
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control border shadow-sm p-3" id="nidn" placeholder="Masukan NIDN dosen" required autocomplete="off" value="<?=$id?>" >
                </div>
                <div class="mb-4">
                    <label for="dosen" class="form-label">Nama Dosen</label>
                    <input type="text" name="dosen" class="form-control border shadow-sm p-3" id="dosen" placeholder="Masukan nama dosen" required autocomplete="off" value="<?=$nama_dosen?>">
                </div>
                <button class="btn btn-success" type="submit" name="submit"> Simpan </button>
            </form>

            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    <?php foreach ($t_dosen as $row) : ?>
                    <tr>
                        <th><?= $i; ?></th>
                        <td><?= $row['nidn']; ?></td>
                        <td><?= $row['dosen']; ?></td>
                        <td>
                            <div class="button d-flex justify-content-evenly">
                                <a href="dosen.php?var=edit&id=<?= $row['nidn'] ?>">
                                    <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></button>
                                </a>
                                <a href="dosen.php?var=hapus&id=<?= $row['nidn'] ?>">
                                    <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg></button>
                                </a>
                            </div>

                        </td>
                    </tr>
                    <?php $i+=1 ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>