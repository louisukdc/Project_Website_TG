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
  <input type="hidden" name="kode" value="<?php echo $data['kode'];?>">
    <label>Semester</label>
    <input type="text" name="semester" value="<?php echo $data['semester'];?>" placeholder="Masukkan Semester">
    <br>
    <label>Matakuliah</label>
    <input type="text" name="matakuliah" value="<?php echo $data['matakuliah'];?>" placeholder="Masukkan Matakuliah">
    <br>
    <label>Dosen</label>
    <input type="text" name="dosen" value="<?php echo $data['dosen'];?>" placeholder="Masukkan Nama Dosen">
    <br>
    <label>Ruang</label>
    <input type="text" name="ruang" value="<?php echo $data['ruang'];?>" placeholder="Masukkan Ruang">
    <br>
    <label>Waktu</label>
    <input type="text" name="waktu" value="<?php echo $data['waktu'];?>" placeholder="Masukkan Waktu">
    <br>
    <input type="submit" value="Simpan">
  </form>
</div>
</body>
</html>

