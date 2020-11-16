-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2020 г., 16:36
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `svechi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aroma`
--

CREATE TABLE `aroma` (
  `id_aroma` int(11) NOT NULL,
  `title_aroma` varchar(100) NOT NULL,
  `cost_aroma` int(11) DEFAULT NULL,
  `img_aroma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `aroma`
--

INSERT INTO `aroma` (`id_aroma`, `title_aroma`, `cost_aroma`, `img_aroma`) VALUES
(1, 'Пачули', 400, 'https://sun9-67.userapi.com/c854220/v854220157/219cff/ZIpKHLLIvXA.jpg'),
(2, 'Шалфей мускатный', 400, 'https://sun9-72.userapi.com/c854220/v854220157/219d06/X1A6X3vGKw8.jpg'),
(3, 'Орех мускатный', 400, 'https://sun9-12.userapi.com/c854220/v854220157/219d0d/DzY2n1Oi70k.jpg'),
(4, 'Сандаловое дерево', 400, 'https://sun9-72.userapi.com/c854220/v854220157/219d14/9LqSc5Roe6U.jpg'),
(5, 'Корица', 400, 'https://sun9-6.userapi.com/c854220/v854220157/219d1b/liIlKIjPF_I.jpg'),
(6, 'Без запаха', 0, 'https://sun9-2.userapi.com/c854220/v854220917/213678/2V4uS92rUGI.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `basis`
--

CREATE TABLE `basis` (
  `id_basis` int(11) NOT NULL,
  `title_basis` varchar(100) NOT NULL,
  `cost_basis` int(11) NOT NULL,
  `img_basis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basis`
--

INSERT INTO `basis` (`id_basis`, `title_basis`, `cost_basis`, `img_basis`) VALUES
(1, 'Парафин', 200, 'https://images.ua.prom.st/185352648_w640_h640_parafin.jpg'),
(2, 'Пчелиный воск', 700, 'https://medovayalavka.ru/wa-data/public/shop/products/81/08/881/images/778/778.970.jpg'),
(3, 'Гель', 150, 'https://aromagazin.ru/wa-data/public/shop/products/72/84/8472/images/2136/2136.745.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `candle`
--

CREATE TABLE `candle` (
  `id_candle` int(11) NOT NULL,
  `title_candle` varchar(100) NOT NULL,
  `description_candle` text NOT NULL,
  `cost_candle` int(11) NOT NULL,
  `img_candle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle`
--

INSERT INTO `candle` (`id_candle`, `title_candle`, `description_candle`, `cost_candle`, `img_candle`) VALUES
(1, 'Большая ароматическая свеча', 'Большая ароматическая свеча в стеклянном подсвечнике с пластмассовой закручивающейся крышкой. Диаметр 7,5 см, высота 9.5 см. Время горения около 35 часов.', 600, 'https://sun9-29.userapi.com/c854220/v854220917/213691/SPULIdXgNrc.jpg'),
(2, 'Ароматическая свеча в стекле', 'Большая ароматическая свеча в стеклянном подсвечнике с рельефным рисунком. Один рожок и плотная металлическая крышка. Диаметр 9 см. Высота 9,5 см. Время горения 48 часов.', 1099, 'https://sun9-71.userapi.com/c854220/v854220917/213689/V3HN5ZSV8qA.jpg'),
(3, 'Ароматическая свеча в стекле', 'Ароматическая свеча в стеклянном подсвечнике с пузырчатой поверхностью. Диаметр 7,8 см, высота 9 см. Время горения 30 часов.', 800, 'https://sun9-56.userapi.com/c854220/v854220917/2136a3/gmEjN-sIjck.jpg'),
(4, 'Ароматическая свеча в стекле', 'Ароматическая свеча в стеклянном подсвечнике с пробковой крышкой. 290 г. Диаметр 9 см, высота, включая крышку, 10 см. Время горения 45 часов.', 800, 'https://sun9-33.userapi.com/c854220/v854220917/2136ab/nOPTDRT0fCc.jpg'),
(5, 'Большая свеча', 'Свеча из парафина. Диаметр 7 см, высота 15 см. Время горения 50 часов.', 400, 'https://sun9-43.userapi.com/c854220/v854220917/2136b4/GF_Q4UAVV0w.jpg'),
(6, 'Ароматическая свеча в стекле', 'Ароматическая свеча в стеклянном подсвечнике с печатным рисунком. Диаметр 7 см, высота 7,5 см. Время горения 20 часов.', 400, 'https://sun9-47.userapi.com/c858124/v858124008/1cb271/rEN_KgyreHY.jpg'),
(7, 'Ароматическая свеча в стекле', 'Ароматическая свеча в стеклянном подсвечнике с печатным рисунком. Диаметр 8 см, высота 11 см. Время горения 60 часов.', 1000, 'https://sun9-36.userapi.com/c858124/v858124008/1cb279/dV4H6v7mCqI.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `candlestick`
--

CREATE TABLE `candlestick` (
  `id_candlestick` int(11) NOT NULL,
  `title_candlestick` varchar(100) NOT NULL,
  `cost_candlestick` int(11) DEFAULT NULL,
  `img_candlestick` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candlestick`
--

INSERT INTO `candlestick` (`id_candlestick`, `title_candlestick`, `cost_candlestick`, `img_candlestick`) VALUES
(1, 'Стеклянный Rasteli 30см', 200, 'https://williams-oliver.ru/catalogue/node/item/resource/00010623034_1_2.jpg'),
(2, 'Стильный подсвечник', 450, 'https://www.bosco.ru/upload/iblock/ee0/ee06524f88790d2d0d73f725f9813bc0_1221_1607.jpg'),
(4, 'Без подсвечника', 0, 'https://sun9-2.userapi.com/c854220/v854220917/213678/2V4uS92rUGI.jpg'),
(5, 'Волна', 700, 'https://kare-center.ru/upload/img_new/6/KARE-61840-1400x1400.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `colorant`
--

CREATE TABLE `colorant` (
  `id_colorant` int(11) NOT NULL,
  `title_colorant` varchar(100) NOT NULL,
  `cost_colorant` int(11) DEFAULT NULL,
  `img_colorant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colorant`
--

INSERT INTO `colorant` (`id_colorant`, `title_colorant`, `cost_colorant`, `img_colorant`) VALUES
(1, 'Жёлтый', 50, 'https://likeyou.io/wp-content/uploads/2019/06/Bezymyannyj-4-03.jpg'),
(2, 'Аквамарин', 50, 'https://static-eu.insales.ru/images/products/1/3846/166833926/large_foamiran-list-60h70sm-tolshhina-0-8-mm-cvet-akvamarin-28.jpg'),
(3, 'Индиго', 50, 'https://s01.yapfiles.ru/files/2122189/_sinii6600FF.png'),
(4, 'Персиковый', 50, 'https://sun9-38.userapi.com/c845121/v845121948/3a692/bQDQ_yLFJvU.jpg'),
(6, 'Без цвета', 0, 'https://sun9-2.userapi.com/c854220/v854220917/213678/2V4uS92rUGI.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `composition`
--

CREATE TABLE `composition` (
  `id_composition` int(11) NOT NULL,
  `id_candle` int(11) NOT NULL,
  `id_basis` int(11) NOT NULL,
  `id_colorant` int(11) NOT NULL,
  `id_extender` int(11) NOT NULL,
  `id_aroma` int(11) NOT NULL,
  `id_candlestick` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `composition`
--

INSERT INTO `composition` (`id_composition`, `id_candle`, `id_basis`, `id_colorant`, `id_extender`, `id_aroma`, `id_candlestick`) VALUES
(1, 5, 1, 2, 4, 6, 4),
(2, 1, 1, 6, 4, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `composition_order`
--

CREATE TABLE `composition_order` (
  `id_comp_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_basis` int(11) DEFAULT NULL,
  `id_colorant` int(11) DEFAULT NULL,
  `id_extender` int(11) DEFAULT NULL,
  `id_aroma` int(11) DEFAULT NULL,
  `id_candlestick` int(11) DEFAULT NULL,
  `id_candle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `composition_order`
--

INSERT INTO `composition_order` (`id_comp_order`, `id_order`, `id_basis`, `id_colorant`, `id_extender`, `id_aroma`, `id_candlestick`, `id_candle`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 2),
(2, 1, NULL, NULL, NULL, NULL, NULL, 4),
(4, 3, 1, 3, 4, 6, 4, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `extender`
--

CREATE TABLE `extender` (
  `id_extender` int(11) NOT NULL,
  `title_extender` varchar(100) NOT NULL,
  `cost_extender` int(11) DEFAULT NULL,
  `img_extender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `extender`
--

INSERT INTO `extender` (`id_extender`, `title_extender`, `cost_extender`, `img_extender`) VALUES
(1, 'Песок', 70, 'https://img.audiomania.ru/pics/goods/original/p/pesok_dlya_zasipki_stoek1.jpg'),
(2, 'Сухоцветы', 60, 'https://cs5.livemaster.ru/storage/e9/21/b0b4f5410a35c0df776073ff4bg7--materialy-dlya-tvorchestva-suhotsvet-ageratum-nabor-6-9-vetoc.jpg'),
(3, 'Ракушки', 100, 'https://ppposuda.ru/wp-content/uploads/2017/10/rakushki.jpg'),
(4, 'Без наполнителя', 0, 'https://sun9-2.userapi.com/c854220/v854220917/213678/2V4uS92rUGI.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `order_user`
--

CREATE TABLE `order_user` (
  `id_order` int(11) NOT NULL,
  `summa` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_user`
--

INSERT INTO `order_user` (`id_order`, `summa`, `id_user`, `status`) VALUES
(1, 1899, 1, 'Обрабатывается'),
(3, 250, 1, 'Отправлен');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `img_user` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `name`, `surname`, `fathername`, `role`, `img_user`) VALUES
(1, 'qwe', 'qwe', 'Иван', 'Иванов', 'Иванович', 2, 'https://sun9-44.userapi.com/c851024/v851024100/138982/k6W-dZXzISA.jpg'),
(2, '123', '123', 'Петр', 'Петров', 'Петрович', 2, 'https://sun9-11.userapi.com/c856032/v856032487/55bec/uGsFRvzMbuU.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aroma`
--
ALTER TABLE `aroma`
  ADD PRIMARY KEY (`id_aroma`);

--
-- Индексы таблицы `basis`
--
ALTER TABLE `basis`
  ADD PRIMARY KEY (`id_basis`);

--
-- Индексы таблицы `candle`
--
ALTER TABLE `candle`
  ADD PRIMARY KEY (`id_candle`);

--
-- Индексы таблицы `candlestick`
--
ALTER TABLE `candlestick`
  ADD PRIMARY KEY (`id_candlestick`);

--
-- Индексы таблицы `colorant`
--
ALTER TABLE `colorant`
  ADD PRIMARY KEY (`id_colorant`);

--
-- Индексы таблицы `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`id_composition`),
  ADD KEY `id_svecha` (`id_candle`),
  ADD KEY `id_basis` (`id_basis`),
  ADD KEY `id_colorant` (`id_colorant`),
  ADD KEY `id_extender` (`id_extender`),
  ADD KEY `id_aroma` (`id_aroma`),
  ADD KEY `id_candlestick` (`id_candlestick`);

--
-- Индексы таблицы `composition_order`
--
ALTER TABLE `composition_order`
  ADD PRIMARY KEY (`id_comp_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_basis` (`id_basis`),
  ADD KEY `id_colorant` (`id_colorant`),
  ADD KEY `id_extender` (`id_extender`),
  ADD KEY `id_aroma` (`id_aroma`),
  ADD KEY `id_candlestick` (`id_candlestick`),
  ADD KEY `id_candle` (`id_candle`);

--
-- Индексы таблицы `extender`
--
ALTER TABLE `extender`
  ADD PRIMARY KEY (`id_extender`);

--
-- Индексы таблицы `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `aroma`
--
ALTER TABLE `aroma`
  MODIFY `id_aroma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `basis`
--
ALTER TABLE `basis`
  MODIFY `id_basis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `candle`
--
ALTER TABLE `candle`
  MODIFY `id_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `candlestick`
--
ALTER TABLE `candlestick`
  MODIFY `id_candlestick` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `colorant`
--
ALTER TABLE `colorant`
  MODIFY `id_colorant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `composition`
--
ALTER TABLE `composition`
  MODIFY `id_composition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `composition_order`
--
ALTER TABLE `composition_order`
  MODIFY `id_comp_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `extender`
--
ALTER TABLE `extender`
  MODIFY `id_extender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order_user`
--
ALTER TABLE `order_user`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `composition`
--
ALTER TABLE `composition`
  ADD CONSTRAINT `composition_ibfk_2` FOREIGN KEY (`id_candle`) REFERENCES `candle` (`id_candle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_3` FOREIGN KEY (`id_basis`) REFERENCES `basis` (`id_basis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_4` FOREIGN KEY (`id_colorant`) REFERENCES `colorant` (`id_colorant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_5` FOREIGN KEY (`id_extender`) REFERENCES `extender` (`id_extender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_6` FOREIGN KEY (`id_aroma`) REFERENCES `aroma` (`id_aroma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_7` FOREIGN KEY (`id_candlestick`) REFERENCES `candlestick` (`id_candlestick`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `composition_order`
--
ALTER TABLE `composition_order`
  ADD CONSTRAINT `composition_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_user` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_order_ibfk_2` FOREIGN KEY (`id_basis`) REFERENCES `basis` (`id_basis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_order_ibfk_3` FOREIGN KEY (`id_colorant`) REFERENCES `colorant` (`id_colorant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_order_ibfk_4` FOREIGN KEY (`id_extender`) REFERENCES `extender` (`id_extender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_order_ibfk_5` FOREIGN KEY (`id_aroma`) REFERENCES `aroma` (`id_aroma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_order_ibfk_6` FOREIGN KEY (`id_candlestick`) REFERENCES `candlestick` (`id_candlestick`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_order_ibfk_7` FOREIGN KEY (`id_candle`) REFERENCES `candle` (`id_candle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
