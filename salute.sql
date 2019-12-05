-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 08:17 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salute`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

CREATE TABLE `bobot_nilai` (
  `id` int(11) NOT NULL,
  `jenis_penilaian` enum('a','b','c') NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajar`
--

CREATE TABLE `detail_pengajar` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengajar`
--

INSERT INTO `detail_pengajar` (`id`, `kd_pelatihan`, `id_pengajar`) VALUES
(4, '2019-00000002', 1),
(5, '2019-00000002', 4),
(6, '2019-00000001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penilaian_b`
--

CREATE TABLE `detail_penilaian_b` (
  `id` int(11) NOT NULL,
  `id_penilaian_b` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_peserta`
--

CREATE TABLE `detail_peserta` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_peserta`
--

INSERT INTO `detail_peserta` (`id`, `kd_pelatihan`, `id_user`) VALUES
(3, '2019-00000001', 4),
(5, '2019-00000002', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kejuruan`
--

CREATE TABLE `kejuruan` (
  `id_kejuruan` int(11) NOT NULL,
  `nama_kejuruan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kejuruan`
--

INSERT INTO `kejuruan` (`id_kejuruan`, `nama_kejuruan`) VALUES
(2, 'Fashion Tech'),
(4, 'Bisnis Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_a`
--

CREATE TABLE `kuisioner_a` (
  `id_kuisionerA` int(11) NOT NULL,
  `soalA` text NOT NULL,
  `jawaban1A` varchar(100) NOT NULL,
  `jawaban2A` varchar(100) NOT NULL,
  `jawaban3A` varchar(100) NOT NULL,
  `jawaban4A` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner_a`
--

INSERT INTO `kuisioner_a` (`id_kuisionerA`, `soalA`, `jawaban1A`, `jawaban2A`, `jawaban3A`, `jawaban4A`) VALUES
(3, 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya', 'Tidak sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat sesuai.'),
(4, 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.', 'Tidak mudah', 'Kurang Mudah', 'Mudah', 'Sangat Mudah'),
(5, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan', 'Tidak Cepat', 'Kurang Cepat', 'Cepat', 'Sangat Cepat');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_b`
--

CREATE TABLE `kuisioner_b` (
  `id_kuisionerB` int(11) NOT NULL,
  `jenis_soal` int(11) NOT NULL,
  `soalB` text NOT NULL,
  `jawaban1B` int(11) NOT NULL,
  `jawaban2B` int(11) NOT NULL,
  `jawaban3B` int(11) NOT NULL,
  `jawaban4B` int(11) NOT NULL,
  `jawaban5B` int(11) NOT NULL,
  `tipe_soal` enum('pg','uraian') NOT NULL,
  `sub_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner_b`
--

INSERT INTO `kuisioner_b` (`id_kuisionerB`, `jenis_soal`, `soalB`, `jawaban1B`, `jawaban2B`, `jawaban3B`, `jawaban4B`, `jawaban5B`, `tipe_soal`, `sub_soal`) VALUES
(26, 1, 'Tulisan di dalam materi pelatihan jelas dan mudah di baca', 5, 4, 3, 2, 1, 'pg', 1),
(27, 1, 'Kualitas materi pelatihan dapat menambah tingkat ketrampilan dan pengetahuan anda', 5, 4, 3, 2, 1, 'pg', 2),
(28, 1, ' Tahapan materi pelatihan sudah berurutan dari materi tingkat dasar sampai dengan materi tingkat lanjut', 5, 4, 3, 2, 1, 'pg', 1),
(29, 1, 'Komentar / saran tentang materi pelatihan :', 0, 0, 0, 0, 0, 'uraian', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_c`
--

CREATE TABLE `kuisioner_c` (
  `id_kuisionerC` int(11) NOT NULL,
  `jenis_soal` int(11) NOT NULL,
  `soalC` text NOT NULL,
  `jawaban1C` int(11) NOT NULL,
  `jawaban2C` int(11) NOT NULL,
  `jawaban3C` int(11) NOT NULL,
  `jawaban4C` int(11) NOT NULL,
  `tipe_soal` enum('pg','uraian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner_c`
--

INSERT INTO `kuisioner_c` (`id_kuisionerC`, `jenis_soal`, `soalC`, `jawaban1C`, `jawaban2C`, `jawaban3C`, `jawaban4C`, `tipe_soal`) VALUES
(7, 1, 'da', 1, 2, 3, 4, 'pg'),
(8, 2, 'qw', 1, 2, 3, 4, 'pg'),
(10, 3, 'qre', 1, 2, 3, 4, 'pg'),
(11, 4, 'sese', 1, 2, 3, 4, 'pg'),
(12, 5, 'sd', 1, 2, 3, 4, 'pg'),
(13, 6, 'rere', 1, 2, 3, 4, 'pg'),
(14, 7, 'polken', 1, 2, 3, 4, 'pg');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `kd_pelatihan` char(15) NOT NULL,
  `id_kejuruan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `tgl_mulai_pelatihan` date NOT NULL,
  `tgl_akhir_pelatihan` date NOT NULL,
  `tahap_pelatihan` int(11) NOT NULL,
  `kelas_pelatihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`kd_pelatihan`, `id_kejuruan`, `id_program`, `tgl_mulai_pelatihan`, `tgl_akhir_pelatihan`, `tahap_pelatihan`, `kelas_pelatihan`) VALUES
('2019-00000001', 2, 16, '2019-12-01', '2019-12-03', 1, 1),
('2019-00000002', 2, 16, '2019-12-01', '2019-12-03', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama_pengajar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama_pengajar`) VALUES
(1, 'Fajar Hidayat'),
(2, 'Dhimas Budi'),
(4, 'Bayu Dwi'),
(5, 'Andi');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_a`
--

CREATE TABLE `penilaian_a` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalA` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_b`
--

CREATE TABLE `penilaian_b` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalB` int(11) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_c`
--

CREATE TABLE `penilaian_c` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalC` int(11) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `id_kejuruan` int(11) NOT NULL,
  `nama_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `id_kejuruan`, `nama_program`) VALUES
(16, 2, 'Operator Bordir'),
(18, 4, 'Operator Service');

-- --------------------------------------------------------

--
-- Table structure for table `sub_soal`
--

CREATE TABLE `sub_soal` (
  `id_sub_soal` int(11) NOT NULL,
  `nama_sub_soal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_soal`
--

INSERT INTO `sub_soal` (`id_sub_soal`, `nama_sub_soal`) VALUES
(0, 'Uraian'),
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` enum('SD','SMP/SLTP','SMA/SMK/SLTA','DIPLOMA','S1','S2','S3') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `is_level` int(11) NOT NULL,
  `tipe_peserta` enum('Menginap','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `jk`, `tgl_lahir`, `pendidikan`, `pekerjaan`, `is_level`, `tipe_peserta`) VALUES
(3, 'fajarhgl', '$2y$10$tQKN5bGmshT8aQoPnBEhwOkD/PdpYteph0XVA0dq6eHh22eACAVoe', '', 'fajarhdytt30@gmail.com', '', '0000-00-00', '', '', 1, ''),
(4, 'fajarhgl1', '$2y$10$WD3t4nCuezWpWKtBTZyr0uX8J64USxgq3DJvqNK2vy8Od0p1CIkb2', 'Fajar Hidayat', 'fajarhdyt30@gmail.com', 'P', '2019-12-06', 'S1', 'Programmer', 0, 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'fajarhdytt30@gmail.com', 'iMjTnBXB6wUCCbu5Z0sOEvBRkRWxO0vkQLuHLz4VN20=', 1574862470),
(2, 'fajarhdytt30@gmail.com', 'D81OFLN7bkVjb14jPB46OjHYa7ZDxwqLrrxd6zVmpcU=', 1575098724),
(3, 'fajarhdytt30@gmail.com', 'p4435MLpvUU9Tb+k8kNOHBoY+MdOvzQAAht+Uc5aaVw=', 1575098819),
(4, 'fajarhdytt30@gmail.com', 'BPaK2Rf/G0yBiMd2ipxB8h8UMuuR8prkP5tfLeBZ0n4=', 1575098870);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penilaian_b` (`id_penilaian_b`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kejuruan`
--
ALTER TABLE `kejuruan`
  ADD PRIMARY KEY (`id_kejuruan`);

--
-- Indexes for table `kuisioner_a`
--
ALTER TABLE `kuisioner_a`
  ADD PRIMARY KEY (`id_kuisionerA`);

--
-- Indexes for table `kuisioner_b`
--
ALTER TABLE `kuisioner_b`
  ADD PRIMARY KEY (`id_kuisionerB`),
  ADD KEY `sub_soal` (`sub_soal`);

--
-- Indexes for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  ADD PRIMARY KEY (`id_kuisionerC`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`kd_pelatihan`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kejuruan` (`id_kejuruan`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soalA` (`id_soalA`);

--
-- Indexes for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soalB` (`id_soalB`);

--
-- Indexes for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soalC` (`id_soalC`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `id_kejuruan` (`id_kejuruan`);

--
-- Indexes for table `sub_soal`
--
ALTER TABLE `sub_soal`
  ADD PRIMARY KEY (`id_sub_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id_kejuruan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuisioner_a`
--
ALTER TABLE `kuisioner_a`
  MODIFY `id_kuisionerA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kuisioner_b`
--
ALTER TABLE `kuisioner_b`
  MODIFY `id_kuisionerB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  MODIFY `id_kuisionerC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_soal`
--
ALTER TABLE `sub_soal`
  MODIFY `id_sub_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  ADD CONSTRAINT `detail_pengajar_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengajar_ibfk_2` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`);

--
-- Constraints for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  ADD CONSTRAINT `detail_penilaian_b_ibfk_1` FOREIGN KEY (`id_penilaian_b`) REFERENCES `penilaian_b` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penilaian_b_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  ADD CONSTRAINT `detail_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peserta_ibfk_2` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`id_kejuruan`) REFERENCES `kejuruan` (`id_kejuruan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelatihan_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  ADD CONSTRAINT `penilaian_a_ibfk_1` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_a_ibfk_2` FOREIGN KEY (`id_soalA`) REFERENCES `kuisioner_a` (`id_kuisionerA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_a_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  ADD CONSTRAINT `penilaian_b_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_b_ibfk_2` FOREIGN KEY (`id_soalB`) REFERENCES `kuisioner_b` (`id_kuisionerB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_b_ibfk_3` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  ADD CONSTRAINT `penilaian_c_ibfk_1` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_c_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_c_ibfk_3` FOREIGN KEY (`id_soalC`) REFERENCES `kuisioner_c` (`id_kuisionerC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_2` FOREIGN KEY (`id_kejuruan`) REFERENCES `kejuruan` (`id_kejuruan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
