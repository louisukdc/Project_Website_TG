<?php
$host = "localhost"; // Nama host database
$username = "root"; // Username database
$password = ""; // Password database
$database = "penjadwalan"; // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi query untuk mengeksekusi query SQL
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambah data jadwal
function tambah($data)
{
    global $conn;
    $jadwal_id = $data['jadwal_id'];
    $hari = $data['hari'];
    $jam_mulai = $data['jam_mulai'];
    $jam_selesai = $data['jam_selesai'];
    $ruangan = $data['ruangan'];
    $matakuliah_id = $data['matakuliah_id'];
    $nama_matakuliah = $data['nama_matakuliah'];

    $query = "INSERT INTO t_jadwal (Jadwal_ID, Hari, JamMulai, JamSelesai, Ruangan, MataKuliah_ID, NamaMataKuliah)
              VALUES ('$jadwal_id', '$hari', '$jam_mulai', '$jam_selesai', '$ruangan', '$matakuliah_id', '$nama_matakuliah')";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return false;
    }
}

// Fungsi untuk mengedit data jadwal
function edit($data)
{
    global $conn;
    $jadwal_id = $data['jadwal_id'];
    $hari = $data['hari'];
    $jam_mulai = $data['jam_mulai'];
    $jam_selesai = $data['jam_selesai'];
    $ruangan = $data['ruangan'];
    $matakuliah_id = $data['matakuliah_id'];
    $nama_matakuliah = $data['nama_matakuliah'];

    $query = "UPDATE t_jadwal SET
                Hari = '$hari',
                JamMulai = '$jam_mulai',
                JamSelesai = '$jam_selesai',
                Ruangan = '$ruangan',
                MataKuliah_ID = '$matakuliah_id',
                NamaMataKuliah = '$nama_matakuliah'
              WHERE Jadwal_ID = '$jadwal_id'";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return false;
    }
}

// Fungsi untuk menghapus data jadwal
function hapus($jadwal_id)
{
    global $conn;
    
    $query = "DELETE FROM t_jadwal WHERE Jadwal_ID = '$jadwal_id'";
    
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return false;
    }
}
?>
