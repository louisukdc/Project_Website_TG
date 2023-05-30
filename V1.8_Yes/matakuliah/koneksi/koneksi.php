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
    $id = $data['kode'];
    $matkul = $data['matkul'];
    $sem = $data['semester'];

    $query = "INSERT INTO t_matakuliah
                values('$id','$matkul','$sem')
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    $id = $data['kode'];
    $matkul = $data['matkul'];
    $sem = $data['semester'];

    $query = "UPDATE t_matakuliah SET
                NamaMataKuliah = '$matkul',
                semester = '$sem'
            WHERE MataKuliah_ID = '$id';
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    
    mysqli_query($conn,"DELETE FROM t_matakuliah WHERE MataKuliah_ID='$id'");

    return mysqli_affected_rows($conn);
}
 ?>