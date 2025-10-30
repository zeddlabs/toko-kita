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

-- Dumping structure for table toko_kita.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_kita.kategori: ~2 rows (approximately)
DELETE FROM `kategori`;
INSERT INTO `kategori` (`id`, `nama`) VALUES
	(2, 'Celana Wanita'),
	(3, 'Baju Pria');

-- Dumping structure for table toko_kita.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pelanggan_id` int NOT NULL,
  `produk_id` int NOT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keranjang_pelanggan` (`pelanggan_id`),
  KEY `keranjang_produk` (`produk_id`),
  CONSTRAINT `keranjang_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `keranjang_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_kita.keranjang: ~0 rows (approximately)
DELETE FROM `keranjang`;

-- Dumping structure for table toko_kita.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pelanggan_users` (`user_id`),
  CONSTRAINT `pelanggan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_kita.pelanggan: ~1 rows (approximately)
DELETE FROM `pelanggan`;
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_hp`, `user_id`) VALUES
	(1, 'Jon Do berubah', 'Jl. jalan', '081234567890', 1);

-- Dumping structure for table toko_kita.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_normal` bigint unsigned NOT NULL,
  `harga_diskon` bigint unsigned NOT NULL,
  `rating` int unsigned NOT NULL DEFAULT '0',
  `gambar` varchar(255) NOT NULL,
  `kategori_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_kita.produk: ~4 rows (approximately)
DELETE FROM `produk`;
INSERT INTO `produk` (`id`, `nama`, `merk`, `harga_normal`, `harga_diskon`, `rating`, `gambar`, `kategori_id`) VALUES
	(2, 'Baju Batik Pria bagus', 'Apaya', 500000, 0, 5, '68efaff898068_1760538616.jpg', 3),
	(3, 'Quis expedita nemo t', 'Sint culpa molestia', 97000, 63000, 5, '6903655f0d10b_1761830239.jpg', 3),
	(4, 'Suscipit quo et mole', 'Quam expedita non et', 66000, 7200, 4, '6903666c82640_1761830508.jpg', 3),
	(5, 'Aliquid deserunt con', 'Totam enim ut labore', 100000, 68000, 4, '6903668328e25_1761830531.jpg', 3);

-- Dumping structure for table toko_kita.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `keranjang_id` int NOT NULL DEFAULT '0',
  `total_harga` int NOT NULL DEFAULT '0',
  `alamat_pengiriman` text NOT NULL,
  `status_pembayaran` enum('lunas','belum lunas') NOT NULL DEFAULT 'belum lunas',
  `status_pengiriman` enum('dikemas','dikirim','diterima') NOT NULL DEFAULT 'dikemas',
  PRIMARY KEY (`id`),
  KEY `keranjang_id` (`keranjang_id`),
  CONSTRAINT `transaksi_keranjang` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_kita.transaksi: ~0 rows (approximately)
DELETE FROM `transaksi`;

-- Dumping structure for table toko_kita.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pelanggan') NOT NULL DEFAULT 'pelanggan',
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_kita.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `foto`) VALUES
	(1, 'Jon Do berubah', 'jondo@gmail.com', '', 'pelanggan', '68f24bd3899c1_1760709587.png'),
	(2, 'Admin', 'admin@gmail.com', '$2y$10$WB/9fvu0LzjXsBZaQdWI9u.xCCkSW4bLIgP7AjyOBNlKvEj.5XKqC', 'admin', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
