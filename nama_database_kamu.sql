-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nama_database_kamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sutradara` varchar(150) DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul`, `sutradara`, `durasi`, `genre`) VALUES
(1, 'Petualangan di Ruang Hampa', 'Joko Anwar', 135, 'Sci-Fi'),
(2, 'Misteri Rumah Tua', 'Mo Brothers', 110, 'Horror'),
(3, 'Cinta di Batas Kota', 'Hanung Bramantyo', 118, 'Romance'),
(4, 'Mengejar Angin Malam', 'Riri Riza', 125, 'Drama'),
(5, 'Komedi Kacau Sekali', 'Raditya Dika', 95, 'Comedy'),
(6, 'Operasi Senyap', 'Timo Tjahjanto', 142, 'Action'),
(7, 'Detektif Cilik dan Teka-Teki', 'Angga Dwimas Sasongko', 105, 'Mystery'),
(8, 'Melodi di Ujung Jari', 'Garin Nugroho', 130, 'Musical'),
(9, 'Dunia Tanpa Batas', 'Teddy Soeriaatmadja', 115, 'Fantasy'),
(10, 'Jejak Langkah Pahlawan', 'Fajar Bustomi', 150, 'Biography');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` int NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(100) DEFAULT NULL,
  `lokasi_baris` varchar(100) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(255) DEFAULT NULL,
  `bantal_selimut_pack` varchar(100) DEFAULT NULL,
  `layanan_butler` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(22, 'KKN di Desa Penari 2', '2026-06-12 13:00:00', 120, 40000, 'Regular', 'Dolby Digital 5.1', 'Row G', NULL, NULL, NULL, NULL),
(23, 'Gundala: Negeri Ini Butuh Patriot', '2026-06-12 15:45:00', 120, 40000, 'Regular', 'Dolby Digital 5.1', 'Row F', NULL, NULL, NULL, NULL),
(24, 'Mencuri Raden Saleh', '2026-06-12 19:00:00', 100, 45000, 'Regular', 'Standard Stereo', 'Row E', NULL, NULL, NULL, NULL),
(25, 'The Avengers: Secret Wars', '2026-06-13 10:30:00', 150, 45000, 'Regular', 'Dolby Digital 7.1', 'Row H', NULL, NULL, NULL, NULL),
(26, 'Avatar 3: The Seed Bearer', '2026-06-13 14:00:00', 150, 45000, 'Regular', 'Dolby Digital 7.1', 'Row C', NULL, NULL, NULL, NULL),
(27, 'Pengabdi Setan 3', '2026-06-13 21:30:00', 100, 50000, 'Regular', 'Dolby Digital 5.1', 'Row A', NULL, NULL, NULL, NULL),
(28, 'Agak Laen 2', '2026-06-14 12:00:00', 120, 40000, 'Regular', 'Standard Stereo', 'Row D', NULL, NULL, NULL, NULL),
(29, 'Avatar 3: The Seed Bearer', '2026-06-12 11:00:00', 80, 75000, 'IMAX', 'Dolby Atmos 12.1', 'Center', '3D-IMAX-001', 'Vibration Active', NULL, NULL),
(30, 'The Avengers: Secret Wars', '2026-06-12 14:30:00', 80, 75000, 'IMAX', 'Dolby Atmos 12.1', 'Center', NULL, 'Standard Motion', NULL, NULL),
(31, 'Interstellar (Re-Release)', '2026-06-12 18:00:00', 80, 70000, 'IMAX', 'IMAX Custom Sound', 'VIP', NULL, 'None', NULL, NULL),
(32, 'Dune: Part Three', '2026-06-13 13:00:00', 80, 85000, 'IMAX', 'Dolby Atmos 12.1', 'Center', NULL, 'Wind & Vibration', NULL, NULL),
(33, 'Transformers: New Era', '2026-06-13 16:45:00', 85, 80000, 'IMAX', 'Dolby Atmos 12.1', 'Row Back', '3D-IMAX-005', 'Full Motion Pack', NULL, NULL),
(34, 'Star Wars: The New Order', '2026-06-14 15:00:00', 80, 85000, 'IMAX', 'IMAX Custom Sound', 'Center', '3D-IMAX-012', 'Vibration Active', NULL, NULL),
(35, 'Inception', '2026-06-14 20:00:00', 70, 70000, 'IMAX', 'Dolby Atmos 12.1', 'Row Front', NULL, 'None', NULL, NULL),
(36, 'Cinta Subuh di Paris', '2026-06-12 14:00:00', 30, 120000, 'Velvet', 'Dolby 5.1 Premium', 'Sofa 01', NULL, NULL, 'Premium Quilt & Pillow', 'Active - Welcome Drink & Snack'),
(37, 'Mencuri Raden Saleh', '2026-06-12 17:30:00', 30, 120000, 'Velvet', 'Dolby 5.1 Premium', 'Sofa 05', NULL, NULL, 'Premium Quilt & Pillow', 'Active - Dinner Set Call'),
(38, 'The Avengers: Secret Wars', '2026-06-12 20:45:00', 24, 150000, 'Velvet', 'Dolby Atmos Luxury', 'Sofa 03', NULL, NULL, 'Suite Room Pack', 'Full Service Butler'),
(39, 'Dune: Part Three', '2026-06-13 15:00:00', 30, 135000, 'Velvet', 'Dolby 5.1 Premium', 'Sofa 12', NULL, NULL, 'Premium Quilt & Pillow', 'Active - Welcome Drink'),
(40, 'Ada Apa Dengan Cinta 3', '2026-06-13 18:30:00', 30, 120000, 'Velvet', 'Standard Stereo', 'Sofa 08', NULL, NULL, 'Standard Pillow Only', 'On Demand Button'),
(41, 'Habibie & Ainun: Masa Depan', '2026-06-14 14:15:00', 30, 120000, 'Velvet', 'Dolby 5.1 Premium', 'Sofa 02', NULL, NULL, 'Premium Quilt & Pillow', 'Active - Welcome Drink'),
(42, 'Pengabdi Setan 3', '2026-06-14 22:00:00', 24, 150000, 'Velvet', 'Dolby Atmos Luxury', 'Sofa 10', NULL, NULL, 'Suite Room Pack', 'Full Service Butler');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `stok` int DEFAULT '0',
  `id_kategori` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_ProdukKategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `FK_ProdukKategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
