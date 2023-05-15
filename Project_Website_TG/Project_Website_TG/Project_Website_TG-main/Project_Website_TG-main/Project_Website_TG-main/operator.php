<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link rel="stylesheet" href="style/navbar_style.css">
</head>
<body>
    <input type="checkbox" id="check">
<!--header area start-->
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>Operator</h3>
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
        <button type="submit">Tambah</button>
        <br>
<br>
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
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php 
                include "koneksi.php";
                $sql = "SELECT * FROM t_jadwal";
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
            </tr>
            <?php endwhile; } ?>
        </table>
</body>
</html>