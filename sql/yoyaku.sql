-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-16 02:52:25
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `yoyaku`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

CREATE TABLE `member` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(32) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postal1` varchar(3) NOT NULL,
  `postal2` varchar(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `danjo` int(11) NOT NULL,
  `born` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`code`, `date`, `password`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`, `danjo`, `born`) VALUES
(1, '2021-03-08 07:10:23', '1e48c4420b7073bc11916c6c1de226bb', '大原', 'yongtaijunzhong@gmail.com', '111', '1111', '千葉県', '00011115555', 1, 2500),
(2, '2021-03-09 01:12:31', '1e48c4420b7073bc11916c6c1de226bb', 'ohno', 'e.ohno331@gmail.com', '111', '1111', '埼玉県', '08012345678', 1, 5900);

-- --------------------------------------------------------

--
-- テーブルの構造 `rireki`
--

CREATE TABLE `rireki` (
  `code` int(11) NOT NULL,
  `kaijou` varchar(30) NOT NULL,
  `motimono` varchar(100) NOT NULL,
  `shousai` varchar(300) NOT NULL,
  `syurui` varchar(50) NOT NULL,
  `hizuke` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `setumeikai`
--

CREATE TABLE `setumeikai` (
  `code` int(11) NOT NULL,
  `kaijou` varchar(30) NOT NULL,
  `motimono` varchar(100) NOT NULL,
  `shousai` varchar(300) NOT NULL,
  `syurui` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `setumeikai`
--

INSERT INTO `setumeikai` (`code`, `kaijou`, `motimono`, `shousai`, `syurui`) VALUES
(1, '本社3階セミナールーム', '筆記用具、履歴書,成績証明書(随時でも可)', '開始時刻　am11:00<br>\r\n＜プログラム内容＞<br>\r\n・会社概要<br>\r\n・事業内容<br>\r\n（私たちがお客様から支持される理由・強みをお伝えします）<br>\r\n・社内制度<br>\r\n（充実の制度とその活用率・活用事例などをご紹介します）<br>\r\n・募集、選考フロー<br>', '説明会'),
(2, '本社５階会議室', '案内状', '開始時刻 am11:00<br>\r\n＜プログラム内容＞<br>\r\n・会社概要<br>\r\n・事業内容<br>\r\n（私たちがお客様から支持される理由・強みをお伝えします）<br>\r\n・社内制度<br>\r\n（充実の制度とその活用率・活用事例などをご紹介します）<br>\r\n・募集、選考フロー<br>', '1次面接'),
(3, '本社10階会議室', '案内状', '開始時刻 am11:00<br>\r\n＜プログラム内容＞<br>\r\n・会社概要<br>\r\n・事業内容<br>\r\n（私たちがお客様から支持される理由・強みをお伝えします）<br>\r\n・社内制度<br>\r\n（充実の制度とその活用率・活用事例などをご紹介します）<br>\r\n・募集、選考フロー<br>', '最終面接');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `rireki`
--
ALTER TABLE `rireki`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `setumeikai`
--
ALTER TABLE `setumeikai`
  ADD PRIMARY KEY (`code`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルのAUTO_INCREMENT `rireki`
--
ALTER TABLE `rireki`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- テーブルのAUTO_INCREMENT `setumeikai`
--
ALTER TABLE `setumeikai`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
