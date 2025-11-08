-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 08 2025 г., 10:30
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kinodb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `number`, `password`, `descriptions`) VALUES
(1, 'Господин Господинович', 'church@aura.com', '88005553535', '177ik77k', 'Господин президент, назревает инцидент:\r\nМы устали от вранья, в небе — тучи воронья.\r\nХватит!\r\nГосподин президент, почему Ваш оппонент —\r\nПреступник Горбачев — от Вас по левое плечо\r\nна съезде?!\r\nХватит!'),
(2, 'test', 'test@test.test', '89999999999', 'test', 'XDGFDNGDTGX'),
(3, 'DubstepMan', 'ilovedubstep@gmail.com', '73858248238', 'dubstep.com', 'I think, im creating in this world, because, God dubstep believe me, what i hear dubstep every fucking day52'),
(4, 'genius', 'genius@mail.ru', '78348534853', '123', ''),
(5, 'messi', 'ronaldo@mail.ru', '72312312312', '123', ''),
(6, 'VictorReznov', 'reznovik1914@vk.com', '72312312312', 'died1945', ''),
(7, 'AuraMan', 'StandOff@mail.ru', '76127834621', '123141', 'Я великий житель ВСЖ'),
(8, 'неЛох', 'Nelox@inbox.ru', '79377246609', '123', NULL),
(9, 'De1tyZWER', 'konishev1914@gmail.com', '89370883526', '1488', 'Привет папа'),
(10, 'goddess', 'pikmi@mail.ru', '88005553535', '1488', 'МАМА'),
(11, 'asidelyov', 'asidelyov2050@mail.ru', '89370933236', '7275', 'Живу ради 1C'),
(12, '0987', 'aaaa@mail.ru', '72312312312', '123', 'ghvugyugyu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
