<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjadwalan</title>
    <link rel="stylesheet" href="style/navbar_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include('../navbar/navbar.php') ?>

    <div class="container-fluid">
        <div class="content">
            <span class="span-header">
                <h2>Tambah Data Mata Kuliah</h2>
            </span>
            <form method="post" class="mb-5">
                <div class="mb-4">
                    <label for="nidn" class="form-label">Matakuliah</label>
                    <input type="text" name="idMatkul" class="form-control border shadow-sm p-3" id="nidn" placeholder="Masukan Kode Matakuliah" required autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="dosen" class="form-label">Kelas</label>
                    <input type="text" name="matkul" class="form-control border shadow-sm p-3" id="dosen" placeholder="Masukan Kelas" required autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="dosen" class="form-label">Kode Matakuliah</label>
                    <input type="text" name="semester" class="form-control border shadow-sm p-3" id="dosen" placeholder="Masukan Kode Matakuliah" required autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="dosen" class="form-label">Admin</label>
                    <input type="text" name="semester" class="form-control border shadow-sm p-3" id="dosen" placeholder="Masukan Admin" required autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="dosen" class="form-label">Jadwal</label>
                    <input type="text" name="semester" class="form-control border shadow-sm p-3" id="dosen" placeholder="Masukan Jadwal" required autocomplete="off">
                </div>
                <button class="btn btn-success" type="submit" name="submit"> Simpan </button>
            </form>
        </div>

        <div class="content">
            <table class="table table-bordered text-center float-start">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">Nama Matakuliah</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Kode Matakuliah</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM t_hasil";
                $tampil = mysqli_query($con, $sql);
                if (mysqli_num_rows($tampil) == 0) {
                    echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
                } else {
                    while ($data = mysqli_fetch_array($tampil)) :
                ?>
                        <tr>
                            <td><?= $data['NamaMataKuliah']; ?></td>
                            <td><?= $data['Kelas_ID']; ?></td>
                            <td><?= $data['SKS']; ?></td>
                            <td><?= $data['MataKuliah_ID']; ?></td>
                            <td><?= $data['ID_Admin']; ?></td>
                            <td><?= $data['Jadwal_ID']; ?></td>
                        </tr>
                <?php endwhile;
                } ?>
            </table>
</body>

</html>