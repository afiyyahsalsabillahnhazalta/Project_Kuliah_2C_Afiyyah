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

-- Dumping structure for table db_usmb.tb_pembelian
CREATE TABLE IF NOT EXISTS `tb_pembelian` (
  `id_pembelian` bigint NOT NULL DEFAULT '0',
  `nama_barang` varchar(200) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `harga_satuan` varchar(50) DEFAULT NULL,
  `jumlah_rp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_pembelian: ~3 rows (approximately)
INSERT INTO `tb_pembelian` (`id_pembelian`, `nama_barang`, `tgl_pembelian`, `qty`, `harga_satuan`, `jumlah_rp`) VALUES
	(2312031344508, 'Milano Krimer Kental Manis 500gr', '2023-12-03', 50, '300000', '15000000'),
	(2312031353407, 'Milano Krimer Kental Manis 1kg', '2023-12-03', 30, '600000', '18000000'),
	(2312041216513, 'Milano Soya 350ml', '2023-12-04', 20, '120000', '2400000');

-- Dumping structure for table db_usmb.tb_produk
CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `harga_satuan` varchar(50) DEFAULT NULL,
  `jumlah_per_dus` varchar(50) DEFAULT NULL,
  `harga_per_dus` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_usmb.tb_produk: ~2 rows (approximately)
INSERT INTO `tb_produk` (`id`, `foto`, `nama_produk`, `ukuran`, `harga_satuan`, `jumlah_per_dus`, `harga_per_dus`, `keterangan`) VALUES
	(8, '67370-krimerkentalmanis1kg.jpg', 'Milano Krimer Kental Manis', '1kg', '25000', ' 24pcs', '600000', ''),
	(9, '51586-krimerkentalmanis500gr.jpg', 'Milano Krimer Kental Manis', '500gr', '12500', '24pcs', '300000', ''),
	(13, '35207-soya.jpg', 'Milano Soya', '320ml', '5000', '24pcs', '120000', '');

-- Dumping structure for table db_usmb.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4  DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
