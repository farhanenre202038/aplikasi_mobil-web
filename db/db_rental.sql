/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_rental

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-12-29 13:56:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_history`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE `tbl_history` (
  `nota` int(200) NOT NULL AUTO_INCREMENT,
  `no_pengambilan` varchar(200) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(80) NOT NULL,
  `nama_mobil` varchar(80) NOT NULL,
  `tgl_pengambilan` varchar(80) NOT NULL,
  `tgl_pengembalian` varchar(80) NOT NULL,
  `biaya_sopir` varchar(80) NOT NULL,
  `bayar_sewa` varchar(80) NOT NULL,
  `total_bayar` varchar(80) NOT NULL,
  `lama_rental` varchar(80) NOT NULL,
  PRIMARY KEY (`nota`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_history
-- ----------------------------
INSERT INTO `tbl_history` VALUES ('27', 'MB13897', '202038', 'DD 1 SA', 'Angelita Maspaitella', 'BWM X1', '2021-12-14', '2021-12-18', '100000', '2500000', '2600000', '5');
INSERT INTO `tbl_history` VALUES ('28', 'MB96135', '202006', 'DD 1 SA', 'Muhammad Farhan Enre', 'BWM X1', '2021-12-14', '2021-12-21', '0', '4000000', '4000000', '8');
INSERT INTO `tbl_history` VALUES ('29', 'MB41826', '202006', 'DD 1 SA', 'Muhammad Farhan Enre', 'BWM X1', '2021-12-16', '2021-12-31', '320000', '8000000', '8320000', '16');
INSERT INTO `tbl_history` VALUES ('30', 'MB79814', '202006', 'DD 1001 FA', 'Muhammad Farhan Enre', 'HONDA BRIO', '2021-12-16', '2021-12-18', '60000', '900000', '960000', '3');
INSERT INTO `tbl_history` VALUES ('31', 'MB62184', '202006', 'DD 1 SA', 'Muhammad Farhan Enre', 'BWM X1', '2021-12-19', '2021-12-21', '60000', '1500000', '1560000', '3');
INSERT INTO `tbl_history` VALUES ('32', 'MB68349', '202014', 'DD 1 SA', 'ichsan', 'BWM X1', '2021-12-20', '2022-01-02', '0', '7000000', '7000000', '14');
INSERT INTO `tbl_history` VALUES ('33', 'MB16753', '202006', 'DD10SI', 'Muhammad Farhan Enre', 'DAIHATSU AYLA', '2021-12-23', '2021-12-25', '60000', '720000', '780000', '3');

-- ----------------------------
-- Table structure for `tbl_iklan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_iklan`;
CREATE TABLE `tbl_iklan` (
  `kode_iklan` int(200) NOT NULL AUTO_INCREMENT,
  `nama_iklan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `iklan` text NOT NULL,
  `active` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_iklan`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_iklan
-- ----------------------------
INSERT INTO `tbl_iklan` VALUES ('29', 'Iklan 1', '2021-12-21', 'banner-promo-photo-1634280965-36.jpg', 'active', 'https://saweria.co/farhanenre202038');
INSERT INTO `tbl_iklan` VALUES ('30', 'Iklan 2', '2021-12-21', 'banner-promo-photo-1634280835-35.jpg', 'Iklan', 'https://saweria.co/farhanenre202038');
INSERT INTO `tbl_iklan` VALUES ('31', 'Iklan 3', '2021-12-21', 'banner-promo-photo-1634538813-127.jpg', 'Iklan', 'https://saweria.co/farhanenre202038');
INSERT INTO `tbl_iklan` VALUES ('32', 'Iklan 4', '2021-12-21', 'banner-promo-photo-1634541677-135.jpg', 'Iklan', 'https://saweria.co/farhanenre202038');

-- ----------------------------
-- Table structure for `tbl_login`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status_user` enum('offline','online') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_login
-- ----------------------------
INSERT INTO `tbl_login` VALUES ('1', 'admin', 'Muhammad Farhan Enre', '21232f297a57a5a743894a0e4a801fc3', 'offline');

-- ----------------------------
-- Table structure for `tbl_merk`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_merk`;
CREATE TABLE `tbl_merk` (
  `kode_merk` varchar(20) NOT NULL,
  `nama_merk` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`kode_merk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_merk
-- ----------------------------
INSERT INTO `tbl_merk` VALUES ('BM', 'BMW');
INSERT INTO `tbl_merk` VALUES ('DAH', 'DAIHATSU');
INSERT INTO `tbl_merk` VALUES ('FUS', 'FUSO');
INSERT INTO `tbl_merk` VALUES ('HNM', 'HONDA');
INSERT INTO `tbl_merk` VALUES ('NISA', 'NISSAN');
INSERT INTO `tbl_merk` VALUES ('SUZ', 'SUZUKI');
INSERT INTO `tbl_merk` VALUES ('TOY', 'TOYOTA');

-- ----------------------------
-- Table structure for `tbl_mobil`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mobil`;
CREATE TABLE `tbl_mobil` (
  `no_plat` varchar(20) NOT NULL,
  `nama_mobil` varchar(80) NOT NULL,
  `kode_merk` varchar(20) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `tahun_beli` varchar(10) NOT NULL,
  `jumlah_kursi` varchar(10) NOT NULL,
  `status_rental` enum('3','2','1','0') NOT NULL,
  `harga_sewa` double(80,0) NOT NULL,
  `foto_mobil` text NOT NULL,
  PRIMARY KEY (`no_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_mobil
-- ----------------------------
INSERT INTO `tbl_mobil` VALUES ('DD 1 SA', 'BWM X1', 'BM', 'X1', '2011', '4', '0', '500000', 'bmw-x1.png');
INSERT INTO `tbl_mobil` VALUES ('DD 1001 FA', 'HONDA BRIO', 'HNM', 'BRI', '2009', '4', '0', '300000', 'honda_brio.png');
INSERT INTO `tbl_mobil` VALUES ('DD10SI', 'DAIHATSU AYLA', 'DAH', 'AYL', '2010', '6', '0', '240000', 'Alya.png');
INSERT INTO `tbl_mobil` VALUES ('DD213A', 'HONDA BRA-V', 'HNM', 'BRV', '2003', '4', '0', '150000', 'HONDA BR-V.png');

-- ----------------------------
-- Table structure for `tbl_pelanggan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(20) NOT NULL,
  `nama_pelanggan` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(30) NOT NULL,
  `status` enum('1','3','2','0') NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_pelanggan
-- ----------------------------
INSERT INTO `tbl_pelanggan` VALUES ('202006', 'Muhammad Farhan Enre', 'farhanenre', 'farhanenre28@gmail.com', 'cb23df1de24844bd3d8ee1688464aace', 'Jl. Printis Kemerdekaan Km 13', '083192328340', '1');
INSERT INTO `tbl_pelanggan` VALUES ('202038', 'Angelita Maspaitella', 'angel', 'angelmaspaitella@gmail.com', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'JL. Perumnas Sudiang Raya', '6283192328340', '3');

-- ----------------------------
-- Table structure for `tbl_transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi` (
  `no_pengambilan` varchar(200) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `lama_rental` int(10) NOT NULL,
  `biaya_sopir` double(100,0) NOT NULL,
  `bayar_sewa` double(100,0) NOT NULL,
  `total_bayar` double(100,0) NOT NULL,
  PRIMARY KEY (`no_pengambilan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_type`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_type`;
CREATE TABLE `tbl_type` (
  `id_type` varchar(20) NOT NULL,
  `nama_type` varchar(50) NOT NULL,
  `kode_merk` varchar(20) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_type
-- ----------------------------
INSERT INTO `tbl_type` VALUES ('AGY', 'AGYA', 'TOY');
INSERT INTO `tbl_type` VALUES ('AVN', 'AVANZA', 'TOY');
INSERT INTO `tbl_type` VALUES ('AYL', 'AYLA', 'DAH');
INSERT INTO `tbl_type` VALUES ('BRI', 'BRIO', 'HNM');
INSERT INTO `tbl_type` VALUES ('BRV', 'BR-V', 'HNM');
INSERT INTO `tbl_type` VALUES ('JAZ', 'JAZZ', 'HNM');
INSERT INTO `tbl_type` VALUES ('MAX', 'GRAN MAX PU', 'DAH');
INSERT INTO `tbl_type` VALUES ('MB', 'GRAN MAX MB', 'DAH');
INSERT INTO `tbl_type` VALUES ('MOB', 'MOBILIO', 'HNM');
INSERT INTO `tbl_type` VALUES ('X1', 'X1', 'BM');
INSERT INTO `tbl_type` VALUES ('X2', 'X2', 'BM');

-- ----------------------------
-- View structure for `view_history`
-- ----------------------------
DROP VIEW IF EXISTS `view_history`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history` AS select `tbl_history`.`nota` AS `nota`,`tbl_history`.`no_pengambilan` AS `no_pengambilan`,`tbl_history`.`id_pelanggan` AS `id_pelanggan`,`tbl_history`.`nama_pelanggan` AS `nama_pelanggan`,`tbl_history`.`nama_mobil` AS `nama_mobil`,`tbl_history`.`tgl_pengambilan` AS `tgl_pengambilan`,`tbl_history`.`tgl_pengembalian` AS `tgl_pengembalian`,`tbl_history`.`biaya_sopir` AS `biaya_sopir`,`tbl_history`.`bayar_sewa` AS `bayar_sewa`,`tbl_history`.`total_bayar` AS `total_bayar`,`tbl_mobil`.`no_plat` AS `no_plat`,`tbl_mobil`.`kode_merk` AS `kode_merk`,`tbl_mobil`.`id_type` AS `id_type`,`tbl_mobil`.`tahun_beli` AS `tahun_beli`,`tbl_mobil`.`jumlah_kursi` AS `jumlah_kursi`,`tbl_mobil`.`status_rental` AS `status_rental`,`tbl_mobil`.`harga_sewa` AS `harga_sewa`,`tbl_mobil`.`foto_mobil` AS `foto_mobil`,`tbl_history`.`lama_rental` AS `lama_rental` from (`tbl_history` join `tbl_mobil` on(`tbl_history`.`no_plat` = `tbl_mobil`.`no_plat`)) ;

-- ----------------------------
-- View structure for `view_merk`
-- ----------------------------
DROP VIEW IF EXISTS `view_merk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_merk` AS select `tbl_merk`.`nama_merk` AS `nama_merk`,`tbl_type`.`id_type` AS `id_type`,`tbl_type`.`nama_type` AS `nama_type`,`tbl_type`.`kode_merk` AS `kode_merk` from (`tbl_type` join `tbl_merk` on(`tbl_type`.`kode_merk` = `tbl_merk`.`kode_merk`)) ;

-- ----------------------------
-- View structure for `view_mobil`
-- ----------------------------
DROP VIEW IF EXISTS `view_mobil`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mobil` AS select `tbl_mobil`.`no_plat` AS `no_plat`,`tbl_mobil`.`nama_mobil` AS `nama_mobil`,`tbl_mobil`.`tahun_beli` AS `tahun_beli`,`tbl_mobil`.`jumlah_kursi` AS `jumlah_kursi`,`tbl_mobil`.`status_rental` AS `status_rental`,`tbl_mobil`.`harga_sewa` AS `harga_sewa`,`tbl_mobil`.`foto_mobil` AS `foto_mobil`,`tbl_mobil`.`kode_merk` AS `kode_merk`,`tbl_mobil`.`id_type` AS `id_type`,`tbl_type`.`nama_type` AS `nama_type`,`tbl_merk`.`nama_merk` AS `nama_merk` from ((`tbl_mobil` join `tbl_type` on(`tbl_mobil`.`id_type` = `tbl_type`.`id_type`)) join `tbl_merk` on(`tbl_mobil`.`kode_merk` = `tbl_merk`.`kode_merk`)) ;

-- ----------------------------
-- View structure for `view_transaksi`
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi` AS select `tbl_transaksi`.`tgl_pengambilan` AS `tgl_pengambilan`,`tbl_transaksi`.`tgl_pengembalian` AS `tgl_pengembalian`,`tbl_transaksi`.`lama_rental` AS `lama_rental`,`tbl_transaksi`.`biaya_sopir` AS `biaya_sopir`,`tbl_transaksi`.`bayar_sewa` AS `bayar_sewa`,`tbl_transaksi`.`total_bayar` AS `total_bayar`,`tbl_pelanggan`.`id_pelanggan` AS `id_pelanggan`,`tbl_pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`tbl_pelanggan`.`username` AS `username`,`tbl_pelanggan`.`email` AS `email`,`tbl_pelanggan`.`password` AS `password`,`tbl_pelanggan`.`alamat` AS `alamat`,`tbl_pelanggan`.`telpon` AS `telpon`,`tbl_pelanggan`.`status` AS `status`,`tbl_transaksi`.`no_pengambilan` AS `no_pengambilan`,`view_mobil`.`nama_mobil` AS `nama_mobil`,`view_mobil`.`tahun_beli` AS `tahun_beli`,`view_mobil`.`jumlah_kursi` AS `jumlah_kursi`,`view_mobil`.`status_rental` AS `status_rental`,`view_mobil`.`harga_sewa` AS `harga_sewa`,`view_mobil`.`foto_mobil` AS `foto_mobil`,`view_mobil`.`kode_merk` AS `kode_merk`,`view_mobil`.`id_type` AS `id_type`,`view_mobil`.`nama_type` AS `nama_type`,`view_mobil`.`nama_merk` AS `nama_merk`,`view_mobil`.`no_plat` AS `no_plat` from ((`tbl_transaksi` join `tbl_pelanggan` on(`tbl_transaksi`.`id_pelanggan` = `tbl_pelanggan`.`id_pelanggan`)) join `view_mobil` on(`tbl_transaksi`.`no_plat` = `view_mobil`.`no_plat`)) ;
