-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023-07-27 13:26:01
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
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_name_kana` varchar(128) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_gender` varchar(2) NOT NULL,
  `user_postcode` int(10) NOT NULL,
  `user_address` varchar(128) NOT NULL,
  `user_phonenumber` varchar(20) NOT NULL,
  `user_mail` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `created_at_` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `user_name`, `user_name_kana`, `user_birthday`, `user_gender`, `user_postcode`, `user_address`, `user_phonenumber`, `user_mail`, `password`, `is_admin`, `created_at_`, `updated_at`, `deleted_at`) VALUES
(1, '茶とらお', 'ﾁｬﾄﾗｵ', '2023-07-01', '男', 8100043, '福岡県福岡市中央区城内１', '092-732-4801', 'tyatora@toratora.co.jp', 'karikari', 0, '2023-07-24 21:29:43', '2023-07-24 21:32:49', NULL),
(2, 'さばとら子', '', '2023-05-01', '', 0, '', '', 'sabasaba@tora.com', 'tyu-ru', 0, '2023-07-27 00:45:22', '2023-07-27 00:45:22', NULL),
(3, 'スコティ', '', '2022-02-22', '', 0, '', '', 'nekomassigura@cat.co.jp', 'nekokan', 0, '2023-07-27 10:31:13', '2023-07-27 10:31:13', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
