<?php
session_start(); // Memulai session
include 'koneksi.php';
if (isset($_GET["edit"])) {
    $nilai = $_GET["edit"];
} else {
    $nilai = "kosong";
}

if (!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
    header("Location: login.php"); // Redirect ke halaman login
    exit;
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

// if (isset($_GET['hal']) && $_GET['hal'] == "edit" && isset($_GET['id'])) {
//     $kode = $_GET['id'];
//     $edit = mysqli_query($con, "SELECT * FROM t_dosen WHERE kode = '$id'");
//     $data = mysqli_fetch_array($edit);
//     while ($data = mysqli_fetch_array($tampil))  {
//         $dosen = $data['dosen'];
//     }


//     if ($edit) {
//         echo "<script>alert('Data Berhasil Dihapus');
//         window.location='dosen.php';        
//         </script>";
//     } else {
//         echo "<script>alert('Data Gagal Dihapus');
//         window.location='dosen.php';        
//         </script>";
//     }
// } else {
//     $kode ="kosong";
//     $dosen ="gaada";
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
    <script src="js/jquery.min.js"></script>
    <style>
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 9999;
        }

        .popup form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            max-width: 90%;
        }

        .popup form label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .popup form input {
            display: block;
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .popup form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .popup form input[type="submit"]:hover {
            background-color: #3e8e41;
        }


        .span-header {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }

        #popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background-color: #333;
            border-radius: 50%;
            padding: 5px 8px;
            line-height: 1;
            transition: background-color 0.2s ease-in-out;
        }

        #popup-close:hover {
            background-color: #555;
        }
    </style>
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
        <a href=index.php><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href=dosen.php><i class="fas fa-cogs"></i><span>Dosen</span></a>
        <a href=matkul.php><i class="fas fa-table"></i><span>Matakuliah</span></a>
        <a href=operator.php><i class="fas fa-th"></i><span>Operator</span></a>
        <a href=logout.php><i class="logout"></i><span>Log Out</span></a>

    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="card">
            <button onclick="showPopup()" type="submit">Tambah Dosen </button>
            <div id="popup">
                <span class="span-header">
                    <h2>Tambah Data Dosen</h2>
                </span>
                <span id="popup-close" onclick="hidePopup()">X</span>
                <form action="proses.php" method="post">
                    <label>NIDN</label>
                    <input type="text" name="kode" id="kode" placeholder="Masukkan NIDN Dosen" value="<?= $nilai ?>">
                    <br>
                    <label>Dosen</label>
                    <input type="text" name="dosen" id="dosen" placeholder="Masukkan Nama Dosen">
                    <br>
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
            <form action="dosen.php" method="GET">
                <table border="2">
                    <tr>
                        <th>NIDN</th>
                        <th>Dosen</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    include "koneksi.php";
                    $sql = "SELECT * FROM t_dosen";
                    $tampil = mysqli_query($con, $sql);
                    if (mysqli_num_rows($tampil) == 0) {
                        echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
                    } else {
                        while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                            <tr>
                                <td><?= $data['kode']; ?></td>
                                <td><?= $data['dosen']; ?></td>
                                <td>
                                    <button type="submit" name="edit" value="<?= $data['kode'] ?>" onclick="togglePopup(event)">edit</button>
                                    <a id="link" href="dosen.php?hal=edit&id=<?= @$data['kode'] ?>" onclick="togglePopup(event)">Edit</a>
                                    <a href="dosen.php?hal=hapus&id=<?= @$data['kode'] ?>">Hapus</a>
                                </td>
                            </tr>
                    <?php endwhile;
                    } ?>
                </table>
            </form>
            <!-- <div class="popup" id="myPopup">
                <span id="popup-close" onclick="togglePopup()">&times;</span>
                <form action="update.php" method="post">
                    <label>Kode</label>
                    <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Dosen" value="<?= @$kode ?>">
                    <br>
                    <label>Dosen</label>
                    <input type="text" name="dosen" id="dosen" placeholder="Masukkan Nama Dosen" value="<?= @$dosen ?>">
                    <br>
                    <input type="submit" value="Edit">
                </form>
            </div> -->
            <div id="popup" style="display: none;">
                <h2>Edit Data Dosen</h2>
                <p>Isi form berikut untuk mengedit data dosen:</p>
                <form method="get" action="dosen.php">
                    <!-- Isi form di sini -->
                    <label>Kode</label>
                    <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Dosen" value="<?= $kode ?>">
                    <br>
                    <label>Dosen</label>
                    <input type="text" name="dosen" id="dosen" placeholder="Masukkan Nama Dosen" value="<?= $dosen ?>">
                    <br>
                    <button type="submit">Edit</button>
                    <button type="button" onclick="closePopup()">Batal</button>
                </form>
            </div>
        </div>

        <script>
            function togglePopup(event) {
            event.preventDefault();
                var popup = document.getElementById('popup');
                popup.style.display = 'block';
            }

            function closePopup() {
                var popup = document.getElementById('popup');
                popup.style.display = 'none';
            }

            
        </script>
</body>

</html>