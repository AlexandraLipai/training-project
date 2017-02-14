--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.53.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 13.01.2017 23:15:26
-- Версия сервера: 5.7.15-log
-- Версия клиента: 4.1
--


--
-- Описание для базы данных `fitness-club`
--
DROP DATABASE IF EXISTS `fitness-club`;
CREATE DATABASE IF NOT EXISTS `fitness-club`
	CHARACTER SET utf8
	COLLATE utf8_general_ci;

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE `fitness-club`;

--
-- Описание для таблицы adress
--
CREATE TABLE IF NOT EXISTS adress (
  id_adress INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код адреса',
  adress VARCHAR(45) NOT NULL COMMENT 'адрес зала',
  schema_proezda VARCHAR(45) NOT NULL COMMENT 'схема проезда',
  PRIMARY KEY (id_adress)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы classes
--
CREATE TABLE IF NOT EXISTS classes (
  id_class INT(11) NOT NULL AUTO_INCREMENT,
  class VARCHAR(45) NOT NULL,
  description LONGTEXT NOT NULL,
  PRIMARY KEY (id_class),
  UNIQUE INDEX classes (class)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы images
--
CREATE TABLE IF NOT EXISTS images (
  id_img INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код картинки',
  link VARCHAR(100) NOT NULL COMMENT 'картинка',
  description VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_img)
)
ENGINE = INNODB
AUTO_INCREMENT = 33
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'картинки'
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы levels
--
CREATE TABLE IF NOT EXISTS levels (
  id_level INT(11) NOT NULL AUTO_INCREMENT,
  level VARCHAR(45) NOT NULL COMMENT 'уровень группы:
beginner
middle
advanced',
  PRIMARY KEY (id_level),
  UNIQUE INDEX level (level)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы statuses_clients
--
CREATE TABLE IF NOT EXISTS statuses_clients (
  id_status INT(11) NOT NULL,
  status_client VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (id_status)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы trainers
--
CREATE TABLE IF NOT EXISTS trainers (
  id_trainer INT(11) NOT NULL AUTO_INCREMENT,
  surname VARCHAR(45) NOT NULL COMMENT 'тренеры',
  name VARCHAR(45) NOT NULL,
  `middle name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_trainer)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы classes_has_levels
--
CREATE TABLE IF NOT EXISTS classes_has_levels (
  classes_id_class INT(11) NOT NULL,
  levels_id_level INT(11) NOT NULL,
  PRIMARY KEY (classes_id_class, levels_id_level),
  INDEX fk_classes_has_levels_classes1_idx (classes_id_class),
  INDEX fk_classes_has_levels_levels1_idx (levels_id_level),
  CONSTRAINT fk_classes_has_levels_classes1 FOREIGN KEY (classes_id_class)
    REFERENCES classes(id_class) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_classes_has_levels_levels1 FOREIGN KEY (levels_id_level)
    REFERENCES levels(id_level) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы classes_has_trainers
--
CREATE TABLE IF NOT EXISTS classes_has_trainers (
  id_classes_has_trainers INT(11) NOT NULL AUTO_INCREMENT,
  classes_id_class INT(11) NOT NULL,
  trainers_id_trainer INT(11) NOT NULL,
  PRIMARY KEY (id_classes_has_trainers, classes_id_class, trainers_id_trainer),
  INDEX fk_classes_has_trainers_classes1_idx (classes_id_class),
  INDEX fk_classes_has_trainers_trainers1_idx (trainers_id_trainer),
  CONSTRAINT fk_classes_has_trainers_classes1 FOREIGN KEY (classes_id_class)
    REFERENCES classes(id_class) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_classes_has_trainers_trainers1 FOREIGN KEY (trainers_id_trainer)
    REFERENCES trainers(id_trainer) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы clients
--
CREATE TABLE IF NOT EXISTS clients (
  id_client INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код клиента ',
  name VARCHAR(45) NOT NULL,
  surname VARCHAR(45) DEFAULT NULL,
  email VARCHAR(45) NOT NULL,
  password VARCHAR(60) NOT NULL,
  id_status INT(11) DEFAULT 2 COMMENT 'статус клиента, подтвержден или нет',
  PRIMARY KEY (id_client),
  CONSTRAINT FK_clients_statuses_clients_id_status FOREIGN KEY (id_status)
    REFERENCES statuses_clients(id_status) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 13
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы gym
--
CREATE TABLE IF NOT EXISTS gym (
  id_gym INT(11) NOT NULL AUTO_INCREMENT,
  `gym №` VARCHAR(45) NOT NULL,
  count_of_seats INT(5) NOT NULL,
  adress_id_adress INT(11) NOT NULL,
  PRIMARY KEY (id_gym),
  UNIQUE INDEX adress (`gym №`),
  INDEX fk_gym_adress1_idx (adress_id_adress),
  CONSTRAINT fk_gym_adress1 FOREIGN KEY (adress_id_adress)
    REFERENCES adress(id_adress) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы prices
--
CREATE TABLE IF NOT EXISTS prices (
  id_price INT(11) NOT NULL AUTO_INCREMENT,
  price DECIMAL(11, 0) DEFAULT NULL,
  number_of_training VARCHAR(45) NOT NULL,
  date DATE NOT NULL,
  classes_id_class INT(11) NOT NULL,
  PRIMARY KEY (id_price),
  INDEX fk_prices_classes1_idx (classes_id_class),
  CONSTRAINT fk_prices_classes1 FOREIGN KEY (classes_id_class)
    REFERENCES classes(id_class) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы classes_has_gym
--
CREATE TABLE IF NOT EXISTS classes_has_gym (
  classes_id_class INT(11) NOT NULL,
  gym_id_gym INT(11) NOT NULL,
  PRIMARY KEY (classes_id_class, gym_id_gym),
  INDEX fk_classes_has_gym_classes1_idx (classes_id_class),
  INDEX fk_classes_has_gym_gym1_idx (gym_id_gym),
  CONSTRAINT fk_classes_has_gym_classes1 FOREIGN KEY (classes_id_class)
    REFERENCES classes(id_class) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_classes_has_gym_gym1 FOREIGN KEY (gym_id_gym)
    REFERENCES gym(id_gym) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы messages
--
CREATE TABLE IF NOT EXISTS messages (
  id_messages INT(11) NOT NULL AUTO_INCREMENT,
  message VARCHAR(500) NOT NULL,
  date_of_message TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  id_client INT(11) NOT NULL,
  PRIMARY KEY (id_messages),
  INDEX fk_messages_clients1_idx (id_client),
  CONSTRAINT fk_messages_clients1 FOREIGN KEY (id_client)
    REFERENCES clients(id_client) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 28
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы news
--
CREATE TABLE IF NOT EXISTS news (
  id_news INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код новости ',
  news VARCHAR(2000) NOT NULL,
  classes_id_class INT(11) DEFAULT NULL,
  name_of_news VARCHAR(95) NOT NULL,
  id_client INT(11) DEFAULT NULL,
  picture VARCHAR(95) NOT NULL,
  PRIMARY KEY (id_news),
  INDEX fk_news_classes1_idx (classes_id_class),
  CONSTRAINT fk_news_classes1 FOREIGN KEY (classes_id_class)
    REFERENCES classes(id_class) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_news_clients_id_client FOREIGN KEY (id_client)
    REFERENCES clients(id_client) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 34
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы shedule
--
CREATE TABLE IF NOT EXISTS shedule (
  id_class INT(11) NOT NULL AUTO_INCREMENT,
  time_start TIME NOT NULL,
  weekday VARCHAR(45) NOT NULL,
  count_of_hours INT(11) NOT NULL,
  count_of_people INT(11) DEFAULT NULL,
  date DATE DEFAULT NULL,
  classes_has_gym_classes_id_class INT(11) NOT NULL,
  classes_has_gym_gym_id_gym INT(11) NOT NULL,
  classes_has_trainers_id_classes_has_trainers INT(11) NOT NULL,
  classes_has_trainers_classes_id_class INT(11) NOT NULL,
  classes_has_trainers_trainers_id_trainer INT(11) NOT NULL,
  PRIMARY KEY (id_class),
  INDEX fk_shedule_classes_has_gym1_idx (classes_has_gym_classes_id_class, classes_has_gym_gym_id_gym),
  INDEX fk_shedule_classes_has_trainers1_idx (classes_has_trainers_id_classes_has_trainers, classes_has_trainers_classes_id_class, classes_has_trainers_trainers_id_trainer),
  CONSTRAINT fk_shedule_classes_has_gym1 FOREIGN KEY (classes_has_gym_classes_id_class, classes_has_gym_gym_id_gym)
    REFERENCES classes_has_gym(classes_id_class, gym_id_gym) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_shedule_classes_has_trainers1 FOREIGN KEY (classes_has_trainers_id_classes_has_trainers, classes_has_trainers_classes_id_class, classes_has_trainers_trainers_id_trainer)
    REFERENCES classes_has_trainers(id_classes_has_trainers, classes_id_class, trainers_id_trainer) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы `for admin`
--
CREATE TABLE IF NOT EXISTS `for admin` (
  shedule_id_class INT(11) NOT NULL,
  clients_id_client INT(11) NOT NULL,
  PRIMARY KEY (shedule_id_class, clients_id_client),
  INDEX fk_shedule_has_clients_clients1_idx (clients_id_client),
  INDEX fk_shedule_has_clients_shedule1_idx (shedule_id_class),
  CONSTRAINT fk_shedule_has_clients_clients1 FOREIGN KEY (clients_id_client)
    REFERENCES clients(id_client) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_shedule_has_clients_shedule1 FOREIGN KEY (shedule_id_class)
    REFERENCES shedule(id_class) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы adress
--

-- Таблица `fitness-club`.adress не содержит данных

-- 
-- Вывод данных для таблицы classes
--

-- Таблица `fitness-club`.classes не содержит данных

-- 
-- Вывод данных для таблицы images
--
INSERT INTO images VALUES
(1, 'gallery-1.jpg', ''),
(2, 'gallery-2.jpg', ''),
(3, 'gallery-3.jpg', ''),
(9, 'gallery-4.jpg', ''),
(10, 'gallery-5.jpg', ''),
(11, 'gallery-6.jpg', ''),
(12, 'gallery-7.jpg', ''),
(13, 'gallery-8.jpg', ''),
(22, 'gallery-1.jpg', ''),
(23, 'gallery-2.jpg', ''),
(24, 'gallery-3.jpg', ''),
(25, 'gallery-5.jpg', '2'),
(26, 'gallery-8.jpg', ''),
(27, 'gallery-7.jpg', ''),
(28, 'gallery-6.jpg', ''),
(31, 'gallery-7.jpg', ''),
(32, 'gallery-4.jpg', '');

-- 
-- Вывод данных для таблицы levels
--

-- Таблица `fitness-club`.levels не содержит данных

-- 
-- Вывод данных для таблицы statuses_clients
--
INSERT INTO statuses_clients VALUES
(1, 'admin'),
(2, 'client');

-- 
-- Вывод данных для таблицы trainers
--

-- Таблица `fitness-club`.trainers не содержит данных

-- 
-- Вывод данных для таблицы classes_has_levels
--

-- Таблица `fitness-club`.classes_has_levels не содержит данных

-- 
-- Вывод данных для таблицы classes_has_trainers
--

-- Таблица `fitness-club`.classes_has_trainers не содержит данных

-- 
-- Вывод данных для таблицы clients
--
INSERT INTO clients VALUES
(1, 'admin', 'admin', 'admin@mail.ru', '$2y$10$bzdO34EkMYYA7BWhzzKeUelpI.ac8oI.hsWA9ndmJNAeWyYMf0WOm', 1),
(2, 'user', 'user', 'user@gmail.com', '$2y$10$mqf5LmFC1QaKl.3E7ZOsbebKBqhA/rIC18Kz5xK9v6Zcw5xcOde7u', 2);

-- 
-- Вывод данных для таблицы gym
--

-- Таблица `fitness-club`.gym не содержит данных

-- 
-- Вывод данных для таблицы prices
--

-- Таблица `fitness-club`.prices не содержит данных

-- 
-- Вывод данных для таблицы classes_has_gym
--

-- Таблица `fitness-club`.classes_has_gym не содержит данных

-- 
-- Вывод данных для таблицы messages
--
INSERT INTO messages VALUES
(26, 'hello', '2017-01-10 13:42:22', 8),
(27, 'hello2', '2017-01-10 13:41:09', 8);

-- 
-- Вывод данных для таблицы news
--
INSERT INTO news VALUES
(22, 'It’s become a bit of a cliché in the health and fitness world, but the fact remains that you really cannot outwork a bad diet, no matter how often you go for a gym workout.\r\n\r\nCarly says: “Nutrition is 90% of the puzzle. You can work your butt off performing the perfect workout plan, using the best form and the with the most intensity but unless your nutrition is sound then you will not get anywhere. Training and nutrition go hand-in-hand. One cannot succeed without the other. It’s a bit like buying a car and forgetting to fuel it.”\r\n\r\nIf you’re looking to build muscle, then you’ll find some killer nutritional tips in this recent blog post.', NULL, 'Think about your nutrition', 5, 'page1-img1.jpg'),
(29, 'Signing up for a gym membership is a big step for many first-timers, but it’s only the start of your health and fitness quest. Think about what you want to achieve and how you plan to go about it.\r\n\r\nCarly says: “When you set foot in the gym you should always have a plan of what you are going to do. Beginners can fall into the trap of not planning ahead, they wait until they get to the gym and just do whatever they want. This leads to a lack of direction and results will fall short. Going to the gym and just doing some exercise is like walking into Topshop and saying; ‘I’ll take anything, any colour, any size. I don’t care if they fit or suit me. Just give me clothes!”', NULL, 'Do! Have a plan ', 5, 'page1-img1.jpg'),
(32, 'The world of fitness is always changing. And 2016 has been a year of crazy innovation across the fitness industry.\r\n\r\nPerhaps nothing will define 2016 more than Pokémon GO (more on that later!) Maybe the Mannequin Challenge or the unstoppable rise of the “Dab”?\r\n\r\nFor gym-goers, there has been no shortage of new technology that has revolutionised the way we keep fit. Now, with the New Year upon us, we’re certain that things will continue to develop in the coming 12 months.\r\n\r\nTo ensure that we’re all ahead of the curve, we asked a number of experts for their 2017 health and fitness trend predictions.\r\n\r\nHere’s what they told us…', NULL, '5 key fitness trends', 5, 'page2-img1.jpg'),
(33, 'The world of fitness is always changing. And 2016 has been a year of crazy innovation across the fitness industry.\r\n\r\nPerhaps nothing will define 2016 more than Pokémon GO (more on that later!) Maybe the Mannequin Challenge or the unstoppable rise of the “Dab”?\r\n\r\nFor gym-goers, there has been no shortage of new technology that has revolutionised the way we keep fit. Now, with the New Year upon us, we’re certain that things will continue to develop in the coming 12 months.\r\n\r\nTo ensure that we’re all ahead of the curve, we asked a number of experts for their 2017 health and fitness trend predictions.\r\n\r\nHere’s what they told us…', NULL, '5 key fitness trends', 5, 'page1-img2.jpg');

-- 
-- Вывод данных для таблицы shedule
--

-- Таблица `fitness-club`.shedule не содержит данных

-- 
-- Вывод данных для таблицы `for admin`
--

-- Таблица `fitness-club`.`for admin` не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;