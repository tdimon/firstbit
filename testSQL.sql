-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2020 г., 08:29
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testSQL`
--

-- --------------------------------------------------------

--
-- Структура таблицы `elements`
--

CREATE TABLE IF NOT EXISTS `elements` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` tinytext NOT NULL,
  `description` text,
  `type` enum('новость','статья','отзыв','комментарий') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `elements`
--

INSERT INTO `elements` (`id`, `parent_id`, `created`, `updated`, `title`, `description`, `type`) VALUES
(1, 2, '2020-05-19 08:08:31', '2020-05-19 08:08:31', 'Глобальное потепление', '', 'новость'),
(2, 2, '2020-05-19 08:09:30', '2020-05-19 08:09:30', 'Спад цен', '(в России)', 'новость'),
(3, 4, '2020-05-19 08:10:01', '2020-05-19 08:10:01', 'Отзыв о вакансии', '', 'отзыв'),
(4, 4, '2020-05-19 08:10:33', '2020-05-19 08:10:33', 'Рецензия на фильм', '', 'отзыв'),
(5, 5, '2020-05-19 08:11:14', '2020-05-19 08:11:14', 'Комментарий к проекту', '(проект ТестТаск)', 'комментарий'),
(6, 3, '2020-05-19 08:12:05', '2020-05-19 08:12:05', 'Бинарное дерево', '', 'статья'),
(7, 3, '2020-05-19 08:12:32', '2020-05-19 08:12:32', 'алгоритм диффи-хеллмана', '(c++)', 'статья');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` tinytext NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `parent_id`, `created`, `updated`, `title`, `description`) VALUES
(1, NULL, '2020-05-19 08:03:43', '2020-05-19 08:03:43', 'Корневой раздел', ''),
(2, 1, '2020-05-19 08:06:24', '2020-05-19 08:06:24', 'Новости', ''),
(3, 1, '2020-05-19 08:06:55', '2020-05-19 08:06:55', 'Статьи', ''),
(4, 1, '2020-05-19 08:07:03', '2020-05-19 08:07:03', 'Отзывы', ''),
(5, 4, '2020-05-19 08:07:19', '2020-05-19 08:07:19', 'Комментарии', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD KEY `PRIMARY_INDEX` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
