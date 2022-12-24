-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 24 2022 г., 07:54
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Ne_Netflix`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id_actors` int NOT NULL,
  `name` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secName` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `act_birth` date NOT NULL,
  `id_country` int NOT NULL,
  `actor_photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id_actors`, `name`, `secName`, `act_birth`, `id_country`, `actor_photo`) VALUES
(6, ' Kristofer', 'Hivju', '1978-12-07', 4, 'Kristofer_Hivju.jpg'),
(7, 'Tom', 'Holland', '1996-07-01', 5, 'Tom_Holland_by_Gage_Skidmore.jpg'),
(8, 'Benedict', 'Cumberbatch', '1976-06-19', 5, 'BCumberbatch_Comic-Con_2019.jpg'),
(9, 'Zendaya', 'Stoermer Coleman', '1996-09-01', 3, 'Zendaya_-_2019_by_Glenn_Francis.jpg'),
(10, 'Robert', 'Downey Jr.', '1965-05-04', 3, 'Robert_Downey_Jr_avp_Iron_Man_3_Paris.jpg'),
(11, 'Nikolai', 'Coster-Waldau', '1970-07-27', 6, 'Nikolaj_Coster-Waldau-68363.jpg'),
(12, 'Conleth', 'Hill', '1964-11-24', 7, 'Conleth_Hill_by_Gage_Skidmore_3.jpg'),
(13, 'Aidan', 'Gillen', '1968-04-24', 7, '274px-Aidan_Gillen_(headshot).jpg'),
(14, 'Cillian', 'Murphy', '1976-10-25', 7, 'Cillian_Murphy.jpg'),
(15, 'Leonardo', 'DiCaprio', '1974-11-11', 3, 'Leonardo_DiCaprio_2014.jpg'),
(16, 'Margot', 'Robbie', '1990-07-02', 8, 'Robbie.jpg'),
(17, 'Jonah', 'Hill', '1983-12-20', 3, '1200px-Jonah_Hill-5021.jpg'),
(26, 'Tom', 'Hardy', '1977-09-15', 3, 'hardy.png'),
(27, 'Morgan', 'Freeman', '1937-06-01', 3, 'Morgan_Freeman_Deauville_2018.jpg'),
(28, 'Timothy', 'Robbins', '1958-10-18', 3, 'TimRobbinsTIFFSept2012.jpg'),
(29, 'Omar', 'Sy', '1978-10-18', 11, 'Omar_Sy_2012_2.jpg'),
(30, 'François', 'Cluzet', '1955-10-18', 9, 'w150_127881.jpg'),
(31, 'Henry', 'Cavill', '1983-10-18', 3, 'Henry_Cavill.jpg'),
(32, 'Freya', 'Allan', '2001-05-07', 3, 'Freya_Allan_by_Gage_Skidmore.jpg'),
(33, 'Edward', 'Norton', '1969-10-18', 3, '1200px-Ed_Norton_Shankbone_Metropolitan_Opera_2009.jpg'),
(34, 'Brad', 'Pitt', '1963-10-18', 3, 'Brad_Pitt_2019_by_Glenn_Francis.jpg'),
(35, 'Matthew', 'McConaughey', '1969-10-18', 3, 'Matthew_McConaughey_2019_(48648344772).jpg'),
(36, ' Jean-Claude', 'Van Damme', '1960-10-18', 1, 'Jean-Claude_Van_Damme_2012.jpg'),
(37, 'Jackie', 'Chan', '1954-05-07', 2, 'Jackie_Chan.jpg'),
(38, 'Jon', 'Bernthal', '1974-09-20', 3, 'Jon_Bernthal_2014.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `actor_vid`
--

CREATE TABLE `actor_vid` (
  `id` int NOT NULL,
  `id_actorss` int NOT NULL,
  `id_videoo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `actor_vid`
--

INSERT INTO `actor_vid` (`id`, `id_actorss`, `id_videoo`) VALUES
(3, 35, 12),
(7, 35, 13),
(13, 8, 6),
(14, 7, 6),
(15, 9, 6),
(18, 8, 7),
(19, 10, 6),
(20, 7, 7),
(21, 9, 6),
(22, 13, 5),
(24, 11, 5),
(25, 6, 5),
(26, 34, 11),
(27, 33, 11),
(28, 14, 4),
(29, 17, 3),
(30, 15, 3),
(31, 27, 8),
(32, 28, 8),
(34, 16, 3),
(35, 26, 4),
(36, 10, 7),
(40, 30, 9),
(41, 29, 9),
(42, 32, 10),
(43, 31, 10),
(44, 26, 13),
(45, 12, 5),
(46, 35, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id_country` int NOT NULL,
  `country` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id_country`, `country`) VALUES
(1, 'Belgium'),
(2, 'China'),
(3, 'USA'),
(4, 'Norway'),
(5, 'Great Britain'),
(6, 'Denmark'),
(7, 'Ireland'),
(8, 'Australia'),
(9, 'Terabithia'),
(10, 'Tamriel'),
(11, 'Narnia');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `genre` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(6, 'Biographical'),
(7, 'Fantasy'),
(8, 'Crime drama'),
(9, 'Superhero film'),
(10, 'Action'),
(11, 'Historycal'),
(12, 'Drama'),
(13, 'Some genre');

-- --------------------------------------------------------

--
-- Структура таблицы `producer`
--

CREATE TABLE `producer` (
  `id_producer` int NOT NULL,
  `name_prod` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secName_prod` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pr_birth` date NOT NULL,
  `id_country` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `producer`
--

INSERT INTO `producer` (`id_producer`, `name_prod`, `secName_prod`, `pr_birth`, `id_country`) VALUES
(2, 'Martin Charles', 'Scorsese', '1942-11-17', 3),
(3, 'Steven', 'Knight', '1959-08-05', 5),
(4, 'Kevin', 'Feige', '1973-07-02', 3),
(5, 'David', 'Benioff', '1970-09-25', 5),
(6, 'Fitz', 'Chilvary', '1972-03-08', 7),
(7, 'Jezal', 'dan Luthar', '1957-08-28', 6),
(8, 'Gerald', 'White Wolf', '1946-10-14', 4),
(9, 'Brian', 'Helgeland', '1961-01-17', 4),
(10, 'Some', 'Guy', '2022-11-16', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login`, `userName`, `pass`, `email`, `phone`) VALUES
(29, 'admin', 'івав', 'a0fbe42fe074dab8a34978d1c75809d7', '12fsdfsd@gmail.com', '+380342343233'),
(30, 'sheva228', 'Тарас Шевченко', '43cfabfa42451b4e2a65704065f2bbd9', 'tarrasshevchenko@gmail.com', '+380342343233'),
(31, 'pearpetit', 'Сергій Корнієнко', '3383296adfb6c394f1b46111acd0e0cf', '12fsdfsd@gmail.com', '+380342343233');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id_video` int NOT NULL,
  `fname` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mark` float NOT NULL,
  `releas` date NOT NULL,
  `id_country` int NOT NULL,
  `id_producer` int NOT NULL,
  `id_genre` int NOT NULL,
  `discr` text COLLATE utf8mb4_general_ci,
  `trailer` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id_video`, `fname`, `mark`, `releas`, `id_country`, `id_producer`, `id_genre`, `discr`, `trailer`, `photo`) VALUES
(3, 'The Wolf of Wall Street', 7.5, '2013-12-17', 3, 5, 6, 'Наприкінці 80-х Белфорт відкриває свою власну брокерську контору і дуже швидко заробляє величезний стан. Він із головою занурюється в розкішне життя, і протягом тривалого часу веде безтурботний спосіб життя. Белфорт став одним із тих, кого назвали «еліта Уолл-стріт», але йому було цього мало, він жадав чогось масштабнішого. Однак рано чи пізно все добре закінчується. Саме така доля спіткала і геніального брокера. Спочатку спосіб життя, який вів Джордан, зробив його алкоголіком і наркоманом, а потім ще й випливли деякі з його фінансових махінацій, що само собою привернула увагу ФБР.', 'https://www.youtube.com/embed/iszwuX1AK6A', 'thewolf.jpg'),
(4, 'Peaky Blinders', 8.2, '2013-09-12', 5, 3, 8, 'Після завершення Першої світової війни засновник вуличної банди «Гострі козирки» Томас Шелбі разом зі старшим братом Артуром повернувся до рідного Бірмінгема, де вони продовжили будувати свою злочинну імперію. За час кровопролитних бойових дій Томас сильно змінився і забув любов. Розтопити лід у його серці змогла симпатична барменка Грейс Берджесс. Ось тільки він не підозрював, що у дівчини є таємниця, розкриття якої ускладнить життя всім членам родини Шелбі та їхнім найближчим соратникам.', 'https://www.youtube.com/embed/oVzVdvGIC7U', 'peaky.jpg'),
(5, 'Game of Thrones', 9, '2011-04-17', 3, 5, 7, 'Після повстання, спровокованого діями божевільного правителя Вестероса, Роберт із дому Баратеонів сидить на Залізний трон, ставши новим правителем Семи королівств. Через роки Джон Аррен, правиця короля, вмирає, а Роберт вирушає в похід, щоб заручитися підтримкою друга дитинства — Еддарда Старка, Хранителя Півночі. Честолюбному та благородному голові будинку Старків доручено залишити рідну обитель і стати новою правицею короля. \r\n', 'https://www.youtube.com/embed/KPLWWIOCOOQ', 'got.jpg'),
(6, 'Avengers: Endgame', 7.8, '2019-04-26', 3, 4, 9, 'Месники намагаються розібратися з наслідками доленосного клацання Таноса, яке спричинило знищення половини життя у Всесвіті. Бажаючи повернути своїх полеглих товаришів, супергерої, що залишилися, відстежують титана на безлюдній планеті, але там на них чекає велике розчарування: камені нескінченності, необхідні їм для відновлення балансу, знищені. Однак, незважаючи на всі невдачі, вони не втрачають надії раз і назавжди розправитися з непереможним супротивником. Заручившись підтримкою нових союзників, Месники розробляють відчайдушний план дій, і цього разу вони не мають права на помилку...\r\n', 'https://www.youtube.com/embed/TcMBFSGVi1c', 'Endgame_poster.jpg'),
(7, 'Avengers: Infinity War', 6.7, '2018-04-27', 3, 4, 9, 'Дія фільму розгортається за кілька років після подій, показаних у «Протистоянні». Незважаючи на те, що в лавах Мстителів стався розкол, вони все ще продовжують захищати світ від усіляких небезпек, з якими не може впоратися один герой. Але цього разу з темних глибин космосу на Землю насувається нова загроза, впоратися з якою буде не під силу навіть Мстителям – божевільний титан Танос захотів зібрати Камені Нескінченності, щоб з їхньою допомогою спопелити половину життя у Всесвіті. І тепер нашим героям потрібно терміново обзавестися групою могутніх союзників, щоб дати рішучу відсіч всесильному безумцю.\r\n', 'https://www.youtube.com/embed/6ZfuNTqbHE8', 'Infinity_War_poster.jpg'),
(8, 'The Shawshank Redemption', 9.8, '2022-11-15', 4, 7, 7, 'В основу культової драми лягла повість Стівена Кінга «Рита Хейуорт із Шоушенка». Дія фільму розгортається наприкінці 50-х років минулого сторіччя. Молодого фінансиста Енді Дюфрейна за подвійне вбивство засуджують до довічного ув\'язнення, але він категорично заперечує свою причетність до злочину. Свій термін Енді вирушає відбувати в одну з найвідоміших в\'язниць – Шоушенк, з якої ще нікому не вдавалося втекти. У в\'язниці хлопець стикається із суворими реаліями тюремного світу, світу, де немає місця співчуття, а довкола лише жорстокість. Енді неодноразово стає жертвою сексуальних домагань, але він чинить опір до останнього.\r\n', 'https://www.youtube.com/embed/6hB3S9bIaco', 'The Shawshank Redemption.jpg'),
(9, 'The Intouchables', 9.9, '1997-10-19', 7, 6, 6, 'І ось одного разу черговою доглядальницею Пилипа стає чорношкірий молодий хлопець на ім\'я Дрісса, який вийшов зовсім недавно з в\'язниці. Складно уявити таку людину в ролі доглядальниці, проте хлопець примудряється порозумітися з Філіпом. Він не шкодує його, і ставиться до нього не як до інваліда, а як до здорової людини. Вони весело проводять час разом, і завдяки цьому Філіпп починає дивитися на життя по-новому, і навіть закохується.\r\n', 'https://www.youtube.com/embed/34WIbmXkewU', 'The_Intouchables.jpg'),
(10, 'The Witcher', 10, '2012-05-17', 6, 8, 10, 'Дія серіалу, заснованого на однойменній фентезі-сазі Анджея Сапковського, розгортається навколо відьмака Геральта з Рівії — найманця-мутанта, який спеціалізується на знищенні чудовиськ та веде кочовий спосіб життя, намагаючись знайти власне місце у жорстокому світі. Однак коли доля зводить Геральта з могутньою чарівницею Єнніфер і юною принцесою Цириллою з Цинтри, що зберігає похмурий секрет, відьмак виявляється втягнутим у жорстоке протистояння між двома войовничо налаштованими народами, що борються за владу над великими землями.\r\n', 'https://www.youtube.com/embed/ndl1W4ltcmg', 'Netflix_poster_s2.jpg'),
(11, 'Fight Club', 8, '2015-04-17', 3, 9, 11, 'В основу сюжету картини ліг однойменний роман Чака Паланіка. Головний герой фільму працює рядовим клерком в одній із великих корпорацій і веде дуже нудний спосіб життя. Єдиною розвагою для нього є покупка меблів за каталогами. Але одного разу все кардинальним чином змінюється, після того як герой знайомиться з Тайлером Дерденом, людиною, що дуже відрізняється від нього, заперечує усталені стереотипи. Вони починають спілкуватися, і герой приймає філософію життя Тайлера. Якось хлопці знаходять новий спосіб отримувати задоволення, і починають жорстоко битися незалежно від того, де вони знаходяться.\r\n', 'https://www.youtube.com/embed/QW9wNFpLYiY', 'Fight-club-poster.jpg'),
(12, 'Interstellar', 5, '2022-12-08', 5, 5, 11, 'У майбутньому кліматичні зміни призвели до катастрофічного зниження врожайності та вимирання найпоширеніших сільськогосподарських культур. Населення страждає від голоду та хвороб на покритій піском Землі, а колишній пілот Купер, як і більшість американців, змушений був покинути кар\'єру, щоб зайнятися фермерством. Якось його дочка Мерфі лякається примари у власній спальні.\r\n', 'https://www.youtube.com/embed/zSWdZVtXT7E', 'Interstellar_film_poster.jpg'),
(13, 'The Gentlemen', 1.2, '2022-11-17', 8, 10, 13, 'Міккі Пірсон народився і виріс у США у бідній родині, проте зміг отримати стипендію Родса та вступити до Оксфордського університету, де почав продавати марихуану своїм однокурсникам. Незабаром навчання відійшло на другий план, а Міккі зосередився на розвитку підпільного бізнесу з вирощування та продажу трави, досягнувши в результаті неймовірних успіхів. Ставши однією з найвпливовіших постатей Великобританії, він через деякий час вирішує продати прибутковий бізнес, оцінивши його в 400 мільйонів фунтів, але зненацька стикається з серйозними проблемами.\r\n', 'https://www.youtube.com/embed/Ify9S7hj480', 'gentelman.jpg'),
(41, 'Green Book', 3, '2022-12-15', 5, 7, 7, 'Дія фільму, заснованого на реальних подіях, розгортається 1962 року. Італо-американець Тоні на прізвисько \"Болтун\" працює вибивалою в одному з престижних нічних клубів Бронкса. Коли заклад закривається на ремонт, Тоні вирішує знайти тимчасову роботу і незабаром у нього з\'являється чудова пропозиція. Відомий афроамериканський піаніст Дон Ширлі збирається в турне південними штатами, і йому потрібний хороший водій і людина, здатна вирішити в дорозі будь-яку проблему, в одній особі.\r\n', 'https://www.youtube.com/embed/QkZxoko_HC0', 'Green_Book.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id_actors`),
  ADD KEY `id_country` (`id_country`);

--
-- Индексы таблицы `actor_vid`
--
ALTER TABLE `actor_vid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actors` (`id_actorss`),
  ADD KEY `id_video` (`id_videoo`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id_producer`),
  ADD KEY `id_country` (`id_country`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_producer` (`id_producer`),
  ADD KEY `id_country` (`id_country`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id_actors` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `actor_vid`
--
ALTER TABLE `actor_vid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `producer`
--
ALTER TABLE `producer`
  MODIFY `id_producer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `actor_vid`
--
ALTER TABLE `actor_vid`
  ADD CONSTRAINT `actor_vid_ibfk_1` FOREIGN KEY (`id_actorss`) REFERENCES `actors` (`id_actors`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `actor_vid_ibfk_2` FOREIGN KEY (`id_videoo`) REFERENCES `video` (`id_video`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `producer`
--
ALTER TABLE `producer`
  ADD CONSTRAINT `producer_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `video_ibfk_3` FOREIGN KEY (`id_producer`) REFERENCES `producer` (`id_producer`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `video_ibfk_4` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
