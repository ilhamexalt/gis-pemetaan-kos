-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2022 pada 04.32
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `ID` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `photo` varchar(250) DEFAULT 'pdg.jpg',
  `description` text DEFAULT NULL,
  `image` varchar(225) NOT NULL,
  `fasilitas` varchar(225) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `pemilik` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`ID`, `name`, `latitude`, `longitude`, `address`, `kecamatan`, `photo`, `description`, `image`, `fasilitas`, `harga`, `telp`, `pemilik`, `id_user`) VALUES
(87, 'Kost Exlusif Tegalpadang', '-6.127594175892725', '106.10845413959197', 'Jl. Salak, Drangong. Kota Serang, Banten', 'Taktakan', 'pdg.jpg', '-', 'img_1645939027.jpeg', '-', 900000, '-', 'Kosan Ayu 1', 35),
(88, 'Kost Griya Pelangi', '-6.13441908974896', '106.11335705060003', 'Jl. Gandaria Drangong Kota Serang Banten', 'Taktakan', 'pdg.jpg', '-', 'img_1645939385.jpeg', '-', 1300000, '-', 'Kosan Ayu 2', 36),
(89, 'Kost H.Lili', '-6.130009057161374', '106.10726607654351', 'Jl. Taktakan Komp, Makmur Jaya, Desa Drangong', 'Taktakan', 'pdg.jpg', '-', 'img_1645940146.jpeg', '-', 1000000, '0817168796', 'H.Lili', 37),
(90, 'Kosan Indra Ruspiana', '-6.136010807658991', '106.11491595681883', 'Drangong, Kota Serang Banten', 'Taktakan', 'pdg.jpg', '-', 'img_1645940387.jpeg', '-', 600000, '-', 'Indra Ruspiana', 4),
(91, 'Kost Almaira', '-6.117197498030691', '106.17312132283524', 'Jl. Trip Jamaksari, Sumur Pecung', 'Serang', 'pdg.jpg', '-', 'img_1645940498.jpeg', '-', 1000000, '081219333033', 'Kosan Ayu 3', 38),
(92, 'Kost Airilyn Village', '-6.122013074645281', '106.1484006487384', 'Jl.Tb Suwandi Gang TK Al Atfal', 'Serang', 'pdg.jpg', '-', 'img_1645940668.jpeg', 'Ac, Kasur Lemari, Meja', 900000, '0817150484', 'Kosan Ayu 4', 39),
(93, 'Kosan Ayu 5', '-6.120190752860736', '106.14746684760735', 'Jl. Hs Jayadiningrat Kaloran Pena', 'Serang', 'pdg.jpg', '-', 'img_1645940867.jpeg', '-', 600000, '087788737273', 'Kosan Ayu 5', 40),
(94, 'Kost Ibu Aan', '-6.109539429433937', '106.17581040291668', 'Jl. Trip Jamaksari Ciputat Indah', 'Serang', 'pdg.jpg', '-', 'img_1645941075.jpeg', 'Ac, Kasur Lemari', 1000000, '089602780586', 'Kosan Ayu 6', 41),
(95, 'Kost Humaira Putri', '-6.122742078263272', '106.17537598771219', 'Dekat dengan Kampus UIN Ciceri', 'Serang', 'pdg.jpg', '-', 'img_1645941227.jpeg', 'Kamar, Dapur, Kasur, Ruang Tamu, Teras, Kamar Mandi Dalam', 650000, '087871177831', 'Kosan Ayu 7', 42),
(96, 'Kost Pak Kholid', '-6.158318078863516', '106.17339048555391', 'Link Cipocok Tegal', 'Cipocok Jaya', 'pdg.jpg', '-', 'img_1645941592.jpeg', 'Ac, Kasur Kamar Mandi Dalam, Lemari', 900000, '081911031223', 'Pak Kholid', 45),
(97, 'Kost Margawiwitan', '-6.133375930369311', '106.16719278007804', 'Jl. Ki Ajurum, Kota Serang', 'Cipocok Jaya', 'pdg.jpg', '-', 'img_1645941747.jpeg', 'Ac, Kasur, Lemari', 1000000, '-', 'Kosan Ayu 8', 43),
(98, 'Kost Mugi Barokah', '-6.150863265460373', '106.19621559444403', 'Jl. Ciemaas Raya Banjaragung', 'Cipocok Jaya', 'pdg.jpg', '-', 'img_1645941881.jpeg', 'Ac, Kasur, Kamar Mandi Dalam, Lemari.', 950000, '081316474033', 'Kosan Ayu 9', 44),
(99, 'Kost Ungu', '-6.1566476018491585', '106.17898099845098', 'Cipocok Jaya', 'Cipocok Jaya', 'pdg.jpg', '-', 'img_1645942492.jpeg', 'Kasur, Lemari', 650000, '087786798549.', 'Kosan Ayu 10', 46),
(100, 'Kost Lebeng', '-6.165351138658735', '106.1552009880919', 'Jl. Adhayaksa, Tembong', 'Cipocok Jaya', 'pdg.jpg', '-', 'img_1645943375.jpeg', 'Kamar 2, Dapur, Kasur', 800000, '087781770981', 'Kosan Ayu 11', 47),
(101, 'Kosan Ayu 12', '-6.118217377051778', '106.20937127367881', 'Jl. Akses Perum Persada Banten', 'Walantaka', 'pdg.jpg', '-', 'img_1645943540.jpeg', 'Ac, Kasur, Lemari', 950000, '081908203926', 'Kosan Ayu 12', 48),
(102, 'Kost Setor Indah H.Yayat', '-6.140113934707031', '106.23002967991965', 'Kp. Pipitan, Kelurahan Pipitan', 'Walantaka', 'pdg.jpg', '-', 'img_1645943697.jpeg', 'Kasur, Lemari', 650000, '081328683919', 'H. Yayat', 49),
(103, 'Kost Purnama', '-6.11938591151123', '106.10912858329885', 'Jl. Ranca Sawah, Drangong Kota Serang Banten', 'Taktakan', 'pdg.jpg', '-', 'img_1645944125.jpeg', '-', 500000, '-', 'Kosan Ayu 13', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` varchar(225) DEFAULT '1. Admin 2.Pemilik',
  `status` varchar(225) NOT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `email`, `password`, `level`, `status`, `isActive`) VALUES
(3, 'Ayu Purnama Sari', 'admin', 'purnamasaria@gmail.com', 'admin123', '1', 'Admin', 1),
(4, 'Indra Ruspiana', 'indra', 'indra@gmail.com', '010203', '2', 'Pemilik', 1),
(35, 'Kosan Ayu 1', 'kosanayu1', 'kosanayu1@gmail.com', '010203', '2', 'Pemilik', 1),
(36, 'Kosan Ayu 2', 'kosanayu2', 'kosanayu2@gmail.com', '010203', '2', 'Pemilik', 1),
(37, 'H.Lili', 'lili', 'lili@gmail.com', '010203', '2', 'Pemilik', 1),
(38, 'Kosan Ayu 3', 'kosanayu3', 'kosanayu3@gmail.com', '010203', '2', 'Pemilik', 1),
(39, 'Kosan Ayu 4', 'kosanayu4', 'kosanayu4@gmail.com', '010203', '2', 'Pemilik', 1),
(40, 'Kosan Ayu 5', 'kosanayu5', 'kosanayu5@gmail.com', '010203', '2', 'Pemilik', 1),
(41, 'Kosan Ayu 6', 'kosanayu6', 'kosanayu6@gmail.com', '010203', '2', 'Pemilik', 1),
(42, 'Kosan Ayu 7', 'kosanayu7', 'kosanayu7@gmail.com', '010203', '2', 'Pemilik', 1),
(43, 'Kosan Ayu 8', 'kosanayu8', 'kosanayu8@gmail.com', '010203', '2', 'Pemilik', 1),
(44, 'Kosan Ayu 9', 'kosanayu9', 'kosanayu9@gmail.com', '010203', '2', 'Pemilik', 1),
(45, 'Pak Kholid', 'pakkholid', 'pakkholid@gmail.com', '010203', '2', 'Pemilik', 1),
(46, 'Kosan Ayu 10', 'kosanayu10', 'kosanayu10@gmail.com', '010203', '2', 'Pemilik', 1),
(47, 'Kosan Ayu 11', 'kosanayu11', 'kosanayu11@gmail.com', '010203', '2', 'Pemilik', 1),
(48, 'Kosan Ayu 12', 'kosanayu12', 'kosanayu12@gmail.com', '010203', '2', 'Pemilik', 1),
(49, 'H. Yayat', 'yayat', 'yayat@gmail.com', '010203', '2', 'Pemilik', 1),
(50, 'Kosan Ayu 13', 'kosanayu13', 'kosanayu13@gmail.com', '010203', '2', 'Pemilik', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
