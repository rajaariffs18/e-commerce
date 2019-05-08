-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Bulan Mei 2019 pada 23.33
-- Versi server: 8.0.13
-- Versi PHP: 7.1.25

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1545669070),
('m130524_201442_init', 1545669074);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_kabupaten`
--

CREATE TABLE `ref_kabupaten` (
  `Kd_Prov` tinyint(4) NOT NULL,
  `Kd_Kab` tinyint(4) NOT NULL,
  `Nm_Kab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ref_kabupaten`
--

INSERT INTO `ref_kabupaten` (`Kd_Prov`, `Kd_Kab`, `Nm_Kab`) VALUES
(5, 1, 'KAB. TAPANULI TENGAH'),
(5, 2, 'KAB. TAPANULI UTARA'),
(5, 3, 'KAB. TAPANULI SELATAN'),
(5, 4, 'KAB. NIAS'),
(5, 5, 'KAB. LANGKAT'),
(5, 6, 'KAB. KARO'),
(5, 7, 'KAB. DELI SERDANG'),
(5, 8, 'KAB. SIMALUNGUN'),
(5, 9, 'KAB. ASAHAN'),
(5, 10, 'KAB. LABUHANBATU'),
(5, 11, 'KAB. DAIRI'),
(5, 12, 'KAB. TOBA SAMOSIR'),
(5, 13, 'KAB. MANDAILING NATAL'),
(5, 14, 'KAB. NIAS SELATAN'),
(5, 15, 'KAB. PAKPAK BHARAT'),
(5, 16, 'KAB. HUMBANG HASUNDUTAN'),
(5, 17, 'KAB. SAMOSIR'),
(5, 18, 'KAB. SERDANG BEDAGAI'),
(5, 19, 'KAB. BATU BARA'),
(5, 20, 'KAB. PADANG LAWAS UTARA'),
(5, 21, 'KAB. PADANG LAWAS'),
(5, 22, 'KAB. LABUHANBATU SELATAN'),
(5, 23, 'KAB. LABUHANBATU UTARA'),
(5, 24, 'KAB. NIAS UTARA'),
(5, 25, 'KAB. NIAS BARAT'),
(5, 71, 'KOTA MEDAN'),
(5, 72, 'KOTA PEMATANG SIANTAR'),
(5, 73, 'KOTA SIBOLGA'),
(5, 74, 'KOTA TANJUNG BALAI'),
(5, 75, 'KOTA BINJAI'),
(5, 76, 'KOTA TEBING TINGGI'),
(5, 77, 'KOTA PADANGSIDIMPUAN'),
(5, 78, 'KOTA GUNUNGSITOLI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_kecamatan`
--

CREATE TABLE `ref_kecamatan` (
  `Kd_Prov` tinyint(4) NOT NULL,
  `Kd_Kab` tinyint(4) NOT NULL,
  `Kd_Kec` tinyint(4) NOT NULL,
  `Nm_Kec` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_provinsi`
--

CREATE TABLE `ref_provinsi` (
  `Kd_Prov` tinyint(4) NOT NULL,
  `Nm_Prov` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ref_provinsi`
--

INSERT INTO `ref_provinsi` (`Kd_Prov`, `Nm_Prov`) VALUES
(1, 'BALI'),
(2, 'KEPULAUAN BANGKA BELITUNG'),
(3, 'BANTEN'),
(4, 'BENGKULU'),
(5, 'DAERAH ISTIMEWA YOGYAKARTA'),
(6, 'DAERAH KHUSUS IBUKOTA JAKARTA'),
(8, 'JAMBI'),
(9, 'JAWA BARAT'),
(10, 'JAWA TENGAH'),
(11, 'JAWA TIMUR'),
(12, 'KALIMANTAN BARAT'),
(13, 'KALIMANTAN SELATAN'),
(14, 'KALIMANTAN TENGAH'),
(15, 'KALIMANTAN TIMUR'),
(17, 'KEPULAUAN RIAU'),
(18, 'LAMPUNG'),
(21, 'ACEH'),
(22, 'NUSA TENGGARA BARAT'),
(23, 'NUSA TENGGARA TIMUR'),
(26, 'RIAU'),
(29, 'SULAWESI TENGAH'),
(31, 'SULAWESI UTARA'),
(32, 'SUMATERA BARAT'),
(33, 'SUMATERA SELATAN'),
(34, 'SUMATERA UTARA'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA'),
(92, 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_rekening`
--

CREATE TABLE `ref_rekening` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(150) NOT NULL,
  `atas_nama` varchar(150) NOT NULL,
  `nama_atm` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ref_rekening`
--

INSERT INTO `ref_rekening` (`id`, `no_rek`, `atas_nama`, `nama_atm`) VALUES
(1, '213123127838712', 'Adinda Amira', 'Bri'),
(2, '3561235616235612', 'Adinda Amira', 'Bni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_file` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`, `status`, `id_file`) VALUES
(1, 'Gamis', 2, 0),
(2, 'Khimar', 1, 0),
(3, 'Outer', 1, 0),
(4, 'Rok', 1, 0),
(5, 'Set Syari', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_media`
--

CREATE TABLE `tb_kategori_media` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(350) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kategori_media`
--

INSERT INTO `tb_kategori_media` (`id`, `id_produk`, `name`, `filename`, `size`, `type`) VALUES
(1, 1, '43608725_356986128440336_7126646213172798877_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43608725_356986128440336_7126646213172798877_n.jpg', 94449, '.jpg'),
(2, 2, 'h5', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/h5.jpg', 62227, '.jpg'),
(3, 3, 'a1', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a1.jpg', 46748, '.jpg'),
(4, 4, '79e96f09-e76c-4533-82b3-eaa8c390486c', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/79e96f09-e76c-4533-82b3-eaa8c390486c.jpg', 149549, '.jpg'),
(5, 5, '0c980b7d-a056-41ec-be87-58f95a52a146', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/0c980b7d-a056-41ec-be87-58f95a52a146.jpg', 53335, '.jpg'),
(6, 7, 'Screen Shot 2019-04-18 at 20.06.35', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/Screen Shot 2019-04-18 at 20.06.35.png', 1123358, '.png'),
(7, 3, '32918875_634889596845702_6603638446688829440_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/32918875_634889596845702_6603638446688829440_n.jpg', 740637, '.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfimasi_pembayaran`
--

CREATE TABLE `tb_konfimasi_pembayaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `id_file` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_konfimasi_pembayaran`
--

INSERT INTO `tb_konfimasi_pembayaran` (`id`, `id_user`, `nama_pengirim`, `no_pesanan`, `nama_bank`, `jumlah_transfer`, `id_file`) VALUES
(16, 2, 'Arya Duta', 294583, 'Bri', 12755123, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfirmasi_media`
--

CREATE TABLE `tb_konfirmasi_media` (
  `id` int(11) NOT NULL,
  `id_konfirmasi` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(350) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_konfirmasi_media`
--

INSERT INTO `tb_konfirmasi_media` (`id`, `id_konfirmasi`, `name`, `filename`, `size`, `type`) VALUES
(1, 16, 'Screen Shot 2019-04-18 at 20.06.35', '/Users/rajaariffadillah/Sites/uni-rancak/frontend/web/uploads/Screen Shot 2019-04-18 at 20.06.35.png', 1123358, '.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(350) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` smallint(6) NOT NULL,
  `harga_barang` bigint(20) NOT NULL,
  `tanggal_upload` int(11) NOT NULL,
  `kd_kategori` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_barang`, `deskripsi`, `stok`, `harga_barang`, `tanggal_upload`, `kd_kategori`) VALUES
(22, 'gamis 1', 'Gamis 1 Wanita', 15, 213456, 1546011189, 1),
(23, 'Gamis 2', 'Gamis 2 Wanita', 15, 234231, 1546011245, 1),
(24, 'Gamis 3', 'Gamis 3 Wanita', 15, 12321211, 1546011299, 1),
(25, 'Khimar 1', 'Khimar 1 Wanita', 15, 150000, 1555641426, 2),
(26, 'Khimar 2', 'Khimar 2 Wanita', 15, 150000, 1555641488, 2),
(27, 'Outer 1', 'Outer 1 Wanita', 15, 175000, 1555641591, 3),
(28, 'Outer 2', 'Outer 2 Wanita', 17, 175000, 1555641638, 3),
(29, 'Rok 1', 'Deskripsi', 17, 120000, 1555641689, 4),
(30, 'Syari 1', 'Syari 1 Wanita', 15, 200000, 1555641754, 5),
(31, 'Syari 2', 'Syari 2 Wanita', 15, 200000, 1555641802, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk_media`
--

CREATE TABLE `tb_produk_media` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(350) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_produk_media`
--

INSERT INTO `tb_produk_media` (`id`, `id_produk`, `name`, `filename`, `size`, `type`) VALUES
(3, 21, 'Screen Shot 2018-12-18 at 13.59.28', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/Screen Shot 2018-12-18 at 13.59.28.png', 814164, '.png'),
(4, 21, 'Screen Shot 2018-12-18 at 15.07.03', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/Screen Shot 2018-12-18 at 15.07.03.png', 909073, '.png'),
(5, 21, 'Screen Shot 2018-12-21 at 22.07.11', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/Screen Shot 2018-12-21 at 22.07.11.png', 1995016, '.png'),
(6, 21, 'Screen Shot 2018-12-21 at 22.07.25', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/Screen Shot 2018-12-21 at 22.07.25.png', 1058966, '.png'),
(7, 22, '43608725_356986128440336_7126646213172798877_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43608725_356986128440336_7126646213172798877_n.jpg', 94449, '.jpg'),
(8, 22, '44868323_209715896573796_1321991322084182426_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44868323_209715896573796_1321991322084182426_n.jpg', 107970, '.jpg'),
(9, 22, '44887060_353779708715825_5698987327466834135_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44887060_353779708715825_5698987327466834135_n.jpg', 141906, '.jpg'),
(10, 22, '45424767_519467888530645_8448373900692713264_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/45424767_519467888530645_8448373900692713264_n.jpg', 107123, '.jpg'),
(11, 22, '46737411_300485153914309_975797533811839643_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/46737411_300485153914309_975797533811839643_n.jpg', 139198, '.jpg'),
(12, 23, '43748111_182790402670248_4740114858907122239_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43748111_182790402670248_4740114858907122239_n.jpg', 59228, '.jpg'),
(13, 23, '44721709_1899051970185178_6343105257978891793_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44721709_1899051970185178_6343105257978891793_n.jpg', 56654, '.jpg'),
(14, 23, '44790848_338759963630513_7044382354356214633_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44790848_338759963630513_7044382354356214633_n.jpg', 62422, '.jpg'),
(15, 23, '44871203_798896827119283_4427612093396032849_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44871203_798896827119283_4427612093396032849_n.jpg', 61215, '.jpg'),
(16, 24, '44417951_566935193735079_5471050323051920883_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44417951_566935193735079_5471050323051920883_n.jpg', 56542, '.jpg'),
(17, 24, '44498271_252568652085596_5181073777758251952_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44498271_252568652085596_5181073777758251952_n.jpg', 51601, '.jpg'),
(18, 24, '44499476_279936329324674_1127131952547838678_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44499476_279936329324674_1127131952547838678_n.jpg', 47963, '.jpg'),
(19, 24, '44511559_2294258263982789_2532682104359219877_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44511559_2294258263982789_2532682104359219877_n.jpg', 58031, '.jpg'),
(20, 24, '44773058_2160556054262603_8015461450349925362_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44773058_2160556054262603_8015461450349925362_n.jpg', 40815, '.jpg'),
(21, 24, '44774056_481853535640782_2824922404838474979_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44774056_481853535640782_2824922404838474979_n.jpg', 52386, '.jpg'),
(22, 24, '44872558_267156470649974_2624082778253676651_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44872558_267156470649974_2624082778253676651_n.jpg', 57006, '.jpg'),
(23, 24, '45358938_288702668652620_8580271294609611966_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/45358938_288702668652620_8580271294609611966_n.jpg', 59868, '.jpg'),
(24, 24, '46122929_264554604245936_2778760170815549099_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/46122929_264554604245936_2778760170815549099_n.jpg', 51383, '.jpg'),
(25, 25, 'h5', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/h5.jpg', 62227, '.jpg'),
(26, 25, 'img-20180503-154137', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/img-20180503-154137.jpg', 96651, '.jpg'),
(27, 25, 'img-20180503-154458', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/img-20180503-154458.jpg', 104277, '.jpg'),
(28, 25, 'img-20180503-154557', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/img-20180503-154557.jpg', 92501, '.jpg'),
(29, 25, 'whatsappimage2018-11-02at163718', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/whatsappimage2018-11-02at163718.jpeg', 52601, '.jpeg'),
(30, 26, '41220730_176651453264224_4852246944745625586_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/41220730_176651453264224_4852246944745625586_n.jpg', 25051, '.jpg'),
(31, 26, '43628364_257359445134071_4285823511833455830_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43628364_257359445134071_4285823511833455830_n.jpg', 29491, '.jpg'),
(32, 26, '43666839_153682125588470_5674901538162775423_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43666839_153682125588470_5674901538162775423_n.jpg', 24940, '.jpg'),
(33, 26, '43778607_2194971660746370_9147110953431746258_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43778607_2194971660746370_9147110953431746258_n.jpg', 25795, '.jpg'),
(34, 26, '43778945_100440064281744_1410506545550400093_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/43778945_100440064281744_1410506545550400093_n.jpg', 29348, '.jpg'),
(35, 26, '44182040_1409098212557723_4568656831327127183_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44182040_1409098212557723_4568656831327127183_n.jpg', 26059, '.jpg'),
(36, 26, '44626696_310334506456794_4626376629665508308_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/44626696_310334506456794_4626376629665508308_n.jpg', 23512, '.jpg'),
(37, 26, '46072918_316293049206245_8296057872813954624_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/46072918_316293049206245_8296057872813954624_n.jpg', 22810, '.jpg'),
(38, 27, 'a1', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a1.jpg', 46748, '.jpg'),
(39, 27, 'a2', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a2.jpg', 21014, '.jpg'),
(40, 27, 'a3', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a3.jpg', 22678, '.jpg'),
(41, 27, 'a4', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a4.jpg', 27032, '.jpg'),
(42, 27, 'a5', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a5.jpg', 29955, '.jpg'),
(43, 27, 'a6', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a6.jpg', 23562, '.jpg'),
(44, 27, 'a7', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a7.jpg', 22203, '.jpg'),
(45, 28, '32918875_634889596845702_6603638446688829440_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/32918875_634889596845702_6603638446688829440_n.jpg', 740637, '.jpg'),
(46, 28, '33437807_2049722415277023_8025325720345509888_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/33437807_2049722415277023_8025325720345509888_n.jpg', 837226, '.jpg'),
(47, 28, '33473529_1009077922550820_6938065645695139840_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/33473529_1009077922550820_6938065645695139840_n.jpg', 788120, '.jpg'),
(48, 29, '79e96f09-e76c-4533-82b3-eaa8c390486c', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/79e96f09-e76c-4533-82b3-eaa8c390486c.jpg', 149549, '.jpg'),
(49, 29, '309a079a-d923-4be2-82ac-b4037372d4fb', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/309a079a-d923-4be2-82ac-b4037372d4fb.jpg', 129255, '.jpg'),
(50, 29, '996e3fb4-067b-4ed5-b6a1-41bbcfe0f78e', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/996e3fb4-067b-4ed5-b6a1-41bbcfe0f78e.jpg', 119650, '.jpg'),
(51, 29, '56480347-0e6e-4cd0-9ef3-228cd72c899d', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/56480347-0e6e-4cd0-9ef3-228cd72c899d.jpg', 117735, '.jpg'),
(52, 29, 'a2a3f978-40a2-4695-aead-f7760e5a9f9e', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/a2a3f978-40a2-4695-aead-f7760e5a9f9e.jpg', 112944, '.jpg'),
(53, 29, 'wordswag-1519704172453', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/wordswag-1519704172453.png', 2025157, '.png'),
(54, 30, '0c980b7d-a056-41ec-be87-58f95a52a146', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/0c980b7d-a056-41ec-be87-58f95a52a146.jpg', 53335, '.jpg'),
(55, 30, '9b7eb730-c61f-4382-9d29-f6f8a12c1725', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/9b7eb730-c61f-4382-9d29-f6f8a12c1725.jpg', 56784, '.jpg'),
(56, 30, '528004ae-9ca4-477c-bb90-b3b58c1c32f5', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/528004ae-9ca4-477c-bb90-b3b58c1c32f5.jpg', 52108, '.jpg'),
(57, 30, '04264011-a299-40e0-bb6f-a348397592b9', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/04264011-a299-40e0-bb6f-a348397592b9.jpg', 55696, '.jpg'),
(58, 30, 'ae48aa3b-589b-4bd7-91db-c24279a26c2d', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/ae48aa3b-589b-4bd7-91db-c24279a26c2d.jpg', 57341, '.jpg'),
(59, 31, '47338178_2200801053518441_4967187277912439982_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/47338178_2200801053518441_4967187277912439982_n.jpg', 143326, '.jpg'),
(60, 31, '47382564_722969058101929_704744896620002446_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/47382564_722969058101929_704744896620002446_n.jpg', 126723, '.jpg'),
(61, 31, '47581388_123391092023930_4541844608242608162_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/47581388_123391092023930_4541844608242608162_n.jpg', 47344, '.jpg'),
(62, 31, '47583175_1162542277243885_5663921342171729202_n', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/47583175_1162542277243885_5663921342171729202_n.jpg', 83790, '.jpg'),
(63, 31, '47585865_312616159586945_6670814646680151547_n (1)', '/Users/rajaariffadillah/Sites/uni-rancak/backend/web/uploads/47585865_312616159586945_6670814646680151547_n (1).jpg', 88671, '.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_barang`
--

CREATE TABLE `tb_transaksi_barang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `status_transaksi` tinyint(4) NOT NULL,
  `kd_prov` int(11) DEFAULT NULL,
  `kd_city` int(11) DEFAULT NULL,
  `alamat` text,
  `harga_final` bigint(20) DEFAULT NULL,
  `kurir` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_transaksi_barang`
--

INSERT INTO `tb_transaksi_barang` (`id`, `id_user`, `id_transaksi`, `id_barang`, `qty`, `catatan`, `total_harga`, `status_transaksi`, `kd_prov`, `kd_city`, `alamat`, `harga_final`, `kurir`) VALUES
(1, 2, 294583, 22, 2, 'Warnah Putih', 426912, 3, NULL, 278, NULL, 12755123, NULL),
(2, 2, 294583, 24, 1, 'Warna kuning', 12321211, 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_data`
--

CREATE TABLE `tb_transaksi_data` (
  `id_user` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_depan` varchar(225) NOT NULL,
  `nama_belakang` varchar(225) NOT NULL,
  `kode_pos` varchar(225) NOT NULL,
  `no_telp` varchar(225) NOT NULL,
  `metode_pembayaran` varchar(225) NOT NULL,
  `estimasi_pengiriman` varchar(225) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL,
  `kd_atm` varchar(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kab_kota` varchar(255) NOT NULL,
  `alamat` varchar(355) NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_transaksi_data`
--

INSERT INTO `tb_transaksi_data` (`id_user`, `id_transaksi`, `nama_depan`, `nama_belakang`, `kode_pos`, `no_telp`, `metode_pembayaran`, `estimasi_pengiriman`, `ongkos_kirim`, `kd_atm`, `provinsi`, `kab_kota`, `alamat`, `total_pembayaran`, `status`) VALUES
(2, 294583, 'Arya', 'Duta', '', '', 'jne', '1-2', 7000, '1', 'Sumatera Utara', 'Medan', 'Medan kota', 12755123, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `alamat`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1Kkca8uFwzBo1sS4Ntzk1QgoJ_b2t0tY', '$2y$13$bdYG0QWtvr7f.P8.tBy/W.ikdE.Z4nWw7L8yM8RUqh0cC8FOgLpeK', NULL, 'admin@gmail.com', 10, '', '', NULL, '', '', '', 1545669240, 1545669240),
(2, 'user', 'Y1pi7U8SM_wm3Trk9dmLeEevEVW8NaUj', '$2y$13$6kGamV1V6R9ITY2LeoY4.O/PZ0oeChTZ6.ZW7k/v1jO1/jcCsHECG', NULL, 'user@email.com', 10, '', '', NULL, '', '', '', 1548808228, 1548808228),
(3, 'aa', 'WsYUQw4XNGX58kl13o4cnHn_0kHSKKcj', '$2y$13$.fcviLi0YCnOAOdv8OYQjey567S1PrwCHZMaDOgtvcY8q0GlOwd9O', NULL, 'a@a.com', 10, '', '', NULL, '', '', '', 1554728834, 1554728834),
(4, 'anra', 'X_4hQenaq0zd5JAUSAbOiNZwbPQLtT3q', '$2y$13$se.SFsBytbmbOWJBeRJ7O.RDeenA3Ywsc9EFeZQ6FfA4SypVnBCWa', NULL, 'anra@gmail.com', 10, 'anra', 'Medan', '1995-06-19', '081234567898', 'Medan Barat', 'user', 1557357602, 1557357602);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `ref_kabupaten`
--
ALTER TABLE `ref_kabupaten`
  ADD PRIMARY KEY (`Kd_Prov`,`Kd_Kab`) USING BTREE;

--
-- Indeks untuk tabel `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD PRIMARY KEY (`Kd_Prov`,`Kd_Kab`,`Kd_Kec`) USING BTREE;

--
-- Indeks untuk tabel `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  ADD PRIMARY KEY (`Kd_Prov`,`Nm_Prov`);

--
-- Indeks untuk tabel `ref_rekening`
--
ALTER TABLE `ref_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_media`
--
ALTER TABLE `tb_kategori_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_konfimasi_pembayaran`
--
ALTER TABLE `tb_konfimasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_konfirmasi_media`
--
ALTER TABLE `tb_konfirmasi_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk_media`
--
ALTER TABLE `tb_produk_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi_barang`
--
ALTER TABLE `tb_transaksi_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi_data`
--
ALTER TABLE `tb_transaksi_data`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ref_rekening`
--
ALTER TABLE `ref_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_media`
--
ALTER TABLE `tb_kategori_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_konfimasi_pembayaran`
--
ALTER TABLE `tb_konfimasi_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_konfirmasi_media`
--
ALTER TABLE `tb_konfirmasi_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_produk_media`
--
ALTER TABLE `tb_produk_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_barang`
--
ALTER TABLE `tb_transaksi_barang`
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
-- Ketidakleluasaan untuk tabel `ref_kabupaten`
--
ALTER TABLE `ref_kabupaten`
  ADD CONSTRAINT `FK_Ref_Kabupaten` FOREIGN KEY (`Kd_Prov`) REFERENCES `ref_provinsi` (`kd_prov`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD CONSTRAINT `FK_Ref_Kecamatan` FOREIGN KEY (`Kd_Prov`,`Kd_Kab`) REFERENCES `ref_kabupaten` (`kd_prov`, `kd_kab`) ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
