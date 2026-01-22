-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql3112.db.sakura.ne.jp
-- 生成日時: 2026 年 1 月 15 日 23:03
-- サーバのバージョン： 8.0.43
-- PHP のバージョン: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `corosuke-shibuya_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `datetime`) VALUES
(1, 'INSPIRED 熱狂させる製品を生み出すプロダクトマネジメント', 'https://amzn.asia/d/etTrnqY', '日本に足りないのはプロダクトマネジャーだ!\r\nAmazon, Apple, Google, Facebook, Netflix, Teslaなど、\r\n最新技術で市場をリードする企業の勢いが止まらない。\r\n\r\nはたして、かれらはどのようにして世界中の顧客が欲しがる製品を企画、開発、そして提供しているのか。\r\n本書はシリコンバレーで行われている\r\n「プロダクトマネジメント」の手法を紹介する。', '2026-01-08 23:47:50'),
(2, 'Claude CodeによるAI駆動開発入門', 'https://amzn.asia/d/1n98Ike', '2025年5月末に一般リリースされたAnthropic社が提供している「Claude Code」は、コマンドライン上で動くLLMによるAIコーディングエージェントです。これまでのAI開発支援エディタ一である「Github Copilot」や「Cursor」等他のツールとは全く違う開発体験が一気にエンジニアに受け入れられ、AI駆動開発のデファクトスタンダードになりつつあります。', '2026-01-15 22:58:08');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
