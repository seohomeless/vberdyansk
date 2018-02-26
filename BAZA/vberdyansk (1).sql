-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2018 г., 11:45
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vberdyansk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `alboms`
--

CREATE TABLE `alboms` (
  `id` int(10) UNSIGNED NOT NULL,
  `prev_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chisto` int(11) DEFAULT NULL,
  `servic` int(11) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `otvetest` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `content`, `chisto`, `servic`, `cena`, `author`, `email`, `public`, `otvetest`, `created_at`, `updated_at`) VALUES
(54, 13, 'Отличный отель', 4, 4, 4, 'Андрей', 'salaev.andrey@ya.ru', 0, 1, '2018-02-12 13:18:08', '2018-02-12 13:18:08'),
(55, 13, 'Спасибо приедем еще', 4, 5, 4, 'Милла', 'salae2v.andrey@ya.ru', 0, NULL, '2018-02-12 13:18:28', '2018-02-12 13:18:28');

-- --------------------------------------------------------

--
-- Структура таблицы `comments_otvets`
--

CREATE TABLE `comments_otvets` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments_otvets`
--

INSERT INTO `comments_otvets` (`id`, `comment_id`, `content`, `created_at`, `updated_at`) VALUES
(16, 54, 'Мы рады что вам понравилось!', '2018-02-12 13:18:45', '2018-02-12 13:18:45');

-- --------------------------------------------------------

--
-- Структура таблицы `comments_photos`
--

CREATE TABLE `comments_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `comments_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments_photos`
--

INSERT INTO `comments_photos` (`id`, `comments_id`, `filename`, `created_at`, `updated_at`) VALUES
(27, 54, 'comphoto/ceqaTtk6a25te1nuGMtd3QuLQ6yyyi0tIL4IKEQz.jpeg', '2018-02-12 13:18:09', '2018-02-12 13:18:09');

-- --------------------------------------------------------

--
-- Структура таблицы `gorods`
--

CREATE TABLE `gorods` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prev_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gorods`
--

INSERT INTO `gorods` (`id`, `title`, `prev_photo`, `content`, `alias`, `description`, `created_at`, `updated_at`) VALUES
(37, 'Отдых на пляжах Бердянска', 'kGj6u78Vtx2015_03_23_027363_01.jpg', '<p>Пляжи курортного Бердянска с давнего времени славились своим золотистым песком и абсолютной чистотой. Еще в книге 1928 года это побережье считалось наилучшим на Азовском море. Правда, с 1928 года прошло достаточно много времени, и сейчас чище всего на Бердянской косе, на которую и следует отправляться за тишиной, спокойствием и отсутствием моторных лодок, которые норовят задавить купающихся людей на городских пляжах. Но давайте сделаем обзор всех популярных пляжей Бердянска, чтобы получить общую картину обстановки.</p>\r\n\r\n<h2><br />\r\nЦентральный пляж</h2>\r\n\r\n<p>Находится рядом с портом, в самом центре города отсюда он и берёт своё название. Пляж людям удобен тем, что прогуливаясь по набережной и рассматривая многие достопримечательности, можно отвлечься и на 10 минут окунуться в прохладное море, что придаст вам немало дополнительных сил для продолжения экскурсии.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vberdyansk.local/uploads/2015_03_23_027363_01.jpg\" style=\"height:471px; width:630px\" /></p>\r\n\r\n<p>2-ой пляж, больше знаменит как пляж &quot;Лиски&quot;. Название пляжа происходит от микрорайона города, в котором он находится. Существует даже легенда о происхождении названия этого района. Якобы, жила здесь некая Лизка, которая торговала водкой, К ней спешили рыбаки каждый раз после того, как удачно порыбачили. Дойти до этого пляжа от Автовокзала можно всего за 5 минут. Дно является песчаным, сначала мелкое но, пройдя немного в глубину, можно понырять, что удобно в обоих случаях, как для отдыха с детворой, так и дружеской компанией.</p>\r\n\r\n<p>В этом микрорайоне находятся частные дома, поэтому те кто устал от многоквартирных высоток, могут сменить свою обстановку на номера в частном секторе, частные отели и пансионаты.</p>\r\n\r\n<p>3-ий пляж (Остров счастья)</p>\r\n\r\n<p>Песчаный пляж находится в 15 минутах хоть бы от Ж/Д Вокзала. К нему прилегает район Слободка, где, так же как и на Лисках преобладает частный сектор.<br />\r\n&nbsp;<br />\r\nПляж &quot;Красная гвоздика&quot;</p>\r\n\r\n<p>Берёт своё название от находящегося рядом Детского Оздоровительного Лагеря &quot;Красная гвоздика&quot;. Этот пляж наилучшим образом подойдёт для семей с маленькими детьми.</p>\r\n\r\n<p>Верховая</p>\r\n\r\n<p>Пляж является здесь песчаным, он расположен всего в 20 минутах езды от центра города, рядом с микрорайоном Колония. Можно доехать маршрутом автобусе №10 и №21.</p>\r\n\r\n<p>Коса</p>\r\n\r\n<p>Отдых на Бердянской косе. Протяженность Бердянской косы составляет 23 км. Она&nbsp; условно на 3 части: ближняя коса, средняя и дальняя. Вся коса усеяна большим количеством баз отдыха, пансионатами, а так же частными отелями. Из центра города можно добраться за 25 минут на маршрутке. Можно доехать маршрутом автобусе №17, №17/5 и т.д..</p>\r\n\r\n<p><br />\r\nНудистский пляж</p>\r\n\r\n<p>Так как название говорит само за себя, пляж в подробном описании не нуждается. Поскольку на наш сайт могут заходить дети, месторасположение, лучше всего уточняйте у местных жителей.</p>\r\n\r\n<p>На всех пляжах города есть большое количество водных аттракционов, баров и кафе.</p>', 'otdykh-na-plyazhakh-berdyanska', 'Пляжи курортного Бердянска с давнего времени славились своим золотистым песком и абсолютной чистотой. Еще в книге 1928 года это побережье считалось на...', '2018-02-10 01:21:20', '2018-02-10 01:21:20'),
(38, 'Сколько стоит снять жилье в Бердянске', 'RlQa7jeObT1.jpg', '<p>С каждым новым годом можно наблюдать преображение частного сектора в Бердянске: перестройку домов, их обустройство под свои потребности и нужды туриста. Поэтому снять жилье в Бердянске в настоящее время не очень сложно, да и выбор огромен.</p>\r\n\r\n<p>Где снять жилье</p>\r\n\r\n<p>Весь местный частный сектор подразделяется на центральный район, Слободку, Колонию, Лиски и АКЗ. Если вести речь о стоимости, то Слободка является наиболее дорогим районом, а самым дешевым является АКЗ вместе с районом дач.</p>\r\n\r\n<p>Побывавшие тут отдыхающие оставляют самые разные отзывы, большинство из которых являются положительными, хотя и отрицательные моменты тоже есть. Плюс в том, что снять жилье в Бердянске в настоящее время можно абсолютно на любой вкус, с учетом и цены и качества.</p>\r\n\r\n<p>Минус &ndash; тут не имеется какой-либо обычной классификации в проживании, например, номера типа люкс и полулюкс в разных местах могут быть самыми разными.</p>\r\n\r\n<p>Цены 2016 на жилье в Бердянске</p>\r\n\r\n<p>Жилье в Бердянске можно снять как на все лето, так и посуточно. Квартиры в Бердянске посуточно в настоящее время выгодно отличаются от отелей и гостиниц, прежде всего стоимостью, поскольку при аренде квартиры Вы платите только за определенную квартиру, а не за количество спальных мест. И если гостиница Бердянска берет самую разную цену при размещении одного или четверых человек, то если при аренде квартиры посуточно это вообще не имеет ни какого значения. Остановимся теперь конкретнее по ценам на жилье в разных районах. На АКЗ можно летом снять квартиру от 80 грн, в сутки.</p>\r\n\r\n<p>На средней горе снять квартиру мот от 100 грн, В центральной части города &ndash; от 150 грн, в Колонии &ndash; от 70 грн.</p>\r\n\r\n<p>&nbsp;<br />\r\nКак забронировать жилье в Бердянске</p>\r\n\r\n<p>В народе не зря говорится &mdash; готовь санки летом, а телегу зимой. Также и о своем летнем отпуске необходимо подумать заранее. Определиться, каким транспортом можно добираться, какие именно вещи стоит брать с собой, заказать билеты и, самое главное, забронировать и снять жильё.</p>\r\n\r\n<p>В Бердянске его можно снять на любой вкус и кошелек, но летом его стоит бронировать заранее. Среди большого количества объявлений сайта ВБердянске вы сможете найти именно то, что искали. На нашем сайте вы сможете выбрать и забронировать жилье из абсолютно любой ценовой категории, самого разного типа и находящегося в любом районе города.</p>\r\n\r\n<p>&nbsp;</p>', 'skolko-stoit-snyat-zhile-v-berdyanske', 'С каждым новым годом можно наблюдать преображение частного сектора в Бердянске: перестройку домов, их обустройство под свои потребности и нужды турист...', '2018-02-10 01:22:27', '2018-02-10 01:22:27'),
(39, 'Бердянск — дальняя коса', 'eYhNJGPOesmaxresdefault.jpg', '<p>Протяженность Бердянской косы составляет 23 км. Тут располагается много отелей и баз отдыха. Именно эту местность начали заселять местные горожане как самую первую в городе.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vberdyansk.local/uploads/maxresdefault.jpg\" style=\"height:338px; width:600px\" /></p>\r\n\r\n<p>Как возникла Коса</p>\r\n\r\n<p>Информация о побережье берет начало еще в v веке до н.э. Изначально коса называлась &laquo;Агарским мысом&raquo; и появилась благодаря речке &laquo;Берде&raquo;, она впадает в море с восточной стороны основания косы. После того, как к России присоединилось Крымское ханство, правый берег реки Берды стал русским &ndash; это произошло в 1783 году. А в 1827 году рядом был основан город-курорт Бердянск, который, с течением времени, стал расширять свои территории, захватив и косу. Необходимо отметить, что Бердянскую косу прекрасно знали античные мореходы, их корабли спасались в ее многочисленных бухточках во время сильных штормов.</p>\r\n\r\n<p>Месторасположение Дальней косы</p>\r\n\r\n<p>Местность, начиная с санатория &laquo;Азов&raquo; принято считать началом территории Дальней косы. Она является памятником природы местного значения. Тут отдыхающим предоставляется огромный выбор частных отелей и гостиниц, серди которых &laquo;Шико&raquo;, &laquo;Бриз&raquo;, &laquo;Золотой берег&raquo;, &laquo;Южный берег&raquo;, &laquo;Виолис&raquo;. Любители поудить могут прямиком направляться в рыбацкий поселок.</p>\r\n\r\n<p>Пребывая на Дальней косе, обязательно необходимо обратить внимание на знаменитый маяк Азовского моря, который был сооружен боле 170 лет тому назад.</p>\r\n\r\n<p>Дальняя коса является заповедной зоной. Здешний растительный мир является очень богатым. В настоящее время количество видов растений заповедника превышает 350. Тут можно увидеть и редких представителей, которые занесены в Красную Книгу. К примеру, медонос катран черноморский. В старину это многолетнее растение употреблялось для улучшения аппетита и лечения многих серьезных недугов.</p>\r\n\r\n<p>Животный мир дальней косы также удивителен и весьма разнообразен. Не обращая внимания на большое количество туристов, тут обитают такие дикие животные как лесные куницы, пятнистые коты, а также лисы. Поражает и большое количество разных птиц, которые постоянно рассекают небеса над заповедником. Тут уживаются и грациозные лебеди, и крикливые чайки. Кроме уток и бакланов, можно увидеть и знаменитых сорок.</p>\r\n\r\n<p>Бердянская коса богата солеными озерами, которые пролегают по берегу моря. Именно в Бердянских лиманах добываются целебные грязи. Интересно, что соленость воды одного из этих лиманов является близкой к уровню солености Мертвого моря. Неповторимость Бердянской косы делает ее заповедником государственного масштаба.</p>', 'berdyansk-dalnyaya-kosa', 'Протяженность Бердянской косы составляет 23 км. Тут располагается много отелей и баз отдыха. Именно эту местность начали заселять местные горожане как...', '2018-02-10 01:41:38', '2018-02-10 01:41:38');

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `houses_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id`, `houses_id`, `content`, `created_at`, `updated_at`) VALUES
(12, 13, '<p>Отель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель ЛевантОтель Левант</p>', '2018-02-12 13:02:06', '2018-02-12 13:02:06');

-- --------------------------------------------------------

--
-- Структура таблицы `hotels_rooms`
--

CREATE TABLE `hotels_rooms` (
  `id` int(11) NOT NULL,
  `hotels_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `houses`
--

CREATE TABLE `houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prev_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rayon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cenaot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `houses`
--

INSERT INTO `houses` (`id`, `title`, `prev_photo`, `category`, `rayon`, `cenaot`, `autor_id`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(13, 'Отель Левант', 'REvmkSGsJMb9233e19f7aba0fa529db5f0b246813c.jpeg', 'hotels', 'центр', '400', '1', '123123', '123123', '2018-02-12 13:02:06', '2018-02-12 13:02:06');

-- --------------------------------------------------------

--
-- Структура таблицы `kvartirs`
--

CREATE TABLE `kvartirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `houses_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `komtat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etazh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `mestas`
--

CREATE TABLE `mestas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rubrika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prev_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mestas`
--

INSERT INTO `mestas` (`id`, `title`, `rubrika`, `prev_photo`, `content`, `lat`, `lng`, `alias`, `created_at`, `updated_at`) VALUES
(2, '33333333333333', '', '99wcuJVdTy2015_03_23_027363_01.jpg', '<p>332 423 4 233333333333333333 333333333333333 33333333333333 333333333333333333 333333333333333 3333333333333333 333333333333333 33333333333 33333333333  </p>', '444444442', '22222222', '', '2018-02-10 03:52:11', '2018-02-10 03:52:11'),
(3, 'ы ыфвфывфывф фывфывыввфы фв фыв фыв ф', 'Салоны красоты', 'DDyxuCpQrp2015_03_23_027363_01.jpg', '<p>ы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв фы ыфвфывфывф фывфывыввфы фв фыв фыв ф</p>', '22222', '2222', '', '2018-02-10 04:02:08', '2018-02-10 04:02:08'),
(4, '123123123', 'Музеи', 'wmsZ6WAMLOSalova 53-1.jpg', '<p>в ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фыв ф фв фыв фыв фы</p>', '123123', '123123', '', '2018-02-10 04:03:12', '2018-02-10 04:03:12'),
(5, 'ыва ывп фвап ывап ыв2', 'Бильярд', 'NWDkMxusB8Salova 53(1).jpg', '<p>2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв2342323423вфц вфы вфы ва ыва ывп фвап ывап ыв</p>', '2223', '123123', 'yva-yvp-fvap-yvap-yv2', '2018-02-10 04:09:32', '2018-02-10 04:09:32');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_01_12_163542_Rooms', 1),
(2, '2018_01_13_223757_CreateRoleTables', 2),
(3, '2018_01_13_232909_CreateCountriTables', 3),
(4, '2018_01_15_111103_create_table_comments', 4),
(5, '2018_01_15_164536_create_comments_photos_table', 4),
(6, '2018_02_02_002610_create_roles_table', 5),
(7, '2018_02_03_195709_create_gorod_table', 6),
(8, '2018_02_03_195744_create_alboms_table', 6),
(9, '2018_02_03_195811_create_mesta_table', 6),
(10, '2018_02_06_025455_create_comments_otvet_table', 7),
(11, '2018_02_10_211641_create_houses_table', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products_photos`
--

CREATE TABLE `products_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'administrator', NULL, NULL),
(2, 'arenda', 'arendadatel', NULL, NULL),
(3, 'user', 'dobavlenieotzivov', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `house_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(11) DEFAULT NULL,
  `public` tinyint(1) DEFAULT '1',
  `rayon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komnat` int(11) NOT NULL,
  `mest` int(11) NOT NULL,
  `prev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments_enable` int(11) NOT NULL DEFAULT '1',
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sectors`
--

CREATE TABLE `sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `houses_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `osebe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `osebe`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'seohomeless@gmail.com', '$2y$10$aKaLe/KcIahtdITR2zPB4OCg5HJsLR6dHFeSEnq.qVxziUcgWw7je', 'tNBVTzaVNuERRD0kVLQSG80r8qxhcIiDjcgvBq70uf4qD5iTbSGcb5G3H5se', '', '', 'public/avatars/woman.jpg', '2018-01-12 14:38:39', '2018-01-12 14:38:39'),
(2, 'Дон Жуан', 'sss@ff.ru', 'sss@ff.ru', NULL, '', '', '0', '2018-01-13 21:21:55', '2018-01-13 21:21:55'),
(3, 'Дон Жуан', 'sss@ff.ru', 'sss@ff.ru', NULL, '', '', '0', '2018-01-13 21:32:40', '2018-01-13 21:32:40'),
(4, 'admin2', 'seohom2eless@gmail.com', '$2y$10$QCwLQpLYY5wk.79F/m5/7eVTK8m1k6/tA3yowj51IESxkFnBP008K', 'fM7hB0seZIiuH3gX4zPuuXHp2nzEnKTuH5ljd0kDJKLbwkkHsdoG8lkJFkOX', '', '', '0', '2018-01-14 14:20:10', '2018-01-14 14:20:10'),
(5, 'asdasd', 'seohoasdmeless@gmail.com', '$2y$10$gAOTZOtGPXjTe0KI4qht1e723U5xuDVfgQGzDMURttLgca3H0/lPe', 'TxIhtIJUMjmLvLeWkOnucXqAsQmIoB1S4P3fWvV87fWmdpW6OeACAELcKoE8', '', '', '0', '2018-01-14 14:20:54', '2018-01-14 14:20:54'),
(6, 'Дон Жуан', 'sss@ff.ru', 'sss@ff.ru', NULL, '', '', '0', '2018-01-14 14:27:06', '2018-01-14 14:27:06'),
(7, 'andrey', 'sssss@dddd.ru', '$2y$10$afyUoYpCBneN6iYGnLZdpOReB43uHA4pqNrAhC1o4R0XmdrQHklJS', 'UEc74gGXoRSRmIGNH5yWjCZTUtYDmw8ul4GPffgrjnVLU3BBnRdxdmJbo7dT', '', '', '0', '2018-01-14 22:22:30', '2018-01-14 22:22:30'),
(8, 'маша', 'seoh2omeless@gmail.com', '$2y$10$DJH1bMYffp8qSq06YLIARuo5tOOaoEiI7sujUu46CgoCwkRER5kkW', 'ugc4zULJi0uUGwhnVXA6tci5HSXIW9fnBHHYPOF6uvlgJbtbGckCr1iGtAXE', '1231244344', 'Здаю квартиру', '0', '2018-01-14 22:48:46', '2018-01-14 22:48:46'),
(9, 'Валя Николаевна', 'seoh2ome1less@gmail.com', '$2y$10$doqOpfmfgFaHE91W4ayoVOy/u/ThiPgRpahlkk3LNOcHnNAttjJ7u', 'fQXTo8rU76G5raqKQQiHDPtxyONubfShstCKqeb4VevwfXOif1Vyxf0Bp0lK', '+3803333008', 'Сдаю квариру свою!', 'public/avatars/woman.jpg', '2018-01-14 22:53:33', '2018-01-14 22:53:33'),
(10, '123123', 'seoh123omeless@gmail.com', '$2y$10$NK0lIurQfCFHwl0Dy/PxCO2dVdKIGYTbDx07g2l3k5WfLQdf6ux1K', 'xGxDLtKtJG3JXVLoATq5fWJS1PPDL5r8aThA2Uo2WDp1LUuY3eGaQjcfL4ij', 'фыв', 'фыв', 'public/avatars/d0ZyGUWMzKyynSxepuxmZ1PVtB6MfZf02xJ6oktv.jpeg', '2018-01-14 23:08:08', '2018-01-14 23:08:08'),
(11, 'andrey', 'ssssssssss@sss.ru', '$2y$10$ZHA6iWr5WmXyThtHr/9HUeYn3CTBOPrLDUmIz2lrnr2VEFZU4AhKW', '7Hp4j2gTu0TXctkSCFYCs52oFekS28CrThmVupQ7Uwc4KhtlBzYtNnHs3tqX', 'Андрей', 'Андрей', 'public/avatars/HW1H58C7L7MiRkiNdofHCek491sEYCd6gkw7nfnR.png', '2018-02-04 13:25:15', '2018-02-04 13:25:15'),
(12, '123123', '123123@ru.ru', '$2y$10$R4eqABVRM6uJ1OlFIKvndeDSShKyKCYwvsJLrSTm5s65PQVEu6Qg2', 'fUQmTT35KeeLO1UhMhwnx6qgsVnysXt4c2LAVU2YkRpKacUx75rXpRw9V6Tt', '123123', '123123', 'public/avatars/0lkfyWbHFAJQAoSmVKEKIbJnH7tFuL7pVXxcDRTj.jpeg', '2018-02-04 13:37:31', '2018-02-04 13:37:31'),
(13, '111', 'seoh12omeless@gmail.com', '$2y$10$7dOETK1wAQ7r6MZyOkeJ.OaC0dZv4zpuvMVZi.2IPq0T11SONspT2', 'o4Rz030UVtwNcAOMHPZ1HlMvlAmgd4OICfGlGuOSvY5BQYjfEraDwIplS6hO', '09912312313', '123', 'public/avatars/S5pVbAcjoQsC63isuu6nwN0kBN8tXB0ZwiZggKkX.png', '2018-02-04 14:44:08', '2018-02-04 14:44:08'),
(14, 'andrey', 'seohom123eless@gmail.com', '$2y$10$QKNY0GOoV19JjyYrBgeOnuh4SNA/HAOfFpG5v1ZmU8Bq5vuIEXxjK', 'STCH1jz7v2A67mEqyOdC8iIGjtOHo7svcT0TXg9QZnrRAQg2ZA1o9h2aqHJm', '09993333123', 'Сдаю квартиры', 'public/avatars/wodzzn6qiFq4MnLjbBqDdZrA90bNl0Lnp9GubskN.jpeg', '2018-02-06 01:00:08', '2018-02-06 01:00:08'),
(15, 'Мила', 'salaev.andrey@ya.ru', '$2y$10$nH6TEkRM1lDgKOduQlnG/.V44KxZUChFqF/zGavDpdYCcuL69PuzO', NULL, '123123', '123123', 'public/avatars/Tt7D3ZkIP1tWzz6tG7QEeYUEqCHevKLxAOG0QP1g.jpeg', '2018-02-06 01:16:52', '2018-02-06 01:16:52'),
(16, 'Маша', 'seoh22omeless@gmail.com', '$2y$10$kJ0X7KuTzwfD/yWH/HmmieESJT2bZ7FTDeSoEhHkWnHP8lEKQ86wy', 'oqQfWJ0pvjy4r94GmopnN99xdjAvZrfv61BrybXg2JcYTlU7VdBWL5B84tzB', '1123123', '123 123 123 123 12', 'public/avatars/7YWltQ4419drrPeYh0Nq04n8PkvaQcfkBF2vUMgY.jpeg', '2018-02-10 04:33:33', '2018-02-10 04:33:33');

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(12, 2, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `alboms`
--
ALTER TABLE `alboms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_comments` (`article_id`);

--
-- Индексы таблицы `comments_otvets`
--
ALTER TABLE `comments_otvets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_otvet_comment_id_foreign` (`comment_id`);

--
-- Индексы таблицы `comments_photos`
--
ALTER TABLE `comments_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id` (`comments_id`);

--
-- Индексы таблицы `gorods`
--
ALTER TABLE `gorods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`houses_id`);

--
-- Индексы таблицы `hotels_rooms`
--
ALTER TABLE `hotels_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_id` (`hotels_id`);

--
-- Индексы таблицы `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kvartirs`
--
ALTER TABLE `kvartirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`houses_id`);

--
-- Индексы таблицы `mestas`
--
ALTER TABLE `mestas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_photos`
--
ALTER TABLE `products_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`);

--
-- Индексы таблицы `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id3` (`houses_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD KEY `users_roles_user_id_foreign` (`user_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `alboms`
--
ALTER TABLE `alboms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT для таблицы `comments_otvets`
--
ALTER TABLE `comments_otvets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `comments_photos`
--
ALTER TABLE `comments_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `gorods`
--
ALTER TABLE `gorods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `hotels_rooms`
--
ALTER TABLE `hotels_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `kvartirs`
--
ALTER TABLE `kvartirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `mestas`
--
ALTER TABLE `mestas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `products_photos`
--
ALTER TABLE `products_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `house_comments` FOREIGN KEY (`article_id`) REFERENCES `houses` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments_otvets`
--
ALTER TABLE `comments_otvets`
  ADD CONSTRAINT `comments_otvet_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments_photos`
--
ALTER TABLE `comments_photos`
  ADD CONSTRAINT `comments_id` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `house_id` FOREIGN KEY (`houses_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotels_rooms`
--
ALTER TABLE `hotels_rooms`
  ADD CONSTRAINT `hotels_id` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kvartirs`
--
ALTER TABLE `kvartirs`
  ADD CONSTRAINT `house_id2` FOREIGN KEY (`houses_id`) REFERENCES `houses` (`id`);

--
-- Ограничения внешнего ключа таблицы `products_photos`
--
ALTER TABLE `products_photos`
  ADD CONSTRAINT `products_photos_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `house_id3` FOREIGN KEY (`houses_id`) REFERENCES `houses` (`id`);

--
-- Ограничения внешнего ключа таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
