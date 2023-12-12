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

-- Dumping structure for table db_usmb.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `nama_barang` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `qty` int DEFAULT NULL,
  `harga_satuan` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_usmb.tb_barang: ~2 rows (approximately)
INSERT INTO `tb_barang` (`nama_barang`, `qty`, `harga_satuan`, `jumlah`) VALUES
	('ad jkasj s', 23, 234567, 234567),
	('jdskjvfka', 12, 1234567, 123456);

-- Dumping structure for table db_usmb.tb_pembelian
CREATE TABLE IF NOT EXISTS `tb_pembelian` (
  `id` bigint NOT NULL DEFAULT '0',
  `nama_barang` varchar(200)  DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `harga_satuan` varchar(50)  DEFAULT NULL,
  `jumlah_rp` varchar(50)  DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_usmb.tb_pembelian: ~6 rows (approximately)
INSERT INTO `tb_pembelian` (`id`, `nama_barang`, `tgl_pembelian`, `qty`, `harga_satuan`, `jumlah_rp`) VALUES
	(2312091723699, 'Milano Krimer Kental Manis 500gr', '2023-12-10', 20, '300000', '6000000'),
	(2312091724642, 'Milano Krimer Kental Manis 500gr', '2023-12-10', 10, '300000', '3000000'),
	(2312091725951, 'Milano Soya 350ml', '2023-12-10', 100, '120000', '12000000'),
	(2312091726332, 'Milano Krimer Kental Manis 1kg', '2023-12-10', 50, '600000', '30000000'),
	(2312091742136, 'Milano Krimer Kental Manis 500gr', '2023-12-10', 20, '300000', '6000000'),
	(2312091802782, 'Milano Krimer Kental Manis 500gr', '2023-12-10', 30, '300000', '9000000'),
	(2312120640678, 'Milano Krimer Kental Manis 500gr', '2023-12-12', 2, '300000', '600000');

-- Dumping structure for table db_usmb.tb_produk
CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `harga_satuan` varchar(50) DEFAULT NULL,
  `jumlah_per_dus` varchar(50) DEFAULT NULL,
  `harga_per_dus` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `keterangan` varchar(1000) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10006 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_usmb.tb_produk: ~3 rows (approximately)
INSERT INTO `tb_produk` (`id`, `foto`, `nama_produk`, `ukuran`, `harga_satuan`, `jumlah_per_dus`, `harga_per_dus`, `keterangan`) VALUES
	(10001, '57443-milano.jpg', 'Milano Krimer Kental Manis', '1kg', '25000', ' 24pcs', '600000', ''),
	(10002, '51586-krimerkentalmanis500gr.jpg', 'Milano Krimer Kental Manis', '500gr', '12500', '24pcs', '300000', ''),
	(10003, '43043-soya.jpg', 'Milano Soya', '320ml', '5000', '24pcs', '120000', 'Susu kedelai atau sari kedelai milano soya adalah minuman sari kedelai dalam kemasan modern yang praktis dan higenis.');

-- Dumping structure for table db_usmb.tb_stokgudang
CREATE TABLE IF NOT EXISTS `tb_stokgudang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(300) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_usmb.tb_stokgudang: ~3 rows (approximately)
INSERT INTO `tb_stokgudang` (`id`, `nama_barang`, `qty`) VALUES
	(10001, 'Milano Krimer Kental Manis 500gr', 82),
	(10002, 'Milano Krimer Kental Manis 1kg', 50),
	(10003, 'Milano Soya 350ml', 100);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_usmb.tb_user: ~3 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'yayaa', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '085236738342', 'Lhokseumawe'),
	(2, 'refall', 'sales1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '086372849321', 'Sukaramai'),
	(3, 'jidan', 'gudang@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '089374536273', 'Lhokseumawe');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
