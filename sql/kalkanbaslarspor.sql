-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Ara 2017, 18:28:49
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kalkanbaslarspor`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_pas`
--

CREATE TABLE `admin_pas` (
  `id` int(11) NOT NULL,
  `admin_lo` text COLLATE utf8_turkish_ci NOT NULL,
  `admin_pas` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin_pas`
--

INSERT INTO `admin_pas` (`id`, `admin_lo`, `admin_pas`) VALUES
(1, 'root', '9a286406c252a3d14218228974e1f567');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biz_size_doneriz`
--

CREATE TABLE `biz_size_doneriz` (
  `id` int(11) NOT NULL,
  `isim_so` text COLLATE utf8_turkish_ci NOT NULL,
  `tel_no` text COLLATE utf8_turkish_ci NOT NULL,
  `e_mail` text COLLATE utf8_turkish_ci NOT NULL,
  `gg_gm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calisma_saat`
--

CREATE TABLE `calisma_saat` (
  `id` int(11) NOT NULL,
  `bas_saat` varchar(11) CHARACTER SET latin1 NOT NULL,
  `son_saat` varchar(11) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `calisma_saat`
--

INSERT INTO `calisma_saat` (`id`, `bas_saat`, `son_saat`) VALUES
(1, '09:00', '22:00'),
(2, '10:30', '18:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `den_member`
--

CREATE TABLE `den_member` (
  `id` int(11) NOT NULL,
  `name_last` text COLLATE utf8_turkish_ci NOT NULL,
  `phone_no` text COLLATE utf8_turkish_ci NOT NULL,
  `e_mail` text COLLATE utf8_turkish_ci NOT NULL,
  `re_date` text COLLATE utf8_turkish_ci NOT NULL,
  `den_selection` text COLLATE utf8_turkish_ci NOT NULL,
  `boolen_de` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `den_member`
--

INSERT INTO `den_member` (`id`, `name_last`, `phone_no`, `e_mail`, `re_date`, `den_selection`, `boolen_de`) VALUES
(10, 'yunus terguunun', '05300398905', 'yunus@gmail.com', '2017-12-22', '', 1),
(11, 'yunus terguunun', '0530039890a', 'yunus@gmaiSl.com', '2017-12-22', '', 1),
(12, 'yunus terguunun', '05300398945', 'yunuddss@gmail.com', '2017-12-22', '', 0),
(13, 'alperen avcıl', '05453723790', 'avcil_alperen@gmail.com', '2017-12-30', '', 0),
(14, 'yunus terguunun', '05960398905', 'yunusssergul@gmail.com', '2017-12-28', '', 0),
(15, 'deneme', '2352332665', 'deneme@gmai.com', '2017-12-29', '', 0),
(16, 'YUNUSssada', '664897987987', 'ydeneme@gmai.com', '2017-12-21', '', 0),
(17, 'yunus terguunun', '4564656565', 'ali@d.com', '2017-12-14', '', 0),
(18, 'Ergül', '6464654654654', 'yunuscsssssode@gmail.com', '2017-12-21', '', 0),
(19, 'test', '564546546589', 'text@gmail.com', '2017-12-30', '', 0),
(20, 'Alperen', '05355945742', 'aalperendurmuss@gmail.com', '1998-02-20', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitmenler`
--

CREATE TABLE `egitmenler` (
  `id` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `seans_say` int(11) NOT NULL,
  `res_url` text COLLATE utf8_turkish_ci NOT NULL,
  `ant_url` text COLLATE utf8_turkish_ci NOT NULL,
  `isim` text COLLATE utf8_turkish_ci NOT NULL,
  `uzmanlik` text COLLATE utf8_turkish_ci NOT NULL,
  `gg_gm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `egitmenler`
--

INSERT INTO `egitmenler` (`id`, `fiyat`, `seans_say`, `res_url`, `ant_url`, `isim`, `uzmanlik`, `gg_gm`) VALUES
(1, 70, 5, 'img/egitmen/team2.jpg', 'img/egitmen/team-cover2.jpg', 'Ali Has Hayyam', 'Postür Uzmani', 1),
(2, 90, 6, 'img/egitmen/team1.jpg', 'img/egitmen/team-cover1.jpg', 'Ali Fırıldak', 'Zurna Kaldırma', 1),
(10, 90000, 1, 'img/egitmen/U4qDUkhzyr1SGsttGmxzH1Fy0ZObFs.jpg', 'img/egitmen/V1Nx0yvEPiijvu5rkprcS0ORB9bLVS.jpg', 'Alperen Kaldıraç', 'Kaldırmak', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gunun_pro`
--

CREATE TABLE `gunun_pro` (
  `id` int(11) NOT NULL,
  `bas_saat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `son_saat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `egzersiz` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gunun_pro`
--

INSERT INTO `gunun_pro` (`id`, `bas_saat`, `son_saat`, `egzersiz`) VALUES
(1, '8:30', '10:00', 'Koşu'),
(2, '10:30', '12:00', 'Zıplama'),
(10, '12:30', '14:40', 'Kardio'),
(11, '00.00', '02.00', 'yatak koşusu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `cesit` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklamasi` text COLLATE utf8_turkish_ci NOT NULL,
  `ikonu` text COLLATE utf8_turkish_ci NOT NULL,
  `gg_gm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `cesit`, `aciklamasi`, `ikonu`, `gg_gm`) VALUES
(1, 'Kardio Tam Gaz', 'Buraya Bigiler gelecek', 'img/icons/heart-blue.png', 1),
(2, 'Yoga Var', 'Buraya Bigiler gelecek', 'img/icons/guru-blue.png', 1),
(4, 'Hartel Basma', 'Yazı var burda', 'img/icons/weight-blue.png', 1),
(7, 'denemeeeee', 'denemeeeee', 'img/icons/SiMxmsRyeHa3MOoLsEmgSCZAxIkck1.png', 0),
(8, 'deneme', 'denmeee', 'img/icons/CN1b3gaA3SxVRd0BwUeJmuLUfDponH.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icer_e`
--

CREATE TABLE `icer_e` (
  `id` int(11) NOT NULL,
  `icc` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `icer_e`
--

INSERT INTO `icer_e` (`id`, `icc`) VALUES
(1, 'Anasayfa'),
(2, 'Hizmetler'),
(3, 'Özel Eğitmenler'),
(4, 'Fiyatlandırma'),
(5, 'http://www.facebook.com'),
(6, 'http://www.twitter.com'),
(7, 'https://plus.google.com'),
(8, 'Kalkan Başar Spor Salonu'),
(9, '60'),
(10, 'Vücuduna önem ver.\r\n'),
(11, 'Senin tek gerçek dostun.'),
(12, 'Herkeze uygun bir hizmetimiz bulunur'),
(13, 'İşinde uzman eğitmenlerle'),
(14, 'Fiyatlarımız herkese amca oğlu indirimli');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log_uye`
--

CREATE TABLE `log_uye` (
  `id` int(11) NOT NULL,
  `kullaniciadi` text COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `adi_soy` text COLLATE utf8_turkish_ci NOT NULL,
  `email` text COLLATE utf8_turkish_ci NOT NULL,
  `tel_no` text COLLATE utf8_turkish_ci NOT NULL,
  `akt` text COLLATE utf8_turkish_ci NOT NULL,
  `ext` text COLLATE utf8_turkish_ci NOT NULL,
  `log_pin` text COLLATE utf8_turkish_ci NOT NULL,
  `cin_lo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `log_uye`
--

INSERT INTO `log_uye` (`id`, `kullaniciadi`, `sifre`, `adi_soy`, `email`, `tel_no`, `akt`, `ext`, `log_pin`, `cin_lo`) VALUES
(1, 'beta1', '9a286406c252a3d14218228974e1f567', 'yunus ergül', 'yunuscode@gmail.com', '5300398905', '0', 'aaas', '963258', 1),
(3, 'Delta1', '81dc9bdb52d04dc20036dbd8313ed055', 'Yunus Herkül', 'herkül@gmail.com', '5300398905', '1', 'Çok Hastayım Hacı ona göre davranın bana', '807234', 1),
(5, 'han1', '81dc9bdb52d04dc20036dbd8313ed055', 'pınar Hanım', 'pınar@gmail.com', '53069912313', '1', 'yok', '537973', 0),
(10, 'crazy_boy_36_kars', '5e04ab18e480fb5f96d14fe195b3e034', 'Hakkı bulut', 'crazy_boy_36_kars@gmail.com', '05322453536', '1', 'zihinsel engelli, kaldıramıyor, simavlı pinç', '556703', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paket_fiyat`
--

CREATE TABLE `paket_fiyat` (
  `id` int(11) NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(11) NOT NULL,
  `zaman` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `res_re` text COLLATE utf8_turkish_ci NOT NULL,
  `actv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `paket_fiyat`
--

INSERT INTO `paket_fiyat` (`id`, `aciklama`, `icerik`, `fiyat`, `zaman`, `res_re`, `actv`) VALUES
(1, 'Sayısalcı Paket', '<li>Hoplama</li>\r\n<liZıplama></li>\r\n<li>Atlama</li>\r\n<li>Silkme</li>\r\n', 90, '1', 'img/pricing1.jpg', 1),
(2, 'Sözelci Paket', '<li>Hoplama</li>\r\n<liZıplama></li>\r\n<li>Atlama</li>\r\n<li>Silkme</li>\r\n<li>yapılan herşey aynı ama kazık</li>', 1999, '0', 'img/pricing2.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tw_tk`
--

CREATE TABLE `tw_tk` (
  `id` int(11) NOT NULL,
  `twt` text COLLATE utf8_turkish_ci NOT NULL,
  `twt_tk` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tw_tk`
--

INSERT INTO `tw_tk` (`id`, `twt`, `twt_tk`) VALUES
(2, 'Deneme1', '#deneme'),
(3, 'Twitter API Kullanımı', '#twitter#API');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `kullanici-adi` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `gg_gm` int(11) NOT NULL,
  `ad_co` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `kullanici-adi`, `yorum`, `gg_gm`, `ad_co`) VALUES
(48, 'beta1', 'deneme', 0, 1),
(50, 'crazy_boy_36_kars', 'ulan kaldıramıyorum diyorum siz kaldırın bari d,asldkşjasldasj', 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_pas`
--
ALTER TABLE `admin_pas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `biz_size_doneriz`
--
ALTER TABLE `biz_size_doneriz`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `calisma_saat`
--
ALTER TABLE `calisma_saat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `den_member`
--
ALTER TABLE `den_member`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `egitmenler`
--
ALTER TABLE `egitmenler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gunun_pro`
--
ALTER TABLE `gunun_pro`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `icer_e`
--
ALTER TABLE `icer_e`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `log_uye`
--
ALTER TABLE `log_uye`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `paket_fiyat`
--
ALTER TABLE `paket_fiyat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tw_tk`
--
ALTER TABLE `tw_tk`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_pas`
--
ALTER TABLE `admin_pas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `biz_size_doneriz`
--
ALTER TABLE `biz_size_doneriz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `calisma_saat`
--
ALTER TABLE `calisma_saat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `den_member`
--
ALTER TABLE `den_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `egitmenler`
--
ALTER TABLE `egitmenler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `gunun_pro`
--
ALTER TABLE `gunun_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `icer_e`
--
ALTER TABLE `icer_e`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `log_uye`
--
ALTER TABLE `log_uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `paket_fiyat`
--
ALTER TABLE `paket_fiyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tw_tk`
--
ALTER TABLE `tw_tk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
