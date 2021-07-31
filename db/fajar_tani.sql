-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jul 2021 pada 06.48
-- Versi server: 10.2.32-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukacod_fajar_tani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_user`
--

CREATE TABLE `t_detail_user` (
  `detail_id` int(11) NOT NULL,
  `detail_id_user` int(11) DEFAULT NULL,
  `detail_jabatan` varchar(50) DEFAULT NULL,
  `detail_pendidikan` text DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `detail_biodata` text DEFAULT NULL,
  `detail_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_user`
--

INSERT INTO `t_detail_user` (`detail_id`, `detail_id_user`, `detail_jabatan`, `detail_pendidikan`, `detail_alamat`, `detail_biodata`, `detail_hapus`) VALUES
(1, 1, 'pegawai UD FAJAR TANI', '-', 'Pandanarum ', '-', 0),
(4, 2, NULL, NULL, NULL, NULL, 1),
(5, 3, NULL, NULL, NULL, NULL, 1),
(6, 4, NULL, NULL, NULL, NULL, 0),
(7, 2, NULL, NULL, NULL, NULL, 1),
(8, 3, NULL, NULL, NULL, NULL, 1),
(9, 3, NULL, NULL, NULL, NULL, 1),
(10, 4, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_diagnosa`
--

CREATE TABLE `t_diagnosa` (
  `diagnosa_id` int(11) NOT NULL,
  `diagnosa_user` text NOT NULL,
  `diagnosa_indikasi` text NOT NULL,
  `diagnosa_penyakit` text NOT NULL,
  `diagnosa_obat` text NOT NULL,
  `diagnosa_status` text NOT NULL,
  `diagnosa_hapus` int(11) NOT NULL DEFAULT 0,
  `diagnosa_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_diagnosa`
--

INSERT INTO `t_diagnosa` (`diagnosa_id`, `diagnosa_user`, `diagnosa_indikasi`, `diagnosa_penyakit`, `diagnosa_obat`, `diagnosa_status`, `diagnosa_hapus`, `diagnosa_tanggal`) VALUES
(68, '2', '1,0,0,0', '1', '4', 'belum pasti', 1, '2021-07-11'),
(69, '1', '1,3,0,5', '1', '4', 'belum pasti', 1, '2021-07-15'),
(70, '1', '1,0,0,0', '1', '4', 'belum pasti', 1, '2021-07-15'),
(71, '2', '1,3,0,5', '1', '4', 'belum pasti', 1, '2021-07-15'),
(72, '1', '6,7,0,0,0,11,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '3', '8', 'belum pasti', 0, '2021-07-17'),
(73, '1', '6,0,8,9,10,11,12,13,14,15,16,18,19,20,21,22,23,24,25,26,27,28', '3', '8', 'belum pasti', 0, '2021-07-19'),
(74, '1', '8', '4', '9', 'pasti', 0, '2021-07-26'),
(75, '1', '11,12', '8', '13', 'pasti', 0, '2021-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_indikasi`
--

CREATE TABLE `t_indikasi` (
  `indikasi_id` int(11) NOT NULL,
  `indikasi_nama` text NOT NULL,
  `indikasi_hapus` int(11) NOT NULL DEFAULT 0,
  `indikasi_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_indikasi`
--

INSERT INTO `t_indikasi` (`indikasi_id`, `indikasi_nama`, `indikasi_hapus`, `indikasi_tanggal`) VALUES
(1, 'Daun lebat buah kecil-kecil', 1, '2020-08-01'),
(3, 'Akar kering', 1, '2020-08-02'),
(4, 'Buah cepat busuk', 1, '2020-08-02'),
(5, 'Daun Menguning', 1, '2020-08-02'),
(6, 'Ulat Grayak Spodoptera Litura / Ulat Hijau', 0, '2021-07-15'),
(7, 'Walang Sangit Leptocorisa Oratorius', 0, '2021-07-15'),
(8, 'Penyakit Bercak Daun Cercospora Sp (jamur daun)', 0, '2021-07-15'),
(9, 'Serangan Jamur Pyricularia Oryzae', 0, '2021-07-15'),
(10, 'Gulma Berdaun Lebar Alternanthera Sessilis ', 0, '2021-07-15'),
(11, 'Wereng Coklat Nilaparvata Lugens', 0, '2021-07-15'),
(12, 'Penggerek Batang Scirpophaga Sp (hewan ngengat)', 0, '2021-07-15'),
(13, 'Kutu Daun Myzus Persicae, Hama Trips Thrips Parvispinus', 0, '2021-07-15'),
(14, 'Kepik Hitam Ramping Pachybarachlus Pallicornis', 0, '2021-07-15'),
(15, 'Busuk Pelepah Pada Tanaman ', 0, '2021-07-15'),
(16, 'Belalang Patanga Succincta', 0, '2021-07-15'),
(17, 'Penggerek Batang Tryporiza Innotata', 1, '2021-07-15'),
(18, 'Penggerek Batang Tryporiza Innotata', 0, '2021-07-15'),
(19, 'Hama Orong-Orong Gryllotalpa Sp', 0, '2021-07-15'),
(20, 'Semut Solenopsis Germinate', 0, '2021-07-15'),
(21, 'Penyakit Bulai Peronosclerospora Maydis', 0, '2021-07-15'),
(22, 'Penyakit Hawar Daun Xanthomonas Oryzae', 0, '2021-07-15'),
(23, 'Penyakit Bakteri Daun Bergores Xanthomonas Oryzae', 0, '2021-07-15'),
(24, 'Penggerek Buah', 0, '2021-07-15'),
(25, 'Penyakit Hawar Daun Rhizoctonia Solani', 0, '2021-07-15'),
(26, 'Penyakit Hawar Daun Helminthosporium Turcicum (Jagung)', 0, '2021-07-15'),
(27, 'Wereng Hijau Nephotettix Sp', 0, '2021-07-15'),
(28, 'Penyakit Antraknosa Buah', 0, '2021-07-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log`
--

CREATE TABLE `t_log` (
  `log_id` int(11) NOT NULL,
  `log_user` text NOT NULL,
  `log_kode` text NOT NULL,
  `log_obat` text NOT NULL,
  `log_stok` text NOT NULL,
  `log_harga` text NOT NULL,
  `log_jumlah` int(11) NOT NULL DEFAULT 1,
  `log_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_log`
--

INSERT INTO `t_log` (`log_id`, `log_user`, `log_kode`, `log_obat`, `log_stok`, `log_harga`, `log_jumlah`, `log_status`) VALUES
(32, '2', 'K01', 'BESVIDOR 25 WP', '', '25000', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_obat`
--

CREATE TABLE `t_obat` (
  `obat_id` int(11) NOT NULL,
  `obat_foto` text NOT NULL,
  `obat_kode` text NOT NULL,
  `obat_nama` text NOT NULL,
  `obat_aturan` text NOT NULL,
  `obat_harga` text NOT NULL,
  `obat_stok` text NOT NULL,
  `obat_hapus` int(11) NOT NULL DEFAULT 0,
  `obat_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_obat`
--

INSERT INTO `t_obat` (`obat_id`, `obat_foto`, `obat_kode`, `obat_nama`, `obat_aturan`, `obat_harga`, `obat_stok`, `obat_hapus`, `obat_tanggal`) VALUES
(4, 'dessert_donut.png', 'OBT01', 'DECIS 25 EC 250 ML', 'Gunakan pagi hari campur dengan air 500ml', '12000', '', 1, '2021-07-13'),
(5, 'dessert_ics.png', 'OBT02', 'Pestisida imidakloprid TIODOR 30 WP 100 gram', 'Campur dengan air 300ml\r\n', '7000', '', 1, '2021-07-13'),
(6, '', 'OBT03', 'INSEKTISIDA PENGENDALI HAMA WERENG KUTU', 'Gunakan pagi hari campur dengan air 500ml', '15000', '', 1, '2021-06-16'),
(7, '444fdb5c9f724e94f61861a2fa1d576c.jpg', '2121', 'dd', '13dsd', '12123', '', 1, '2021-07-15'),
(8, 'Besvidor.jpeg', 'K01', 'BESVIDOR 25 WP', 'Cabai : ulat grayak Spodoptera litura (Penyemprotan volume tinggi : 0,75 - 1 g/l)\r\nPadi : walang sangit Leptocorisa oratorius (Penyemprotan volume tinggi : 1 - 2 g/l)\r\nPadi : wereng coklat Nilaparvata lugens, penggerek batang Scirpophaga incertulas (Penyemprotan volume tinggi : 1,5 - 2 g/l)', '25000', '9', 0, '2021-07-26'),
(9, 'K02.jpeg', 'K02', 'ANTRACOL 70 WP', 'Cabai merah : penyakit bercak daun Cercospora sp. (Penyemprotan volume tinggi : 2 - 4 g/l)\r\nCabai merah : penyakit antraknosa buah Colletotrichum sp. (Penyemprotan volume tinggi : 1 - 2 g/l)\r\nPadi sawah : penyakit bercak daun Cercospora sp., penyakit busuk pelepah Rhizoctonia solani, penyakit bercak coklat Cercospora janseana (Penyemprotan volume tinggi : 250 - 1000 g/ha)', '35000', '9', 0, '2021-07-21'),
(10, 'K03.jpeg', 'K03', 'SAMAR 75 WP', 'Padi : penyakit blast Pyricularia oryzae (Penyemprotan volume tinggi : 2 g/l)', '50000', '9', 0, '2021-07-21'),
(11, 'K04.jpeg', 'K04', 'NOXONE 297 SL', 'Jagung : gulma berdaun lebar Ageratum conyzoides, synedrella nodiflora, Borreria sp., Murdania nodiflora, amaranthus spinosus ; gulma berdaun sempit Elausine indica, Pasalum conjugatum, teki Cyperus sp. (Penyemprotan volume tinggi : 1 - 2 l/ha)\r\nPadi sawah : gulma berdaun lebar Alternanthera sessilis, Ludwigia octovalvis, Monochoria vaginalis, gulma berdaun sempit, Echinochloa crus-galli, teki Cyperus iria (Penyemprotan volume tinggi : 1 - 2 l/ha)\r\nPadi sawah pasang surut : gulma berdaun lebar Aeschynomene indica, Alternanthera sessilis, Limnocharis flava, Ludwigia octovalvis, Sphenochlea zeylanica, gulma berdaun sempit Leersia hexandra, Leptochloa chinensis, teki Cyerus malaccensis, Eleucaris dulcis (Penyemprotan volume tinggi : 1,5 - 2 l/ha)', '65000', '10', 0, '2021-07-21'),
(12, 'K05.jpeg', 'K05', 'CONFIDOR 5 WP', 'Cabai : kutu daun Myzus persicae, hama trips Thrips parvispinus (penyemprotan volume tinggi : 2 - 4 g/l)\r\nPadi sawah : walang sangit Leptocorisa acuta (Penyemprotan volume tinggi : 0,8 kg/ha)\r\nPadi sawah : kepik hitam ramping Pachybarachlus pallicornis (Penyemprotan volume tinggi : 0,2 - 0,4 kg/ha)\r\nPadi sawah: wereng coklat Nilaparvata lugens (Penyemprotan volume tinggi: 300 g/ha )', '33000', '10', 0, '2021-07-21'),
(13, 'K06.jpeg', 'K06', 'TRISULA 450 SL', 'Padi : wereng coklat Nilaparvata lugens (Penyemprotan volume tinggi : 0,5 - 1 ml/l)\r\nPadi : penggerek batang Scirpophaga sp. (Penyemprotan volume tinggi : 0,75 - 1,5 ml/l)', '25000', '10', 0, '2021-07-21'),
(14, 'K07.jpeg', 'K07', 'SIDAMETHRIN 50 EC', 'Jagung : belalang Patanga succincta (Penyemprotan volume tinggi : 1 ml/l)\r\n', '35000', '10', 0, '2021-07-21'),
(15, 'K08.jpeg', 'K08', 'REGENT 50 SC', 'Cabai : hama trips Thrips parvispinus, kutu daun Myzus persicae (Penyemprotan volume tinggi : 1 - 2 ml/l)\r\nJagung : belalang Locusta sp. (Penyemprotan volume tinggi : 0,25 - 0,5 ml/l)\r\nJagung : semut Solenopsis germinate\r\npadi : walang sangit Leptocorisa oratorius, wereng coklat Nilaparvata lugens, penggerek batang Tryporiza innotata (Penyemprotan volume tinggi : 0,375 l/ha)\r\nPadi : hama orong-orong Gryllotalpa sp. (Perlakuan benih : 6,25 - 12,5 ml/lkg benih)', '40000', '10', 0, '2021-07-21'),
(16, 'K09.jpeg', 'K09', 'MASALGIN 50 WP', 'Cabai merah : penyakit antraknosa buah Colletotrichum capsici, penyakit bercak daun Ceroospora capsici (Penyemprotan volume tinggi: 2 g/l)', '30000', '10', 0, '2021-07-21'),
(17, 'K10.jpeg', 'K10', 'DUPONT LANNATE 40 SP', 'Bawang Merah : Ulat Grayak (dosis 1-2 g/l) (Volume semprot 450-1050 l/ha)\r\nBawang Putih : Ulat Grayak (dosis 1-2 g/l) (Volume semprot 500 l/ha)\r\nCabai : Ulat Grayak (dosis 1-2 g/l) (Volume semprot 600 l/ha)\r\nJeruk : Tungau Merah (dosis 0.5-1 g/l) (Volume semprot 500-1000 l/ha)\r\nTomat : Penggerek Buah (dosis 2-4 g/l) (Volume semprot 600 l/ha)', '40000', '10', 0, '2021-07-21'),
(18, 'K11.jpeg', 'K11', 'NORDOX 56 WP', 'Pada tanaman padi: Diaplikasikan bersamaan dengan pemupukan NPK/UREA sebelum tanam, yakni 15 dan 30 hari sejak tanam.\r\nPada tanaman kakao: NORDOX 56 WP berperan sebagai fungisida terbaik dalam mengendalikan kanker batang, busuk buah, dan lumut.\r\nJika masih terdapat serangan tertular dari luar hamparan, maka semprotkan NORDOX 56 WP dengan interval\r\nsekali seminggu hingga serangan penyakit berhenti berkembang.\r\nDapat digunakan sebagai perlakuan benih untuk tanaman jagung.', '25000', '9', 0, '2021-07-21'),
(19, 'K12.jpeg', 'K12', 'KLOPINDO 10 WP', 'CABAI - Hama : kutu daun\r\nDosis : 0,5-1g/l\r\nKENTANG - Hama : kutu daun dan trips\r\nDosis : 1-2g/l\r\nPADI - Hama : wereng coklat dan walang sangit\r\nDosis : 0,2-0,4g/l\r\nSEMANGKA - Hama : kutu daun dan trips\r\nDosis : 0,25-5g/l\r\nAplikasi dilakukan pada saat populasi/intensitas serangan hama telah mencapai ambang pengendalianya sesuai dengan rekomendasi setempat.', '20000', '15', 0, '2021-07-21'),
(20, 'K13.jpeg', 'K13', 'METINDO 40 SP', 'insektisida ini berbentuk tepung berwarna putih sampai krem yang dapat membentuk suspensi dalam air, bekerja sebagai racun kontak dan lambung yang bersifat sistemik dalam jaringan tanaman untuk mengendalikan hama Ulat Grayak, Penggerek Buah, Penggerek pucuk, dan perusak daun.\r\n\r\nBerat bersih: 200 gram\r\nBahan aktif: metomil : 40 %\r\nInsektisida sistemik racun kontak dan lambung berbentuk tepung yang dapat larut dalam air.', '10000', '50', 0, '2021-07-21'),
(21, 'K14.jpeg', 'K14', 'EXPLORE 250 EC', 'Explore 250 EC adalah fungisida sistemik dan sebagai zat pengatur tumbuh berwarna kuning kecoklatan berbentuk pekatan yang dapat diemulsikan untuk mengendalikan penyakit pada tanaman padi sawah, cabai, tomat, bawang merah, jagung, kentang, jeruk, kacang panjang, kedelai, krisan, semangka karet, kelapa sawit, tembakau dan mangga.', '120000', '7', 0, '2021-07-21'),
(22, 'K15.jpeg', 'K15', 'TRIVIA 73 WP', 'Jagung : penyakit bulai Peronosclerospora maydis, penyakit hawar daun Helminthosporium turcicum (Penyemprotan volume tinggi : 2 kg/ha)\r\nJagung: penyakit bulai Peronosclerospora maydis  (Perlakuan benih: 15 - 20 g/kg benih)\r\nJagung: penyakit bulai Peronosclerospora maydis penyakit hawar daun Helminthosporium turcicum  (Penyemprotan volume tinggi: 2 kg/ha)\r\nCabai : penyakit antraknosa Colletotrichum capsici, penyakit busuk buah Phytohthora capsici (Penyemprotan volume tinggi : 1,5 - 2,25 kg/ha)\r\nPadi : penyakit bercak coklat Cercospora janseana, penyakit blas Pyricularia oryzae, penyakit hawar pelepah Rhizoctonia solani, penyakit hawar daun Xanthomonas oryzae, penyakit bercak bulir gabah Cercospora janseana (Penyemprotan volume tinggi : 1 - 1,5 kg/ha)\r\nKedelai : penyakit karat daun Phakospora pachyrhizi (Penyemprotan volume tinggi : 1,5 kg/ha)', '30000', '10', 0, '2021-07-21'),
(23, 'K16.jpeg', 'K16', 'TOPSIN-M 70 WP', '- Rekomendasi Waktu: Pagi hari atau sore hari\r\n- Rekomendasi Dosis: 1g/l -1,5g/l atau 14gr – 21gr per tengki 14 liter\r\n- Rekomendasi Lainnya: Semprot 1x dalam 7 – 10 hari untuk pencegahan, 2-3x semprot dalam 7 hari bila terkena serangan', '25000', '20', 0, '2021-07-21'),
(24, 'K17.jpeg', 'K17', 'GARDARA 10 SP', 'Gardara merupakan insektisida dengan bahan aktif nitenpiram, Nitenpiram adalah bahan aktif yang sangat ampuh untuk membasmi trips, kutu kebul, dan walang sangit.\r\n\r\nInsektisida racun kontak dan lambung berbentuk tepung yang dapat dilarutkan dalam air yang berwarna kuning muda untuk mengendalikan hama pada tanaman padi.\r\nBahan aktif : Nitenpiram 10 %', '37500', '8', 0, '2021-07-21'),
(25, 'K18.jpeg', 'K18', 'APPLAUD 10 WP', 'Cabai merah : tungau teh kuning Polyphagotarsonemus latus (Penyemprotan volume tinggi : 0,5 - 1 kg/ha)\r\nKedelai : kutu putih Polyphagotarsonemus latus (Penyemprotan volume tinggi : 1 - 2 kg/ha)\r\nPadi : wereng coklat Nilaparvata lugens (Penyemprotan volume tinggi : 0,75 - 1 kg/ha)\r\nPadi : wereng hijau Nephotettix sp. (Penyemprotan volume tinggi : 0,25 - 0,5 kg/ha)\r\nTeh : wereng daun Empoasca sp. (Penyemprotan volume tinggi : 0,25 - 0,5 kg/ha)', '20000', '20', 0, '2021-07-21'),
(26, 'K19.jpeg', 'K19', 'MIPCINTA 50 WP', 'Jagung : belalang Locusta sp. (Penyemprotan volume tinggi : 2 g/l )\r\nKakao : pengisap buah Helopeltis antonii (Penyemprotan volume tinggi :0,75 g/l)\r\nKedelai: lalat bibit Agromyza sp. Penggerek polong Etiella zinckenella (Penyemprotan volume tinggi: 2 kg/ha )\r\nLada: penghisap daun Dasynus piperis (Penyemprotan volume tinggi: 1 kg/ha )\r\nPadi: Hama putih palsu Cnaphalocrosis medinalis  (Penyemprotan volume tinggi: 3 g/l )\r\nPadi: wereng hijau Nephotetix virescens (Penyemprotan volume tinggi: 0,25 kg/ha )\r\nPadi: wereng coklat Nilaparvata lugens walang sangit Leptocorisa oratorius (Penyemprotan volume tinggi: 2 kg/ha )', '16000', '24', 0, '2021-07-21'),
(27, 'K20.jpeg', 'K20', 'ACROBAT 50 WP', 'KENTANG\r\n-Penyakit : busuk daun\r\n-Dosis : 0,5-1g/l\r\nTEMBAKAU\r\n-Penyakit : lanas\r\n-Dosis : 1-1,25g/l\r\nCABAI\r\n-Penyakit : bercak daun\r\n-Dosis : 2-4g/l\r\nSEMANGKA\r\n-Penyakit : embun bulu dan antraknosa\r\n-Dosis : 0,25-0,5g/l\r\nJAGUNG\r\n-Penyakit : bulai\r\n-Dosis : sebagai perlakuan benih : 1,25-2,5g/kg benih\r\nCARA :\r\nPenyemprotan volume tinggi pada umur 21-70 hari setelah tanam, apabila ditemukan gejala serangan dan kelembaban >90% dengan interval 7-14 hari tergantung serangan penyakit.\r\nSetelah benih dibasahi dengan air, campurkan secara merata.', '30000', '30', 0, '2021-07-21'),
(28, 'K21.jpeg', 'K21', 'SAROMYL 35 SD', 'Perlakuan benih jagung: penyakit bulai Peronosclerospora maydis (Perlakuan benih: 1,25 g/kg benih)\r\nTembakau : penyakit lanas Phytophthora nicotianae (Penyemprotan volume tinggi: 1 g/l)', '8000', '15', 0, '2021-07-21'),
(29, 'K22.jpeg', 'K22', 'RECOR 250 EC', 'Bawang merah : penyakit bercak ungu Alternaria porri (Penyemprotan volume tinggi : 0,5 - 1 ml/l)\r\nJeruk : penyakit embun tepung Oidium sp. (Penyemprotan volume tinggi : 0,5 - 1 ml/l)\r\npadi : penyakit hawar pelepah Rhizoctonia sp. (Penyemprotan volume tinggi : 1ml/ha)\r\npadi : penyakit busuk batang Helminthosporium sigmoideum (Penyemprotan volume tinggi : 250 - 500 ml/ha)\r\nPadi sawah : meningkatkan tinggi tanaman, jumlah anakan produktif, jumlah gabah/malai, bobot 1000 butir, panjang malai, hasil/tanaman, hasil ubinan, hasil/ha (Penyemprotan volume tinggi : 375 - 500 ml/l (45 HST dan 60 HST))', '90000', '6', 0, '2021-07-21'),
(30, 'K23.jpeg', 'K23', 'CRONUS 18 EC', 'Bawang merah : hama trips Thrips tabaci (Penyemprotan volume tinggi : 1 ml/l)\r\nBawang merah : pengorok daun Liriomyza chinensis (Penyemprotan volume tinggi : 0,75 - 1 ml/l)\r\nCabai merah : hama thrips Thrips parvispinus, hama kutu daun Myzus persicae (Penyemprotan volume tinggi : 1,5 ml/l)\r\nTomat : hama thrips Thrips parvispinus, hama kutu daun Myzus persicae (Penyemprotan volume tinggi : 1 ml/l)\r\nDosis pakai\r\n10-20ml per 16 liter air/per tangki', '85000', '9', 0, '2021-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penyakit`
--

CREATE TABLE `t_penyakit` (
  `penyakit_id` int(11) NOT NULL,
  `penyakit_nama` text NOT NULL,
  `penyakit_deskripsi` text NOT NULL,
  `penyakit_obat` int(11) DEFAULT NULL,
  `penyakit_hapus` int(11) NOT NULL DEFAULT 0,
  `penyakit_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_penyakit`
--

INSERT INTO `t_penyakit` (`penyakit_id`, `penyakit_nama`, `penyakit_deskripsi`, `penyakit_obat`, `penyakit_hapus`, `penyakit_tanggal`) VALUES
(1, 'Di serang wereng walang', 'Cek dan test phone kemungkinan pesawat telepone pelanggan', 4, 1, '2020-08-02'),
(2, 'Akar keropos', 'Akar keropos dan kering', 5, 1, '2021-06-05'),
(3, 'K01', 'Bahan Aktiv imidakloprid : 25 %,\r\nInsektisida racun kontak dan lambung berbentuk tepung yang dapat disuspensikan.', 8, 0, '2021-07-17'),
(4, 'K02', 'Bahan Aktiv propineb : 70 %,\r\nFungisida kontak yang bersifat protektif berbentuk tepung yang dapat disuspensikan.', 9, 0, '2021-07-21'),
(5, 'K03', 'Bahan Aktiv trisiklazol : 75 %,\r\nFungisida sistemik berbentuk tepung yang dapat disuspensikan.', 10, 0, '2021-07-21'),
(6, 'K04', 'parakuat diklorida (setara dengan ion parakuat: 215 g/l) : 297 g/l,\r\nHerbisida kontak purna tumbuh berbentuk larutan dalam air.', 11, 0, '2021-07-21'),
(7, 'K05', 'Bahan Aktiv imidakloprid (imidacloprid) : 5 %,\r\nInsektisida sistemik racun kontak dan lambung berbentuk tepung yang dapat disuspensikan.', 12, 0, '2021-07-21'),
(8, 'K06', 'Bahan Aktiv monosultap : 450 g/l,\r\nInsektisida racun kontak, lambung dan sistemik berbentuk larutan dalam air.', 13, 0, '2021-07-21'),
(9, 'K07', 'Bahan Aktiv, sipermetrin (cypermethrin) : 50 g/l,\r\nInsektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan', 14, 0, '2021-07-21'),
(10, 'K08', 'Bahan Aktiv fipronil : 50 g/l,\r\nInsektisida sistemik racun kontak, lambung dan zat pengatur tumbuh tanaman berbentuk pekatan suspensi.', 15, 0, '2021-07-21'),
(11, 'K09', 'Bahan Aktiv benomil (benomyl) : 50 %,\r\nFungisida sistemik berbentuk tepung yang dapat disuspensikan.', 16, 0, '2021-07-21'),
(12, 'K10', 'Bahan Aktiv metomil 40 %,\r\nInsektisida sistemik racun kontak dan lambung yang berbentuk bubuk warna biru muda yang dapat disuspensikan dalam air ', 17, 0, '2021-07-21'),
(13, 'K11', 'Bahan Aktiv setara dengan tembaga (copper active equivalent) : 50 %,\r\ntembaga oksida (copper oxide) : 56 %,\r\nFungisida kontak berbentuk tepung yang dapat disuspensikan.', 18, 0, '2021-07-21'),
(14, 'K12', ' Bahan Aktif imidakloprid 10 %,\r\n yang dapat diserap dan diangkut ke sluruh bagian tanaman, sehingga serangga hama yang memakan setiap bagian tanaman akan mati. Serangga hama akan pula bila terkena langsung semprotan atau bersentuhan dengan permukaan daun/bagian lain dari tanaman yang disemprot.', 19, 0, '2021-07-21'),
(15, 'K13', 'Bahan Aktif metomil 40%,  Yangdapat diserap dan diangkut keseluruh bagian tanaman, sehingga seranggahama yang memakan setiap bagian tanaman akan mati. ', 20, 0, '2021-07-21'),
(16, 'K14', 'Bahan Aktiv difenokonazol (difenoconazole) : 250 g/l, \r\nFungisida sistemik yang bersifat preventif dan kuratif berbentuk pekatan yang dapat diemulsikan.', 21, 0, '2021-07-21'),
(17, 'K15', 'Bahan Aktiv fluopikolid : 6 %, \r\npropineb : 67 %,\r\nFungisida kontak yang bersifat protektif berbentuk tepung yang dapat disuspensikan.', 22, 0, '2021-07-21'),
(18, 'K16', 'Bahan Aktif Metil Tiofanat 70%, \r\nFungisida sistemik berbentuk tepung yang dapat disuspensikan, berwarna putih kecoklatan,', 23, 0, '2021-07-21'),
(19, 'K17', 'Bahan Aktiv Nitenpiram 10%, ', 24, 0, '2021-07-21'),
(20, 'K18', 'Bahan Aktiv buprofezin : 10 %, \r\nInsektisida penghambat perkembangan khitin berbentuk tepung yang dapat disuspensikan', 25, 0, '2021-07-21'),
(21, 'K19', 'Bahan Aktiv MIPC : 50 %, \r\nInsektisida racun kontak dan lambung berbentuk tepung yang dapat disuspensikan.', 26, 0, '2021-07-21'),
(22, 'K20', 'Bahan Aktif dimetomorf 50%,\r\nberbentuk tepung berwarna putih', 27, 0, '2021-07-21'),
(23, 'K21', 'Bahan Aktiv metalaksil : 35 %, \r\nFungisida sistemik berbentuk pekatan suspensi untuk aplikasi langsung.', 28, 0, '2021-07-21'),
(24, 'K22', 'Bahan Aktiv difenokonazol : 250 g/l, \r\nFungisida sistemik dan zat pengetur tumbuh tanaman berbentuk pekatan yang dapat diemulsikan.', 29, 0, '2021-07-21'),
(25, 'K23', 'Bahan Aktiv abamektin (abamectin) : 18 g/l, \r\nInsektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan.', 30, 0, '2021-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rules`
--

CREATE TABLE `t_rules` (
  `rules_id` int(11) NOT NULL,
  `rules_nama` text NOT NULL,
  `rules_gangguan` text NOT NULL,
  `rules_indikasi` text NOT NULL,
  `rules_penyakit` text NOT NULL,
  `rules_hapus` int(11) NOT NULL DEFAULT 0,
  `rules_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rules`
--

INSERT INTO `t_rules` (`rules_id`, `rules_nama`, `rules_gangguan`, `rules_indikasi`, `rules_penyakit`, `rules_hapus`, `rules_tanggal`) VALUES
(4, 'Rules 1', '1', '1,3,4,5', '1', 1, '2020-08-03'),
(6, 'Rules 2', '', '4,5', '2', 1, '2021-07-15'),
(7, 'Rules 1', '', '6,8,18', '3', 1, '2021-07-17'),
(8, 'Rules 2', '', '8', '4', 1, '2021-07-21'),
(9, 'Rules 1', '', '6,7,11', '3', 0, '2021-07-21'),
(10, 'Rules 2', '', '8', '4', 0, '2021-07-21'),
(11, 'Rules 3', '', '9', '5', 0, '2021-07-21'),
(12, 'Rules 4', '', '10', '6', 0, '2021-07-21'),
(13, 'Rules 5', '', '7,11,13,14', '7', 0, '2021-07-26'),
(14, 'Rules 6', '', '11,12', '8', 0, '2021-07-26'),
(15, 'Rules 7', '', '16', '9', 0, '2021-07-26'),
(16, 'Rules 8', '', '7,11,13,18,19,20', '10', 0, '2021-07-26'),
(17, 'Rules 9', '', '8,28', '11', 0, '2021-07-26'),
(18, 'Rules 10', '', '6', '12', 0, '2021-07-26'),
(19, 'Rules 11', '', '9,21,22,23', '13', 0, '2021-07-26'),
(20, 'Rules 12', '', '7,11,13', '14', 0, '2021-07-26'),
(21, 'Rules 13', '', '6,24', '15', 0, '2021-07-26'),
(22, 'Rules 14', '', '8,9,15,21,25,26', '16', 0, '2021-07-26'),
(23, 'Rules 15', '', '8,9,21,26', '17', 0, '2021-07-26'),
(24, 'Rules 16', '', '28', '18', 0, '2021-07-27'),
(25, 'Rules 17', '', '7,13', '19', 0, '2021-07-27'),
(26, 'Rules 18', '', '11,27', '20', 0, '2021-07-27'),
(27, 'Rules 19', '', '7,11,16,27', '21', 0, '2021-07-27'),
(28, 'Rules 20', '', '8,21', '22', 0, '2021-07-27'),
(29, 'Rules 21', '', '21', '23', 0, '2021-07-27'),
(30, 'Rules 22', '', '15,25', '24', 0, '2021-07-27'),
(31, 'Rules 23', '', '13', '25', 0, '2021-07-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_total` text NOT NULL,
  `transaksi_kembali` text NOT NULL,
  `transaksi_bayar` text NOT NULL,
  `transaksi_tanggal` date DEFAULT NULL,
  `transaksi_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`transaksi_id`, `transaksi_total`, `transaksi_kembali`, `transaksi_bayar`, `transaksi_tanggal`, `transaksi_hapus`) VALUES
(3, '41000', '9000', '50000', '2021-06-18', 1),
(4, '27000', '3000', '30000', '2021-07-11', 1),
(5, '110000', '40000', '150000', '2021-07-18', 1),
(6, '120000', '30000', '150000', '2021-07-21', 1),
(7, '75000', '5000', '80000', '2021-07-22', 1),
(8, '75000', '25000', '100000', '2021-07-25', 1),
(9, '100000', '40000', '140000', '2021-07-26', 1),
(10, '35000', '15000', '50000', '2021-07-26', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_level` varchar(50) DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_tanggal` date DEFAULT NULL,
  `user_foto` text DEFAULT NULL,
  `user_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_level`, `user_email`, `user_password`, `user_tanggal`, `user_foto`, `user_hapus`) VALUES
(1, 'admin', '1', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2019-12-27', 'noimage.gif', 0),
(2, 'user', '2', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2020-07-20', NULL, 1),
(3, 'Laila', '2', 'laila@gmail.com', 'f30618ed64655812746272636a992b95', '2020-07-21', NULL, 1),
(4, 'user', '2', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2021-07-11', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_detail_user`
--
ALTER TABLE `t_detail_user`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  ADD PRIMARY KEY (`diagnosa_id`);

--
-- Indeks untuk tabel `t_indikasi`
--
ALTER TABLE `t_indikasi`
  ADD PRIMARY KEY (`indikasi_id`);

--
-- Indeks untuk tabel `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indeks untuk tabel `t_penyakit`
--
ALTER TABLE `t_penyakit`
  ADD PRIMARY KEY (`penyakit_id`);

--
-- Indeks untuk tabel `t_rules`
--
ALTER TABLE `t_rules`
  ADD PRIMARY KEY (`rules_id`);

--
-- Indeks untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_detail_user`
--
ALTER TABLE `t_detail_user`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  MODIFY `diagnosa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `t_indikasi`
--
ALTER TABLE `t_indikasi`
  MODIFY `indikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `t_log`
--
ALTER TABLE `t_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `t_penyakit`
--
ALTER TABLE `t_penyakit`
  MODIFY `penyakit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `t_rules`
--
ALTER TABLE `t_rules`
  MODIFY `rules_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
