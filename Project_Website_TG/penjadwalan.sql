-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 02:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `ID_Admin` int(5) NOT NULL,
  `NamaOperator` varchar(20) NOT NULL,
  `Password` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`ID_Admin`, `NamaOperator`, `Password`) VALUES
(0, 'Paulus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

CREATE TABLE `t_dosen` (
  `id` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(100) NOT NULL,
  `ruang` varchar(50) NOT NULL,
  `hari` date NOT NULL,
  `Matakuliah_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil`
--

CREATE TABLE `t_hasil` (
  `Hasil_ID` int(20) NOT NULL,
  `NamaMataKuliah` varchar(30) NOT NULL,
  `Kelas_ID` int(20) NOT NULL,
  `SKS` int(10) NOT NULL,
  `MataKuliah_ID` int(20) NOT NULL,
  `ID_Admin` int(5) NOT NULL,
  `Jadwal_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `Jadwal_ID` int(20) NOT NULL,
  `Hari` varchar(20) NOT NULL,
  `JamMulai` varchar(20) NOT NULL,
  `JamSelesai` varchar(20) NOT NULL,
  `Ruangan` varchar(20) NOT NULL,
  `MataKuliah_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE `t_mahasiswa` (
  `NIM` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Programstudi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_matakuliah`
--

CREATE TABLE `t_matakuliah` (
  `MataKuliah_ID` int(11) NOT NULL,
  `NamaMataKuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_matakuliahmahasiswa`
--

CREATE TABLE `t_matakuliahmahasiswa` (
  `hasilmatakuliah_ID` int(20) NOT NULL,
  `NIM` int(20) NOT NULL,
  `MataKuliah_ID` int(20) NOT NULL,
  `Jadwal_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_matakuliahmahasiswa`
--

INSERT INTO `t_matakuliahmahasiswa` (`hasilmatakuliah_ID`, `NIM`, `MataKuliah_ID`, `Jadwal_ID`) VALUES
(0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_sesi`
--

CREATE TABLE `t_sesi` (
  `Sesi_ID` int(11) NOT NULL,
  `Jam` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Matakuliah_ID` (`Matakuliah_ID`);

--
-- Indexes for table `t_hasil`
--
ALTER TABLE `t_hasil`
  ADD PRIMARY KEY (`Hasil_ID`),
  ADD KEY `MataKuliah_ID` (`MataKuliah_ID`),
  ADD KEY `ID_Admin` (`ID_Admin`),
  ADD KEY `Jadwal_ID` (`Jadwal_ID`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`Jadwal_ID`),
  ADD KEY `MataKuliah_ID` (`MataKuliah_ID`);

--
-- Indexes for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `t_matakuliah`
--
ALTER TABLE `t_matakuliah`
  ADD PRIMARY KEY (`MataKuliah_ID`);

--
-- Indexes for table `t_matakuliahmahasiswa`
--
ALTER TABLE `t_matakuliahmahasiswa`
  ADD PRIMARY KEY (`hasilmatakuliah_ID`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Jadwal_ID` (`Jadwal_ID`),
  ADD KEY `MataKuliah_ID` (`MataKuliah_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_dosen`
--
ALTER TABLE `t_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD CONSTRAINT `t_dosen_ibfk_1` FOREIGN KEY (`Matakuliah_ID`) REFERENCES `t_matakuliah` (`MataKuliah_ID`);

--
-- Constraints for table `t_hasil`
--
ALTER TABLE `t_hasil`
  ADD CONSTRAINT `t_hasil_ibfk_1` FOREIGN KEY (`MataKuliah_ID`) REFERENCES `t_matakuliah` (`MataKuliah_ID`),
  ADD CONSTRAINT `t_hasil_ibfk_2` FOREIGN KEY (`ID_Admin`) REFERENCES `t_admin` (`ID_Admin`),
  ADD CONSTRAINT `t_hasil_ibfk_3` FOREIGN KEY (`Jadwal_ID`) REFERENCES `t_jadwal` (`Jadwal_ID`);

--
-- Constraints for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD CONSTRAINT `t_jadwal_ibfk_1` FOREIGN KEY (`MataKuliah_ID`) REFERENCES `t_hasil` (`MataKuliah_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
