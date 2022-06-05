-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2022 г., 21:04
-- Версия сервера: 8.0.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tovar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courier`
--

CREATE TABLE `courier` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `courier`
--

INSERT INTO `courier` (`id`, `name`) VALUES
(1, 'Виктор'),
(2, 'Николай'),
(3, 'Александра'),
(4, 'Полина'),
(5, 'Артем'),
(6, 'Андрей'),
(7, 'Дарья'),
(8, 'Иван'),
(9, 'Павел'),
(10, 'Анастасия');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `trip_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`, `trip_time`) VALUES
(1, 'санкт-петербург', '1'),
(2, 'уфа', '2'),
(3, 'нижний Новгород', '3'),
(4, 'владимир', '4'),
(5, 'кострома', '5'),
(6, 'екатеринбург', '6'),
(7, 'ковров', '7'),
(8, 'воронеж', '8'),
(9, 'самара', '9'),
(10, 'астрахань', '10');

-- --------------------------------------------------------

--
-- Структура таблицы `trips`
--

CREATE TABLE `trips` (
  `id` int NOT NULL,
  `courier` int NOT NULL,
  `region` int NOT NULL,
  `dispatch` date NOT NULL,
  `arrival` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `trips`
--

INSERT INTO `trips` (`id`, `courier`, `region`, `dispatch`, `arrival`) VALUES
(1, 1, 1, '2022-05-01', '2022-05-02'),
(2, 2, 2, '2022-05-02', '2022-05-03'),
(3, 3, 3, '2022-05-03', '2022-05-04'),
(4, 4, 4, '2022-05-04', '2022-05-05'),
(5, 5, 5, '2022-05-05', '2022-05-06'),
(6, 6, 6, '2022-05-06', '2022-05-07'),
(7, 7, 7, '2022-05-07', '2022-05-08'),
(8, 8, 8, '2022-05-08', '2022-05-09'),
(9, 9, 9, '2022-05-09', '2022-05-10'),
(10, 10, 10, '2022-05-10', '2022-05-11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
