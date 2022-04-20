-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2021 pada 20.44
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17880731__2021projectquiz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` int(20) NOT NULL,
  `uname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuser` enum('0','1','2','') COLLATE utf8_unicode_ci NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `st` enum('0','process','resolved','') COLLATE utf8_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `uname`, `email`, `tuser`, `ts`, `st`, `ket`) VALUES
(8, 'someone', 'someone@email.com', '0', '2021-11-03 23:42:04', '0', '-'),
(9, 'diana', 'diana99@gmail.com', '1', '2021-11-04 02:56:40', '', '-'),
(11, 'luzz', 'luzz@gmail.com', '0', '2021-11-12 07:04:47', '0', '-'),
(13, 'reinald', 'reinald@email.com', '0', '2021-11-21 11:01:53', '', '-'),
(14, 'human', 'human@email.com', '1', '2021-11-21 11:10:00', 'resolved', '-'),
(15, 'siapa_saya', 'unknown@yahoo.com', '', '2021-11-21 16:57:04', '0', '-'),
(16, 'johndoe', 'johnjohn@gmail.com', '0', '2021-11-21 17:29:14', '0', '-'),
(17, 'john_melow', 'melowjohn@gmail.com', '0', '2021-11-21 17:29:43', 'resolved', 'selesai dong'),
(18, 'ini_diana', 'dianayaa@yahoo.com', '0', '2021-11-21 17:30:15', 'process', 'masih ngerjain'),
(19, 'jane_semith', 'janesmth@yahoo.com', '0', '2021-11-21 17:31:09', '0', 'belum mulai'),
(20, 'rollyn_napnap', 'takeanap@yahoo.com', '1', '2021-11-21 17:31:43', '0', 'saya guru'),
(21, 'kevin_lim', 'kevinlim@email.com', '2', '2021-11-21 17:32:27', '0', 'saya admin'),
(22, 'zafran99', 'zafzafrun@yahoo.com', '0', '2021-11-21 17:33:53', '0', 'masih siswa'),
(23, 'celine_helyn', 'celinehe3@gmail.com', '0', '2021-11-21 17:35:35', 'process', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `UNIQUE` (`uname`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
