<?php 
include 'koneksi.php';
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link rel="stylesheet" href="style/navbar_style.css">
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <input type="checkbox" id="check">
<!--header area start-->
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>Dosen</h3>
    </div>
</header>
<!--header area end-->
<!--mobile navigation bar start-->
<div class="mobile_nav">
    <div class="nav_bar">
        <img src="1.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
        <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
        <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
        <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
    <div class="profile_info">
        <img src="image/gedung.jpg" class="profile_image" alt="">
        <h4>Admin</h4>
    </div>
    <a href= index.php><i class="fas fa-desktop"></i><span>Dashboard</span></a>
    <a href= dosen.php ><i class="fas fa-cogs"></i><span>Dosen</span></a>
    <a href= matkul.php ><i class="fas fa-table"></i><span>Matakuliah</span></a>
    <a href= operator.php ><i class="fas fa-th"></i><span>Operator</span></a>

</div>
<!--sidebar end-->

<div class="content">
    <div class="card">
         <button onclick="showPopup()" type="submit">Tambah Dosen </button>
         <div id="popup">
  <span class="span-header"><h2>Tambah Data Dosen</h2></span>
  <span id="popup-close" onclick="hidePopup()">X</span>
  <form action="proses.php" method="post">
    <label>Kode</label>
    <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Dosen">
    <br>
    <label>Semester</label>
    <input type="text" name="semester" id="semester" placeholder="Masukkan Semester">
    <br>
    <label>Matakuliah</label>
    <input type="text" name="matakuliah" id="matakuliah" placeholder="Masukkan Matakuliah">
    <br>
    <label>Dosen</label>
    <input type="text" name="dosen" id="dosen" placeholder="Masukkan Nama Dosen">
    <br>
    <label>Ruang</label>
    <input type="text" name="ruang" id="ruang" placeholder="Masukkan Ruang Kelas">
    <br>
    <label>Hari / Tanggal</label>
    <input type="date" name="waktu" id="waktu">
    <br>
    <input type="submit" value="Simpan">
  </form>
</div>
<br>		 
<br>
		<label for="show">Cari Dosen</label>
        <input type="text" placeholder="Cari Nama Dosen" name="show" id="show">
<br>
<br>
        <table border="2">
            <tr>
                <th>Kode</th>
                <th>Semester</th>
                <th>Matakuliah</th>
                <th>Dosen</th>
                <th>Ruang</th>
                <th>Hari/Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php 
                include "koneksi.php";
                $sql = "SELECT * FROM t_dosen";
                $tampil = mysqli_query($con,$sql);
                if(mysqli_num_rows($tampil) == 0) {
                    echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
                } else {
                    while($data = mysqli_fetch_array($tampil)) :
            ?>
            <tr>
                <td><?=$data['kode'];?></td>
                <td><?=$data['semester'];?></td>
                <td><?=$data['matakuliah'];?></td>
                <td><?=$data['dosen'];?></td>
                <td><?=$data['ruang'];?></td>
                <td><?=$data['hari'];?></td>
                <td>
                    <a href="#">Edit</a>
                    <a href="dosen.php?hal=hapus&id=<?=$data['kode']?>">Hapus</a>
                </td>
            </tr>
            <?php endwhile; } ?>
        </table>
</div>
</body>
</html>