-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 13 2017 г., 20:25
-- Версия сервера: 5.7.13-log
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mc_guestbook`
--

CREATE TABLE IF NOT EXISTS `mc_guestbook` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file` varchar(25) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `browser` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mc_guestbook`
--

INSERT INTO `mc_guestbook` (`id`, `date`, `username`, `email`, `file`, `homepage`, `message`, `browser`, `ip`) VALUES
(1, '2017-08-11 15:40:51', 'rikon', 'rikon@mail.ru', '', '', '&nbsp;\r\n\r\n\r\n\r\n<strong>Саня Ъ, с днем рождения! Счастья, здоровья, удачи и успехов. Как твое здоровье, кстати, в связи с новостями?</strong>\r\n\r\n\r\n', 'Chrome', '127.0.0.1'),
(2, '2017-08-11 15:42:07', 'kashmariarti', 'kashmariarti@mail.ru', '', '', 'Свинцовое изделие покрыли серебром. Какое это покрытие &ndash; анодное или катодное? Составьте электронные уравнения анодного и катодного процессов коррозии этого изделия при нарушении покрытия во влажном воздухе и в кислой среде. Каковы продукты коррозии?', 'Chrome', '127.0.0.1'),
(3, '2017-08-11 15:43:16', 'Gulnaz', 'gulnaz@mail.ru', '', 'https://www.alhimikov.net/book/', 'Спасибо вам большое, за сайт, за то что вы есть, огромного вам здоровья и успехов во всех ваших проектах', 'Chrome', '127.0.0.1'),
(4, '2017-08-11 15:43:54', 'plitka18', 'plitka18@mail.ru', '', '', 'здравствуйте!подскажите пожалуйста какое ароматическое вещество можно использовать для блокирования запаха пластика при нагревании от солнца?', 'Chrome', '127.0.0.1'),
(5, '2017-08-11 15:45:08', 'GG', 'GG@gmail.com', '', '', '<a href="http://www.alhimikov.net/dopmat/concentr_rastvory.html">http://www.alhimikov.net/dopmat/concentr_rastvory.html</a>опечатка в <strong>расчете</strong> г-экв сульфата алюминия - делить на 6\r\n&nbsp;', 'Chrome', '127.0.0.1'),
(6, '2017-08-11 15:46:12', 'Ekaterina', 'Ekaterina@gmail.com', '599089e8adeb6.jpg', '', '<code>Спасибо большущее за сайт он мне реально помогает</code>', 'Chrome', '127.0.0.1'),
(7, '2017-08-11 15:47:28', 'Sofija', 'Sofija@gmail.com', '', '', 'Очень <strong>крассиво</strong> все и полезно! \r\n\r\nБольшой респект\r\n\r\n<strong> всем, кто создал этот сайт!</strong>', 'Chrome', '127.0.0.1'),
(8, '2017-08-11 15:47:57', 'Zoya', 'manerniy@ukr.net', '', '', '&nbsp;&nbsp;Спасибо, очень ценные и необходимые материалы для работы, отдельное спасибо за видео. Стала использовать материалы когда в кабинете, наконец-то, появился компьютер и мультимедийный проектор', 'Chrome', '127.0.0.1'),
(9, '2017-08-11 15:48:53', 'irina', 'manerniy@ukr.net', '', 'http://manerniy', '<strong>ответьте пожалуста</strong>, \r\nможно ли скачать видеосюжеты? Интересуюсь как учитель для использования данных фрагментов на уроках', 'Chrome', '127.0.0.1'),
(10, '2017-08-11 15:49:54', 'maggi', 'maggi@ukr.net', '', 'http://maggi.ru', '<strong>спасибо все клево!</strong>', 'Chrome', '127.0.0.1'),
(15, '2017-08-11 16:07:06', 'Jasminlo', 'Jasminlo@yy.com', '', 'http://jasminlo.ru', 'надо больше про оксиды!!', 'Chrome', '127.0.0.1'),
(16, '2017-08-11 16:07:28', 'Annet', 'Annet@yy.com', '', 'http://Annet.ru', 'а проскоки электронов бываю только в этих элементах: Хром, медь,молибден, ниобий, рутений, палладий, родий, серебро, золото, платина?', 'Chrome', '127.0.0.1'),
(17, '2017-08-11 16:08:12', 'Tatiana', 'Tatiana@yy.com', '', 'http://Tatiana.ru', '<strong>к сожалению не просмотреть некоторые фильмы (вода и свойства водорода)!!!!</strong>', 'Chrome', '127.0.0.1'),
(18, '2017-08-11 16:08:45', '0000', 'wfwgwgwg@yy.com', '', '', 'найти массу воды 2см3?', 'Chrome', '127.0.0.1'),
(19, '2017-08-11 16:09:29', 'Himia0605', 'Himia0605@yy.com', '', '', 'Спасибо, нашла все,что нужно)&nbsp;<a href="https://www.alhimikov.net/book/index.php?page=6">клик</a>', 'Chrome', '127.0.0.1'),
(20, '2017-08-11 16:10:00', 'nasty', '00dkp@rambler.ru', '', '', '<strong>Просто супер) Нет слов)))</strong>', 'Chrome', '127.0.0.1'),
(21, '2017-08-11 16:10:26', 'Naio', 'Naio@rambler.ru', '', '', 'Есть ли такое сухое соединение, которое при контакте с воздухом превращалось бы в воду?!', 'Chrome', '127.0.0.1'),
(22, '2017-08-11 16:11:14', 'floweryada', 'floweryada@rambler.ru', '', 'http://floweryada.com', '<a href="http://floweryada.com">http://floweryada.com</a>\r\nесли можно - ответ на почту.', 'Chrome', '127.0.0.1'),
(23, '2017-08-11 16:11:29', 'floweryada', 'floweryada@rambler.ru', '', 'http://floweryada.com', 'моль - хим. колич. ... содежится в 1/12 углерода. А почему именно углерода???', 'Chrome', '127.0.0.1'),
(24, '2017-08-11 16:12:16', 'Annet', 'Annet@rambler.ru', '599089cba5f21.jpg', 'http://Annet.com', 'Здравствуйте уважаемые создатели электронных формул таблицы Менделеева ( http://alhimikov.net/electron/01.html)! Я нашла у вас пару ошибок в формулах, надеюсь вы их устраните. Например: 41 элемент - ниобий(Nb) у вас написано так - 1s2 2s2 2p6 3s2 3p6 4s2 3d10 4p6 5s1 4d4, но по моему мнению должно быть написано так/', 'Chrome', '127.0.0.1'),
(25, '2017-08-11 16:13:58', 'migunov', 'migunov.1980@list.ru', '', '', 'Здравствуйте. Ваш сайт очень хороший. помогает не только ученикам, но и нам учителям. Большое вам спасибо.\r\n&nbsp;', 'Chrome', '127.0.0.1'),
(26, '2017-08-11 16:14:20', 'plitka18', 'plitka18.1980@list.ru', '', '', '<strong>Здравствуйте.</strong> Ваш сайт очень хороший. помогает не только ученикам, но и нам учителям. Большое вам спасибо.', 'Chrome', '127.0.0.1'),
(27, '2017-08-11 16:14:40', 'plitka18', 'plitka18.1980@list.ru', '', '', 'Я хочу выразить вам огромнейшую благодарность за такой великолепный сайт. Я учусь в 10 классе ,учителя по химии у нас нет , а я хочу поступить медицинский и с помощью вашего сайта я занимаюсь самообразованием.', 'Chrome', '127.0.0.1'),
(28, '2017-08-11 16:14:45', 'plitka18', 'plitka18.1980@list.ru', '', '', 'Напишите уравнение реакции где демонстрируется наличие альдегидной и гидроксильной групп в глюкозе.Помогите с этой задачкой пожалуйста.&nbsp;&nbsp;&nbsp;', 'Chrome', '127.0.0.1'),
(29, '2017-08-11 16:15:15', 'Zoya', 'Zoya.1980@list.ru', '599089f7f2fb0.jpg', '', '<strong>Сайт просто обалденный!</strong>очень помог!буду пользоваться им в дальнейшем', 'Chrome', '127.0.0.1'),
(30, '2017-08-11 16:15:30', 'Zoya', 'Zoya.1980@list.ru', '', '', '<strong>Спасибки всё супер&nbsp;&nbsp;&nbsp;вы единственый сайт где я наконецто нашла то что искала.</strong>', 'Chrome', '127.0.0.1'),
(31, '2017-08-11 16:15:51', 'admin', 'admin.1980@list.ru', '599088a017942.txt', '', 'Да там не оксиды даны, а металлы с указанием степени окисления 0. Недочет исправлен! Спасибо за внимание!', 'Chrome', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `mc_likes`
--

CREATE TABLE IF NOT EXISTS `mc_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mc_likes`
--

INSERT INTO `mc_likes` (`id`, `user_id`, `news_id`) VALUES
(7, 1, 3),
(11, 1, 2),
(14, 1, 1),
(15, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_news`
--

CREATE TABLE IF NOT EXISTS `ms_news` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_news`
--

INSERT INTO `ms_news` (`id`, `name`, `date`, `content`, `likes`) VALUES
(1, 'Golliaf', '2017-07-06 17:42:19', 'Итоги за неделю!\nИ вот настало воскресенье, предлагаю в таком формате выдавать новости прошедшие за неделю.\nЗа эту неделю, мы увидели первый(и надеюь на ближайшие пол года последний) вайп, он произошел из-за волшебного огня в Thaumcraft который убил влсю карту и превратил её в локальный АД. \nТакже решли проблему с банами после смерти, а это уже произошло в связи с нашей невнимательностью, на карте ада выставился режим Хардкор, который после смерти банально банил игроков(в одиночной игре в этом режиме удаляется карта), решили/исправили. \nТак-же был обновлён сайт, он теперь лучше отображается на устройствах с маленьким разрешением экрана(мобильные телефоны, планшетные компьютеры, калькуляторы, тамагочи и микроволновки), было добавлено восстановление пароля. \nБыл проведён конкурс на хелперов, окончательный список администрации на данный момент таков: \nGolliaf - Админ \nLordFortuna - Модератор \nVorvova - Хелпер \nVlad_evs - Хелепер \nTheChupa - Хелепер \nЖдите новых новостей и вступайте в группу ВКонтакте, там я стараюсь выкладывать актуальные новости и приятные картинки. \n\nС уважением, MyKubatura :-)', 1),
(4, 'Golliaf', '2017-07-07 09:57:40', '[b]Привет всем![/b]', 1),
(5, 'Golliaf', '2017-07-06 11:17:04', 'Дорогие друзья!\nХочу поздравить нас всех с переездом на новый сайт. \nЗдесь мы будем оповещать вас о нововведения, проблемах и достижениях относительно этого сервера(ну и последующие тоже). \nНа данный момент многие интересные плюшки будут недоступны из-за желания поскорее обновиться. Всё доработаем, допилим и прикрутим чтобы повысить комфортность пребывания на нём. \nВ будущем будут доступны личные сообщения между игроками, появятся ачивки, появится полноценная поддержка, будет больше информации о сервере и игроках, более развитый личный кабинет, адекватный СВОЙ магазин, с блек-джеком и картинками и еще много, много всего. \nНа данный момент пользуемся, изучаем, получаем удовольствие!\n\nС уважением, MyKubatura :-)', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_servers`
--

CREATE TABLE IF NOT EXISTS `ms_servers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `port` int(11) NOT NULL DEFAULT '0',
  `db_host` varchar(50) NOT NULL DEFAULT '',
  `db_name` varchar(50) NOT NULL DEFAULT '',
  `db_port` int(11) NOT NULL DEFAULT '3306',
  `db_user` varchar(50) NOT NULL DEFAULT '',
  `db_password` varchar(50) NOT NULL DEFAULT '',
  `map_port` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_servers`
--

INSERT INTO `ms_servers` (`id`, `name`, `ip`, `port`, `db_host`, `db_name`, `db_port`, `db_user`, `db_password`, `map_port`) VALUES
(1, 'Polonium', '0.0.0.0', 3016, 'mykubatura.ru', 'polonium', 3017, 'root', 'P1tJMFrKqCJkVBogmMgj', 8123),
(2, 'Server1', '178.32.96.65', 25900, 'mykubatura.ru', 'polonium', 3306, 'root', 'P1tJMFrKqCJkVBogmMgj', 8123);

-- --------------------------------------------------------

--
-- Структура таблицы `ms_users`
--

CREATE TABLE IF NOT EXISTS `ms_users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `money` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `secret_key` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ms_users`
--

INSERT INTO `ms_users` (`id`, `name`, `email`, `password`, `money`, `level`, `secret_key`) VALUES
(1, 'Admin', 'admin@admin.ru', '14e1b600b1fd579f47433b88e8d85291', 0, 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mc_guestbook`
--
ALTER TABLE `mc_guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mc_likes`
--
ALTER TABLE `mc_likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_news`
--
ALTER TABLE `ms_news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_servers`
--
ALTER TABLE `ms_servers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mc_guestbook`
--
ALTER TABLE `mc_guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `mc_likes`
--
ALTER TABLE `mc_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `ms_news`
--
ALTER TABLE `ms_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `ms_servers`
--
ALTER TABLE `ms_servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ms_users`
--
ALTER TABLE `ms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
