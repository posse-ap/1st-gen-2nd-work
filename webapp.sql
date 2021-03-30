-- テーブルの構造 `lng_time`
--
DROP TABLE IF EXISTS lng_time;
CREATE TABLE `lng_time` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `date` date NOT NULL,
  `name_id` int NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `lng_time`
--

INSERT INTO `lng_time` (`id`, `post_id`, `date`, `name_id`, `time`) VALUES
(1, 1, '2001-10-10', 1, '00:30:00'),
(2, 1, '2001-10-10', 2, '00:30:00'),
(4, 2, '2001-10-11', 3, '02:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `lng_time`
--
ALTER TABLE `lng_time`
  ADD PRIMARY KEY (`id`);
COMMIT;


-- テーブルの構造 `cont_time`
--
DROP TABLE IF EXISTS cont_time;
CREATE TABLE `cont_time` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `date` date NOT NULL,
  `name_id` int NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `cont_time`
--

INSERT INTO `cont_time` (`id`, `post_id`, `date`, `name_id`, `time`) VALUES
(3, 1, '2001-10-10', 9, '03:00:00'),
(5, 2, '2001-10-11', 11, '02:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `cont_time`
--
ALTER TABLE `cont_time`
  ADD PRIMARY KEY (`id`);
COMMIT;
-- テーブルの構造 `study_cont`
--
DROP TABLE IF EXISTS study_cont;
CREATE TABLE `study_cont` (
  `name_id` int NOT NULL,
  `lng_cont_id` int NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `study_cont`
--

INSERT INTO `study_cont` (`name_id`, `lng_cont_id`, `name`) VALUES
(1, 1, 'HTML'),
(2, 1, 'CSS'),
(3, 1, 'JavaScript'),
(4, 1, 'PHP'),
(5, 1, 'Laravel'),
(6, 1, 'SQL'),
(7, 1, 'SHELL'),
(8, 1, '情報システム基礎知識（その他）'),
(9, 2, 'N予備校'),
(10, 2, 'ドットインストール'),
(11, 2, 'POSSE課題');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `study_cont`
--
ALTER TABLE `study_cont`
  ADD PRIMARY KEY (`name_id`);
COMMIT;


-- inner join
select *
    from  (
select id, post_id, date, name_id,time FROM lng_time
UNION
SELECT id,post_id,date,name_id,time FROM cont_time
order by  id
) AS u
inner join study_cont as s
on u.name_id = s.name_id;