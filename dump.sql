-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Лип 07 2016 р., 12:31
-- Версія сервера: 10.1.13-MariaDB
-- Версія PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `distance`
--

-- --------------------------------------------------------

--
-- Структура таблиці `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `route` text NOT NULL,
  `time` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `routes`
--

INSERT INTO `routes` (`id`, `route`, `time`, `distance`) VALUES
(1, 'AB', 40, 80),
(2, 'AC', 55, 110),
(3, 'AE', 240, 330),
(4, 'BF', 230, 340),
(5, 'CD', 20, 60),
(6, 'CE', 80, 205),
(7, 'DF', 110, 192),
(8, 'EF', 40, 80);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
