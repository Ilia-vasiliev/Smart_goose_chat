-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 17 2020 г., 06:16
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat_crychat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id_entry` int(4) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `TextMassage` varchar(300) NOT NULL,
  `Data_Message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id_entry`, `ID_User`, `TextMassage`, `Data_Message`) VALUES
(11, 29, 'Привет\nЯ просто Гусь)!', '2020-07-17 00:00:00'),
(15, 29, 'Никогда не забывай!', '2020-07-17 00:00:00'),
(27, 33, 'Привет тебе человек)', '2020-07-17 00:00:00'),
(29, 33, 'Что делаешь?', '2020-07-17 00:00:00'),
(30, 33, 'Я тут ошибки правлю в коде)!', '2020-07-17 00:00:00'),
(31, 32, 'А я твои сообщения читаю)', '2020-07-17 00:00:00'),
(32, 32, 'Что-то пошло не так(', '2020-07-17 00:00:00'),
(33, 32, 'Ну Бада бум', '2020-07-17 00:00:00'),
(34, 33, 'Я тут ошибки правлю в коде)', '2020-07-17 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `Nickname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_User`, `Nickname`) VALUES
(24, 'Loki'),
(26, 'Илья'),
(29, 's90424ns'),
(32, 'Анатолий'),
(33, 'Евген');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_entry`),
  ADD KEY `FK_MASSAGE` (`ID_User`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id_entry` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MASSAGE` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
