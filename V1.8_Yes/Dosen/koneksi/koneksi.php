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
    $nidn = $data['nidn'];
    $dosen = $data['dosen'];

    $query = "INSERT INTO t_dosen
                values('$nidn','$dosen')
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    $nidn = $data['nidn'];
    $dosen = $data['dosen'];

    $query = "UPDATE t_dosen SET
                dosen = '$dosen'
            WHERE nidn = '$nidn';
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    
    mysqli_query($conn,"DELETE FROM t_dosen WHERE nidn='$id'");

    return mysqli_affected_rows($conn);
}
 ?>