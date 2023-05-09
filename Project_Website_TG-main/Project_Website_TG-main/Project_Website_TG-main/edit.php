<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kode = $_POST['kode'];
  $semester = $_POST['semester'];
  $matakuliah = $_POST['matakuliah'];
  $dosen = $_POST['dosen'];
  $ruang = $_POST['ruang'];
  $waktu = $_POST['waktu'];
  
  $query = "UPDATE jadwal SET semester='$semester', matakuliah='$matakuliah', dosen='$dosen', ruang='$ruang', waktu='$waktu' WHERE waktu='$kode'";
  mysqli_query($con, $query);
  
  header('Location: dosen.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
<div class="content">
  <form action="proses.php" method="post">
    <label>Kode</label>
    <input type="text" name="kode" id="kode" value="<?=$kode?>">
    <br>
    <label>Semester</label>
    <input type="text" name="semester" id="semester" value="<?=$semester?>" >
    <br>
    <label>Matakuliah</label>
    <input type="text" name="matakuliah" id="matakuliah" value="<?=$matakuliah?>">
    <br>
    <label>Dosen</label>
    <input type="text" name="dosen" id="dosen" value="<?=$dosen?>">
    <br>
    <label>Ruang</label>
    <input type="text" name="ruang" id="ruang" value="<?=$ruang?>">
    <br>
    <label>Hari / Tanggal</label>
    <input type="date" name="waktu" id="waktu">
    <br>
    <input type="submit" value="Simpan">
  </form>
</div>
</body>
</html>