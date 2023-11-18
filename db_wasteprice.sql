-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2023 pada 05.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wasteprice`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `no_telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `total_harga` varchar(99) NOT NULL,
  `tanggal_penjualan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_penjualan` varchar(20) DEFAULT 'Belum Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_item`
--

CREATE TABLE `tb_penjualan_item` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `jenis_sampah` varchar(255) NOT NULL,
  `harga_sampah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(99) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `no_telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sampah`
--

CREATE TABLE `tb_sampah` (
  `id_sampah` int(99) NOT NULL,
  `kategori_sampah` varchar(50) NOT NULL,
  `jenis_sampah` varchar(50) NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `harga_sampah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sampah`
--

INSERT INTO `tb_sampah` (`id_sampah`, `kategori_sampah`, `jenis_sampah`, `keterangan`, `harga_sampah`) VALUES
(1, 'plastik', 'air mineral gelas bersih', 'Gelas Plastik kemasan air mineral (warna bening) yang sudah dipotong bibir gelasnya', 5400),
(2, 'plastik', 'ember warna', 'Ember, Botol Oli, Jerigen, abu abu', 2400),
(3, 'plastik', 'tutup botol', 'Tutup botol air minum yang warna selain Hitam', 3600),
(4, 'plastik', 'ember hitam', 'Ember, Jerigen, tutup botol air minum (warna hitam, abu-abu)', 900),
(5, 'plastik', 'gelas minuman (ale-ale)', 'Gelas plastik (berwarna) kemasan minuman', 2600),
(6, 'plastik', 'botol bening bersih', 'Botol Plastik PET kemasan air mineral (Bening + Bening Kebiruan) bebas dari tutup botol', 4000),
(7, 'plastik', 'botol warna bersih', 'Botol Plastik PET kemasan minuman warna\nbiru dan hijau yg bebas dari tutup botol', 1500),
(8, 'plastik', 'plastik kresek', 'Plastik HD lembaran dan kantong plastik kresek, plastik minyak', 500),
(9, 'plastik', 'kerasan', 'Helm,jam dinding, magic com dll', 600),
(10, 'plastik', 'plastik keras bening/kristal', 'Toples kue, kemasan CD/ Kaset (warna putih bening).', 3900),
(11, 'plastik', 'styrofoam bersih', '-', 1900),
(12, 'plastik', 'styrofoam kotor', '-', 900),
(13, 'plastik', 'PVC - 1', 'Pipa paralon, Talang air', 900),
(14, 'plastik', 'nylex', '-', 2000),
(15, 'plastik', 'tutup air galon', 'Tutup Air Galon', 4900),
(16, 'plastik', 'galon utuh/biji', 'Body galon tidak ada yang hilang sebagian', 4800),
(17, 'plastik', 'galon le mineral', 'Body galon tidak ada yang hilang sebagian', 650),
(18, 'plastik', 'CD /DVD/ MP3/ Kaset PS', 'CD/DVD/MP3/ Kaset PS tanpa pembungkus', 3900),
(19, 'plastik', 'karung plastik', 'Karung plastik segala ukuran & tali rapia', 400),
(20, 'plastik', 'plastik bening campur', 'PE, PP,OPP', 1600),
(21, 'plastik', 'plastik minuman campur', 'Aqua Gelas Kotor, Ale, Ale, PET bening,PET Warna', 1500),
(22, 'plastik', 'plastik pouch minyak', '-', 400),
(23, 'plastik', 'bubble wrap bening', 'Bubble Wrap Bening bersih tanpa solasi', 1500),
(24, 'plastik', 'bubble wrap hitam/warna', 'Bubble Wrap bersih tanpa solasi', 1400),
(25, 'kertas', 'arsip', 'HVS, Buku Tulis berbahan HVS tanpa cover', 2800),
(26, 'kertas', 'Tetra pack', 'Kemasan susu, the kotak', 300),
(27, 'kertas', 'paper cup', 'Paper cup harus bersih dan kering', 500),
(28, 'kertas', 'kertas buram', 'Koran, Kertas buram', 900),
(29, 'kertas', 'koran bagus', 'Koran yang masih bagus/ eksemplar', 5800),
(30, 'kertas', 'Dus / Kardus', '-', 1400),
(31, 'kertas', 'kertas campur', 'Arsip, Duplek, Karton, Kertas Buram, dus', 350),
(32, 'kertas', 'duplek telor', 'Egg tray khusus telur ayam (tidak sobek)', 700),
(33, 'kertas', 'Tabloid', 'TABLOID', 1700),
(34, 'kertas', 'Majalah / Duplek / Karton', 'Kertas kemasan makanan, kertas warna', 600),
(35, 'logam', 'Seng', 'Seng Lembaran, Kaleng susu, Kaleng sarden, kaleng bekas pewangi ruangan', 1700),
(36, 'logam', 'Besi', 'Besi, besi berkarat, paku', 2400),
(37, 'logam', 'Alumunium', 'Kaleng alumunium, panci, dll', 9000),
(38, 'logam', 'Tembaga', 'Kawat tembaga', 39000),
(39, 'logam', 'Per Kasur', 'Per bekas kasur', 700),
(40, 'kaca', 'Beling', 'Botol kecil, Pecahan kaca, Gelas, Piring', 200),
(41, 'kaca', 'Botol Kaca', 'Botol kaca, besar, tanpa pecah (satuan)', 400),
(42, 'lain-lain', 'Aki', 'Aki motor dan mobil', 6000),
(43, 'lain-lain', 'Minyak jelantah', 'Minyak yang telah dipakai memasak', 4900);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan_item`
--
ALTER TABLE `tb_penjualan_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_id` (`penjualan_id`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_sampah`
--
ALTER TABLE `tb_sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan_item`
--
ALTER TABLE `tb_penjualan_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sampah`
--
ALTER TABLE `tb_sampah`
  MODIFY `id_sampah` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_penjualan_item`
--
ALTER TABLE `tb_penjualan_item`
  ADD CONSTRAINT `tb_penjualan_item_ibfk_1` FOREIGN KEY (`penjualan_id`) REFERENCES `tb_penjualan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
