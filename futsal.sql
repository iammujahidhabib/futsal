-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 13 Apr 2022 pada 15.25
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `writer` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `title`, `date`, `text`, `image`, `writer`, `writer_id`) VALUES
(1, 'Testingggg', '2022-02-04', '<p>This is testing for article.</p>\r\n<p>hope u enjoy it! thank u</p>\r\n<p>This is testing for article.</p>\r\n<p>hope u enjoy it! thank u</p>', 'Screen_Shot_2021-12-28_at_11_46_52_PM.png', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `poster` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL,
  `form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `title`, `desc`, `start`, `end`, `poster`, `place_id`, `form`) VALUES
(1, 'Turnamenttttt', 'Come and Join!', '2022-03-31', '2022-02-13', 'Screen_Shot_2021-12-28_at_11_50_07_PM.png', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `field`
--

INSERT INTO `field` (`id`, `name`, `note`, `photo`, `place_id`) VALUES
(1, 'Sintetis Besar', '', '57621_bmth-vs-coldplay1.jpeg', 2),
(2, 'Sintetis Kecil', '', '57621_bmth-vs-coldplay1.jpeg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gallery` text NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `open` int(5) NOT NULL,
  `close` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `place`
--

INSERT INTO `place` (`id`, `name`, `desc`, `address`, `phone`, `gallery`, `bank`, `bank_account`, `bank_name`, `user_id`, `photo`, `open`, `close`) VALUES
(1, 'Gallery Futsal', 'asdasd asdas\r\n dasd asd asd as', 'Sukabirus, Bandung', '1313213213', 'field.png', 'BCA', '2881727', 'Gallery Futsal', 2, 'field.png', 0, 0),
(2, 'Kick Off Futsal', 'asdasd asdas\r\n dasd asd asd as', 'Sukabirus, Bandung', '1313213213', 'field.png', 'Mandiri', '888271728', 'Kosasih', 4, 'field.png', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `price`
--

INSERT INTO `price` (`id`, `price`, `start`, `end`, `field_id`) VALUES
(1, 70000, 0, 17, 1),
(2, 120000, 18, 23, 1),
(3, 50000, 0, 17, 2),
(4, 90000, 18, 23, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `pay_off` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `bill_file` varchar(255) NOT NULL,
  `rent_bank` varchar(255) NOT NULL,
  `rent_bank_account` varchar(255) NOT NULL,
  `rent_bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rent`
--

INSERT INTO `rent` (`id`, `date`, `start`, `end`, `dp`, `pay_off`, `total`, `status`, `user_id`, `type`, `place_id`, `field_id`, `bill_file`, `rent_bank`, `rent_bank_account`, `rent_bank_name`) VALUES
(1, '2022-04-20', 15, 17, 70000, 70000, 140000, 1, 3, 1, 1, 1, 'Screen_Shot_2022-03-16_at_12_21_50_AM1.png', 'BCA', '11221122', 'Dihajum'),
(2, '2022-04-20', 15, 17, 50000, 50000, 100000, 1, 3, 1, 1, 2, 'Screen_Shot_2022-02-11_at_1_44_31_PM.png', 'BCA', '11221122', 'Dihajum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `phone_number`, `email`, `password`, `role`, `place_id`) VALUES
(1, 'Admin', '', '', 'admin@admin.com', 'admin', 1, NULL),
(2, 'Hermano', '', '', 'field@field.com', 'field', 2, 1),
(3, 'Kyuu', '', '', 'player@player.com', 'player', 3, NULL),
(4, 'Papito', '', '', 'kickoff@kickoff.com', 'kickoff', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkuo` (`place_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fkuo` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);
