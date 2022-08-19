-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 19 Agu 2022 pada 00.15
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
(1, 'Testingggg', '2022-02-04', '<p>This is testing for article.</p>\r\n<p>hope u enjoy it! thank u</p>\r\n<p>This is testing for article.</p>\r\n<p>hope u enjoy it! thank u</p>\r\n<p>tseting</p>', '51447843_1237921336370340_3553161070283587584_n.jpeg', 2, 2),
(2, 'ASDAS asdasd', '2022-05-22', '<p>a sdas dasd asd as das Das d</p>\r\n<p>\'<span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">a sdas dasd asd as das Das d</span></p>\r\n<p>\'<span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">a sdas dasd asd as das Das d</span></p>\r\n<p>\'<span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">a sdas dasd asd as das Das d</span></p>\r\n<p>\'<span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">a sdas dasd asd as das Das d</span></p>\r\n<p>\'<span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">a sdas dasd asd as das Das d</span></p>\r\n<p>\'</p>', '51447843_1237921336370340_3553161070283587584_n1.jpeg', 2, 2);

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
(1, 'TOURNAMENT JEANS CUP FUTSAL U-21', '<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: -apple-system, \'system-ui\', \'segoe ui\', Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, \'helvetica neue\', \'open sans\', Arial, sans-serif; font-size: 15px; background-color: #ffffff;\">❗Perubahan Jadwal Pertandingan❗</p>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: -apple-system, \'system-ui\', \'segoe ui\', Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, \'helvetica neue\', \'open sans\', Arial, sans-serif; font-size: 15px; background-color: #ffffff;\">TOURNAMENT JEANS CUP FUTSAL U-21⚽<br style=\"padding: 0px; margin: 0px; list-style: none; border: 0px; outline: none; box-sizing: border-box;\" />&ldquo;Make Your Achievement With No Limit&rdquo;</p>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: -apple-system, \'system-ui\', \'segoe ui\', Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, \'helvetica neue\', \'open sans\', Arial, sans-serif; font-size: 15px; background-color: #ffffff;\">asdasdasdasdasd</p>', '2022-05-31', '2022-05-31', '51447843_1237921336370340_3553161070283587584_n.jpeg', 2, 'default.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `field`
--

INSERT INTO `field` (`id`, `name`, `note`, `photo`, `place_id`, `fasilitas`) VALUES
(1, 'Sintetis Besar', '', 'sinte_a.jpeg', 2, ''),
(2, 'Sintetis Kecil', '', 'sinte_b.jpeg', 2, ''),
(3, 'Lapangan Biru', 'Lapangan vinyl ukuran kecil.', 'lapangan_ayumi1.jpeg', 1, 'Bola, air minum, papan skor, dan rompi'),
(4, 'Lapangan A Merah', 'Lapangan standard berwarna merah', 'lapangan_ayumi1.jpeg', 3, 'Bola, air minum, papan skor, dan rompi'),
(5, 'Lapangan B Hijau', 'Lapangan standard berwarna hijau', 'lapangan_ayumi1.jpeg', 3, 'Bola, air minum, papan skor, dan rompi'),
(6, 'Lapangan Merah', 'Lapangan standard berwarna merah', 'lapangan_ayumi1.jpeg', 4, 'Bola, air minum, papan skor, dan rompi'),
(7, 'Lapangan Hijau', 'Lapangan standard berwarna hijau', 'lapangan_ayumi1.jpeg', 4, 'Bola, air minum, papan skor, dan rompi'),
(8, 'Lapangan Madrid', 'Lapangan standard', 'lapangan_ayumi1.jpeg', 5, 'Bola, air minum, papan skor, dan rompi'),
(9, 'Lapangan Barcelona', 'Lapangan standard', 'lapangan_ayumi1.jpeg', 5, 'Bola, air minum, papan skor, dan rompi');

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
  `status` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL,
  `open` int(5) NOT NULL,
  `close` int(5) NOT NULL,
  `maps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `place`
--

INSERT INTO `place` (`id`, `name`, `desc`, `address`, `phone`, `gallery`, `bank`, `bank_account`, `bank_name`, `status`, `photo`, `open`, `close`, `maps`) VALUES
(1, 'Ayumi Futsal', 'Lapangan Futsal Terbaru di Cilacap, nyaman, Harga terjangkau dan fasilitas lengkap', 'Kabupaten Cilacap', '085777373438', 'field.png', 'BCA', '2881727', 'Gallery Futsal', 1, 'ayumi.jpeg', 8, 23, ''),
(2, 'PSCS Indoor Futsal', 'Lapangan Futsal Terbaru di Cilacap, nyaman, Harga terjangkau dan fasilitas lengkap', 'Jln Dr. Sutomo, Gunung Simping, Cilacap Tengah (Selatan Tenis Indoor) ', '1313213213', 'field.png', 'Mandiri', '888271728', 'Kosasih', 1, '51447843_1237921336370340_3553161070283587584_n1.jpeg', 9, 23, ''),
(3, 'Mega Futsal Cilacap', 'Lapangan Futsal Terbaru di Cilacap, nyaman, Harga terjangkau dan fasilitas lengkap', 'Potongan, Tambakreja, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53211', '082137244805', '', 'BCA', '23112312', 'Dihajuas', 1, 'field.png', 9, 23, ''),
(4, 'Sena Futsal', 'asldas adasdas dasd', 'Jl. Yos Sudarso, Dongkelan, Kroya, Kec. Kroya, Kabupaten Cilacap, Jawa Tengah 53282', '082137244999', '', 'BCA', '1231231231', 'Jaenab', 1, 'sena.png', 8, 23, ''),
(5, 'Bharata Futsal Cilacap', ' Tritih, Tritih Wetan, Kec. Jeruklegi, Kabupaten Cilacap, Jawa Tengah 53253', ' Tritih, Tritih Wetan, Kec. Jeruklegi, Kabupaten Cilacap, Jawa Tengah 53253', '', '', 'Mandiri', '1231231231', 'Bharata', 1, 'Screen_Shot_2022-06-14_at_9_42_33_PM.png', 9, 22, ''),
(9999, 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', NULL, NULL, NULL, 0, 'default.png', 0, 23, '');

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
(1, 70000, 0, 16, 1),
(2, 120000, 17, 23, 1),
(3, 50000, 0, 17, 2),
(4, 90000, 18, 23, 2),
(5, 60000, 8, 16, 3),
(6, 100000, 17, 22, 3),
(7, 150000, 9, 16, 4),
(8, 175000, 17, 22, 4),
(9, 150000, 9, 16, 5),
(10, 175000, 17, 22, 5),
(11, 100000, 9, 16, 7),
(12, 125000, 17, 22, 7),
(13, 125000, 9, 16, 6),
(14, 175000, 17, 22, 6),
(15, 120000, 9, 16, 8),
(16, 175000, 17, 22, 8),
(17, 175000, 9, 16, 9),
(18, 200000, 17, 22, 9);

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
  `rent_bank_name` varchar(255) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rent`
--

INSERT INTO `rent` (`id`, `date`, `start`, `end`, `dp`, `pay_off`, `total`, `status`, `user_id`, `type`, `place_id`, `field_id`, `bill_file`, `rent_bank`, `rent_bank_account`, `rent_bank_name`, `remark`) VALUES
(1, '2022-04-20', 15, 17, 70000, 70000, 140000, 4, 3, 1, 1, 1, 'Screen_Shot_2022-03-16_at_12_21_50_AM1.png', 'BCA', '11221122', 'Dihajum', ''),
(2, '2022-04-20', 15, 17, 50000, 50000, 100000, 4, 3, 1, 1, 2, 'Screen_Shot_2022-02-11_at_1_44_31_PM.png', 'BCA', '11221122', 'Dihajum', ''),
(3, '2022-04-15', 15, 18, 130000, 130000, 260000, 4, 3, 1, 1, 1, 'Screen_Shot_2022-03-08_at_3_57_07_PM.png', 'BCA', '111111666', 'Dihajum', ''),
(4, '2022-04-15', 12, 15, 130000, 130000, 260000, 2, 3, 1, 1, 1, 'Screen_Shot_2022-03-08_at_3_57_07_PM.png', 'BCA', '111111666', 'Dihajum', 'Gajelas'),
(5, '2022-05-24', 17, 18, 60000, 60000, 120000, 1, 3, 1, 2, 1, '36_Light_hotel_details_fit_page.png', 'Mandiri', '11221122', 'Dihajum', ''),
(6, '2022-05-24', 17, 18, 25000, 25000, 50000, 0, 3, 1, 2, 2, '36_Light_hotel_details_fit_page1.png', 'BCA', '11221122', 'Dihajum', ''),
(7, '2022-07-22', 9, 11, 70000, 70000, 140000, 0, 3, 1, 2, 1, '2.jpeg', 'BCA', '11221122', 'Kellin Quin', '');

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
(1, 'Admin', '', '', 'admin@admin.com', 'admin', 1, 9999),
(2, 'Hermano', '', '', 'field@field.com', 'field', 2, 1),
(3, 'Kyuu', '', '', 'player@player.com', 'player', 3, NULL),
(4, 'Papito', '', '', 'kickoff@kickoff.com', 'kickoff', 2, 2),
(5, 'Try Har', 'Jkt 48\r\n', '08213721231', 'try@gmail.com', 'try', 2, 3),
(6, 'Sena Futsal', 'Jl. Yos Sudarso, Dongkelan, Kroya, Kec. Kroya, Kabupaten Cilacap, Jawa Tengah 53282', '08299182', 'sena@sena.com', 'sena', 2, 4),
(7, 'Bharata Futsal Cilacap', ' Tritih, Tritih Wetan, Kec. Jeruklegi, Kabupaten Cilacap, Jawa Tengah 53253\r\n', '082137244111', 'bharata@bharata.com', 'bharata', 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkaw` (`writer_id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkep` (`place_id`);

--
-- Indeks untuk tabel `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkfp` (`place_id`);

--
-- Indeks untuk tabel `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkpf` (`field_id`);

--
-- Indeks untuk tabel `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkru` (`user_id`),
  ADD KEY `fkrf` (`field_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT untuk tabel `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fkaw` FOREIGN KEY (`writer_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fkep` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Ketidakleluasaan untuk tabel `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `fkfp` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Ketidakleluasaan untuk tabel `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `fkpf` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`);

--
-- Ketidakleluasaan untuk tabel `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `fkrf` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`),
  ADD CONSTRAINT `fkru` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fkuo` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);
