-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- SION PARDOSI
-- D4 TEKNOLOGI REKAYASA PERANGKAT LUNAK

CREATE DATABASE JofeShop
USE JofeShop
DROP DATABASE JofeShop

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; -- perintah ini digunakan untuk mengatur mode SQL yang ingin digunakan. Di sini, mode yang dipilih adalah "NO_AUTO_VALUE_ON_ZERO", yang berarti bahwa kolom yang memiliki nilai AUTO_INCREMENT tidak akan diatur ke nol jika tidak ada nilai yang diberikan saat memasukkan data ke dalam tabel.
START TRANSACTION; -- perintah ini digunakan untuk memulai transaksi. Dalam transaksi SQL, satu atau lebih perintah SQL dapat dikelompokkan menjadi satu transaksi, sehingga jika salah satu perintah gagal, seluruh transaksi akan dibatalkan.
SET time_zone = "+00:00"; -- perintah ini digunakan untuk mengatur zona waktu yang ingin digunakan dalam perintah-perintah SQL selanjutnya. Di sini, zona waktu yang dipilih adalah "+00:00", yang berarti zona waktu UTC (Coordinated Universal Time) atau GMT (Greenwich Mean Time).

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JofeShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE TABLE ADMIN (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(200) NOT NULL,
  `password` TEXT NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

INSERT INTO ADMIN (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$AIy0X1Ep6alaHDTofiChGeqq7k/d1Kc8vKQf1JZo0mKrzkkj6M626');

SELECT * FROM ADMIN
DROP TABLE ADMIN
-- --------------------------------------------------------

--
-- Table structur teks promo
--

CREATE TABLE teks_promo (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nama VARCHAR(500) NOT NULL,
  deskripsi TEXT NOT NULL,
  PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO teks_promo (id, nama, deskripsi) VALUES
(1, 'Teks promo', 'Nikmati sensasi manis yang berbeda dengan kue-kue unik dari JoFe Shop. Kami menggunakan bahan premium dan teknik pembuatan teliti untuk menciptakan rasa yang tak terlupakan. Kunjungi toko kami dan buat momen spesialmu semakin istimewa dengan kelezatan dari JoFe Shop!');

SELECT * FROM teks_promo

DROP TABLE teks_promo
-- --------------------------------------

-- Table structure for table `teks_tentang`
--

CREATE TABLE about (
  id_about INT(11) AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(255),
  content TEXT
);

INSERT INTO about (id_about, image, content) 
VALUES (1, '1.jpg', 'Ini adalah teks tentang yang sangat menarik!');

SELECT * FROM about
DROP TABLE about
-- -------------------------------------
--
-- Table structure for table `customer`
--

CREATE TABLE customer (
  kode_customer VARCHAR(100) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  username VARCHAR(100) NOT NULL,
  PASSWORD VARCHAR(100) NOT NULL,
  telp VARCHAR(200) NOT NULL,
  STATUS TINYINT DEFAULT 1
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO customer (`kode_customer`, `nama`, `email`, `username`, `password`, `telp`, `status`) VALUES 
('C0002', 'Sion P', 'spardosi12@gmail.com', 'sion', 'sion123', '082278900178', 1);

SELECT * FROM customer

-- --------------------------------------------------------

-- Table structure for table `keranjang`
--

CREATE TABLE keranjang (
  `id_keranjang` INT(11) NOT NULL,
  `kode_customer` VARCHAR(100) NOT NULL,
  `kode_produk` VARCHAR(100) NOT NULL,
  `nama_produk` VARCHAR(100) NOT NULL,
  `qty` INT(11) NOT NULL,
  `harga` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO `keranjang` (`id_keranjang`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`) VALUES
(16, 'C0003', 'P0002', 'Kue Salju', 5, 15000),
(17, 'C0003', 'P0003', 'Kue Nastar', 2, 100000);

SELECT * FROM keranjang
DROP TABLE keranjang

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE produk (
  `kode_produk` VARCHAR(100) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `image` TEXT NOT NULL,
  `deskripsi` TEXT NOT NULL,
  `harga` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO produk (`kode_produk`, `nama`, `image`, `deskripsi`, `harga`) VALUES
('P0001', 'Kue Nastar', 'Kue Nastar.jpg','Kue nastar adalah kue kering tradisional Indonesia yang terkenal dan banyak disukai. Kue ini biasanya berbentuk bulat kecil dengan isian selai nanas di tengahnya dan bagian luar yang renyah dan kering. Kue ini terbuat dari campuran tepung terigu, mentega, telur, gula, dan selai nanas. Setelah adonan dipanggang dalam oven, kue ini dihiasi dengan taburan gula halus di atasnya. Kue nastar biasanya disajikan sebagai camilan atau hidangan penutup dan sangat populer di acara-acara seperti Lebaran atau Natal. Dengan rasa manis dan gurih yang khas, kue nastar adalah pilihan yang sempurna untuk memanjakan lidah Anda.', 100000),
('P0002', 'Kue Salju', 'Kue Salju.jpg', 'Kue salju, atau sering juga disebut kue putri salju, adalah salah satu jenis kue kering yang populer dan disukai di Indonesia. Kue ini memiliki bentuk bulat kecil dan terbuat dari campuran tepung terigu, mentega, gula halus, dan tepung maizena. Kue salju biasanya memiliki tekstur yang renyah dan meleleh di mulut ketika dimakan.', 100000),
('P0003', 'Kue tart coklat', 'Kue Coklat.jpg', 'Kue coklat adalah kue yang terbuat dari campuran tepung terigu, coklat bubuk, telur, mentega, dan gula. Kue ini memiliki rasa yang kaya dan kuat karena penggunaan coklat bubuk sebagai bahan utama. Kue coklat sering disajikan sebagai hidangan penutup atau camilan di berbagai acara, seperti ulang tahun, pernikahan, atau acara keluarga.', 80000);

SELECT * FROM produk

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE produksi (
  id_order INT(11) NOT NULL AUTO_INCREMENT,
  invoice VARCHAR(200) NOT NULL,
  kode_customer VARCHAR(200) NOT NULL,
  kode_produk VARCHAR(200) NOT NULL,
  nama_produk VARCHAR(200) NOT NULL,
  qty INT(11) NOT NULL,
  harga INT(11) NOT NULL,
  STATUS VARCHAR(200) NOT NULL,
  tanggal DATE NOT NULL,
  provinsi VARCHAR(200) NOT NULL,
  kota VARCHAR(200) NOT NULL,
  alamat VARCHAR(200) NOT NULL,
  kode_pos VARCHAR(200) NOT NULL,
  terima VARCHAR(200) NOT NULL,
  tolak VARCHAR(200) NOT NULL,
  cek INT(11) NOT NULL,
  PRIMARY KEY(id_order)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produksi` (`id_order`, `invoice`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`, `status`, `tanggal`, `provinsi`, `kota`, `alamat`, `kode_pos`, `terima`, `tolak`, `cek`) VALUES
(8, 'INV0001', 'C0002', 'P0003', 'Kue tart coklat', 1, 100000, 'Pesanan Baru', '2023-03-21', 'Sumatra Utara', 'Nias', 'Jl.Telaumbanua', '60129', '1', '0', 0);

SELECT * FROM produksi;

-- --------------------------------------------------------
NULL AUTO_INCREMENT;
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);
--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_order` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

