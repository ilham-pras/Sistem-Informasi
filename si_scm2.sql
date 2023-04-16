-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2023 pada 12.37
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
-- Database: `si_scm2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `nama_bahan_baku` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_bahan_baku` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `nama_supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_produksi` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_produksi`
--

CREATE TABLE `biaya_produksi` (
  `id_biaya_produksi` varchar(10) NOT NULL,
  `id_produksi` varchar(10) NOT NULL,
  `biaya_bahan_baku` int(11) NOT NULL,
  `biaya_tenaga_kerja` int(11) NOT NULL,
  `biaya_overhead` int(11) NOT NULL,
  `total_biaya_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_barang_masuk` datetime NOT NULL,
  `tgl_barang_keluar` datetime NOT NULL,
  `kapasitas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` varchar(10) NOT NULL,
  `id_gudang` varchar(10) NOT NULL,
  `nama_outlet` varchar(50) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `id_pengguna` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(10) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` varchar(10) NOT NULL,
  `id_bahan_baku` varchar(10) NOT NULL,
  `id_tenaga_kerja` varchar(10) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_bahan_baku` int(11) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `jumlah_tenaga_kerja` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok_barang` int(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_produksi`
--

CREATE TABLE `stok_produksi` (
  `id_stok_produksi` varchar(10) NOT NULL,
  `id_produksi` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kerja`
--

CREATE TABLE `tenaga_kerja` (
  `id_tenaga_kerja` varchar(10) NOT NULL,
  `id_pengguna` varchar(10) NOT NULL,
  `nama_tenaga_kerja` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `biaya_produksi`
--
ALTER TABLE `biaya_produksi`
  ADD PRIMARY KEY (`id_biaya_produksi`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`),
  ADD KEY `id_tenaga_kerja` (`id_tenaga_kerja`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `stok_produksi`
--
ALTER TABLE `stok_produksi`
  ADD PRIMARY KEY (`id_stok_produksi`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD PRIMARY KEY (`id_tenaga_kerja`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_produksi`) REFERENCES `produksi` (`id_produksi`);

--
-- Ketidakleluasaan untuk tabel `biaya_produksi`
--
ALTER TABLE `biaya_produksi`
  ADD CONSTRAINT `biaya_produksi_ibfk_1` FOREIGN KEY (`id_produksi`) REFERENCES `produksi` (`id_produksi`);

--
-- Ketidakleluasaan untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `gudang_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD CONSTRAINT `kategori_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD CONSTRAINT `outlet_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `produksi_ibfk_2` FOREIGN KEY (`id_tenaga_kerja`) REFERENCES `tenaga_kerja` (`id_tenaga_kerja`);

--
-- Ketidakleluasaan untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `stok_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `stok_produksi`
--
ALTER TABLE `stok_produksi`
  ADD CONSTRAINT `stok_produksi_ibfk_1` FOREIGN KEY (`id_produksi`) REFERENCES `produksi` (`id_produksi`);

--
-- Ketidakleluasaan untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD CONSTRAINT `tenaga_kerja_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
