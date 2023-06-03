-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Waktu pembuatan: 03 Jun 2023 pada 04.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `email`) VALUES
('Assyifa_hanum', 'syifa', 'Assyifa Rasida Hanum', 'Assyifahanum@student.ub.ac.id'),
('salwaacc', 'salwa', 'Salwa Cahyani Putri', 'salwacahyani@student.ub.ac.id'),
('shrla_adn', 'sherla', 'Sherla Puspa', 'sherlapuspa0@student.ub.ac.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbrg_keluar`
--

CREATE TABLE `sbrg_keluar` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sbrg_keluar`
--

INSERT INTO `sbrg_keluar` (`id`, `idx`, `tgl`, `jumlah`, `penerima`, `keterangan`) VALUES
(15, 244, '2020-08-29', 1000, 'Kasmina', 'Laku'),
(16, 246, '2023-06-01', 30, 'Bp. Sentot', 'Sedang di kemas'),
(17, 247, '2023-06-03', 1, 'Bp. Sentot', 'Sedang di kemas'),
(18, 248, '2023-06-03', 20, 'Bp. Sentot', 'Sedang di kemas'),
(19, 250, '2023-06-02', 10, 'Bp. Agus', 'Sedang dikirim'),
(20, 253, '2023-06-03', 20, 'Bp. Galih', 'Sedang di kemas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbrg_masuk`
--

CREATE TABLE `sbrg_masuk` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sbrg_masuk`
--

INSERT INTO `sbrg_masuk` (`id`, `idx`, `tgl`, `jumlah`, `keterangan`) VALUES
(9, 244, '2020-08-07', 600, 'kk'),
(13, 245, '2023-06-02', 15, 'Sudah masuk'),
(14, 247, '2023-06-02', 1, 'Sedang di kemas'),
(21, 248, '2023-06-02', 100, 'Sudah masuk'),
(20, 251, '2023-06-02', 100, 'Sudah masuk'),
(22, 250, '2023-06-02', 150, 'Sudah masuk'),
(23, 251, '2023-06-02', 200, 'Sudah masuk'),
(24, 248, '2023-06-02', 50, 'Sudah masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sstock_brg`
--

CREATE TABLE `sstock_brg` (
  `idx` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stock` int(12) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `lokasi` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sstock_brg`
--

INSERT INTO `sstock_brg` (`idx`, `nama`, `jenis`, `merk`, `ukuran`, `stock`, `satuan`, `lokasi`) VALUES
(250, 'Aqua Galon Refill', 'Minuman', 'AQUA', '19 L', 190, 'Buah', 'Gudang B'),
(254, 'Bango Kecap Manis', 'Makanan', 'BANGO', '520 mL', 50, 'Buah', 'Gudang A'),
(248, 'Cheetos BBQ', 'Makanan', 'CHEETOS', '18 g', 180, 'Dus', 'Gudang B'),
(251, 'Indomie Mi Goreng Cabe Ijo Flavour', 'Makanan', 'INDOMIE', '85 g', 400, 'Dus', 'Gudang A'),
(253, 'Indomie Tori Miso', 'Makanan', 'INDOMIE', '86  g', 130, 'Dus', 'Gudang B'),
(255, 'Sunlight Pencuci Piring Jeruk Nipis', 'Home & Living', 'SUNLIGHT', '650 mL', 30, 'Dus', 'Gudang B'),
(256, 'Ekonomi Pencuci Piring Power Liquid Sereh', 'Home & Living', 'EKONOMI', '650 mL', 20, 'Dus', 'Gudang A'),
(257, 'Chi Forest Sparkling Water White Peach', 'Minuman', 'CHI FOREST', '480 mL', 20, 'Buah', 'Gudang B'),
(258, 'Samyang Mie Instant Goreng Pedas Ayam', 'Makanan', 'SAMYANG', '140 g', 75, 'Buah', 'Gudang B'),
(259, 'Ponds Pembersih Wajah White Beauty ', 'Kesehatan & Kecantikan', 'PONDS', '100 g', 25, 'Buah', 'Gudang B'),
(260, 'Fanta Soft Drink Strawberry', 'Minuman', 'FANTA', '1500 mL', 30, 'Buah', 'Gudang A'),
(261, 'Campina Ice Cream Cashew Nut ', 'Produk Segar', 'CAMPINA', '90 mL', 35, 'Buah', 'Gudang A'),
(262, 'Beng-Beng Wafer Chocolate Share It ', 'Makanan', 'BENG-BENG', '30 pcs', 50, 'Buah', 'Gudang B'),
(263, 'Downy Softener Mystique', 'Home & Living', 'DOWNY', '850 mL', 20, 'Dus', 'Gudang A'),
(264, 'Marjan Syrup Cocopandan', 'Minuman', 'MARJAN', '460 mL', 20, 'Dus', 'Gudang A'),
(265, 'Gulaku Gula Tebu (Putih) Premium', 'Makanan', 'GULAKU', '1000 g', 25, 'Dus', 'Gudang A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sstock_brg`
--
ALTER TABLE `sstock_brg`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `sstock_brg`
--
ALTER TABLE `sstock_brg`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
