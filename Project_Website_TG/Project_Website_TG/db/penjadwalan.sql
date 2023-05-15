-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2023 pada 19.08
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `ID_Admin` int(5) NOT NULL,
  `Namadosen` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`ID_Admin`, `Namadosen`, `Email`, `Password`) VALUES
(1, 'Paulus', 'paulus@gmail.com', 1234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dosen`
--

CREATE TABLE `t_dosen` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_dosen`
--

INSERT INTO `t_dosen` (`id`, `kode`, `dosen`) VALUES
(6, '110', 'Yosefina Finsensia Riti'),
(8, '111', 'Paulus William');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hasil`
--

CREATE TABLE `t_hasil` (
  `Hasil_ID` int(20) NOT NULL,
  `NamaMataKuliah` varchar(30) NOT NULL,
  `Kelas_ID` int(20) NOT NULL,
  `SKS` int(10) NOT NULL,
  `MataKuliah_ID` int(20) NOT NULL,
  `ID_Admin` int(5) NOT NULL,
  `Jadwal_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `Jadwal_ID` int(20) NOT NULL,
  `Hari` varchar(20) NOT NULL,
  `JamMulai` varchar(20) NOT NULL,
  `JamSelesai` varchar(20) NOT NULL,
  `Ruangan` varchar(20) NOT NULL,
  `MataKuliah_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mahasiswa`
--

CREATE TABLE `t_mahasiswa` (
  `NIM` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Programstudi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_matakuliah`
--

CREATE TABLE `t_matakuliah` (
  `MataKuliah_ID` int(11) NOT NULL,
  `NamaMataKuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_matakuliahmahasiswa`
--

CREATE TABLE `t_matakuliahmahasiswa` (
  `hasilmatakuliah_ID` int(20) NOT NULL,
  `NIM` int(20) NOT NULL,
  `MataKuliah_ID` int(20) NOT NULL,
  `Jadwal_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_matakuliahmahasiswa`
--

INSERT INTO `t_matakuliahmahasiswa` (`hasilmatakuliah_ID`, `NIM`, `MataKuliah_ID`, `Jadwal_ID`) VALUES
(0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sesi`
--

CREATE TABLE `t_sesi` (
  `Sesi_ID` int(11) NOT NULL,
  `Jam` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indeks untuk tabel `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_hasil`
--
ALTER TABLE `t_hasil`
  ADD PRIMARY KEY (`Hasil_ID`),
  ADD KEY `MataKuliah_ID` (`MataKuliah_ID`),
  ADD KEY `ID_Admin` (`ID_Admin`),
  ADD KEY `Jadwal_ID` (`Jadwal_ID`);

--
-- Indeks untuk tabel `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`Jadwal_ID`),
  ADD KEY `MataKuliah_ID` (`MataKuliah_ID`);

--
-- Indeks untuk tabel `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indeks untuk tabel `t_matakuliah`
--
ALTER TABLE `t_matakuliah`
  ADD PRIMARY KEY (`MataKuliah_ID`);

--
-- Indeks untuk tabel `t_matakuliahmahasiswa`
--
ALTER TABLE `t_matakuliahmahasiswa`
  ADD PRIMARY KEY (`hasilmatakuliah_ID`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Jadwal_ID` (`Jadwal_ID`),
  ADD KEY `MataKuliah_ID` (`MataKuliah_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_dosen`
--
ALTER TABLE `t_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_hasil`
--
ALTER TABLE `t_hasil`
  ADD CONSTRAINT `t_hasil_ibfk_1` FOREIGN KEY (`MataKuliah_ID`) REFERENCES `t_matakuliah` (`MataKuliah_ID`),
  ADD CONSTRAINT `t_hasil_ibfk_2` FOREIGN KEY (`ID_Admin`) REFERENCES `t_admin` (`ID_Admin`),
  ADD CONSTRAINT `t_hasil_ibfk_3` FOREIGN KEY (`Jadwal_ID`) REFERENCES `t_jadwal` (`Jadwal_ID`);

--
-- Ketidakleluasaan untuk tabel `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD CONSTRAINT `t_jadwal_ibfk_1` FOREIGN KEY (`MataKuliah_ID`) REFERENCES `t_hasil` (`MataKuliah_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
