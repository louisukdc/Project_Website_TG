<?php 
$conn = mysqli_connect("localhost","root","","penjadwalan");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}
function tambah($data){
    global $conn;

    $user = $data['user'];
    $pw = $data['pw'];
    $email = $data['email'];
    $nama = $data['nama'];

    $cek = mysqli_query($conn, "SELECT ID_ADMIN from t_admin where ID_ADMIN ='$user'");

    if (mysqli_fetch_assoc($cek)) {
        echo "<script> 
        alert('Username sudah terdaftar');
        </script>";
        return false;
    }

    $query = "INSERT INTO t_admin
                values('$user','$nama','$email','$pw')
            ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>