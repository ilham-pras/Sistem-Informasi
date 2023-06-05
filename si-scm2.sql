-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 17.03
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
-- Database: `si-scm2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `jumlah_bahan` bigint(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `id_supplier`, `nama_bahan`, `keterangan`, `harga_beli`, `jumlah_bahan`, `tgl_masuk`, `created_at`, `updated_at`) VALUES
(1, 2, 'BahanBaku01', 'qwewasdzxc', 10000, 10, '2023-06-04', '2023-06-03 10:31:18', '2023-06-03 10:31:18'),
(2, 4, 'BahanBaku02', 'fhgfh fcjbmcvmcgh', 40000, 20, '2023-06-03', '2023-06-03 10:33:10', '2023-06-03 10:33:10'),
(3, 2, 'qew', 'asd', 1, 2, '2023-06-05', '2023-06-04 22:57:22', '2023-06-04 22:57:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `id_kategori_barang` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_produksi`, `id_kategori_barang`, `image`, `harga_jual`, `status`, `created_at`, `updated_at`) VALUES
(27, 2, 1, '1685947336448.png', 420000, 'Baik', '2023-06-04 23:42:17', '2023-06-05 07:09:20'),
(33, 4, 2, '1685956385356.png', 150000, 'Baik', '2023-06-05 02:13:05', '2023-06-05 02:13:05'),
(34, 1, 1, '1685956414690.png', 860000, 'Baik', '2023-06-05 02:13:34', '2023-06-05 07:10:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_produksi`
--

CREATE TABLE `biaya_produksi` (
  `id_biaya_produksi` bigint(20) UNSIGNED NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `biaya_bahan_baku` bigint(20) NOT NULL,
  `biaya_tenaga_kerja` bigint(20) NOT NULL,
  `biaya_overhead` bigint(20) NOT NULL,
  `total_biaya_produksi` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biaya_produksi`
--

INSERT INTO `biaya_produksi` (`id_biaya_produksi`, `id_produksi`, `biaya_bahan_baku`, `biaya_tenaga_kerja`, `biaya_overhead`, `total_biaya_produksi`, `created_at`, `updated_at`) VALUES
(1, 2, 100, 20, 110, 230, '2023-06-03 12:58:04', '2023-06-03 13:25:59'),
(2, 3, 2500, 1500, 1000, 5000, '2023-06-03 12:59:48', '2023-06-03 13:23:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` bigint(20) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_gudang` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kapasitas` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `id_barang`, `nama_gudang`, `alamat`, `tgl_masuk`, `tgl_keluar`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 34, 'Gudang 01', 'Malang', '2023-05-31', '2023-06-26', 1000, '2023-06-04 02:25:36', '2023-06-04 02:25:36'),
(2, 27, 'Gudang 02', 'Pandaan', '2023-05-09', '2023-06-07', 10000, '2023-06-04 02:28:01', '2023-06-04 02:29:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `nama_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Furniture', 'Merupakan produk olahan kayu berupa barang atau perabot yang digunakan untuk tujuan fungsional atau dekoratif di dalam rumah, kantor, atau tempat lainnya.', '2023-06-05 01:02:56', '2023-06-05 01:28:43'),
(2, 'Kayu Olahan', 'Merupakan produk yang terbuat dari kayu yang telah melalui proses pengolahan dan pemrosesan tertentu. Kayu olahan sering digunakan dalam industri furniture, konstruksi, dan berbagai aplikasi lainnya.', '2023-06-05 01:17:18', '2023-06-05 01:17:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_29_050852_create_suppliers_table', 1),
(6, '2023_05_13_124957_create_bahan_bakus_table', 1),
(7, '2023_05_19_071504_create_produksis_table', 1),
(8, '2023_05_19_140223_create_stok_produksis_table', 1),
(9, '2023_05_19_140301_create_biaya_produksis_table', 1),
(10, '2023_05_19_140543_create_barangs_table', 1),
(11, '2023_05_19_140618_create_stok_barangs_table', 1),
(12, '2023_05_19_140652_create_kategori_barangs_table', 1),
(13, '2023_05_19_140744_create_gudangs_table', 1),
(14, '2023_05_19_140812_create_outlets_table', 1),
(15, '2023_05_19_140856_create_pegawais_table', 1),
(16, '2023_05_19_140936_create_tenaga_kerjas_table', 1),
(17, '2023_06_05_120810_create_penggunas_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` bigint(20) UNSIGNED NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `nama_outlet` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_stok` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `id_gudang`, `nama_outlet`, `alamat`, `email`, `jumlah_stok`, `created_at`, `updated_at`) VALUES
(1, 1, 'Outlet 01', 'Surabaya', 'outlet01@example.com', 1000, '2023-06-05 04:12:13', '2023-06-05 04:24:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_pengguna`, `nama_pegawai`, `jabatan`, `alamat`, `no_hp`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ilham Maulana', NULL, 'Pandaan', '081031160064', 'ilhamadmin@gmail.com', '2023-06-05 06:07:32', '2023-06-05 06:31:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-06-05 05:45:27', '2023-06-05 05:45:27'),
(2, 'Manajer Produksi', '2023-06-05 05:47:27', '2023-06-05 05:47:27'),
(3, 'Manajer Persediaan', '2023-06-05 05:50:06', '2023-06-05 05:50:06'),
(4, 'Staff Produksi', '2023-06-05 05:51:28', '2023-06-05 05:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` bigint(20) UNSIGNED NOT NULL,
  `tgl_produksi` date NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jmlh_bahan` bigint(20) NOT NULL,
  `jmlh_tenaga` bigint(20) NOT NULL,
  `jmlh_produksi` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tgl_produksi`, `nama_barang`, `jmlh_bahan`, `jmlh_tenaga`, `jmlh_produksi`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-06-04', 'Lemari', 25, 10, 8, 'Diproduksi', '2023-06-03 10:48:54', '2023-06-03 10:48:54'),
(2, '2023-06-05', 'Kursi', 40, 10, 20, 'Diproduksi', '2023-06-03 10:49:28', '2023-06-03 10:49:28'),
(3, '2023-06-04', 'Meja', 10, 4, 2, 'Diproduksi', '2023-06-03 10:49:58', '2023-06-03 10:49:58'),
(4, '2023-06-05', 'Kayu Lapis (Plywood)', 100, 20, 160, 'Diproduksi', '2023-06-05 01:46:19', '2023-06-05 01:46:19'),
(5, '2023-06-05', 'Particle Board', 130, 35, 210, 'Diproduksi', '2023-06-05 07:07:48', '2023-06-05 07:07:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok_barang` bigint(20) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_stok` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok_barang`, `id_barang`, `jumlah_stok`, `created_at`, `updated_at`) VALUES
(3, 33, 10000, '2023-06-05 02:15:38', '2023-06-05 02:15:38'),
(6, 27, 100, '2023-06-05 02:30:09', '2023-06-05 02:30:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_produksi`
--

CREATE TABLE `stok_produksi` (
  `id_stok_produksi` bigint(20) UNSIGNED NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `jumlah_stok` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stok_produksi`
--

INSERT INTO `stok_produksi` (`id_stok_produksi`, `id_produksi`, `jumlah_stok`, `created_at`, `updated_at`) VALUES
(1, 1, 40, '2023-06-03 11:01:40', '2023-06-03 11:20:54'),
(2, 3, 1000, '2023-06-03 11:27:49', '2023-06-03 13:27:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Supplier01', 'Malang', 'supplier01@example.com', '2023-06-03 17:06:03', '2023-06-03 17:06:03'),
(2, 'Supplier02', 'Blitar', 'supplier02@example.com', '2023-06-03 17:06:03', '2023-06-03 17:06:03'),
(3, 'Supplier03', 'Pandaan', 'supplier03@example.com', '2023-06-03 17:07:23', '2023-06-03 17:07:23'),
(4, 'Supplier04', 'Gresik', 'supplier04@example.com', '2023-06-03 17:07:23', '2023-06-03 17:07:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kerja`
--

CREATE TABLE `tenaga_kerja` (
  `id_tenaga_kerja` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_tenaga_kerja` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tenaga_kerja`
--

INSERT INTO `tenaga_kerja` (`id_tenaga_kerja`, `id_pengguna`, `nama_tenaga_kerja`, `jabatan`, `alamat`, `no_hp`, `email`, `created_at`, `updated_at`) VALUES
(1, 4, 'Slamet', NULL, 'Malang', '081122224445', 'slametstaff@gmail.com', '2023-06-05 06:29:18', '2023-06-05 06:30:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `biaya_produksi`
--
ALTER TABLE `biaya_produksi`
  ADD PRIMARY KEY (`id_biaya_produksi`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_barang`);

--
-- Indeks untuk tabel `stok_produksi`
--
ALTER TABLE `stok_produksi`
  ADD PRIMARY KEY (`id_stok_produksi`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD PRIMARY KEY (`id_tenaga_kerja`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `biaya_produksi`
--
ALTER TABLE `biaya_produksi`
  MODIFY `id_biaya_produksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `stok_produksi`
--
ALTER TABLE `stok_produksi`
  MODIFY `id_stok_produksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  MODIFY `id_tenaga_kerja` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
