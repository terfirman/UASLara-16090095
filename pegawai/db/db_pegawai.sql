-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 02:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(25) NOT NULL,
  `j_kelamin` char(9) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `p_kerja` varchar(500) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `tanggal_lahir`, `j_kelamin`, `alamat`, `jabatan`, `pendidikan`, `p_kerja`, `password`, `level`) VALUES
('0001112223', 'Raisha', '2018-07-09', 'Perempuan', 'Jakarta Timur', 'Staff HRD', 'S1 Akuntansi', 'CS Bank Mandiri', '0001112223', 'pegawai'),
('0001234567', 'Randy Pangalila', '2018-03-04', 'Laki-Laki', 'Pontianak', 'Staff HRD', 'S1 Akuntansi', 'CS Bank Mandiri', '0123456789', 'Pegawai'),
('0101212223', 'Alisya Subandono', '2018-06-03', 'Perempuan', 'Jakarta Barat', 'CS', 'S1 Akuntansi', 'CS Bank Mandiri', '0101212223', 'pegawai'),
('0896332812', 'Pashmina', '2000-02-13', 'Perempuan', 'Jakarta Utara', 'OB', 'S1 Akuntansi', '', '0896332812', 'Pegawai'),
('0896332813', 'Firman P', '2000-02-13', 'Laki-Laki', 'Jakarta Utara', 'CEO', 'Teknik Informatika', 'OBStaff HRDAdmin Lambe Turah', '0896332813', 'Pegawai'),
('0898332812', 'DIMAS ALIEF ', '2000-02-13', 'Laki-laki', 'MARGAPADANG', 'OB', 'S1 Akuntansi', '', '0898332812', 'Pegawai'),
('1212343456', 'Ahmad Dani', '0000-00-00', 'Laki-Laki', 'jakarta', 'OB', 'S1 Akuntansi', 'OB \r\nStaff HRD', '1212343456', 'Pegawai'),
('1234567890', 'Titi Kamal', '2017-02-01', 'perempuan', 'Jakarta Barat', 'Manager', 'S1 Akuntansi', 'CS Bank Mandiri', '1234567890', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama`, `level`, `status`) VALUES
('0896332812', '0896332812', 'Pashmina', 'Pegawai', 1),
('0896332813', '0896332813', 'Firman P', 'Pegawai', 1),
('0898332812', '0898332812', 'DIMAS ALIEF ', 'Pegawai', 1),
('admin#123', 'admin#123', 'Admin', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
