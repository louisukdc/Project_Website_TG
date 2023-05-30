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
    $NamaRuangan = $data['NamaRuangan'];

    $query = "INSERT INTO `t_ruangan`(`NamaRuangan`) VALUES ('$NamaRuangan'); ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    $id = $data['ID_Ruangan'];
    $NamaRuangan = $data['NamaRuangan'];
    $query = "UPDATE t_ruangan SET NamaRuangan = '$NamaRuangan' WHERE ID_Ruangan = '$id'; ";
   
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($data) {
    global $conn;
    $id = $data['ID_Ruangan'];
    $NamaRuangan = $data['NamaRuangan'];

    mysqli_query($conn, "DELETE FROM t_ruangan WHERE ID_Ruangan ='$id'");

    return mysqli_affected_rows($conn);
}

 ?>