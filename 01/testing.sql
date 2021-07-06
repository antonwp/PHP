-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 06 2021 г., 05:16
-- Версия сервера: 8.0.25
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `intro` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` int UNSIGNED NOT NULL,
  `avtor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `avtor`) VALUES
(1, 'stat_titlestat_titlestat_title', 'stat_titlestat_titlestat_titlestat_title', 'stat_titlestat_titlestat_titlestat_titlestat_titlestat_titlestat_title', 1625480351, 'admin'),
(2, 'Заголовок статьи', 'Интро супер статьи', 'Супер длинный текст мега интересной статьи', 1625480426, 'admin'),
(3, 'Title of a longer featured blog post', 'Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.', 'Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.\n\nCustomize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.\n\nCustomize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.', 1625482524, 'admin2');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mess` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `article_id` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(1, 'root', 'Мой мега комментарий', 3),
(2, 'zmail_anton@yahoo.com', 'ВВВВСупер каммменттттт', 3),
(3, 'admin', 'erterertertert', 3),
(4, 'admin', 'erterertertert', 3),
(5, 'admin', '77777777777777777777777', 3),
(6, 'admin', '1111111111', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(1, 'Енот', 'code-name-5@yandex.ru', 'anton', '70df9ae2a512f8cce626e8a30325c3d8'),
(2, 'Ашот', 'zmail_anton@yahoo.com', 'ashotvanshot', '70df9ae2a512f8cce626e8a30325c3d8'),
(3, '456345643564', 'code-name-5@yandex.ru', '345345', '511d28d68745de612d6f761af6038414'),
(4, 'Ашот', 'ert@ewrrwe.ru', 'aaaaaaa', '70df9ae2a512f8cce626e8a30325c3d8'),
(5, 'Ашот', 'ert@ewrrwe.ru', 'aaaaaaa', '70df9ae2a512f8cce626e8a30325c3d8'),
(6, 'Ашот', 'ert@ewrrwe.ru', 'aaaaaaa', '70df9ae2a512f8cce626e8a30325c3d8'),
(7, 'Ашот', 'ert@ewrrwe.ru', 'aaaaaaa', '70df9ae2a512f8cce626e8a30325c3d8'),
(8, 'Ашот4444', 'code-name-5@yandex.ru', '234234234', 'a9f75126f10b6fb71884eb497f8dfde1'),
(9, 'Alex', 'xxx@xx.ru', 'admin', '70df9ae2a512f8cce626e8a30325c3d8'),
(10, 'admin2', 'code-name-5@yandex.ru', 'admin2', '70df9ae2a512f8cce626e8a30325c3d8');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
