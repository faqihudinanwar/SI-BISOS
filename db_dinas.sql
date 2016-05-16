-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2016 at 05:41 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bedahrumah`
--

CREATE TABLE `bedahrumah` (
  `idbedah` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `idkec` int(2) NOT NULL,
  `bantuan` varchar(100) NOT NULL,
  `sebelum` varchar(30) NOT NULL,
  `sesudah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedahrumah`
--

INSERT INTO `bedahrumah` (`idbedah`, `nama`, `alamat`, `idkec`, `bantuan`, `sebelum`, `sesudah`) VALUES
(2, 'Sofiyah', 'Ds. Sunggingan Rt.3 Rw.3', 2, '15000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `idfile` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` varchar(30) NOT NULL,
  `files` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`idfile`, `nama`, `file`, `files`) VALUES
(1, 'Persyaratan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `idgambar` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambara` varchar(30) NOT NULL,
  `gambarb` varchar(30) NOT NULL,
  `gambarc` varchar(30) NOT NULL,
  `gambard` varchar(30) NOT NULL,
  `gambare` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`idgambar`, `nama`, `gambara`, `gambarb`, `gambarc`, `gambard`, `gambare`) VALUES
(1, 'Pelatihan', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idkec` int(2) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idkec`, `kecamatan`) VALUES
(1, 'Kecamatan Undaan'),
(2, 'Kecamatan Kota'),
(3, 'Kecamatan Mejobo'),
(4, 'Kecamatan Bae'),
(5, 'Kecamatan Jekulo'),
(6, 'Kecamatan Jati'),
(7, 'Kecamatan Kaliwungu'),
(8, 'Kecamatan Gebog'),
(9, 'Kecamatan Dawe');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `idpenerima` int(10) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `ahliwaris` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `idkec` int(2) NOT NULL,
  `volume` int(1) NOT NULL,
  `hargasatuan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`idpenerima`, `nama`, `ahliwaris`, `alamat`, `idkec`, `volume`, `hargasatuan`) VALUES
(1, 'Sutirah', 'Sapinah', 'Desa Kalirejo Rt.4 Rw.5', 1, 1, 1000000),
(2, 'Bonah Wati', 'Asbon', 'Ds. Mlati Lor Rt. 03 Rw. 02', 2, 1, 1000000),
(4, 'suparjook', 'Supar', 'gg wetan kulon', 3, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `nama`, `email`, `password`) VALUES
(1, 'Agus Widianto', 'aguswidianto@gmail.com', 'aguswidianto'),
(2, 'soekarno', 'soekarno@gmail.com', 'soekarno');

-- --------------------------------------------------------

--
-- Table structure for table `rekapbedah`
--

CREATE TABLE `rekapbedah` (
  `idrekap` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `volbedah` int(5) NOT NULL,
  `satuanbedah` int(100) NOT NULL,
  `jumlahbedah` int(100) NOT NULL,
  `volrehab` int(5) NOT NULL,
  `satuanrehab` int(100) NOT NULL,
  `jumlahrehab` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekapbedah`
--

INSERT INTO `rekapbedah` (`idrekap`, `tahun`, `volbedah`, `satuanbedah`, `jumlahbedah`, `volrehab`, `satuanrehab`, `jumlahrehab`, `total`) VALUES
(1, 2009, 9, 14000000, 126000000, 87, 2000000, 174000000, 300000000);

-- --------------------------------------------------------

--
-- Table structure for table `rekapkematian`
--

CREATE TABLE `rekapkematian` (
  `idrekap` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `Sakit` varchar(100) NOT NULL,
  `satuansakit` varchar(100) NOT NULL,
  `jumlahsakit` varchar(100) NOT NULL,
  `kecelakaan` varchar(100) NOT NULL,
  `satuankecelakaan` varchar(100) NOT NULL,
  `jumlahkecelakaan` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `anggaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekapkematian`
--

INSERT INTO `rekapkematian` (`idrekap`, `tahun`, `Sakit`, `satuansakit`, `jumlahsakit`, `kecelakaan`, `satuankecelakaan`, `jumlahkecelakaan`, `total`, `anggaran`) VALUES
(2, 2009, '1864', '1000000', '1864000000', '25', '2500000', '62500000', '778000000', '1926500000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bedahrumah`
--
ALTER TABLE `bedahrumah`
  ADD PRIMARY KEY (`idbedah`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idfile`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`idgambar`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idkec`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`idpenerima`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indexes for table `rekapbedah`
--
ALTER TABLE `rekapbedah`
  ADD PRIMARY KEY (`idrekap`);

--
-- Indexes for table `rekapkematian`
--
ALTER TABLE `rekapkematian`
  ADD PRIMARY KEY (`idrekap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bedahrumah`
--
ALTER TABLE `bedahrumah`
  MODIFY `idbedah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `idfile` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `idgambar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idkec` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `idpenerima` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rekapbedah`
--
ALTER TABLE `rekapbedah`
  MODIFY `idrekap` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rekapkematian`
--
ALTER TABLE `rekapkematian`
  MODIFY `idrekap` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
