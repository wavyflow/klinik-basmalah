-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Jun 2023 pada 11.52
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_basmalah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id_admin` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$8QOD2tk/ERG5GsEQyYx5FuLQnLPySO0oxqAlMJSGpK65XFYV7n2Hm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdokter`
--

CREATE TABLE `tbdokter` (
  `id_dokter` int NOT NULL,
  `nip_dokter` varchar(20) NOT NULL,
  `nama_dokter` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `spesialis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbdokter`
--

INSERT INTO `tbdokter` (`id_dokter`, `nip_dokter`, `nama_dokter`, `jenis_kelamin`, `alamat`, `no_telp`, `spesialis`) VALUES
(6, '1231', 'Joko Susilo', 'Laki-Laki', 'Sleman', '088217889902', 'Penyakit Dalam'),
(7, '1232', 'Andini Lestari', 'Perempuan', 'Bantul', '088217889902', 'Kulit dan Kelamin'),
(8, '1233', 'Putri Lestari', 'Perempuan', 'Kulon Progo', '088217889902', 'Gizi'),
(9, '1234', 'Anwar', 'Laki-Laki', 'Yogyakarta', '088217889902', 'Gigi dan Mulut'),
(10, '1235', 'Evi Diana', 'Perempuan', 'Magelang', '088217889902', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpasien`
--

CREATE TABLE `tbpasien` (
  `no_rm` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tpt_lahir` varchar(30) NOT NULL,
  `status_pasien` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `keluarga` varchar(40) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jml_kunjungan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpasien`
--

INSERT INTO `tbpasien` (`no_rm`, `no_identitas`, `nama_pasien`, `jenis_kelamin`, `tgl_lahir`, `tpt_lahir`, `status_pasien`, `agama`, `alamat`, `pekerjaan`, `keluarga`, `no_tlp`, `jml_kunjungan`) VALUES
('RM-001', '12345678901', 'Pasien 1', 'Laki-Laki', '2023-06-09', 'Surabaya', 'Belum Kawin', 'Islam', 'Sleman', 'Mahasiswa', 'Puan', '088217204288', 1),
('RM-002', '12345678902', 'Pasien 2', 'Perempuan', '2023-06-09', 'Surabaya', 'Belum Kawin', 'Islam', 'Sleman', 'Mahasiswa', 'Yanto', '088217204288', 1),
('RM-003', '12345678903', 'Pasien 3', 'Laki-Laki', '2023-06-10', 'Pacitan', 'Kawin', 'Kristen', 'Bantul', 'PNS', 'Puan', '088217204288', 1),
('RM-004', '12345678904', 'Pasien 4', 'Laki-Laki', '2023-06-17', 'Pacitan', 'Cerai Hidup', 'Hindu', 'Yogyakarta', 'Wiraswasta', 'Widodo', '088217204288', 2),
('RM-005', '12345678905', 'Pasien 5', 'Perempuan', '2023-06-12', 'Sleman', 'Cerai Hidup', 'Kristen', 'Kulon Progo', 'PNS', 'Suyono', '088217204288', 2),
('RM-100', '7598472594857', 'Firdana', 'Laki-Laki', '2023-06-10', 'Pacitan', 'Belum Kawin', 'Kristen', 'Bantul', 'PNS', 'Subroto', '088217204288', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpendaftaran`
--

CREATE TABLE `tbpendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `antrian` int NOT NULL,
  `no_rm` varchar(8) NOT NULL,
  `jenis_kunjungan` varchar(20) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `jenis_pasien` varchar(20) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `id_poli` int NOT NULL,
  `id_dokter` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpendaftaran`
--

INSERT INTO `tbpendaftaran` (`id_pendaftaran`, `antrian`, `no_rm`, `jenis_kunjungan`, `nama_pasien`, `jenis_pasien`, `tgl_pendaftaran`, `id_poli`, `id_dokter`) VALUES
(44, 1, 'RM-001', 'Umum', 'Pasien 1', 'Pasien Baru', '2023-06-08', 11, 6),
(45, 2, 'RM-002', 'BPJS', 'Pasien 2', 'Pasien Baru', '2023-06-08', 12, 7),
(46, 3, 'RM-003', 'Umum', 'Pasien 3', 'Pasien Baru', '2023-06-08', 13, 8),
(48, 4, 'RM-004', 'BPJS', 'Pasien 4', 'Pasien Lama', '2023-06-08', 14, 9),
(50, 5, 'RM-005', 'Umum', 'Pasien 5', 'Pasien Lama', '2023-06-08', 15, 10),
(52, 6, 'RM-100', 'BPJS', 'Firdana', 'Pasien Lama', '2023-06-09', 14, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpoliklinik`
--

CREATE TABLE `tbpoliklinik` (
  `id_poli` int NOT NULL,
  `nama_poli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpoliklinik`
--

INSERT INTO `tbpoliklinik` (`id_poli`, `nama_poli`) VALUES
(11, 'Penyakit Dalam'),
(12, 'Kulit dan Kelamin'),
(13, 'Gizi'),
(14, 'Gigi dan Mulut'),
(15, 'Umum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indeks untuk tabel `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `tbpendaftaran_ibfk_2` (`id_poli`),
  ADD KEY `tbpendaftaran_ibfk_3` (`no_rm`);

--
-- Indeks untuk tabel `tbpoliklinik`
--
ALTER TABLE `tbpoliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  MODIFY `id_dokter` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbpoliklinik`
--
ALTER TABLE `tbpoliklinik`
  MODIFY `id_poli` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  ADD CONSTRAINT `tbpendaftaran_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `tbpoliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpendaftaran_ibfk_3` FOREIGN KEY (`no_rm`) REFERENCES `tbpasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
