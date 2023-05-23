<?php
include "koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM t_jadwal WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal</title>
</head>
<body>
    <h2>Edit Jadwal</h2>
    <form action="update_jadwal.php" method="POST">
        <input type="hidden" name="id" value="<?=$data['id'];?>"> // Include the ID in a hidden input field
        <label>Matakuliah:</label>
        <input type="text" name="matakuliah" value="<?=$data['matakuliah'];?>"><br><br>
        <input type="submit" value="Save">
    </form>
</body>
</html>
