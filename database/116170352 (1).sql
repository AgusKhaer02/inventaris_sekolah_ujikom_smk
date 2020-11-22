-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 02:22 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `116170352`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `HapusDataBarang` (IN `id_brg` VARCHAR(11))  NO SQL
DELETE FROM barang WHERE id_barang=id_brg$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImportDataBarang` (IN `nama` VARCHAR(50), IN `spek` TEXT, IN `lok` TEXT, IN `kndisi` VARCHAR(30), IN `kat` VARCHAR(30), IN `jml` INT, IN `smber` VARCHAR(50))  NO SQL
INSERT INTO barang (id_barang,nama_barang,spesifikasi,lokasi,kondisi,kategori,jumlah_barang,sumber_dana) SELECT 
    CONCAT('BRG-',LPAD(TRIM(LEADING 'BRG-' FROM MAX(id_barang))+1,3,'0')) 
    ,nama,
    spek,
    lok,
    kndisi,
    kat,
    jml,
    smber FROM barang$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImportSupplier` (IN `nama` VARCHAR(50), IN `alamat` TEXT, IN `telp` INT, IN `kota` VARCHAR(30))  NO SQL
INSERT INTO supplier (id_supplier,nama_supplier,alamat_supplier,telp_supplier,kota_supplier) SELECT 
    CONCAT('SP-',LPAD(TRIM(LEADING 'SP-' FROM MAX(id_supplier))+1,3,'0')) 
    ,nama,
    alamat,
    telp,
    kota FROM supplier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TambahDataBarang` (IN `id` VARCHAR(50), IN `nama` TEXT, IN `spek` TEXT, IN `lok` VARCHAR(50), IN `kond` INT, IN `kat` VARCHAR(50), IN `jml_brg` INT, IN `smbr` VARCHAR(50))  NO SQL
INSERT INTO barang (id_barang,nama_barang,spesifikasi,lokasi,kondisi,kategori,jumlah_barang,sumber_dana) VALUES (id,nama,spek,lok,kond,kat,jml_brg,smbr) ON DUPLICATE KEY UPDATE jumlah_barang=jumlah_barang + jml_brg$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TambahUser` (IN `id` INT(11), IN `nm` VARCHAR(50), IN `usrnm` VARCHAR(50), IN `eml` VARCHAR(50), IN `pass` VARCHAR(200))  NO SQL
INSERT INTO user (id_user,nama,username,email,password,level,verifikasi) VALUES
(id,nm,usrnm,eml,pass,'Peminjam','N')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerifikasiPinjam` (IN `id_ver` INT)  NO SQL
DELETE FROM verifikasi_pinjam WHERE id_verifikasi=id_ver$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitungUser` (`p_user` INT) RETURNS INT(11) BEGIN
DECLARE jml_user INT;
SELECT COUNT(*) AS jml INTO jml_user FROM user WHERE id_user=p_user;
RETURN jml_user;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` text NOT NULL,
  `lokasi` text NOT NULL,
  `kondisi` enum('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `spesifikasi`, `lokasi`, `kondisi`, `kategori`, `jumlah_barang`, `sumber_dana`) VALUES
('BRG-001', 'Papan Tulis', 'Kayu', 'XII RPL 1', 'Baik', 'Alat Informasi', 30, 'Pemerintah'),
('BRG-002', 'Papan Pengumuman', 'Kayu', 'XI AKL 2', 'Kurang Baik', 'Alat Informasi', 30, 'Pemerintah'),
('BRG-003', 'Papan Absen', 'Kayu', 'XI TBSM 5,XI TKRO 3', 'Rusak Berat', 'Alat Informasi', 30, 'Sekolah'),
('BRG-004', 'Peta Sekolah', 'Kayu,Kertas', 'Kantor Guru', 'Baik', 'Alat Belajar', 30, 'Sekolah'),
('BRG-005', 'Meja Tulis', 'Kayu', 'XII APHP 2', 'Baik', 'Alat Belajar', 30, 'Pemerintah'),
('BRG-006', 'Rak Sepatu', 'Plastik', 'Depan Ruang Guru', 'Kurang Baik', 'Perlengkapan Kebersihan', 30, 'Sekolah'),
('BRG-007', 'Kursi', 'Kayu', 'Lab TKR', 'Kurang Baik', 'Alat Belajar', 30, 'Pemerintah'),
('BRG-008', 'Buku Perpustakaan', 'Kertas', 'Perpustakaan', 'Baik', 'Alat Belajar', 30, 'Pemerintah'),
('BRG-009', 'Buku Pelajaran', 'Kertas', 'Ruang Koperasi', 'Baik', 'Alat Belajar', 30, 'Sekolah'),
('BRG-010', 'Tenda Pramuka', 'Kain Tebal', 'Gudang', 'Baik', 'Perlengkapan Pramuka', 30, 'Pemerintah'),
('BRG-011', 'Personal Komputer', 'Monitor,Keyboard,CPU,Mouse', 'Lab Komputer', 'Baik', 'Elektronik', 30, 'Sekolah'),
('BRG-012', 'Headset', 'Headset', 'Lab Komputer', 'Kurang Baik', 'Elektronik', 30, 'Pemerintah'),
('BRG-013', 'Keyboard Logitech', 'Keyboard', 'Lab komputer', 'Baik', 'Elektronik', 30, 'Kemendikbud'),
('BRG-014', 'Kursi Kantor', 'Kayu', 'Kantor', 'Kurang Baik', 'Alat Kerja', 30, 'Walikota Banjar'),
('BRG-015', 'Air Conditioner', '250V,Tangki air 2L', 'Lab komputer', 'Baik', 'Elektronik', 30, 'Walikota Banjar'),
('BRG-016', 'LAN Cable 17M', 'UTP Cable', 'Lab komputer', 'Baik', 'Elektronik', 30, 'Walikota Banjar');

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `INSERT STOK` AFTER INSERT ON `barang` FOR EACH ROW BEGIN
INSERT INTO stok (id_barang,nama_barang,jml_masuk,jml_keluar,total_barang) VALUES (NEW.id_barang,NEW.nama_barang,NEW.jumlah_barang,0,NEW.jumlah_barang);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar_barang` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar_barang`, `id_barang`, `nama_barang`, `tgl_keluar`, `jml_keluar`, `lokasi`, `penerima`, `keperluan`) VALUES
('K-001', 'BRG-007', 'Kursi', '2019-04-15', 5, 'Banjar', 'Azalia', ''),
('K-002', 'BRG-009', 'Buku Pelajaran', '2019-04-23', 4, 'Cilacap', 'Saghi', ''),
('K-003', 'BRG-005', 'Meja Tulis', '2019-04-09', 5, 'Bandung', 'Ery', ''),
('K-004', 'BRG-012', 'Headset', '2019-04-10', 10, 'Ciamis', 'Bambang', ''),
('K-005', 'BRG-015', 'Air Conditioner', '2019-04-08', 2, 'Banjar', 'Mutia', ''),
('K-006', 'BRG-008', 'Buku Perpustakaan', '2019-04-09', 7, 'Banjar', 'Azalia', ''),
('K-007', 'BRG-015', 'Air Conditioner', '2019-04-10', 2, 'Cilacap', 'Saghi', '');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `HAPUS BARANG KELUAR` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE stok SET jml_keluar = (SELECT SUM(barang_keluar.jml_keluar) FROM barang_keluar) - OLD.jml_keluar, total_barang= jml_masuk - jml_keluar WHERE id_barang = OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UBAH JML KELUAR JML MASUK STOK` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE stok SET jml_keluar = IF(jml_masuk>jml_keluar+NEW.jml_keluar,jml_keluar + NEW.jml_keluar,jml_keluar),total_barang = IF(jml_masuk>jml_keluar+NEW.jml_keluar,total_barang -  NEW.jml_keluar,total_barang) WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk_barang` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `id_supplier` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk_barang`, `id_barang`, `nama_barang`, `tgl_masuk`, `jml_masuk`, `id_supplier`) VALUES
('MK-001', 'BRG-013', 'Keyboard Logitech', '2019-04-09', 12, 'SP-004'),
('MK-002', 'BRG-007', 'Kursi', '2019-04-08', 14, 'SP-012'),
('MK-003', 'BRG-015', 'Air Conditioner', '2019-04-08', 12, 'SP-012'),
('MK-004', 'BRG-015', 'Air Conditioner', '2019-04-11', 5, 'SP-012'),
('MK-005', 'BRG-012', 'Headset', '2019-04-16', 14, 'SP-004'),
('MK-006', 'BRG-015', 'Air Conditioner', '2019-04-09', 12, 'SP-012'),
('MK-007', 'BRG-009', 'Buku Pelajaran', '2019-04-09', 5, 'SP-012');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `HAPUS BARANG MASUK` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE STOK SET jml_masuk = (SELECT SUM(jml_masuk) FROM barang_masuk) - OLD.jml_masuk,total_barang = jml_masuk - jml_keluar WHERE id_barang=OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UBAH JML MASUK STOK` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE stok SET jml_masuk = jml_masuk + NEW.jml_masuk,total_barang = NEW.jml_masuk + total_barang WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_pinjam` varchar(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi` enum('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `kembali` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_pinjam`, `id_peminjam`, `peminjam`, `tgl_pinjam`, `id_barang`, `nama_barang`, `jml_pinjam`, `tgl_kembali`, `kondisi`, `kembali`) VALUES
('P-001', 5000135, 'AgusKhaer', '2019-04-16', 'BRG-015', 'Air Conditioner', 12, '2019-04-02', 'Baik', 'N'),
('P-002', 5000131, 'Neneng Luthfihatul Putri', '2019-04-09', 'BRG-015', 'Air Conditioner', 5, '2019-04-24', 'Baik', 'Y');

--
-- Triggers `pinjam_barang`
--
DELIMITER $$
CREATE TRIGGER `HAPUS PINJAM BARANG` AFTER DELETE ON `pinjam_barang` FOR EACH ROW UPDATE stok SET total_barang = total_barang + OLD.jml_pinjam WHERE id_barang = OLD.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `PINJAM_BARANG` AFTER INSERT ON `pinjam_barang` FOR EACH ROW BEGIN
UPDATE stok SET total_barang= total_barang - NEW.jml_pinjam WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_barang`, `nama_barang`, `jml_masuk`, `jml_keluar`, `total_barang`) VALUES
('BRG-001', 'Papan Tulis', 30, 47, 47),
('BRG-002', 'Papan Pengumuman', 30, 47, 47),
('BRG-003', 'Papan Absen', 30, 47, 47),
('BRG-004', 'Peta Sekolah', 30, 47, 47),
('BRG-005', 'Meja Tulis', 30, 47, 47),
('BRG-006', 'Rak Sepatu', 30, 47, 47),
('BRG-007', 'Kursi', 44, 47, 47),
('BRG-008', 'Buku Perpustakaan', 30, 47, 47),
('BRG-009', 'Buku Pelajaran', 35, 47, 52),
('BRG-010', 'Tenda Pramuka', 30, 47, 47),
('BRG-011', 'Personal Komputer', 30, 47, 47),
('BRG-012', 'Headset', 44, 47, 61),
('BRG-013', 'Keyboard Logitech', 42, 47, 47),
('BRG-014', 'Kursi Kantor', 30, 47, 47),
('BRG-015', 'Air Conditioner', 59, 4, 48),
('BRG-016', 'LAN Cable 17M', 30, 47, 47);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telp_supplier` bigint(13) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
('MK-009', 'PT CHANDRA FURNITURE', 'Jl.Gatot Subroto,Brebes,Jawa tengah', 8912331222, 'Brebes'),
('SP-001', 'PT Maju Mundur', 'Jl. Pahlawan No. 24 Kelurahan Langensari, Muktisari, Banjar, Kota Banjar, Jawa Barat 46343', 8123456789, 'Kota Banjar'),
('SP-002', 'PT BookId', 'Jl. Marga Indah Kota Bekasi, Jawa Barat 47812', 8123456789, 'Bekasi'),
('SP-003', 'PT Berkah', 'Jl. Pandawa No. 02 Kecamatan Jeruklegi, Cilacap, Jawa Tengah 41231', 8123434589, 'Cilacap'),
('SP-004', 'CV.PrintONE', 'Jl. Pahlawan No. 24 Kelurahan Langensari, Muktisari, Banjar, Kota Banjar, Jawa Barat 46346', 8123444789, 'Banjar'),
('SP-005', 'CV.Pratama', 'Jl. Pahlawan No. 24 Kelurahan Langensari, Muktisari, Banjar, Kota Banjar, Jawa Barat 46347', 8123412189, 'Banjar'),
('SP-006', 'CV.LANCAR JAYA', 'Jl. Pahlawan No. 24 Kelurahan Langensari, Muktisari, Banjar, Kota Banjar, Jawa Barat 46347', 8123456731, 'Banjar'),
('SP-007', 'Madinah Photocopy', 'Jl.Julaeni,Langensari,Kota Banjar,Jawa Barat', 8112333189, 'Banjar'),
('SP-008', 'Pahala Express', 'Jl.Gatot Subroto, Jeruklegi, Cilacap, Jawa Tengah', 8123451642, 'Cilacap'),
('SP-009', 'CV.Bhakti Kencana', 'Jl. Merdeka no 52 Ciawitali, Lakbok', 891231214, 'Lakbok'),
('SP-010', 'CV.Tiga Kembar', 'Jl. Merdeka no 52 Ciawitali, Lakbok', 891231214, 'Pangandaran'),
('SP-011', 'CV.Cendekia Meubel', 'Jl. Merdeka no 52 Ciawitali, Lakbok', 891231214, 'Ciamis'),
('SP-012', 'CV.Berkah ', 'Jl. Merdeka no 52 Ciawitali, Lakbok', 891231214, 'Madura'),
('SP-013', 'CV.Cahaya Buku', 'Jl. Merdeka no 52 Ciawitali, Lakbok', 891231214, 'Lakbok');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('Administrator','Peminjam','Manajemen') NOT NULL,
  `verifikasi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `level`, `verifikasi`) VALUES
(5000121, 'Agus Kurniadin Khaer', 'AgusKhaer', 'aguskkhaer@gmail.com', 'db559b54f44ac13676189f44ab8ce3b2', 'Administrator', 'Y'),
(5000122, 'Nurhadi', 'Nurhadi', 'nurhadi@gmail.com', '0baecd8026c14db8066aed3899f9f51c', 'Manajemen', 'Y'),
(5000123, 'Truno Pambudi', 'Pambudi', 'pambudi@gmail.com', '82dbd3da69ae037456af6cac9eb0f76c', 'Peminjam', 'Y'),
(5000124, 'Admin', 'Admin', 'inventarisbarangsmkn3bjr@gmail.com', '4cd9ec563ff63154528b4d94be5b7aba', 'Administrator', 'Y'),
(5000125, 'Dhika Risky', 'Dhika51', 'dhika@gmail.com', 'c59fce94ecf882e331c58556ee1686ad', 'Peminjam', 'Y'),
(5000126, 'Rais Zainuri', 'Rais51', 'rais@gmail.com', '10d2510a2cede2df1e531044b3af3c3a', 'Peminjam', 'Y'),
(5000128, 'Yuli Nur Fadilah', 'Yuli51', 'yuli@gmail.com', 'f2c4416ef8c5a6b48d952286d3b9e79d', 'Peminjam', 'Y'),
(5000131, 'Neneng Luthfihatul Putri', 'Neneng51', 'neneng@gmail.com', '4f5d44d9dbbd3434f6ced7bcf61fef72', 'Peminjam', 'Y'),
(5000133, 'Siti Rohimah', 'Siti51', 'siti@gmail.com', '5c2e4a2563f9f4427955422fe1402762', 'Peminjam', 'Y'),
(5000134, 'Muhamad Imam', 'Imam51', 'imam@gmail.com', 'beeccdb438355c029a66dbec333fa1c8', 'Peminjam', 'Y'),
(5000135, 'AgusKhaer', 'AgusKhaer', 'aguskkhaer@gmail.com', '01c3c766ce47082b1b130daedd347ffd', 'Peminjam', 'Y'),
(5000136, 'umin', 'umin', 'umin@gmail.com', '017163727bc806385f1453c130b4fce3', 'Peminjam', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_pinjam`
--

CREATE TABLE `verifikasi_pinjam` (
  `id_verifikasi` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifikasi_pinjam`
--

INSERT INTO `verifikasi_pinjam` (`id_verifikasi`, `id_peminjam`, `id_barang`, `jml_pinjam`, `tgl_pinjam`, `tgl_kembali`) VALUES
(10001, 5000123, 'BRG-009', 1, '2019-04-07', '2019-04-10'),
(10002, 5000131, 'BRG-007', 4, '2019-04-09', '2019-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar_barang`),
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk_barang`),
  ADD KEY `id_supplier` (`id_supplier`) USING BTREE,
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD UNIQUE KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `verifikasi_pinjam`
--
ALTER TABLE `verifikasi_pinjam`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
