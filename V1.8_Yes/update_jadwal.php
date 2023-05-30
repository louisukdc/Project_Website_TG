<?php
include "koneksi.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $matakuliah = $_POST['matakuliah'];
    $sql = "UPDATE t_jadwal SET matakuliah='$matakuliah' WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if($result) {
        header("Location: index.php"); // Redirect back to the index page
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
