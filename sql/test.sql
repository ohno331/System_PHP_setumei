-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 3 月 09 日 01:08
-- サーバのバージョン： 10.4.16-MariaDB
-- PHP のバージョン: 7.4.12

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
(1, '2021-03-08 07:10:23', '1e48c4420b7073bc11916c6c1de226bb', '大原', 'yongtaijunzhong@gmail.com', '111', '1111', '千葉県', '00011115555', 1, 2500);

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
(1, '本社3階セミナールーム', '筆記用具、履歴書', 'あ', '説明会'),
(2, '本社５階会議室', '案内状', 'い', '1次面接'),
(3, '本社10階会議室', '案内状', 'い', '最終面接');

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
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `rireki`
--
ALTER TABLE `rireki`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルの AUTO_INCREMENT `setumeikai`
--
ALTER TABLE `setumeikai`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
