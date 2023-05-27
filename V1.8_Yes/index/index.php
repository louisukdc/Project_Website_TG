<?php
    session_start(); // Memulai session

    if(!isset($_SESSION["nama"])) { // Jika session login belum terdaftar
        header("Location: login.php"); // Redirect ke halaman login
        exit;
    }

    include '../koneksi.php';
$sql = "SELECT COUNT(*) AS count FROM t_admin"; // Menggunakan alias 'count'
$sql2 = "SELECT COUNT(*) AS count FROM t_matakuliah"; // Menggunakan alias 'count'
$sql3 = "SELECT COUNT(*) AS count FROM t_dosen"; // Menggunakan alias 'count'
$result = $con->query($sql);
$result2 = $con->query($sql2);
$result3 = $con->query($sql3);

if ($result->num_rows > 0) {
    // Menampilkan data
    while($row = $result->fetch_assoc()) {
        $operatorCount = $row['count']; // Menggunakan kunci 'count' yang telah di-alias
    }
} else {
    echo "Tidak ada data.";
}
if ($result2->num_rows > 0) {
  // Menampilkan data
  while($row = $result2->fetch_assoc()) {
      $operatorCount2 = $row['count']; // Menggunakan kunci 'count' yang telah di-alias
  }
} else {
  echo "Tidak ada data.";
}
if ($result3->num_rows > 0) {
  // Menampilkan data
  while($row = $result3->fetch_assoc()) {
      $operatorCount3 = $row['count']; // Menggunakan kunci 'count' yang telah di-alias
  }
} else {
  echo "Tidak ada data.";
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/navbar_style.css">
    <link rel="stylesheet" href="../style/card.css">
    <!-- <style>
      .table-left {
        float: left;
      }
      thead tr {
        background-color: #232;
        color :white;
      }
      .apa {
        color: white;
      }
    </style> -->
    <link href='image/IF_jadwal.ico' rel='shortcut icon'>
</head>
<body>
<?php include('../navbar/navbar.php') ?>

<div class="content">
        <div class="">
        <select name="Tahun" id="Tahun">
            <option value="2020/1">2020/1</option>
            <option value="2020/2">2020/2</option>
            <option value="2021/1">2021/1</option>
            <option value="2021/2">2021/2</option>
          </select>
        </div>

<br>

        <!-- <input type="text" name="show" id="show">
        <label for="show">Show</label>

        <input type="text" name="show" id="show">
        <label for="show">Entries</label>

        <input type="text" name="show" id="show">
        <label for="show">Search</label>        

<br>
<br> -->
<div class="card-container">
  <div class="card-index">
    <img src="../image/Dosen.png" alt="Dosen">
    <div class="card-content">
      <h2>Dosen</h2>
      <p id="dosenCount"><?php echo $operatorCount3; ?></p>
    </div>
  </div>
  <div class="card-index">
    <img src="../image/matkul.png" alt="Matakuliah">
    <div class="card-content">
      <h2>Matakuliah</h2>
      <p id="matakuliahCount"><?php echo $operatorCount2; ?></p>
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
        <table class="table table-bordered text-center float-start">
          <thead>
            <tr class="table-primary">
              <th>Kode</th>
              <th>Semester</th>
              <th>Matakuliah</th>
              <th>Dosen</th>
              <th>Ruang</th>
              <th>Hari/Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
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