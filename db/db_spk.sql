# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2022-07-08 14:52:06
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'Kepala Sekolah','Jkt','741','admin@gmail.com','kepalasekolah','ad9e9366bd65e665fa808da635512230','kepalasekolah'),(10,'Tata Usaha','peninggilan','089606854454','tatausaha@gmail.com','tatausaha','82849c85acf1f4e6e4eec748f0aeddf4','tatausaha');

#
# Structure for table "hasil_spk"
#

DROP TABLE IF EXISTS `hasil_spk`;
CREATE TABLE `hasil_spk` (
  `id_calon_kr` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nilai` float(11,1) DEFAULT NULL,
  `tanggal_lap` date DEFAULT NULL,
  `minggu` varchar(2) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `id_spk` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

#
# Data for table "hasil_spk"
#

INSERT INTO `hasil_spk` VALUES (12,'Marwati, S.Pd.I',4.0,'2022-07-07','2','Jul','2022',2,41),(15,'Sri Pebriani, S.Pd',3.9,'2022-07-07','2','Jul','2022',3,42),(13,'Rusmi, S.Pd.I',3.6,'2022-07-07','2','Jul','2022',4,43),(14,'Dede Indrawati, S.Pd.I',4.7,'2022-07-07','2','Jul','2022',1,44),(11,'Ita Rosita, S.Pd.I',3.0,'2022-07-07','2','Jul','2022',5,45);

#
# Structure for table "hasil_tpa"
#

DROP TABLE IF EXISTS `hasil_tpa`;
CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `Tanggung Jawab` int(11) DEFAULT NULL,
  `Penguasaan Materi` int(11) DEFAULT NULL,
  `Sikap` int(11) DEFAULT NULL,
  `Absensi` int(11) DEFAULT NULL,
  `loyalitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_tpa"
#

INSERT INTO `hasil_tpa` VALUES (74,12,67,73,79,86,90),(77,15,71,75,80,86,91),(79,13,71,73,81,83,87),(80,14,69,76,79,84,89),(81,11,67,72,77,82,87);

#
# Structure for table "hitung"
#

DROP TABLE IF EXISTS `hitung`;
CREATE TABLE `hitung` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) DEFAULT NULL,
  `nilai_gap` int(11) DEFAULT NULL,
  `nilai_bobot` float(11,1) DEFAULT NULL,
  `tanggal_lap` date DEFAULT NULL,
  `kriteria` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8mb4;

#
# Data for table "hitung"
#

INSERT INTO `hitung` VALUES (291,12,1,-2,3.0,'2022-07-07','Tanggung Jawab','Marwati, S.Pd.I'),(292,12,2,-1,4.0,'2022-07-07','Penguasaan Materi','Marwati, S.Pd.I'),(293,12,3,0,5.0,'2022-07-07','Sikap','Marwati, S.Pd.I'),(294,12,5,2,3.5,'2022-07-07','Absensi','Marwati, S.Pd.I'),(295,12,4,1,4.5,'2022-07-07','Loyalitas','Marwati, S.Pd.I'),(296,15,5,2,3.5,'2022-07-07','Tanggung Jawab','Sri Pebriani, S.Pd'),(297,15,4,1,4.5,'2022-07-07','Penguasaan Materi','Sri Pebriani, S.Pd'),(298,15,4,1,4.5,'2022-07-07','Sikap','Sri Pebriani, S.Pd'),(299,15,5,2,3.5,'2022-07-07','Absensi','Sri Pebriani, S.Pd'),(300,15,5,2,3.5,'2022-07-07','Loyalitas','Sri Pebriani, S.Pd'),(301,13,5,2,3.5,'2022-07-07','Tanggung Jawab','Rusmi, S.Pd.I'),(302,13,2,-1,4.0,'2022-07-07','Penguasaan Materi','Rusmi, S.Pd.I'),(303,13,5,2,3.5,'2022-07-07','Sikap','Rusmi, S.Pd.I'),(304,13,2,-1,4.0,'2022-07-07','Absensi','Rusmi, S.Pd.I'),(305,13,1,-2,3.0,'2022-07-07','Loyalitas','Rusmi, S.Pd.I'),(306,14,3,0,5.0,'2022-07-07','Tanggung Jawab','Dede Indrawati, S.Pd.I'),(307,14,5,2,3.5,'2022-07-07','Penguasaan Materi','Dede Indrawati, S.Pd.I'),(308,14,3,0,5.0,'2022-07-07','Sikap','Dede Indrawati, S.Pd.I'),(309,14,3,0,5.0,'2022-07-07','Absensi','Dede Indrawati, S.Pd.I'),(310,14,3,0,5.0,'2022-07-07','Loyalitas','Dede Indrawati, S.Pd.I'),(311,11,1,-2,3.0,'2022-07-07','Tanggung Jawab','Ita Rosita, S.Pd.I'),(312,11,1,-2,3.0,'2022-07-07','Penguasaan Materi','Ita Rosita, S.Pd.I'),(313,11,1,-2,3.0,'2022-07-07','Sikap','Ita Rosita, S.Pd.I'),(314,11,1,-2,3.0,'2022-07-07','Absensi','Ita Rosita, S.Pd.I'),(315,11,1,-2,3.0,'2022-07-07','Loyalitas','Ita Rosita, S.Pd.I');

#
# Structure for table "karyawan"
#

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_calon_kr` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ttl` date NOT NULL,
  `TempatLahir` varchar(200) NOT NULL,
  `PendidikanTerakhir` varchar(100) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  `TglBergabung` date NOT NULL,
  `skill` varchar(200) DEFAULT NULL,
  `pengalaman` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "karyawan"
#

INSERT INTO `karyawan` VALUES (11,'-','Ita Rosita, S.Pd.I','Wanita','Jl.H.Kana Paninggilan','088214655799','ita.jpg','1983-06-06','Tangerang','S1','Guru Kelas Kelompok B','2015-06-10','Mengajar','Menjadi pengajar PAUD yang kompeten'),(12,'-','Marwati, S.Pd.I','Wanita','Jl.Sukarela Paninggilan','087896544095','marwati.jpg','1969-10-26','Tangerang','S1','Guru Kelas Kelompok A','2015-10-06','Pengajar','Mengajar PAUD'),(13,'-','Rusmi, S.Pd.I','Wanita','Jl.Swadaya Karang Tengah','081297732072','rusmi.jpg','1973-07-12','Tangerang','S1','Guru Kelas Kelompok A','2015-07-22','Mengajar','Pengajar PAUD'),(14,'-','Dede Indrawati, S.Pd.I','Wanita','Jl.Sunan Gunung Jati','082299185429','dede.jpg','1976-06-05','Tangerang','S1','Guru Kelas Kelompok B','2016-02-10','Mengajar','Pengajar PAUD'),(15,'-','Sri Pebriani, S.Pd','Wanita','Komp.Setneg Blok G12 Pd.Aren','089695707229','sri.jpg','1981-02-23','Jakarta','S1','Guru Kelas Kelompok A','2017-10-15','Mengajar','Pengajar PAUD');

#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(32) DEFAULT NULL,
  `bobot` float(5,1) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (35,'Tanggung Jawab',20.0,'Core Factor'),(36,'Penguasaan Materi',15.0,'Secondary Fa'),(37,'Sikap',25.0,'Core Factor'),(38,'Absensi',25.0,'Core Factor'),(39,'loyalitas',15.0,'Secondary Fa');

#
# Structure for table "sub_kriteria"
#

DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` float(10,1) DEFAULT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

#
# Data for table "sub_kriteria"
#

INSERT INTO `sub_kriteria` VALUES (11,13,'terlambat 0 kali',10.0),(12,13,'terlambat 1 kali',9.0),(13,13,'terlambat 2 kali',8.0),(14,13,'terlambat 3 kali',7.0),(15,13,'terlambat 4 kali',6.0),(16,13,'terlambat 5 kali',5.0),(17,13,'terlambat 6 kali',4.0),(18,13,'terlambat 7 kali',3.0),(19,13,'terlambat 8 kali',2.0),(20,13,'terlambat 9 kali',1.0),(21,13,'terlambat >10 kali',0.0),(22,14,'Baik Sekali',5.0),(23,14,'baik',4.0),(24,14,'cukup',3.0),(25,14,'kurang',2.0),(26,14,'kurang sekali',1.0),(27,15,'Baik Sekali',5.0),(28,15,'baik',4.0),(29,15,'cukup',3.0),(30,15,'kurang',2.0),(31,15,'kurang sekali',1.0),(57,32,'Baik Sekali',5.0),(58,32,'baik',4.0),(59,32,'cukup',3.0),(60,32,'kurang',2.0),(61,32,'kurang sekali',1.0),(67,35,'Kurang Sekali',1.0),(68,35,'Kurang',2.0),(69,35,'Cukup',3.0),(70,35,'Baik',4.0),(71,35,'Baik Sekali',5.0),(72,36,'Kurang Sekali',1.0),(73,36,'Kurang',2.0),(74,36,'Cukup',3.0),(75,36,'Baik',4.0),(76,36,'Baik Sekali',5.0),(77,37,'Kurang Sekali',1.0),(78,37,'Kurang',2.0),(79,37,'Cukup',3.0),(80,37,'Baik',4.0),(81,37,'Baik Sekali',5.0),(82,38,'Kurang Sekali',1.0),(83,38,'Kurang',2.0),(84,38,'Cukup',3.0),(85,38,'Baik',4.0),(86,38,'Baik Sekali',5.0),(87,39,'Kurang Sekali',1.0),(88,39,'Kurang',2.0),(89,39,'Cukup',3.0),(90,39,'Baik',4.0),(91,39,'Baik Sekali',5.0);
