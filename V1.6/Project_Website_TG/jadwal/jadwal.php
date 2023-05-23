<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjadwalan</title>
    <link rel="stylesheet" href="style/navbar_style.css">
</head>
<body>
<?php include('../navbar/navbar.php') ?>

<div class="content">
        <table border="2">
            <tr>
                <th>No</th>
                <th>Nama Matakuliah</th>
                <th>Kelas</th>
                <th>Kode Matakuliah</th>
                <th>Admin</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
            <?php 
                include "../koneksi.php";
                $sql = "SELECT * FROM t_hasil";
                $tampil = mysqli_query($con,$sql);
                if(mysqli_num_rows($tampil) == 0) {
                    echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
                } else {
                    while($data = mysqli_fetch_array($tampil)) :
            ?>
            <tr>
                <td><?=$data['NamaMataKuliah'];?></td>
                <td><?=$data['Kelas_ID'];?></td>
                <td><?=$data['SKS'];?></td>
                <td><?=$data['MataKuliah_ID'];?></td>
                <td><?=$data['ID_Admin'];?></td>
                <td><?=$data['Jadwal_ID'];?></td>
            </tr>
            <?php endwhile; } ?>
        </table>
</body>
</html>