<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar_style.css">
</head>
<body>
<input type="checkbox" id="check">
    <!--header area start-->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <!-- <div class="left_area">
            <h3>Dosen</h3>
        </div> -->
    </header>
    <!--header area end-->
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <div class="profile_info">
            <img src="../image/gedung.jpg" class="profile_image" alt="">
            <h4>Admin</h4>
        </div>
        <a href="http://localhost:8080/PHP/Project_Website_TG/index/index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="http://localhost:8080/PHP/Project_Website_TG/Dosen/dosen.php"><i class="fas fa-cogs"></i><span>Dosen</span></a>
        <a href="http://localhost:8080/PHP/Project_Website_TG/matakuliah/matkul.php"><i class="fas fa-table"></i><span>Matakuliah</span></a>
        <a href= "http://localhost:8080/PHP/Project_Website_TG/operator/operator.php"><i class="fas fa-th"></i><span>Operator</span></a>
        <a href= "http://localhost:8080/PHP/Project_Website_TG/jadwal/jadwal.php"><i class="fas fa-th"></i><span>Penjadwalan</span></a>
        <a href="http://localhost:8080/PHP/Project_Website_TG/logout.php"><i class="logout"></i><span>Log Out</span></a>

    </div>
    <!--sidebar end-->
</body>
</html>
