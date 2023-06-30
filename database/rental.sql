-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2023 pada 18.47
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2022_10_11_030449_tbl_produk', 1),
(24, '2022_10_12_141735_tbl_sopir', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `no_ref` varchar(20) NOT NULL,
  `no_cus` varchar(20) NOT NULL,
  `nm_cus` varchar(50) NOT NULL,
  `produk` int(11) NOT NULL,
  `sopir` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `no_ref`, `no_cus`, `nm_cus`, `produk`, `sopir`, `jumlah`, `lama_pinjam`, `tgl_pinjam`, `tgl_kembali`, `total`, `created_at`, `updated_at`) VALUES
(5, '1', '1', 'Bahri', 5, 11, 10, 2, '1112-01-01', '1111-11-11', 250000, '2022-12-28 06:34:16', '2022-12-28 06:34:16'),
(6, '2', '2', 'Farel', 6, 10, 20, 2, '1212-12-12', '1212-12-12', 850000, '2022-12-28 07:15:53', '2022-12-28 07:15:53'),
(7, '1234', '5465', 'arul', 5, 10, 2, 2, '2022-01-10', '2022-01-12', 90000, '2023-01-09 20:01:12', '2023-01-09 20:01:12'),
(8, '787', '668', 'fuyfy', 8, 13, 2, 3, '2022-02-11', '2022-05-11', 62000, '2023-01-16 21:33:22', '2023-01-16 21:33:22'),
(9, '6767', '6767', 'tfytf', 6, 10, 4, 6, '2023-01-01', '2023-01-20', 530000, '2023-01-16 21:43:24', '2023-01-16 21:43:24'),
(10, '87978', '656', 'cfyt', 5, 14, 6, 4, '2023-01-02', '2023-01-24', 290000, '2023-01-16 21:44:17', '2023-06-30 09:34:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double(15,8) NOT NULL,
  `stok` int(11) NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nm_produk`, `harga`, `stok`, `ket`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 'Avanzaa', 10000.00000000, 12, 'Bagus', '1672234228_vincentiu-solomon-Z4wF0h47fy8-unsplash.jpg', '2022-12-28 06:30:28', '2023-06-30 09:27:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_sopir` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_sopir` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id`, `kd_sopir`, `nm_sopir`, `nohp`, `gender`, `alamat`, `ket`, `gambar`, `created_at`, `updated_at`) VALUES
(10, '1', 'Pairman', '085761567', 'Laki-Laki', 'Bantaragung', 'Baik', '1672234340_logocic.png', '2022-12-28 06:32:20', '2022-12-28 06:32:20'),
(14, '11', 'joko', '78', 'Laki-Laki', 'aa', 'aa', '1688142832_corinne-kutz-bAo9y8PcLok-unsplash.jpg', '2023-06-30 09:33:52', '2023-06-30 09:33:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Fahrul', 'arul@gmail.com', NULL, '$2y$10$yzu2giFIb1XGKdTKPSluTu8GudAkuijGxTOAcGB5o/WoV0Vf7KxiC', NULL, '2022-12-20 01:19:10', '2022-12-20 01:19:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
