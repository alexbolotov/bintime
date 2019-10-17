-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Жов 17 2019 р., 13:32
-- Версія сервера: 5.5.62-0+deb8u1
-- Версія PHP: 7.2.23-1+0~20191008.27+debian8~1.gbp021266

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `bintime`
--

-- --------------------------------------------------------

--
-- Структура таблиці `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `index` varchar(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `address`
--

INSERT INTO `address` (`id`, `index`, `country`, `city`, `street`, `house`, `apartment`, `user_id`) VALUES
(7, '0987', 'UA', 'Житомир', 'Мира', '7', '67', 7),
(8, '12345', 'UA', 'Харьков', 'Молодежная', '2', '56', 7),
(9, '9806', 'UA', 'Львов', 'Зеленая', '1', '3', 7),
(10, '0745', 'UA', 'Бердичев', 'Морская', '6', '1', 7),
(11, '0003', 'UA', 'Днепр', 'Гагарина', '5Б', '90', 7),
(12, '0345', 'UA', 'Черновцы', 'Герцена', '4', '5', 7),
(13, '0723', 'UA', 'Одесса', 'Жуковского', '2', '6', 7);

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1571205624),
('m191015_123659_create_users_table', 1571205627),
('m191015_123853_create_address_table', 1571205627);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `index` varchar(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `apartment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `gender`, `date`, `email`, `index`, `country`, `city`, `street`, `house`, `apartment`) VALUES
(7, 'vasya', 'jgkhdkgfljfljf', 'Василий', 'Васечкин', 'Мужчина', '2019-10-17 09:10:45', 'vasiliy@mail.com', '0453', 'UA', 'Киев', 'Мира', '4', '5'),
(8, 'petya', 'jhljfhljhJHGLg', 'Петр', 'Петров', 'Мужчина', '2019-10-17 09:10:55', 'petro@mail.com', '0843', 'UA', 'Одесса', 'Дерибасовская', '4/5', '34'),
(9, 'oleg', 'Fhjлоанедлг', 'Олег', 'Олегов', 'Мужчина', '2019-10-17 09:10:07', 'oleg@mail.com', '0234', 'UA', 'Киев', 'Жилянская', '7', '234'),
(10, 'alex', 'HJKkjfgFGt', 'Александр', 'Александров', 'Мужчина', '2019-10-17 09:10:36', 'alex@mail.com', '4536', 'UA', 'Жмеринка', 'Веселая', '67-А', '25'),
(11, 'olga', 'ljhglfhljf', 'Ольга', 'Ольговна', 'Женщина', '2019-10-17 09:10:08', 'olya@mail.com', '98765', 'UA', 'Киев', 'Пушкинская', '10', '5'),
(12, 'zenya', 'hglglglg', 'Евгения', 'Евгеньева', 'Женщина', '2019-10-17 10:10:11', 'zenya@mail.com', '12345', 'UA', 'Черкассы', 'Крылова', '17', '45'),
(13, 'rodion', 'kjgfljfgl', 'Родион', 'Родионов', 'Нет информации', '2019-10-17 10:10:12', 'rodion@mail.com', '7654', 'UA', 'Борисполь', 'Механиков', '2', '56'),
(14, 'natasha', 'ljhglgk;ljh', 'Наталия', 'Натальева', 'Женщина', '2019-10-17 10:10:15', 'natasha@mail.com', '0087', 'UA', 'Киев', 'Мельникова', '16', '35');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
