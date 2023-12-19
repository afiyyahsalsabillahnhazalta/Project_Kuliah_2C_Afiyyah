-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_usmb.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_bayar: ~8 rows (approximately)
INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
	(2312151401549, 60000000, 6000000, '2023-12-15 13:32:02'),
	(2312151434994, 10200000, 10200000, '2023-12-15 12:55:36'),
	(2312151442864, 4000000, 3600000, '2023-12-16 01:28:57'),
	(2312151501876, 3000000, 3000000, '2023-12-16 01:43:16'),
	(2312151558921, 2100000000, 21000000, '2023-12-19 01:18:13'),
	(2312151603624, 6000000, 6000000, '2023-12-19 02:05:45'),
	(2312151912202, 35000000, 32400000, '2023-12-15 13:30:00'),
	(2312161401198, 8500000, 8400000, '2023-12-16 07:02:05');

-- Dumping structure for table db_usmb.tb_list_penjualan
CREATE TABLE IF NOT EXISTS `tb_list_penjualan` (
  `id_list_penjualan` int NOT NULL AUTO_INCREMENT,
  `produk` int DEFAULT NULL,
  `kode_penjualan` bigint DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id_list_penjualan`),
  KEY `produk` (`produk`),
  KEY `penjualan` (`kode_penjualan`) USING BTREE,
  CONSTRAINT `FK_tb_list_penjualan_tb_penjualan` FOREIGN KEY (`kode_penjualan`) REFERENCES `tb_penjualan` (`id_penjualan`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_penjualan_tb_produk` FOREIGN KEY (`produk`) REFERENCES `tb_produk` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_list_penjualan: ~17 rows (approximately)
INSERT INTO `tb_list_penjualan` (`id_list_penjualan`, `produk`, `kode_penjualan`, `qty`) VALUES
	(1, 10001, 2312151434994, 7),
	(2, 10002, 2312151434994, 12),
	(3, 10003, 2312151434994, 20),
	(6, 10001, 2312151401549, 10),
	(7, 10001, 2312151912202, 40),
	(8, 10003, 2312151912202, 70),
	(10, 10002, 2312151442864, 12),
	(11, 10002, 2312151501876, 10),
	(12, 10002, 2312151603624, 20),
	(13, 10003, 2312161401198, 20),
	(14, 10001, 2312161401198, 10),
	(15, 10001, 2312151558921, 25),
	(16, 10003, 2312151558921, 50),
	(17, 10003, 2312161551378, 20),
	(19, 10001, 2312190850133, 8),
	(20, 10002, 2312190850133, 7),
	(21, 10003, 2312190850133, 9);

-- Dumping structure for table db_usmb.tb_pembelian
CREATE TABLE IF NOT EXISTS `tb_pembelian` (
  `id` bigint NOT NULL DEFAULT '0',
  `nama_barang` varchar(200)  DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `harga_satuan` varchar(50)  DEFAULT NULL,
  `jumlah_rp` varchar(50)  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_usmb.tb_pembelian: ~6 rows (approximately)
INSERT INTO `tb_pembelian` (`id`, `nama_barang`, `tgl_pembelian`, `qty`, `harga_satuan`, `jumlah_rp`) VALUES
	(2312160112207, 'Milano Soya 350ml', '2023-12-12', 100, '120000', ' '),
	(2312160112346, 'Milano Krimer Kental Manis 1kg', '2023-12-13', 100, '600000', ' '),
	(2312160112904, 'Milano Krimer Kental Manis 500gr', '2023-12-21', 100, '300000', ' '),
	(2312181119206, 'Milano Krimer Kental Manis 500gr', '2023-12-18', 20, '300000', ' '),
	(2312190114966, 'Milano Soya 350ml', '2023-12-22', 63, '150000', ' '),
	(2312190153688, 'Milano Krimer Kental Manis 500gr', '2023-12-19', 9, '300000', ' ');

-- Dumping structure for table db_usmb.tb_penjualan
CREATE TABLE IF NOT EXISTS `tb_penjualan` (
  `id_penjualan` bigint NOT NULL DEFAULT '0',
  `pelanggan` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alamat_pelanggan` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `salesman` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `waktu_penjualan` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penjualan`) USING BTREE,
  KEY `salesman` (`salesman`),
  CONSTRAINT `FK_tb_penjualan_tb_user` FOREIGN KEY (`salesman`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_usmb.tb_penjualan: ~11 rows (approximately)
INSERT INTO `tb_penjualan` (`id_penjualan`, `pelanggan`, `alamat_pelanggan`, `salesman`, `status`, `waktu_penjualan`) VALUES
	(2312151401549, 'putro', ' vfajls', 1, NULL, '2023-12-15 08:40:11'),
	(2312151434994, 'bisyyy', 'lhoksejbef', 1, NULL, '2023-12-15 08:47:13'),
	(2312151442864, 'nhazaltaa', 'kklosdhi', 1, NULL, '2023-12-15 08:47:20'),
	(2312151501876, 'bila', 'ndkjvas', 1, NULL, '2023-12-15 08:01:28'),
	(2312151558921, 'salwa', 'ujong', 1, NULL, '2023-12-15 09:02:51'),
	(2312151603624, 'Anisa', 'pooew', 2, NULL, '2023-12-16 07:02:56'),
	(2312151912202, 'ayu', 'kotabaru', 1, NULL, '2023-12-15 12:12:52'),
	(2312161401198, 'aldi', 'banda', 1, NULL, '2023-12-16 07:01:28'),
	(2312161551378, 'Rizki Abadi Jaya', 'Panggoi', 2, NULL, '2023-12-16 08:52:15'),
	(2312181925773, 'andi', 'jl. samudra', 1, NULL, '2023-12-18 12:25:46'),
	(2312190816914, 'Nia Rahmadhani', 'biren', 1, NULL, '2023-12-19 01:16:23'),
	(2312190850133, 'salsa', 'lhokseumawe', 2, NULL, '2023-12-19 01:50:54');

-- Dumping structure for table db_usmb.tb_produk
CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `harga_satuan` varchar(50) DEFAULT NULL,
  `jumlah_per_dus` varchar(50) DEFAULT NULL,
  `harga_per_dus` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `keterangan` varchar(1000) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10008 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_produk: ~3 rows (approximately)
INSERT INTO `tb_produk` (`id`, `foto`, `nama_produk`, `harga_satuan`, `jumlah_per_dus`, `harga_per_dus`, `keterangan`) VALUES
	(10001, '63936-milano.jpg', 'Milano Krimer Kental Manis 1kg', '25000', ' 24pcs', '600000', ''),
	(10002, '46422-krimerkentalmanis500gr.jpg', 'Milano Krimer Kental Manis 500gr', '12500', '24pcs', '300000', ''),
	(10003, '37155-soya.jpg', 'Milano Soya 350ml', '5000', '24pcs', '120000', 'Susu kedelai atau sari kedelai milano soya adalah minuman sari kedelai dalam kemasan modern yang praktis dan higenis.');

-- Dumping structure for table db_usmb.tb_stokgudang
CREATE TABLE IF NOT EXISTS `tb_stokgudang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_stokgudang: ~3 rows (approximately)
INSERT INTO `tb_stokgudang` (`id`, `nama_barang`, `qty`) VALUES
	(10001, 'Milano Krimer Kental Manis 500gr', 129),
	(10002, 'Milano Krimer Kental Manis 1kg', 100),
	(10003, 'Milano Soya 350ml', 163);

-- Dumping structure for table db_usmb.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_user: ~4 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'yayaa', 'admin@gmail.com', '866c79485e52c27aec9556129b274a27', 1, '085236738342', 'Lhokseumawe'),
	(2, 'refall', 'sales1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '086372849321', 'Sukaramai'),
	(3, 'jidan', 'gudang@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '089374536273', 'Lhokseumawe'),
	(9, 'Afiyyah Nhazalta', 'afiyyah@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '758756683', 'ghgjdhkjgji');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
