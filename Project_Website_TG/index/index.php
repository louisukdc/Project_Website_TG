<?php
    session_start(); // Memulai session

    if(!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
        header("Location: login.php"); // Redirect ke halaman login
        exit;
    }

    // include '../koneksi.php';

    include '../koneksi.php';

    // Menghitung jumlah dosen
    $sqlDosen = "SELECT COUNT(*) AS count_dosen FROM t_dosen";
    $resultDosen = $con->query($sqlDosen);
    $dosenCount = 0;
    
    if ($resultDosen->num_rows > 0) {
        while($row = $resultDosen->fetch_assoc()) {
            $dosenCount = $row['count_dosen'];
        }
    } else {
        echo "Tidak ada data dosen.";
    }
    
    // Menghitung jumlah matakuliah
    $sqlMatakuliah = "SELECT COUNT(*) AS count_matakuliah FROM t_matakuliah";
    $resultMatakuliah = $con->query($sqlMatakuliah);
    $matakuliahCount = 0;
    
    if ($resultMatakuliah->num_rows > 0) {
        while($row = $resultMatakuliah->fetch_assoc()) {
            $matakuliahCount = $row['count_matakuliah'];
        }
    } else {
        echo "Tidak ada data matakuliah.";
    }
    
    // Menghitung jumlah operator
    $sqlOperator = "SELECT COUNT(*) AS count_operator FROM t_admin"; // Menggunakan alias 'count_operator'
    $resultOperator = $con->query($sqlOperator);
    $operatorCount = 0;
    
    if ($resultOperator->num_rows > 0) {
        while($row = $resultOperator->fetch_assoc()) {
            $operatorCount = $row['count_operator']; // Menggunakan kunci 'count_operator' yang telah di-alias
        }
    } else {
        echo "Tidak ada data operator.";
    }
    
    echo "Jumlah dosen: " . $dosenCount . "<br>";
    echo "Jumlah matakuliah: " . $matakuliahCount . "<br>";
    echo "Jumlah operator: " . $operatorCount;
    

// include '../Dosen/koneksi/koneksi.php';
// $sql = "SELECT COUNT(*) AS count FROM t_dosen"; // Menggunakan alias 'count'
// $result = $con->query($sql);

// if ($result->num_rows > 0) {
//     // Menampilkan data
//     while($row = $result->fetch_assoc()) {
//         $dosenCount = $row['count']; // Menggunakan kunci 'count' yang telah di-alias
//     }
// } else {
//     echo "Tidak ada data.";
// }

// include '../matakuliah/koneksi/koneksi.php';
// $sql = "SELECT COUNT(*) AS count FROM t_matakuliah"; // Menggunakan alias 'count'
// $result = $con->query($sql);

// if ($result->num_rows > 0) {
//     // Menampilkan data
//     while($row = $result->fetch_assoc()) {
//         $matakuliahCount = $row['count']; // Menggunakan kunci 'count' yang telah di-alias
//     }
// } else {
//     echo "Tidak ada data.";
// }

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link rel="stylesheet" href="../style/navbar_style.css">
    <link rel="stylesheet" href="../style/card.css">
</head>
<body>
<?php include('../navbar/navbar.php') ?>

<div class="content">
    <div class="card">
        <div class="card">
        <select name="Tahun" id="Tahun">
            <option value="2020/1">2020/1</option>
            <option value="2020/2">2020/2</option>
            <option value="2021/1">2021/1</option>
            <option value="2021/2">2021/2</option>
          </select>
        </div>

<br>

        <input type="text" name="show" id="show">
        <label for="show">Show</label>

        <input type="text" name="show" id="show">
        <label for="show">Entries</label>

        <input type="text" name="show" id="show">
        <label for="show">Search</label>        

<br>
<br>
<div class="card-container">
  <div class="card-index">
    <img src="../image/Dosen.png" alt="Dosen">
    <div class="card-content">
      <h2>Dosen</h2>
      <p id="dosenCount"><?php echo $dosenCount; ?></p>
    </div>
  </div>
  <div class="card-index">
    <img src="../image/matkul.png" alt="Matakuliah">
    <div class="card-content">
      <h2>Matakuliah</h2>
      <p id="matakuliahCount"><?php echo $matakuliahCount; ?></p>
    </div>
  </div>
  <div class="card-index">
    <img src="../image/operator.png" alt="Operator">
    <div class="card-content">
      <h2>Operator</h2>
      <p id="operatorCount"><?php echo $operatorCount; ?></p>
    </div>
  </div>
</div>

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
                include "../koneksi.php";
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
        <script>
            fetch('/api/counts')
      .then(response => response.json())
      .then(data => {
        // Mengupdate angka pada card dosen, matakuliah, dan operator
        document.getElementById('dosenCount').textContent = data.dosenCount;
        document.getElementById('matakuliahCount').textContent = data.matakuliahCount;
        document.getElementById('operatorCount').textContent = data.operatorCount;
      })
      .catch(error => console.error(error));
        </script>
</body>
</html>