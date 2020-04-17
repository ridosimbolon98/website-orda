-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 11:49 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samosir`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `kategori` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(20) NOT NULL,
  `line` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `status` varchar(200) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `foto` text NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `periode` year(4) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `nama`, `foto`, `jurusan`, `angkatan`, `periode`, `bidang`, `level`) VALUES
(1, 'Agnes F Simbolon', 'agnes.png', 'Kedokteran Umum', 2018, 2019, 'infokom', 'Anggota'),
(2, 'Agnes S Sinaga', 'agnes_sinaga.png', 'Sejarah', 2017, 2019, 'sosial', 'Anggota'),
(3, 'Anita Rumapea', 'anita.png', 'Ilmu Gizi', 2017, 2019, 'Anggota', 'mikat'),
(4, 'Artha Pasaribu', 'artha.png', 'Ilmu Politik', 2017, 2019, 'sosial', 'Anggota'),
(5, 'David Pakpahan', 'david.png', 'Teknik Mesin', 2017, 2019, 'bph', 'Wakil-Ketua'),
(6, 'Ewin Rumapea', 'ewin.png', 'Agribisnis', 2016, 2019, 'mikat', 'Anggota'),
(7, 'Felix', 'felix.png', 'Ilmu Kelautan', 2017, 2019, 'mikat', 'Anggota'),
(8, 'Gunawan Silalahi', 'gunawan.png', 'Teknik Industri', 2016, 2019, 'finansial', 'Anggota'),
(9, 'Indah Sari Sigiro', 'indah.png', 'Biologi', 2016, 2019, 'infokom', 'Anggota'),
(10, 'Irene Sinaga', 'iren.png', 'H. Internasional', 2016, 2019, 'finansial', 'Koordinator'),
(11, 'Irma Sidauruk', 'irma.png', 'MSP', 2017, 2019, 'infokom', 'Anggota'),
(12, 'Rido CM Simbolon', 'rido.png', 'Informatika', 2016, 2019, 'infokom', 'Koordinator'),
(13, 'Irwan Samosir', 'irwan.png', 'Hukum', 2016, 2019, 'sosial', 'Anggota'),
(14, 'Ita N Gultom', 'ita.png', 'Peternakan', 2016, 2019, 'bph', 'Sekretaris'),
(15, 'Julita Tamba', 'julita.png', 'Akuntansi', 2017, 2019, 'sosial', 'Anggota'),
(16, 'Kommi O Sinurat', 'kommi.jpg', 'Manajemen', 2016, 2019, 'bph', 'Ketua'),
(17, 'Krisna Pasaribu', 'krisna.png', 'Akuakultur', 2017, 2019, 'sosial', 'Anggota'),
(18, 'Lauret Simbolon', 'lauret.png', 'T.Lingkungan', 2016, 2019, 'infokom', 'Anggota'),
(19, 'Megawati Munthe', 'mega.png', 'T.PWK', 2017, 2019, 'mikat', 'Anggota'),
(20, 'Meyance Simbolon', 'meyance.png', 'SDA', 2017, 2019, 'sosial', 'Anggota'),
(21, 'Rayuwita Sitanggang', 'rayuwita.png', 'Perikanan', 2016, 2019, 'sosial', 'Anggota'),
(22, 'Rivaldo Manurung', 'rivaldo.png', 'T.PWK', 2018, 2019, 'finansial', 'Anggota'),
(23, 'Riwana Malau', 'riwana.png', 'A.Publik', 2016, 2019, 'mikat', 'Koordinator'),
(24, 'Santa Situmorang', 'santa.png', 'T.Geologi', 2016, 2019, 'finansial', 'Anggota'),
(25, 'Santi C Simbolon', 'santi.png', 'A.Publik', 2016, 2019, 'bph', 'Bendahara'),
(26, 'Tio H Malau', 'tio.png', 'Psikologi', 2016, 2019, 'sosial', 'Koordinator'),
(27, 'Via M Sihole', 'via.png', 'Kimia', 2016, 2019, 'infokom', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'Pengurus Periode 2019', 'Pelantikan Pengurus Baru Periode 2019', 'samosir1.jpg'),
(2, 'Pengurus Periode 2018', 'Pelantikan Pengurus Baru Periode 2018', 'samosir2.jpg'),
(3, 'Serah Terima LPJ Kepengurusan', 'Serah terima LPJ kepengurusan 2017 kepada ketua periode 2018', 'samosir3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya` bigint(13) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `nama`, `deskripsi`, `biaya`, `gambar`) VALUES
(1, 'Dangdang Sedang', 'Dangdang dengan ukuran sedang, bisa digunakan sebagai kukusan.', 20000, 'dangdang.png'),
(2, 'Hasapi', 'Cocok digunakan untuk acara yang berbau adat Batak', 20000, 'hasapi.png'),
(3, 'Sortali Pria', 'Cocok digunakan untuk acara yang berbau adat Batak', 6000, 'sortali_pria.png'),
(4, 'Sortali Wanita', 'Cocok digunakan untuk acara yang berbau adat Batak', 5000, 'sortali_wanita.png'),
(5, 'Tikar Plastik', 'Cocok digunakan untuk acara PD maapun acara lesehan lainnya', 10000, 'tikar.png'),
(6, 'Ulos Sadum dan Ragi Hotang', 'Cocok digunakan untuk acara yang berbau adat Batak', 7000, 'ulos.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
