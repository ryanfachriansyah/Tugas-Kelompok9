-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Des 2021 pada 02.58
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `showroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
`id_mobil` int(5) NOT NULL,
  `merk_mobil` varchar(25) NOT NULL,
  `jenis_mobil` enum('sport','suv','of road','sedan') NOT NULL,
  `harga` int(10) NOT NULL,
  `thn_pembuatan` int(5) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `merk_mobil`, `jenis_mobil`, `harga`, `thn_pembuatan`, `foto`) VALUES
(1, 'Inova', 'sedan', 2000, 2005, '(22).jpg'),
(6, 'mobilio', 'sport', 20000, 2001, '3D Printing.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE IF NOT EXISTS `motor` (
  `id_motor` int(5) NOT NULL DEFAULT '0',
  `merk_motor` varchar(25) NOT NULL,
  `jenis_motor` enum('sport','bebek','atv','of road') NOT NULL,
  `harga` int(10) NOT NULL,
  `thn_pembuatan` int(5) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_mobil`
--

CREATE TABLE IF NOT EXISTS `pesan_mobil` (
  `id_mobil` int(11) NOT NULL,
`id_pesanan` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_motor`
--

CREATE TABLE IF NOT EXISTS `pesan_motor` (
  `id_motor` int(11) NOT NULL,
`id_pesanan` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'ryan', 'asd', 'qwe', 'admin'),
(2, 'Ryan Fachriansyah', 'qq', 'qq', ''),
(3, 'Ryan Fachriansyah', 'asd', 'eee', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
 ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
 ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `pesan_mobil`
--
ALTER TABLE `pesan_mobil`
 ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `pesan_motor`
--
ALTER TABLE `pesan_motor`
 ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
MODIFY `id_mobil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesan_mobil`
--
ALTER TABLE `pesan_mobil`
MODIFY `id_pesanan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesan_motor`
--
ALTER TABLE `pesan_motor`
MODIFY `id_pesanan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
