-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2024 pada 08.25
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvproduction`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `produk_id`, `qty`, `pesanan_id`) VALUES
(43, 1, 20, 36),
(44, 2, 20, 36),
(45, 3, 20, 36),
(46, 7, 1, 36),
(47, 1, 20, 37),
(48, 2, 20, 37),
(49, 3, 20, 37),
(50, 7, 1, 37),
(55, 7, 1, 41),
(56, 8, 1, 41),
(64, 2, 30, 46),
(65, 3, 30, 46),
(66, 1, 30, 46),
(68, 2, 30, 48),
(69, 3, 30, 48),
(70, 7, 1, 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_pembayaran`
--

CREATE TABLE `info_pembayaran` (
  `id` int(11) NOT NULL,
  `info` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_pembayaran`
--

INSERT INTO `info_pembayaran` (`id`, `info`) VALUES
(1, 'Silahkan melakukan pembayaran sebelum H-3 tanggal digunakan.\r\nJika tidak maka transaksi akan di batalkan.\r\n\r\nPembayaran Bisa Melalui Rekening Di Bawah Ini:\r\nNama Bank: Bank Central Asia (BCA). \r\nNo. Rek: 4860334157\r\nNama: BURHAN FAQIH SETIYANTO.\r\nKode Bank: 014. \r\n\r\nKemudian lakukan konfirmasi di menu Pembayaran > Bayar > Upload Bukti.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `deskripsi`) VALUES
(6, 'Lontong', ''),
(7, 'Bolu', ''),
(8, 'Combro', ''),
(9, 'Risol', ''),
(10, 'Tahu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(2, 'Cibitung'),
(3, 'Tambun Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('pending','verified','','') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pesanan`, `id_user`, `file`, `total`, `status`, `created_at`) VALUES
(17, 36, 40, '49eb6a44db57cba8d66b3404fa9f0ad4game-balap-terbaik-Android.jpg', 160000, 'verified', '2022-06-29 13:03:49'),
(18, 37, 24, '49eb6a44db57cba8d66b3404fa9f0ad4buktitransfer.jpg', 160000, 'verified', '2022-06-29 21:50:04'),
(19, 41, 24, '49eb6a44db57cba8d66b3404fa9f0ad4google.jpg', 120000, 'verified', '2022-07-10 10:45:16'),
(20, 46, 40, '49eb6a44db57cba8d66b3404fa9f0ad4buktitransfer.jpg', 150000, 'verified', '2022-09-04 15:08:45'),
(21, 48, 24, '49eb6a44db57cba8d66b3404fa9f0ad4buktitransfer.jpg', 150000, 'verified', '2023-12-17 18:16:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_digunakan` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `read` enum('0','1') NOT NULL,
  `status` enum('Lunas','Belum Lunas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal_pesan`, `tanggal_digunakan`, `user_id`, `nama`, `alamat`, `kota`, `ongkir`, `telephone`, `read`, `status`) VALUES
(36, '2022-06-29 07:54:05', '2022-07-10 18:00:00', 40, 'Wahyu', 'Tridaya Sakti', 'Tambun Selatan', 0, '089521875665', '1', 'Lunas'),
(37, '2022-06-29 15:54:14', '2022-07-10 18:00:00', 24, 'Hafidhin', 'Perum Trias Estate Jl. Anggur 4 Blok A7/5', 'Cibitung', 0, '081293487566', '1', 'Lunas'),
(41, '2022-07-10 05:44:50', '2022-07-20 09:00:00', 24, 'Hafidhin', 'Permata Regency', 'Cibitung', 0, '081293487566', '1', 'Lunas'),
(46, '2022-09-04 15:11:16', '2022-09-15 10:00:00', 40, 'Wahyu', 'Tridaya Sakti', 'Cibitung', 0, '089521875665', '1', 'Lunas'),
(48, '2023-12-17 12:12:11', '2023-12-30 18:00:00', 24, 'Hafidhin', 'Perum Trias Estate Jl. Anggur 4 Blok A7/5', 'Cibitung', 0, '081293487566', '1', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kategori_produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `gambar`, `harga`, `kategori_produk_id`) VALUES
(1, 'Lontong Isi Ayam', 'Olahan berbahan dasar nasi yang di dalamnya terdapat olahan kentang, wortel, dan ayam suwir.', 'lontongayam.jfif', '2000', 6),
(2, 'Risol Mayo', 'Makanan tradisional risol yang isiannya ada telur, sosis, dan saus mayo.', 'risolmayo.jfif', '1500', 9),
(3, 'Tahu Isi', 'Olahan tahu goreng crispy yang di dalamnya terdapat olahan kol dan toge.', 'tahuisi.jfif', '1500', 10),
(4, 'Lontong Isi Oncom', 'Olahan berbahan dasar nasi yang di dalamnya terdapat olahan oncom.', 'lontongisioncom.jpg', '2000', 6),
(5, 'Combro', 'Olahan berbahan dasar singkong parut yang diisi dengan olahan oncom.', 'combro.jfif', '1500', 8),
(6, 'Misro', 'Olahan berbahan dasar singkong parut yang diisi dengan gula merah/gula jawa.', 'misro.jfif', '1500', 8),
(7, 'Bolu (Original)', 'Kue berbahan dasar tepung, gula, dan telur yang umumnya dimatangkan dengan cara dipanggang di dalam oven.', 'boluori.jfif', '60000', 7),
(8, 'Bolu Ketan Hitam', 'Kue berbahan dasar tepung ketan hitam, gula, dan telur yang umumnya dimatangkan dengan cara dipanggang di dalam oven.', 'boluketanitem.jfif', '60000', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `telephone`, `alamat`, `password`, `status`) VALUES
(23, 'Hafidhin Wahyu', 'hafidhin@gmail.com', '082112016626', 'Jl. Anggur 4 Blok A7 No.5', '531e70a6745d07a8befbd79e5cc7e4c1', 'admin'),
(24, 'Hafidhin', 'hwd@gmail.com', '081293487566', 'Perum Trias Estate Jl. Anggur 4 Blok A7/5', '531e70a6745d07a8befbd79e5cc7e4c1', 'user'),
(40, 'Wahyu', 'why@gmail.com', '089521875665', 'Tridaya Sakti', '32c9e71e866ecdbc93e497482aa6779f', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`,`produk_id`,`pesanan_id`),
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`,`kategori_produk_id`),
  ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
