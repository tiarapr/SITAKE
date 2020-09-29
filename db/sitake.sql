-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2020 pada 00.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitake`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `user_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `user_admin`, `nama_admin`, `pass`, `telepon`, `email`, `level`) VALUES
('1', 'admin', 'Ini Admin', '0192023a7bbd73250516f069df18b500', '089908765431', 'iniadmin@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` char(30) NOT NULL,
  `id_tabungan` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `penarikan` varchar(100) NOT NULL,
  `id_petugas` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_tabungan`, `tanggal`, `penarikan`, `id_petugas`) VALUES
('PTA5F7326549472E', 'TA5F18FE75', '2020-09-29', '1000', '01');

--
-- Trigger `penarikan`
--
DELIMITER $$
CREATE TRIGGER `hapus_penarikan` AFTER DELETE ON `penarikan` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo + old.penarikan WHERE id_tabungan = old.id_tabungan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_penarikan` AFTER INSERT ON `penarikan` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo - new.penarikan WHERE id_tabungan = new.id_tabungan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(5) NOT NULL,
  `foto_petugas` varchar(200) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `telepon_petugas` varchar(15) NOT NULL,
  `jk_petugas` varchar(20) NOT NULL,
  `user_petugas` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `id_status` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `foto_petugas`, `nama_petugas`, `alamat_petugas`, `telepon_petugas`, `jk_petugas`, `user_petugas`, `pass`, `level`, `id_status`) VALUES
('01', 'foto/5f03ba1f68ee0Untitled.jpg', 'Halo Petugas', 'Surabaya', '087655834120', 'Laki-laki', 'petugas_halo', '22736f1', 'Petugas', '1'),
('02', 'foto/5f7325dda9e81ui-divya.jpg', 'Petugas 2', 'ini alamat', '088112243567', 'Perempuan', 'petugas2', '0ba9add', 'Petugas', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoran`
--

CREATE TABLE `setoran` (
  `id_setoran` char(30) NOT NULL,
  `id_tabungan` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `setoran` varchar(100) NOT NULL,
  `id_petugas` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setoran`
--

INSERT INTO `setoran` (`id_setoran`, `id_tabungan`, `tanggal`, `setoran`, `id_petugas`) VALUES
('STA5F18FE755FD8A', 'TA5F18FE75', '2020-07-23', '1000', '01'),
('STA5F7326430D810', 'TA5F18FE75', '2020-09-29', '1000', '01');

--
-- Trigger `setoran`
--
DELIMITER $$
CREATE TRIGGER `hapus_setoran` AFTER DELETE ON `setoran` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo - old.setoran WHERE id_tabungan = old.id_tabungan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_setoran` AFTER INSERT ON `setoran` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo + new.setoran WHERE id_tabungan = new.id_tabungan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(15) NOT NULL,
  `foto_siswa` varchar(200) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `jk_siswa` varchar(20) NOT NULL,
  `telepon_siswa` varchar(15) NOT NULL,
  `user_siswa` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `foto_siswa`, `nama_siswa`, `alamat_siswa`, `jk_siswa`, `telepon_siswa`, `user_siswa`, `pass`, `level`) VALUES
('01111', 'foto/5f73256e332c9ui-zac.jpg', 'Robert', 'Jalan kenangan', 'Laki-laki', '08765499321', '82b23e6', '8fe23e6', 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` char(5) NOT NULL,
  `nama_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('1', 'Aktif'),
('2', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` char(10) NOT NULL,
  `nis` char(15) NOT NULL,
  `saldo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `nis`, `saldo`) VALUES
('TA5F18FE75', '01111', '1000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_tabungan` (`id_tabungan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `petugas_ibfk_1` (`id_status`);

--
-- Indeks untuk tabel `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id_setoran`),
  ADD KEY `id_tabungan` (`id_tabungan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `nis` (`nis`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `penarikan_ibfk_1` FOREIGN KEY (`id_tabungan`) REFERENCES `tabungan` (`id_tabungan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `setoran`
--
ALTER TABLE `setoran`
  ADD CONSTRAINT `setoran_ibfk_6` FOREIGN KEY (`id_tabungan`) REFERENCES `tabungan` (`id_tabungan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
