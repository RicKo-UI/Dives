-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 05:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dives`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisprogram`
--

CREATE TABLE `tb_jenisprogram` (
  `id_jenisprogram` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenisprogram`
--

INSERT INTO `tb_jenisprogram` (`id_jenisprogram`, `nama_jenis`) VALUES
(1, 'Webinar'),
(2, 'Bootcamp'),
(3, 'Internship'),
(4, 'Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id_program` int(11) NOT NULL,
  `judul_program` varchar(255) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `id_jenisprogram` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `biaya` varchar(25) NOT NULL,
  `kuota` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `judul_program`, `penyelenggara`, `id_jenisprogram`, `deskripsi`, `lokasi`, `tanggal_mulai`, `jam`, `biaya`, `kuota`, `gambar`) VALUES
(14, 'Workshop Improving Confidence', 'Meity Piris, S.Sos', 4, 'Workshop ini mengajak milenial untuk mengikuti pelatihan teori dan praktek untuk meningkatkan rasa percaya diri dalam berkomunikasi secara profesional untuk menyampaikan gagasan ataupun presentasi dengan baik dan mengesankan, dibekali dengan berbagai tips improving confidence', 'Online', '2023-01-19', '13.00-15.00', 'Gratis', 17, '489-Workhop improving.png'),
(16, 'Workshop Content Creator', 'Fakultas Agama Islam Unwahas', 4, 'Workshop berisi mengenai pelatihan teori dan praktek untuk para milenial yang ingin menjadi seorang content creator, dengan memberikan berbagai tips bagaimana cara mendapatkan ratusan juta rupiah dari content youtube dan tiktok.', 'Online', '2023-01-31', '10.00 - Selesai', 'Gratis', 47, '893-workshop content creator.png'),
(17, 'Internship Art Designer', 'Suara Surabaya', 3, 'Internship Art Designer memberikan pengalaman bagi para mahasiswa untuk mengembangkan serta mengasah kreativitasnya di bidang design.', 'Jl. Wonokitri Besar 40 C, Surabaya', '2023-02-02', '07.00', 'Gratis', 98, '226-Intern art designer.png'),
(18, 'Human Resource Information System', 'Wismilak', 3, 'Human ReSource Information System Internship mengajak para mahasiswa untuk menambah berbagai pengalaman serta mengembangkan pengetahuannya dalam mengoperasikan komputer serta bahasa pemrograman', 'Online', '2023-01-28', '10.00', 'Gratis', 49, '707-Intern human resource.png'),
(19, 'Professional Data Science Intensive Bootcamp', 'Olivia Natasha', 2, 'Professional Data Science Intensive Bootcamp memberikan berbagai pelatihan dibidang data Science untuk menciptakan para milenial muda untuk  menjadi seorang data Science professional dengan dibekali berbagai ilmu statistica, bahasa pemrograman python, pandas exploratory, serta Basic machine learning', 'Online', '2023-02-03', '07.00-09.00', 'Gratis', 200, '186-Bootcamp data science.png'),
(20, 'Bootcamp Leadership', 'Kampuskoe', 2, 'Bootcamp Leadership menciptakan para milenial muda untuk menjadi pemimpin yang handal dan komunikatif, dengan dibekali berbagai ilmu mengenai kepemimpinan dan organisasi sehingga dapat menumbuhkan jiwa Leadership bagi para milenial muda', 'Online', '2023-01-30', '09:00', 'Rp 34.000', 98, '387-Bootcamp leadership.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_pendaftar` varchar(55) NOT NULL,
  `no_wa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_program`, `nama_pendaftar`, `no_wa`) VALUES
(21, 14, 'juan', '1234'),
(23, 14, 'test', '8765'),
(24, 16, 'juan', '0987'),
(25, 16, 'test', '8790'),
(26, 20, 'ere', '8799'),
(27, 20, 'hayu', '1234'),
(28, 17, 'juan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `institusi`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'juan', 'itts', 'juan@gmail.com', 'juan', 'user'),
(3, 'test', 'test', 'test@gmail.com', 'test', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenisprogram`
--
ALTER TABLE `tb_jenisprogram`
  ADD PRIMARY KEY (`id_jenisprogram`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `id_jenisprogram` (`id_jenisprogram`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenisprogram`
--
ALTER TABLE `tb_jenisprogram`
  MODIFY `id_jenisprogram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD CONSTRAINT `tb_program_ibfk_1` FOREIGN KEY (`id_jenisprogram`) REFERENCES `tb_jenisprogram` (`id_jenisprogram`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
