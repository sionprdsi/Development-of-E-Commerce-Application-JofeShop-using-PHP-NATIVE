-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 19 Jun 2023 pada 16.32
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
(1, 'Foto Owner - Copy - Copy - Copy (2) - Copy - Copy - Copy - Copy.jpg', 'Pada tahun 2015, saya tinggal di sebuah rumah kecil yang terletak di Jl. Dr. Td. Pardede NO.14, Komplek PLN Balige, Kabupaten Toba, Sumatra Utara. Sebagai seorang ibu rumah tangga bernama Fery Hartatina Hulu, saya memiliki keinginan yang kuat untuk mengubah hobi memasak menjadi sesuatu yang lebih. Saya selalu menikmati momen di dapur, menciptakan kue-kue kering lezat untuk keluarga dan teman-teman. Suatu hari, saya merasa bahwa bakat dan keahlian memasak saya dapat dibagikan dengan lebih banyak orang.<br><br>\r\n\r\nDengan semangat yang membara, suami saya, Jonson Pardosi, selalu mendorong dan mendukung saya. Bersama-sama, kami memutuskan untuk memulai usaha kecil di bidang makanan kering. Itulah awal dari impian kami. Kami sepakat untuk memberikan nama Jofe Bakery untuk usaha ini. Nama tersebut merupakan gabungan dari nama Fery (Jo) dan Jonson (Fe), yang mencerminkan kerjasama dan dedikasi kami sebagai pasangan suami-istri dalam menjalankan usaha kecil ini, yang dimulai di dapur sederhana kami.<br><br>\r\n\r\nAwalnya, saya hanya membuat pesanan kecil untuk keluarga, tetangga, dan teman-teman. Namun, kabar tentang kue-kue kering istimewa yang saya buat mulai menyebar. Orang-orang mulai mendengar tentang Jofe Bakery dan kelezatan produk kami. Melihat bahwa penawaran makanan kering di sekitar kami masih kurang, saya memutuskan untuk menggunakan waktu luang saya untuk membuat beberapa jenis kue kering untuk dijual. Pada awalnya, Jofe Bakery hanya menawarkan tiga jenis produk, seperti Kue Nastar, Kue Bangkit, dan Kue Kacang.<br><br>\r\n\r\nNamun, dengan semangat dan konsistensi dalam menghadirkan cita rasa yang istimewa, Jofe Bakery mulai menarik perhatian pelanggan. Keunikan dan kelezatan produk kami membuat pelanggan setia datang kembali berulang kali. Seiring berjalannya waktu, kami mulai meluaskan jangkauan produk dengan menambahkan berbagai macam roti dan kue lainnya. Jofe Bakery semakin dikenal di komunitas sekitar. Pelanggan setia terus datang kembali untuk menikmati kue-kue kering lezat yang disajikan dengan cinta dan dedikasi oleh saya dan tim kami.<br><br>\r\n\r\nSebagai bentuk identitas yang kuat, Jofe Bakery memiliki logo yang sangat berarti bagi kami. Logo tersebut adalah gambar angsa emas, yang memiliki makna simbolis yang kaya. Angsa emas melambangkan keanggunan dan keindahan dalam produk dan layanan yang kami tawarkan. Hal ini menunjukkan komitmen Jofe Bakery untuk memberikan kualitas terbaik dan cita rasa yang memukau kepada pelanggan kami. Meskipun telah beroperasi selama lebih dari 13 tahun, kami tetap menjaga kualitas dan cita rasa yang konsisten. Keunggulan kami dalam hal cita rasa membuat kami menjadi pilihan utama bagi banyak pelanggan setia.<br><br>\r\n\r\nNamun, kami tidak puas hanya dengan kesuksesan yang telah kami raih. Saya, Ibu Fery, suami saya Jonson Pardosi, dan tim kami memiliki harapan dan mimpi yang lebih besar. Kami ingin Jofe Bakery dikenal tidak hanya di Kabupaten Toba, tetapi juga di luar kabupaten tersebut. Untuk mencapai tujuan ini, kami menyadari pentingnya memiliki toko fisik dan website resmi yang dapat memberikan informasi lebih lengkap tentang produk kami.<br><br>');

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
  `status` int(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama`, `email`, `username`, `password`, `telp`, `status`) VALUES
('C0002', 'Sion P', 'spardosi12@gmail.com', 'sion', 'sion123', '082278900178', 1),
('C0003', 'sion pardosi', 'sio212n@gmail.com', 'sion pardosi', '$2y$10$fkGC9EqyiDDyNK/kOEQMY.G4LJMpsE3LE8dOKa4TZad1jaNGb6Z8W', '08227890127', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `invoice` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `harga_detail_pesanan` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`) VALUES
(1, 'C0002', 'P0001', 'Kue Nastar', 2, 140000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `invoice` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `status` enum('Pesanan Baru','Pesanan Diterima','Pesanan Ditolak') DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `harga_total_pesanan` float DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `kode_customer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`invoice`, `tanggal`, `alamat`, `kota`, `kode_pos`, `status`, `provinsi`, `harga_total_pesanan`, `id`, `kode_customer`) VALUES
(1, '2023-03-21', 'Jl.Telaumbanua', 'Nias', 60129, 'Pesanan Baru', 'Sumatra Utara', 100000, 1, 'C0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_keranjang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama`, `image`, `deskripsi`, `harga`, `id`, `id_keranjang`) VALUES
('P0001', 'Kue Nastar', '64906277b8c1c.jpg', 'Kue Nastar adalah kue kering yang terkenal dan populer dalam budaya kuliner Indonesia. Kue ini terbuat dari adonan kue yang lembut dan renyah dengan isian selai nanas di tengahnya. Nastar memiliki cita rasa manis dan asam yang seimbang, menjadikannya pilihan yang sempurna untuk menemani momen santai atau acara spesial.\r\n\r\nDengan bentuk bulat kecil yang khas, kue Nastar memiliki tampilan yang menggugah selera. Bagian luar kue yang renyah memberikan sensasi gigitan yang memuaskan, sementara selai nanas di tengahnya memberikan kelembutan dan rasa segar yang menyegarkan lidah.\r\n\r\nKue Nastar sering kali menjadi favorit di berbagai acara seperti Lebaran, Natal, atau perayaan lainnya. Rasanya yang lezat dan teksturnya yang menggoda membuatnya menjadi hidangan yang sulit ditolak oleh siapa pun. ', 140000, 1, 1),
('P0002', 'Kue tart coklat', 'Kue Coklat.jpg', 'Kue tart coklat kami menggoda selera dengan kulit tart yang renyah dan menggigit, memberikan fondasi yang sempurna untuk lapisan-lapisan coklat yang memukau. Dari permukaan yang mengkilap hingga ke dalam setiap lapisannya, aroma coklat yang kaya dan menggugah selera mengisi ruangan begitu kue ini dipotong.\r\n\r\nLembutnya tekstur kue tart coklat ini seimbang dengan kekuatan rasa coklat yang intens. Setiap gigitan adalah perpaduan sempurna antara kenikmatan lezat dan kekayaan coklat yang memanjakan lidah Anda. Sensasi melumerkan kue tart ini di mulut akan menghadirkan ledakan rasa yang memikat, memenuhi setiap indera dengan kepuasan yang tak tertandingi.', 100000, 1, 1),
('P0003', 'Kue Salju', '6490625e62a84.jpg', 'Selamat datang di dunia yang menakjubkan di mana kelezatan bertemu dengan keanggunan, dan di tengahnya ada kue Salju yang memukau. Kue Salju kami adalah simbol keindahan dan kelembutan, menawarkan pengalaman yang menakjubkan bagi para pecinta kue.\r\n\r\nDengan lapisan gula halus yang menyerupai salju yang baru turun dari langit, kue ini memberikan kepuasan visual sebelum Anda merasakan kelezatan di mulut Anda. Ketika Anda memasukkan kue Salju yang rapuh ke dalam mulut Anda, ia meleleh dengan lembut seperti salju yang mencair di lidah Anda, menghadirkan sensasi yang luar biasa.\r\n\r\nRahasia utama dari kue Salju kami adalah teksturnya yang lembut dan rapuh sekaligus. Dalam setiap gigitan, Anda akan merasakan kelembutan yang lezat dan kemudian merasakan kegembiraan saat kue tersebut hancur dan meleleh di mulut Anda. Ia memberikan sensasi yang menyenangkan saat menggigitnya, dengan rasa yang begitu memikat.', 100000, 1, 1),
('P0004', 'Kue Semprit Strawbarry', '6490629101310.jpg', 'Kue Semprit Strawberry kami memukau indera dengan tampilannya yang menarik dan menggoda selera. Dengan bentuk yang khas dari kue semprit, setiap gigitan menghadirkan kepuasan visual dan rasa yang menggugah selera. Permukaan kue yang halus dengan warna merah muda yang menggoda akan membuat Anda tergoda untuk mencicipinya.\r\n\r\nRahasia kelezatan kue Semprit Strawberry kami terletak pada penggunaan buah strawberry segar dan berkualitas tinggi. Kami menggunakan potongan-potongan strawberry yang dipadatkan di dalam adonan kue, memberikan aroma dan rasa yang menyegarkan. Setiap gigitan akan memanjakan lidah Anda dengan kombinasi manis dan asam yang sempurna.\r\n\r\nTekstur kue Semprit Strawberry ini sangat lembut dan rapuh, hampir mencair di mulut. Ketika Anda menggigitnya, kue tersebut berpadu dengan potongan-potongan strawberry yang lezat, memberikan sensasi yang memuaskan di setiap gigitan. Kelembutan kue semprit ini melengkapi kelezatan buah strawberry yang segar, menciptakan harmoni rasa yang tak terlupakan.', 100000, 1, 1),
('P0005', 'Kue Sagon Bakar', '6490629dda0c3.jpg', 'Kue Sagon Bakar kami memukau indera dengan tampilannya yang menarik dan menggoda selera. Dengan lapisan luar yang renyah dan berwarna kecokelatan yang terbentuk saat dipanggang, kue ini menjanjikan kenikmatan di setiap gigitannya. Tampilan yang menggugah selera ini memberikan petunjuk tentang kelezatan yang ada di dalamnya.\r\n\r\nRahasia sejati dari kue Sagon Bakar kami terletak pada tekstur yang unik dan rasa yang lezat. Ketika Anda menggigit kue ini, permukaan renyahnya memberikan kontras menarik dengan lapisan dalam yang lembut dan padat. Rasa manis gula kelapa yang karamel dan aroma kelapa yang khas memenuhi mulut Anda, memberikan pengalaman rasa yang menggugah selera.\r\n\r\n', 100000, 1, 1),
('P0006', 'Kue Semprit choffee', '649062a732124.jpg', 'Selamat datang di dunia kelezatan yang memukau dan perpaduan yang menggoda dengan kue Semprit Choffee kami yang istimewa. Kue Semprit Choffee merupakan gabungan sempurna antara cita rasa lezat kue semprit tradisional dengan sentuhan eksotis dan aroma yang memikat dari kopi.\r\n\r\nKue Semprit Choffee kami menghadirkan sensasi yang tak terlupakan di setiap gigitannya. Permukaan luar kue yang renyah dan rapuh memberikan kepuasan pada lidah, sementara di dalamnya tersimpan rahasia kelezatan yang mengejutkan. Kombinasi manis dan gurih dari kue semprit yang lembut dan rasa kopi yang kaya dan aromatik menciptakan pengalaman rasa yang luar biasa.', 100000, 1, 1),
('P0007', 'Kue bangkit', '6490630232698.jpg', 'Kue Bangkit adalah salah satu jenis kue kering tradisional yang berasal dari Indonesia, terutama populer di daerah Jawa. Kue ini memiliki tekstur yang ringan, renyah di luar, dan lembut di dalam. Kue Bangkit memiliki bentuk yang unik dengan ciri khas adonan yang \"bangkit\" ketika dipanggang, membentuk lapisan yang renyah di bagian luar.\r\n\r\nKue Bangkit terbuat dari bahan dasar yang sederhana namun menghasilkan cita rasa yang lezat. Adonan kue ini biasanya terdiri dari tepung kanji (tepung tapioka), kelapa parut, telur, gula, dan sedikit garam. Kue ini juga sering diberi aroma vanila atau pandan untuk memberikan aroma yang harum dan menambah kenikmatan saat dinikmati.', 100000, 1, 1),
('P0008', 'Kue Kacang', '6490631bbab34.jpg', 'Selamat datang di dunia kelezatan yang kaya dan menggugah selera dengan kue kacang kami yang istimewa. Kue kacang kami adalah perpaduan sempurna antara rasa gurih kacang dan kelembutan tekstur yang menghadirkan kenikmatan tiada tara di setiap gigitan.\r\n\r\nKue kacang kami memiliki sentuhan yang khas, dengan adonan yang dibuat dengan hati-hati dan diisi dengan kacang yang dipanggang dengan sempurna. Ketika Anda menggigit kue ini, kelezatan kacang yang renyah dan gurih segera memenuhi lidah Anda, memberikan sensasi yang memikat.\r\n\r\nRahasia sejati dari kue kacang kami adalah keseimbangan yang sempurna antara manis dan gurih. Gula halus yang menempel di permukaan kue memberikan sentuhan manis yang menggoda, sementara rasa kacang yang kaya dan gurih memberikan dimensi yang lebih dalam pada rasa.', 120000, 1, 1),
('P0009', 'Kue Love aren', '649063581e65f.jpg', 'Kue Love Aren adalah sejenis kue tradisional yang berasal dari Indonesia, khususnya dari daerah Jawa Tengah. Kue ini memiliki bentuk yang unik dan menarik, dengan ciri khasnya berupa dua bagian kue yang saling berdekatan dan terlihat seperti hati yang sedang berpelukan, sehingga memberikan nama \"Love Aren\" yang berarti \"Cinta Aren\".\r\n\r\nKue Love Aren terbuat dari bahan dasar utama yang menggunakan bahan alami, yaitu tepung ketan, gula aren, dan kelapa parut. Tepung ketan diolah menjadi adonan yang lembut dan kenyal, sedangkan gula aren memberikan cita rasa manis yang khas dan kelapa parut memberikan kelembutan serta aroma yang menggugah selera.', 110000, 1, 1),
('P0010', 'Kue Stick cokelat', '64906376e99bf.jpg', 'Kue Stick Cokelat adalah kue kering yang menggoda dengan cita rasa dan aroma cokelat yang lezat. Kue ini memiliki bentuk yang panjang dan pipih, mirip dengan sebatang stik atau batang kecil, yang memberikan nama \"Stick Cokelat\".\r\n\r\nKue Stick Cokelat terbuat dari bahan-bahan yang umumnya digunakan dalam pembuatan kue, seperti tepung terigu, gula, mentega, telur, dan tentu saja, bubuk kakao yang memberikan rasa cokelat yang kaya. Bahan-bahan ini diolah menjadi adonan yang kental dan kemudian dipanggang hingga matang.', 100000, 1, 1),
('P0011', 'Kue Chococips', '6490639b9cf4b.jpg', 'Kue Chocochips adalah kue kering yang terkenal dengan tambahan chocochips yang lezat. Kue ini memiliki tekstur yang renyah di luar dan lembut di dalam, serta dihiasi dengan chocochips yang meleleh di mulut. Kue Chocochips adalah pilihan yang sempurna bagi pecinta cokelat dan kue kering yang ingin menikmati kombinasi yang memikat.\r\n\r\nKue Chocochips terbuat dari bahan-bahan seperti tepung terigu, mentega, gula, telur, dan tentu saja, chocochips yang memberikan sentuhan cokelat yang khas. Adonan kue dikombinasikan dengan chocochips yang melimpah sehingga setiap gigitan akan memberikan kelezatan dari cokelat yang meleleh di dalam mulut.', 100000, 1, 1),
('P0012', 'Kue Bola cokelat', '649063b9e75f2.jpg', 'Kue Bola Cokelat adalah kue kering yang memikat dengan cita rasa cokelat yang menggoda. Kue ini memiliki bentuk bulat yang mirip dengan bola kecil, memberikan tampilan yang menggemaskan dan mengundang selera. Rasanya yang lezat dan teksturnya yang lembut membuatnya menjadi pilihan yang sempurna untuk para pecinta cokelat.\r\n\r\nKue Bola Cokelat terbuat dari bahan-bahan yang umumnya digunakan dalam pembuatan kue, seperti tepung terigu, cokelat bubuk, gula, mentega, dan telur. Adonan kue ini diolah dengan hati-hati dan kemudian dibentuk menjadi bola-bola kecil yang kemudian dipanggang hingga matang.\r\n\r\nKetika Anda menggigit Kue Bola Cokelat, Anda akan merasakan kelezatan cokelat yang kaya dan tekstur yang lembut di dalamnya. Kue ini sering diberi tambahan hiasan seperti gula halus atau cokelat serut di permukaannya untuk memberikan sentuhan dekoratif.', 100000, 1, 1),
('P0013', 'Kue Kacang karamel ', '649063d7f0256.jpg', 'Kue Kacang Karamel adalah kue kering yang menggoda dengan kombinasi antara kacang dan karamel yang lezat. Kue ini memiliki rasa manis, gurih, dan renyah yang membuatnya menjadi camilan yang disukai oleh banyak orang.\r\n\r\nKue Kacang Karamel terbuat dari bahan-bahan utama seperti kacang, gula, mentega, dan sedikit garam. Kacang yang biasanya digunakan adalah kacang tanah atau kacang almond, yang memberikan tekstur gurih dan renyah pada kue. Sedangkan karamel terbuat dari pemanisan gula yang dimasak hingga berwarna kecokelatan dan memberikan cita rasa manis yang khas.', 100000, 1, 1);

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
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`invoice`,`kode_produk`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `id` (`id`),
  ADD KEY `kode_customer` (`kode_customer`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `image` (`image`) USING HASH,
  ADD KEY `id` (`id`),
  ADD KEY `id_keranjang` (`id_keranjang`);

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
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `teks_promo`
--
ALTER TABLE `teks_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`invoice`) REFERENCES `pemesanan` (`invoice`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
