-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 06 Jun 2023 pada 19.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jofeshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `image`, `content`) VALUES
(1, 'Foto Owner - Copy - Copy - Copy.jpg', 'Pada tahun 2015, di sebuah rumah kecil yang terletak di Jl. Dr. Td. Pardede NO.14 Komplek PLN Balige, Kabupaten Toba, Sumatra Utara, seorang ibu rumah tangga bernama Fery Hartatina Hulu yaitu saya sendiri sebagai pemilik (owner) memiliki keinginan yang kuat untuk mengubah hobi saya dalam memasak menjadi sesuatu yang lebih. Saya telah lama menikmati momen di dapur, menciptakan kue-kue kering lezat untuk keluarga dan teman-temannya. Pada suatu hari, Saya merasa bahwa bakat dan keahlian saya dalam memasak dapat dibagikan dengan lebih banyak orang. Dengan semangat yang membara, Saya beserta suami mulai mempertimbangkan untuk memulai usaha kecil di bidang makanan kering. Seorang suami yang selalu mendorong dan mendukung saya, Jonson Pardosi, ya suami saya. Kami mengambil langkah pertama menuju impian.  Dari pemikiran kami, nama Jofe Bakery muncul. Nama ini adalah penggabungan dari nama Fery (Jo) dan Jonson (Fe), mencerminkan kerjasama dan dedikasi pasangan suami-istri dalam menjalankan usaha kecil kami. Dalam dapur yang sederhana.<br><br>\r\nAwalnya, saya hanya membuat pesanan kecil untuk keluarga, tetangga, dan teman-temannya. Namun, kabar tentang kue-kue kering istimewa yang saya buat mulai menyebar. Orang-orang mulai mendengar tentang Jofe Bakery dan rasa lezat produk kami. Melihat bahwa lingkungan sekitar masih kurang dalam penawaran makanan kering, Ibu Fery memutuskan untuk mengisi waktu luangnya dengan membuat beberapa jenis kue kering untuk dijual, yang pada awalnya, Jofe Bakery hanya menawarkan tiga jenis produk, seperti Kue Nastar, Kue Bangkit, serta Kue Kacang saja. Namun, dengan semangat dan konsistensi dalam menghadirkan cita rasa yang istimewa, Jofe Bakery mulai menarik perhatian pelanggan. Keunikan dan kelezatan produk mereka membuat pelanggan setia datang kembali berulang kali. Seiring berjalannya waktu, Jofe Bakery mulai meluaskan jangkauan produknya dengan menambahkan berbagai macam roti dan kue lainnya. Dalam waktu Seiring berjalannya waktu, Jofe Bakery semakin dikenal di komunitas sekitar. Pelanggan setia terus datang kembali untuk menikmati kue-kue kering lezat yang disajikan dengan cinta dan dedikasi oleh saya dan tim.<br><br>\r\nSebagai bentuk identitas yang kuat, Jofe Bakery memiliki logo yang sangat berarti bagi mereka. Logo tersebut adalah gambar angsa emas, yang memiliki makna simbolis yang kaya. Angsa emas melambangkan keanggunan dan keindahan dalam produk dan layanan yang mereka tawarkan. Hal ini menunjukkan komitmen Jofe Bakery untuk memberikan kualitas terbaik dan cita rasa yang memukau kepada pelanggannya. Meskipun telah beroperasi selama lebih dari 13 tahun, Jofe Bakery tetap menjaga kualitas dan cita rasa yang konsisten. Keunggulan kami dalam hal cita rasa membuat mereka menjadi pilihan utama bagi banyak pelanggan setia. Namun, Jofe Bakery tidak puas hanya dengan kesuksesan yang telah kami raih. Kami memiliki harapan dan mimpi yang lebih besar. saya Ibu Fery, dan suami saya Jonson Pardosi beserta tim kami ingin Jofe Bakery dikenal tidak hanya di dalam kabupaten Toba, tetapi juga di luar kabupaten tersebut. Untuk mencapai hal ini, mereka menyadari pentingnya memiliki toko fisik dan website resmi yang dapat memberikan informasi lebih lengkap tentang produk kami.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$AIy0X1Ep6alaHDTofiChGeqq7k/d1Kc8vKQf1JZo0mKrzkkj6M626');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama`, `email`, `username`, `password`, `telp`, `status`) VALUES
('C0002', 'Sion P', 'spardosi12@gmail.com', 'sion', 'sion123', '082278900178', 1),
('C0003', 'sion pardosi', 'sio212n@gmail.com', 'sion pardosi', '$2y$10$fkGC9EqyiDDyNK/kOEQMY.G4LJMpsE3LE8dOKa4TZad1jaNGb6Z8W', '08227890127', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `kode_customer` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama`, `image`, `deskripsi`, `harga`) VALUES
('P0001', 'Kue Nastar', 'Kue Nastar.jpg', 'Kue nastar adalah kue kering tradisional Indonesia yang terkenal dan banyak disukai. Kue ini biasanya berbentuk bulat kecil dengan isian selai nanas di tengahnya dan bagian luar yang renyah dan kering. Kue ini terbuat dari campuran tepung terigu, mentega, telur, gula, dan selai nanas. Setelah adonan dipanggang dalam oven, kue ini dihiasi dengan taburan gula halus di atasnya. Kue nastar biasanya disajikan sebagai camilan atau hidangan penutup dan sangat populer di acara-acara seperti Lebaran atau Natal. Dengan rasa manis dan gurih yang khas, kue nastar adalah pilihan yang sempurna untuk memanjakan lidah Anda.', 140000),
('P0002', 'Kue Salju', 'Kue Salju.jpg', 'Selamat datang di dunia yang menakjubkan di mana kelezatan bertemu dengan keanggunan, dan di tengahnya ada kue Salju yang memukau. Kue Salju kami adalah simbol keindahan dan kelembutan, menawarkan pengalaman yang menakjubkan bagi para pecinta kue.\r\n\r\nDengan lapisan gula halus yang menyerupai salju yang baru turun dari langit, kue ini memberikan kepuasan visual sebelum Anda merasakan kelezatan di mulut Anda. Ketika Anda memasukkan kue Salju yang rapuh ke dalam mulut Anda, ia meleleh dengan lembut seperti salju yang mencair di lidah Anda, menghadirkan sensasi yang luar biasa.\r\n\r\nRahasia utama dari kue Salju kami adalah teksturnya yang lembut dan rapuh sekaligus. Dalam setiap gigitan, Anda akan merasakan kelembutan yang lezat dan kemudian merasakan kegembiraan saat kue tersebut hancur dan meleleh di mulut Anda. Ia memberikan sensasi yang menyenangkan saat menggigitnya, dengan rasa yang begitu memikat.', 100000),
('P0003', 'Kue tart coklat', 'Kue Coklat.jpg', 'Selamat datang dalam petualangan rasa yang memikat, di mana kelembutan bertemu dengan kenikmatan dalam kue tart coklat kami. Kue tart coklat ini adalah jawaban bagi pecinta coklat yang mencari pengalaman tak terlupakan di setiap gigitannya.\r\n\r\nKue tart coklat kami menggoda selera dengan kulit tart yang renyah dan menggigit, memberikan fondasi yang sempurna untuk lapisan-lapisan coklat yang memukau. Dari permukaan yang mengkilap hingga ke dalam setiap lapisannya, aroma coklat yang kaya dan menggugah selera mengisi ruangan begitu kue ini dipotong.\r\n\r\nLembutnya tekstur kue tart coklat ini seimbang dengan kekuatan rasa coklat yang intens. Setiap gigitan adalah perpaduan sempurna antara kenikmatan lezat dan kekayaan coklat yang memanjakan lidah Anda. Sensasi melumerkan kue tart ini di mulut akan menghadirkan ledakan rasa yang memikat, memenuhi setiap indera dengan kepuasan yang tak tertandingi.', 100000),
('P0004', 'Kue Kacang', '647f70e64dbad.jpg', 'Selamat datang di dunia kelezatan yang kaya dan menggugah selera dengan kue kacang kami yang istimewa. Kue kacang kami adalah perpaduan sempurna antara rasa gurih kacang dan kelembutan tekstur yang menghadirkan kenikmatan tiada tara di setiap gigitan.\r\n\r\nKue kacang kami memiliki sentuhan yang khas, dengan adonan yang dibuat dengan hati-hati dan diisi dengan kacang yang dipanggang dengan sempurna. Ketika Anda menggigit kue ini, kelezatan kacang yang renyah dan gurih segera memenuhi lidah Anda, memberikan sensasi yang memikat.\r\n\r\nRahasia sejati dari kue kacang kami adalah keseimbangan yang sempurna antara manis dan gurih. Gula halus yang menempel di permukaan kue memberikan sentuhan manis yang menggoda, sementara rasa kacang yang kaya dan gurih memberikan dimensi yang lebih dalam pada rasa.', 110000),
('P0005', 'Kue Semprit Strawbarry', '647f6a3f9013c.jpg', 'Kue Semprit Strawberry kami memukau indera dengan tampilannya yang menarik dan menggoda selera. Dengan bentuk yang khas dari kue semprit, setiap gigitan menghadirkan kepuasan visual dan rasa yang menggugah selera. Permukaan kue yang halus dengan warna merah muda yang menggoda akan membuat Anda tergoda untuk mencicipinya.\r\n\r\nRahasia kelezatan kue Semprit Strawberry kami terletak pada penggunaan buah strawberry segar dan berkualitas tinggi. Kami menggunakan potongan-potongan strawberry yang dipadatkan di dalam adonan kue, memberikan aroma dan rasa yang menyegarkan. Setiap gigitan akan memanjakan lidah Anda dengan kombinasi manis dan asam yang sempurna.\r\n\r\nTekstur kue Semprit Strawberry ini sangat lembut dan rapuh, hampir mencair di mulut. Ketika Anda menggigitnya, kue tersebut berpadu dengan potongan-potongan strawberry yang lezat, memberikan sensasi yang memuaskan di setiap gigitan. Kelembutan kue semprit ini melengkapi kelezatan buah strawberry yang segar, menciptakan harmoni rasa yang tak terlupakan.', 120000),
('P0006', 'Kue Sagon Bakar', '647f6b1aab251.jpg', 'Kue Sagon Bakar kami memukau indera dengan tampilannya yang menarik dan menggoda selera. Dengan lapisan luar yang renyah dan berwarna kecokelatan yang terbentuk saat dipanggang, kue ini menjanjikan kenikmatan di setiap gigitannya. Tampilan yang menggugah selera ini memberikan petunjuk tentang kelezatan yang ada di dalamnya.\r\n\r\nRahasia sejati dari kue Sagon Bakar kami terletak pada tekstur yang unik dan rasa yang lezat. Ketika Anda menggigit kue ini, permukaan renyahnya memberikan kontras menarik dengan lapisan dalam yang lembut dan padat. Rasa manis gula kelapa yang karamel dan aroma kelapa yang khas memenuhi mulut Anda, memberikan pengalaman rasa yang menggugah selera.\r\n\r\n', 100000),
('P0007', 'Kue Semprit choffee', '647f6bcd03277.jpg', 'Selamat datang di dunia kelezatan yang memukau dan perpaduan yang menggoda dengan kue Semprit Choffee kami yang istimewa. Kue Semprit Choffee merupakan gabungan sempurna antara cita rasa lezat kue semprit tradisional dengan sentuhan eksotis dan aroma yang memikat dari kopi.\r\n\r\nKue Semprit Choffee kami menghadirkan sensasi yang tak terlupakan di setiap gigitannya. Permukaan luar kue yang renyah dan rapuh memberikan kepuasan pada lidah, sementara di dalamnya tersimpan rahasia kelezatan yang mengejutkan. Kombinasi manis dan gurih dari kue semprit yang lembut dan rasa kopi yang kaya dan aromatik menciptakan pengalaman rasa yang luar biasa.', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_order` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `kode_customer` varchar(200) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_pos` varchar(200) NOT NULL,
  `terima` varchar(200) NOT NULL,
  `tolak` varchar(200) NOT NULL,
  `cek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_order`, `invoice`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`, `STATUS`, `tanggal`, `provinsi`, `kota`, `alamat`, `kode_pos`, `terima`, `tolak`, `cek`) VALUES
(8, 'INV0001', 'C0002', 'P0003', 'Kue tart coklat', 1, 100000, 'Pesanan Baru', '2023-03-21', 'Sumatra Utara', 'Nias', 'Jl.Telaumbanua', '60129', '1', '0', 0),
(14, 'INV0002', 'C0003', 'P0002', 'Kue Salju', 1, 100000, '0', '2023-06-06', 'Sumatra Utara', 'Balige', 'balige', '22312', '1', '0', 0),
(15, 'INV0003', 'C0003', 'P0003', 'Kue tart coklat', 1, 80000, 'PESANAN BARU', '2023-06-06', 'Sumatra Utara', 'Balige', 'balige', '22312', '2', '1', 0),
(16, 'INV0004', 'C0003', 'P0002', 'Kue Salju', 1, 100000, 'PESANAN BARU', '2023-06-06', 'Sumatra Utara', 'Balige', 'ASA', '22312', '2', '1', 0),
(17, 'INV0004', 'C0003', 'P0001', 'Kue Nastar', 1, 100000, 'PESANAN BARU', '2023-06-06', 'Sumatra Utara', 'Balige', 'ASA', '22312', '2', '1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teks_promo`
--

CREATE TABLE `teks_promo` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teks_promo`
--

INSERT INTO `teks_promo` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Teks promo', 'Selamat Datang di JoFe Bakery - Rasakan Sensasi Istimewa!\r\n<br><br> Kami menghadirkan sensasi manis yang luar biasa dengan kue-kue unik dan lezat yang dibuat dengan menggunakan bahan premium. Kunjungi toko kami dan nikmati pengalaman tak terlupakan dalam kelezatan kue-kue dari JoFe Bakery. Tersedia juga layanan pemesanan online untuk memudahkan Anda dalam memesan kue-kue istimewa kami. Mari buat momen spesialmu semakin istimewa dengan kelezatan dari JoFe Bakery!');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `teks_promo`
--
ALTER TABLE `teks_promo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `teks_promo`
--
ALTER TABLE `teks_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
