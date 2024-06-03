-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 03 2024 г., 23:14
-- Версия сервера: 5.7.24
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kurs_5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kategory`
--

CREATE TABLE `kategory` (
  `id_kategory` int(11) NOT NULL,
  `name_kategory` varchar(255) NOT NULL,
  `photo_kategory` varchar(512) NOT NULL,
  `link_kategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kategory`
--

INSERT INTO `kategory` (`id_kategory`, `name_kategory`, `photo_kategory`, `link_kategory`) VALUES
(1, 'Холодные закуски', 'images/menu_img/menu1.jpg', 'сold_appetizers.php'),
(2, 'Салаты', 'images/menu_img/menu2.jpg', 'salads.php'),
(3, 'Горячие закуски', 'images/menu_img/menu3.jpg', 'hot_appetizers.php'),
(4, 'Супы', 'images/menu_img/menu4.jpg', 'soups.php'),
(5, 'Горячие блюда', 'images/menu_img/menu5.jpg', 'hot_dishes.php'),
(6, 'Десерты', 'images/menu_img/menu6.jpg', 'dessert.php'),
(7, 'Холодные напитки', 'images/menu_img/menu7.jpg', 'сold_drinks.php'),
(8, 'Горячие напитки', 'images/menu_img/menu8.jpg', 'hot_drinks.php'),
(9, 'Паста', 'images/menu_img/menu9.jpg', 'paste.php');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `numId_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `phoneUser_order` varchar(255) NOT NULL,
  `emailUser_order` varchar(255) NOT NULL,
  `id_products` int(11) DEFAULT NULL,
  `count_order` int(11) DEFAULT NULL,
  `date_order` varchar(255) DEFAULT NULL,
  `time_order` varchar(255) DEFAULT NULL,
  `totalPrise_order` int(11) DEFAULT NULL,
  `sumAll_order` int(11) NOT NULL,
  `payment_order` varchar(255) NOT NULL,
  `id_status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `numId_order`, `id_user`, `phoneUser_order`, `emailUser_order`, `id_products`, `count_order`, `date_order`, `time_order`, `totalPrise_order`, `sumAll_order`, `payment_order`, `id_status`) VALUES
(110, 4130, 11, '', '', 1, 1, '11 мая 2024', '19:49', 299, 0, '', 1),
(111, 57186, 11, '', '', 2, 1, '11 мая 2024', '19:50', 549, 0, '', 1),
(112, 151188, 11, '', '', 1, 1, '11 мая 2024', '19:50', 299, 0, '', 1),
(113, 116189, 11, '', '', 9, 1, '11 мая 2024', '19:51', 610, 0, '', 1),
(114, 140437, 11, '', '', 1, 1, '11 мая 2024', '19:52', 299, 0, '', 1),
(115, 213101, 11, '', '', 1, 1, '11 мая 2024', '19:52', 299, 0, '', 1),
(116, 172367, 11, '', '', 1, 1, '11 мая 2024', '19:53', 299, 0, '', 1),
(117, 172367, 11, '', '', 6, 1, '11 мая 2024', '19:53', 359, 0, '', 1),
(118, 141470, 11, '', '', 1, 1, '11 мая 2024', '19:54', 299, 0, '', 1),
(119, 38114, 11, '', '', 1, 1, '11 мая 2024', '19:55', 299, 0, '', 1),
(120, 38114, 11, '', '', 6, 1, '11 мая 2024', '19:55', 359, 0, '', 1),
(121, 2407, 11, '', '', 1, 1, '11 мая 2024', '19:56', 299, 0, '', 1),
(122, 2407, 11, '', '', 6, 1, '11 мая 2024', '19:56', 359, 0, '', 1),
(123, 116890, 11, '', '', 1, 1, '11 мая 2024', '19:57', 299, 0, '', 1),
(124, 116890, 11, '', '', 6, 1, '11 мая 2024', '19:57', 359, 0, '', 1),
(125, 90682, 11, '', '', 1, 2, '11 мая 2024', '19:57', 598, 0, '', 1),
(126, 90682, 11, '', '', 6, 1, '11 мая 2024', '19:57', 359, 0, '', 1),
(127, 151146, 11, '', '', 1, 1, '11 мая 2024', '20:05', 299, 0, '', 1),
(128, 167210, 11, '', '', 2, 1, '11 мая 2024', '20:07', 549, 0, '', 1),
(129, 167210, 11, '', '', 3, 1, '11 мая 2024', '20:07', 639, 0, '', 1),
(130, 56415, 11, '', '', 1, 3, '11 мая 2024', '20:08', 897, 0, '', 1),
(131, 56415, 11, '', '', 6, 1, '11 мая 2024', '20:08', 359, 0, '', 1),
(132, 82624, 11, '', '', 1, 3, '11 мая 2024', '20:09', 897, 0, '', 1),
(133, 82624, 11, '', '', 6, 1, '11 мая 2024', '20:09', 359, 0, '', 1),
(134, 139217, 11, '', '', 2, 1, '11 мая 2024', '20:09', 549, 0, '', 1),
(135, 191562, 11, '', '', 2, 1, '11 мая 2024', '20:14', 549, 0, '', 1),
(136, 136100, 11, '', '', 17, 1, '11 мая 2024', '20:15', 399, 0, '', 5),
(137, 175819, 11, '', '', 1, 1, '11 мая 2024', '20:16', 299, 0, '', 7),
(138, 95607, 11, '', '', 1, 2, '14 мая 2024', '18:45', 598, 0, '', 6),
(139, 95607, 11, '', '', 3, 1, '14 мая 2024', '18:45', 639, 0, '', 6),
(140, 95607, 11, '', '', 2, 1, '14 мая 2024', '18:45', 549, 0, '', 6),
(141, 95607, 11, '', '', 6, 1, '14 мая 2024', '18:45', 359, 0, '', 6),
(142, 95607, 11, '', '', 8, 1, '14 мая 2024', '18:45', 580, 0, '', 6),
(143, 103512, 11, '', '', 2, 1, '15 мая 2024', '13:29', 549, 0, '', 4),
(144, 103512, 11, '', '', 3, 1, '15 мая 2024', '13:29', 639, 0, '', 4),
(145, 145911, 11, '', '', 2, 1, '19 мая 2024', '13:29', 549, 0, '', 3),
(146, 145911, 11, '', '', 3, 1, '19 мая 2024', '13:29', 639, 0, '', 3),
(147, 209893, 11, '', '', 2, 3, '02 июня 2024', '02:33', 1647, 4842, '', 2),
(148, 209893, 11, '', '', 3, 5, '02 июня 2024', '02:33', 3195, 4842, '', 2),
(149, 65852, 41, '', '', 2, 10, '03 июня 2024', '01:12', 5490, 30630, 'cash', 1),
(150, 65852, 41, '', '', 3, 11, '03 июня 2024', '01:12', 7029, 30630, 'cash', 1),
(151, 65852, 41, '', '', 1, 11, '03 июня 2024', '01:12', 3289, 30630, 'cash', 1),
(152, 65852, 41, '', '', 4, 11, '03 июня 2024', '01:12', 2299, 30630, 'cash', 1),
(153, 65852, 41, '', '', 5, 7, '03 июня 2024', '01:12', 1155, 30630, 'cash', 1),
(154, 65852, 41, '', '', 6, 6, '03 июня 2024', '01:12', 2154, 30630, 'cash', 1),
(155, 65852, 41, '', '', 7, 7, '03 июня 2024', '01:12', 1995, 30630, 'cash', 1),
(156, 65852, 41, '', '', 8, 8, '03 июня 2024', '01:12', 4640, 30630, 'cash', 1),
(157, 65852, 41, '', '', 9, 1, '03 июня 2024', '01:12', 610, 30630, 'cash', 1),
(158, 65852, 41, '', '', 10, 1, '03 июня 2024', '01:12', 479, 30630, 'cash', 1),
(159, 65852, 41, '', '', 11, 1, '03 июня 2024', '01:12', 295, 30630, 'cash', 1),
(160, 65852, 41, '', '', 14, 1, '03 июня 2024', '01:12', 169, 30630, 'cash', 1),
(161, 65852, 41, '', '', 15, 2, '03 июня 2024', '01:12', 258, 30630, 'cash', 1),
(162, 65852, 41, '', '', 16, 1, '03 июня 2024', '01:12', 369, 30630, 'cash', 1),
(163, 65852, 41, '', '', 17, 1, '03 июня 2024', '01:12', 399, 30630, 'cash', 1),
(164, 73365, 41, '+7 (993) 931-20-04', 'kristina160417@mail.ru', 2, 1, '03 июня 2024', '01:15', 549, 549, 'bank', 1),
(165, 73828, 41, '+7 (993) 931-20-04', 'kristina160417@mail.ru', 2, 1, '03 июня 2024', '01:17', 549, 549, 'cash', 1),
(166, 162573, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 2, 1, '03 июня 2024', '01:17', 549, 549, 'bank', 1),
(167, 195111, 41, '', '', 2, 1, '03 июня 2024', '01:19', 549, 549, 'cash', 1),
(168, 89209, 41, '', '', 2, 1, '03 июня 2024', '01:20', 549, 549, 'cash', 1),
(169, 162891, 41, '', '', 15, 1, '03 июня 2024', '01:24', 129, 129, 'cash', 1),
(170, 21715, 41, '', '', 6, 1, '03 июня 2024', '01:31', 359, 359, 'cash', 1),
(171, 108357, 41, '', '', 6, 1, '03 июня 2024', '01:32', 359, 359, 'cash', 1),
(172, 158207, 41, '', '', 6, 1, '03 июня 2024', '01:33', 359, 359, 'cash', 1),
(173, 20397, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 17, 1, '03 июня 2024', '01:36', 399, 399, 'cash', 1),
(174, 106430, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 17, 1, '03 июня 2024', '01:36', 399, 399, 'cash', 1),
(175, 205165, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 17, 1, '03 июня 2024', '01:39', 399, 399, 'cash', 1),
(176, 166894, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 17, 1, '03 июня 2024', '01:39', 399, 399, 'cash', 1),
(177, 104722, 41, '+7 (993) 931-20-04', 'kristina160417@mail.ru', 17, 1, '03 июня 2024', '01:42', 399, 399, 'Картой', 1),
(178, 177381, 41, '+7 (993) 931-20-04', 'kristina160417@mail.ru', 17, 1, '03 июня 2024', '01:43', 399, 399, 'Картой', 1),
(179, 51672, 41, '+7 (993) 931-20-04', 'kristina160417@mail.ru', 17, 1, '03 июня 2024', '01:46', 399, 399, 'Картой', 1),
(180, 34415, 41, '+7 (993) 931-20-04', 'kristina160417@mail.ru', 17, 1, '03 июня 2024', '01:46', 399, 399, 'Картой', 1),
(181, 159939, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 1, 1, '03 июня 2024', '01:46', 299, 299, 'Картой', 1),
(182, 89770, 41, '+7 (993) 931-20-04', 'lyuba.glotova@yandex.ru', 1, 1, '03 июня 2024', '01:47', 299, 299, 'Картой', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ordersserver`
--

CREATE TABLE `ordersserver` (
  `id_orderServer` int(11) NOT NULL,
  `numId_orderServer` int(11) DEFAULT NULL,
  `numTable_orderServer` float NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `date_orderServer` varchar(255) DEFAULT NULL,
  `time_orderServer` varchar(255) DEFAULT NULL,
  `id_shift` int(11) DEFAULT NULL,
  `countVisitor_orderServer` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `count_orderServer` int(11) DEFAULT NULL,
  `totalPrice_orderServer` float DEFAULT NULL,
  `id_status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price_product` int(11) NOT NULL,
  `weight_product` varchar(255) NOT NULL,
  `units_product` varchar(255) NOT NULL,
  `photo_product` varchar(255) NOT NULL,
  `name_kategory` int(11) NOT NULL,
  `popular_product` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `price_product`, `weight_product`, `units_product`, `photo_product`, `name_kategory`, `popular_product`) VALUES
(1, 'Греческий салат с фетаксой', 299, '250', ' гр.', 'images/menu_img/salads/product1.jpg', 2, 44),
(2, 'Фруктовое изобилие', 549, ' 500/450/170', ' гр.', 'images/menu_img/cold_appetizers/product1.jpg', 1, 36),
(3, 'Рыбное ассорти без угря', 639, '160', ' гр.', 'images/menu_img/cold_appetizers/product2.jpg', 1, 36),
(4, 'Сырные палочки', 209, ' 150/40', ' гр.', 'images/menu_img/hot_appetizers/product1.jpg', 3, 12),
(5, 'Чесночные гренки из бородинского хлеба', 165, ' 135/40', ' гр.', 'images/menu_img/hot_appetizers/product2.jpg', 3, 9),
(6, 'Крем-суп из белых грибов', 359, ' 300', ' гр.', 'images/menu_img/soups/product1.jpg', 4, 19),
(7, 'Борщ классический', 285, ' 290', ' гр.', 'images/menu_img/soups/product2.jpg', 4, 8),
(8, 'Телятина тушеная в томатном соусе', 580, '365', ' гр.', 'images/menu_img/hot_dishes/product1.jpg', 5, 13),
(9, 'Морской окунь', 610, '390', ' гр.', 'images/menu_img/hot_dishes/product2.jpg', 5, 8),
(10, 'Медальоны из свинины-гриль', 479, '340', ' гр.', 'images/menu_img/hot_dishes/product3.jpg', 5, 4),
(11, 'Тирамису классический', 295, ' 120', ' гр.', 'images/menu_img/dessert/product1.jpg', 6, 1),
(14, 'Evervess Кола', 169, '1', 'л.', 'images/menu_img/cold_drinks/product2.jpg', 7, 1),
(15, 'Какао', 129, '350', 'мл.', 'images/menu_img/hot_drinks/product1.jpg', 8, 3),
(16, 'Фирменная карбонара', 369, '300', 'гр', 'images/menu_img/paste/product1.jpg', 9, 1),
(17, 'Спагетти с фрикадельками из говядины', 399, '300', 'гр', 'images/menu_img/paste/product2.jpg', 9, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(0, 'Неизвестный'),
(1, 'Администратор'),
(2, 'Официант'),
(3, 'Повар');

-- --------------------------------------------------------

--
-- Структура таблицы `shifts`
--

CREATE TABLE `shifts` (
  `id_shift` int(11) NOT NULL,
  `date_shift` varchar(255) DEFAULT NULL,
  `time_shift` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `role_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shifts`
--

INSERT INTO `shifts` (`id_shift`, `date_shift`, `time_shift`, `id_user`, `role_user`) VALUES
(1, '31.09.2023', '16:00 - 2:00', 11, 1),
(3, '02.04.2024', '10:00 - 20:00', 42, 2),
(4, '02.04.2024', '10:00 - 20:00', 41, 3),
(5, '02.04.2024', '10:00 - 20:00', 11, 1),
(6, '03.04.2024', '10:00 - 20:00', 11, 1),
(7, '03.04.2024', '10:00 - 20:00', 41, 3),
(8, '03.04.2024', '10:00 - 20:00', 42, 2),
(11, '05.04.2024', '12:00 - 22:00', 41, 3),
(12, '05.04.2024', '12:00 - 22:00', 42, 2),
(13, '05.04.2024', '12:00 - 22:00', 11, 1),
(14, '05.04.2024', '12:00 - 22:00', 39, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `name_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'В обработке'),
(2, 'Принят'),
(3, 'Готовится'),
(4, 'Готов'),
(5, 'Выдан'),
(6, 'Оплачен'),
(7, 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `statususer`
--

CREATE TABLE `statususer` (
  `id_statusUser` int(11) NOT NULL,
  `name_statusUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statususer`
--

INSERT INTO `statususer` (`id_statusUser`, `name_statusUser`) VALUES
(1, 'Действующий'),
(2, 'Уволен'),
(3, 'Временно действующий');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `log_user` varchar(255) NOT NULL,
  `pass_user` varchar(800) NOT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  `phone_user` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT '0',
  `statusUser_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `log_user`, `pass_user`, `name_user`, `phone_user`, `id_role`, `statusUser_user`) VALUES
(11, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'Иваненко Рустам', '+79939312004', 1, 1),
(22, 'Ak', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '', 0, NULL),
(27, 'Akiko', 'bf568354caf613a50d5a8670af87143e9bd9249d54df03c1ff5013c63bc58655', 'Akiko', '89939312004', 0, NULL),
(28, 'Akiko1', 'bf568354caf613a50d5a8670af87143e9bd9249d54df03c1ff5013c63bc58655', 'Akiko', '89939312004', 0, NULL),
(29, 'Akiko123', 'bf568354caf613a50d5a8670af87143e9bd9249d54df03c1ff5013c63bc58655', 'Akiko', '89939312004', 0, NULL),
(30, 'Akiko3', 'bf568354caf613a50d5a8670af87143e9bd9249d54df03c1ff5013c63bc58655', 'Akiko', '89939312004', 0, NULL),
(31, 'Akiko356677', 'bf568354caf613a50d5a8670af87143e9bd9249d54df03c1ff5013c63bc58655', 'Akiko', '89939312004', 0, NULL),
(32, 'Aki', '0f9ab55a89d48ed7362f207780e9244a67910cff036120e3539c53fe4b1f69ff', 'Aki', '89939312004', 0, NULL),
(33, 'Aria', 'cd127e3c0b90eb246d2ebf038d56fccf81e26a782ac9b0a008b548eaff7fa69e', 'Aria', '89939312004', 0, NULL),
(35, 'Akiko356', 'ad296e8f00283c4ac66be7df0fc8ed4a863fe88c4872d21cdbc8e7b67051edd8', 'Akiko', '89939312004', 0, NULL),
(36, '1234567', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '123456', '89048006715', 0, NULL),
(37, 'Lina', 'c433834dfc5f8eba9f49be305eabd2fa36ec8c116ebd18bbbd1beb4638be1789', '123456j', '89080690097', 0, NULL),
(38, 'eee', '69ad7c2360473ad1be9d2f592fd0e3f0f842359274fcf9231c7582a8a47c1273', 'eee123', '89939312004', 2, 3),
(39, 'aaaaa', '909b5ce7d4bdaa962f3843a20f3d072c77e67f3cfd3675e939c437bc6a92a69e', 'aaaaa123', '1111', 2, 2),
(40, 'aaa', 'f64561e04c3be9cea6271afcd2b324f4b8654ed1b011f4f15ff4436e0100d5a0', 'aaa123', '89939312004', 2, 1),
(41, 'povar', 'a2bbec32de529dba958ab148a130a883a3cfc8fa1a2a1246a465a74d74bc7659', 'Петров Вячеслав', '89939312004', 3, 1),
(42, 'oficiant', '3541f113ba333644d27e37a3a3c5813c67f9b45dc44eb580e820e48d99a6cf48', 'Мешкова Анастасия', '89939312004', 2, 1),
(43, 'noname', '014b5f09a295b8c2500a4c872d91fbf07ca10c41abb67caa5c65a8514e8493d3', 'noname', '89939312004', 0, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kategory`
--
ALTER TABLE `kategory`
  ADD PRIMARY KEY (`id_kategory`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_products` (`id_products`);

--
-- Индексы таблицы `ordersserver`
--
ALTER TABLE `ordersserver`
  ADD PRIMARY KEY (`id_orderServer`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_shift` (`id_shift`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `name_kategory` (`name_kategory`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id_shift`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `shifts_ibfk_2` (`role_user`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `statususer`
--
ALTER TABLE `statususer`
  ADD PRIMARY KEY (`id_statusUser`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `statusUser_user` (`statusUser_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kategory`
--
ALTER TABLE `kategory`
  MODIFY `id_kategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT для таблицы `ordersserver`
--
ALTER TABLE `ordersserver`
  MODIFY `id_orderServer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `statususer`
--
ALTER TABLE `statususer`
  MODIFY `id_statusUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`id_products`) REFERENCES `product` (`id_product`);

--
-- Ограничения внешнего ключа таблицы `ordersserver`
--
ALTER TABLE `ordersserver`
  ADD CONSTRAINT `ordersserver_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `shifts` (`id_user`),
  ADD CONSTRAINT `ordersserver_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `ordersserver_ibfk_3` FOREIGN KEY (`id_shift`) REFERENCES `shifts` (`id_shift`),
  ADD CONSTRAINT `ordersserver_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`name_kategory`) REFERENCES `kategory` (`id_kategory`);

--
-- Ограничения внешнего ключа таблицы `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `shifts_ibfk_2` FOREIGN KEY (`role_user`) REFERENCES `role` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`statusUser_user`) REFERENCES `statususer` (`id_statusUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
