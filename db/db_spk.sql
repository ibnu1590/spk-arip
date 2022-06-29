# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2022-06-29 23:46:41
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'admin','Jkt','741','admin@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3');

#
# Structure for table "hasil_spk"
#

DROP TABLE IF EXISTS `hasil_spk`;
CREATE TABLE `hasil_spk` (
  `id_calon_kr` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nilai` float(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "hasil_spk"
#

INSERT INTO `hasil_spk` VALUES (11,'Ita Rosita, S.Pd.I',4.30),(12,'Marwati, S.Pd.I',4.10),(13,'Rusmi, S.Pd.I',4.20),(14,'Dede Indrawati, S.Pd.I',3.60),(15,'Sri Pebriani, S.Pd',4.10);

#
# Structure for table "hasil_tpa"
#

DROP TABLE IF EXISTS `hasil_tpa`;
CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `Tanggung_Jawab` int(11) DEFAULT NULL,
  `Penguasaan_Materi` int(11) DEFAULT NULL,
  `Sikap` int(11) DEFAULT NULL,
  `Absensi` int(11) DEFAULT NULL,
  `Loyalitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_tpa"
#

INSERT INTO `hasil_tpa` VALUES (68,11,67,73,80,84,89),(69,12,70,72,79,83,88),(70,13,68,74,77,85,90),(71,14,71,75,78,82,87),(72,15,69,72,79,83,91);

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
  `bobot` float(5,2) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (35,'Tanggung_Jawab',20.00,'Core Factor'),(36,'Penguasaan_Materi',15.00,'Secondary Fa'),(37,'Sikap',25.00,'Core Factor'),(38,'Absensi',25.00,'Core Factor'),(39,'Loyalitas',15.00,'Secondary Fa');

#
# Structure for table "sub_kriteria"
#

DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` float(10,2) NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

#
# Data for table "sub_kriteria"
#

INSERT INTO `sub_kriteria` VALUES (11,13,'terlambat 0 kali',10.00),(12,13,'terlambat 1 kali',9.00),(13,13,'terlambat 2 kali',8.00),(14,13,'terlambat 3 kali',7.00),(15,13,'terlambat 4 kali',6.00),(16,13,'terlambat 5 kali',5.00),(17,13,'terlambat 6 kali',4.00),(18,13,'terlambat 7 kali',3.00),(19,13,'terlambat 8 kali',2.00),(20,13,'terlambat 9 kali',1.00),(21,13,'terlambat >10 kali',0.00),(22,14,'Baik Sekali',5.00),(23,14,'baik',4.00),(24,14,'cukup',3.00),(25,14,'kurang',2.00),(26,14,'kurang sekali',1.00),(27,15,'Baik Sekali',5.00),(28,15,'baik',4.00),(29,15,'cukup',3.00),(30,15,'kurang',2.00),(31,15,'kurang sekali',1.00),(57,32,'Baik Sekali',5.00),(58,32,'baik',4.00),(59,32,'cukup',3.00),(60,32,'kurang',2.00),(61,32,'kurang sekali',1.00),(67,35,'Kurang Sekali',1.00),(68,35,'Kurang',2.00),(69,35,'Cukup',3.00),(70,35,'Baik',4.00),(71,35,'Baik Sekali',5.00),(72,36,'Kurang Sekali',1.00),(73,36,'Kurang',2.00),(74,36,'Cukup',3.00),(75,36,'Baik',4.00),(76,36,'Baik Sekali',5.00),(77,37,'Kurang Sekali',1.00),(78,37,'Kurang',2.00),(79,37,'Cukup',3.00),(80,37,'Baik',4.00),(81,37,'Baik Sekali',5.00),(82,38,'Kurang Sekali',1.00),(83,38,'Kurang',2.00),(84,38,'Cukup',3.00),(85,38,'Baik',4.00),(86,38,'Baik Sekali',5.00),(87,39,'Kurang Sekali',1.00),(88,39,'Kurang',2.00),(89,39,'Cukup',3.00),(90,39,'Baik',4.00),(91,39,'Baik Sekali',5.00);
