-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023-07-27 13:26:14
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_d13_26_kadai2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `zibai_application_table`
--

CREATE TABLE `zibai_application_table` (
  `user_id` int(11) NOT NULL,
  `higaisya_compensation` int(1) NOT NULL,
  `higaisya_sibou` int(1) NOT NULL,
  `higaisya_treatment_cost` int(1) NOT NULL,
  `higaisya_kouisyougai` int(1) NOT NULL,
  `kagaisya_compensation` int(1) NOT NULL,
  `kagaisya_sibou` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `zibai_application_table`
--

INSERT INTO `zibai_application_table` (`user_id`, `higaisya_compensation`, `higaisya_sibou`, `higaisya_treatment_cost`, `higaisya_kouisyougai`, `kagaisya_compensation`, `kagaisya_sibou`) VALUES
(3, 0, 0, 1, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
