-- Adminer 4.8.1 MySQL 8.0.27-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP VIEW IF EXISTS `CommentsInfo`;
CREATE TABLE `CommentsInfo` (`CommentID` int, `ForumID` int, `PostParrentID` int, `CommentUserID` int, `UserName` varchar(20), `Content` text, `profile_picture` varchar(255), `PostOwner` int, `date` datetime, `ForumOwner` int, `CommentLikeCount` bigint);


DROP VIEW IF EXISTS `LikesDislikes`;
CREATE TABLE `LikesDislikes` (`userID` int, `username` varchar(20), `profile_picture` varchar(255), `PostOwner` int, `Title` varchar(255), `PostID` int, `Content` text, `PostDate` datetime, `ForumID` int, `ForumOwner` int, `name` varchar(60), `ForumIcon` tinytext, `liked_user_ids` text, `comments` bigint, `likes` bigint);


DROP TABLE IF EXISTS `Moderators`;
CREATE TABLE `Moderators` (
  `id` int DEFAULT NULL,
  `forumid` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  KEY `forumid` (`forumid`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `Moderators_ibfk_1` FOREIGN KEY (`forumid`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Moderators_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `Posts`;
CREATE TABLE `Posts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PostOwner` int NOT NULL,
  `ForumID` int NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `Content` text COLLATE utf8_czech_ci NOT NULL,
  `PostDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `PostOwner` (`PostOwner`),
  KEY `ForumID` (`ForumID`),
  CONSTRAINT `Posts_ibfk_2` FOREIGN KEY (`PostOwner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Posts_ibfk_4` FOREIGN KEY (`ForumID`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `Posts` (`ID`, `PostOwner`, `ForumID`, `Title`, `Content`, `PostDate`) VALUES
(31,	2,	1,	'Zápis stránky 07.04.2024',	'Co se změnilo?<br>&emsp;Administrace uživatelů hotová,<br>&emsp;Předplatné (Zatím jako nápad)<br>&emsp;Pracuji na terminále pro administrátora<br>&emsp;Odstanění příspěvků a komentáčů jako admin,<br>&emsp;Nevím zda stihnu moderátory,',	'2024-04-07 13:16:08'),
(33,	1,	1,	'KONEČNĚ HOTOVO!',	'Mám konečně hotovou seminárku!<br>   Co jsem nestihl?<br>   Moderátory :(<br>   Oznámení (Tlačítko v navbaru)',	'2024-04-07 16:04:29'),
(34,	19,	14,	'Tajemství starého hradu',	'Tajemství starého hradu<br><br>Ve stínu starobylého hradu, jehož věže dosahují až k oblačné obloze, se odehrává příběh plný tajemství a dobrodružství.<br><br>Hlavní hrdina, mladý historik jménem David, se rozhodne prozkoumat tajemství, které hrad ukrývá. Zatímco ostatní se bojí legend o strašidelných zjeveních a prokletí, David je posedlý touhou objevit pravdu.<br><br>S pomocí svého věrného přítele, dobrodružného fotografa Emily, se vydává do hradního komplexu. Brzy zjišťují, že hrad není jen zřícenina, jak si mysleli, ale má mnohem víc co skrývat.<br><br>Při prozkoumávání temných chodeb a zapomenutých sálů objevují starověké písemnosti a tajemné artefakty, které svědčí o dlouhé historii hradu. Ale jejich zájem je nejvíce upoután na starobylou knihu, která prý obsahuje klíč k odhalení největšího tajemství hradu.<br><br>Avšak cesta k tomuto tajemství není jednoduchá. Překonat staré pasti a záhady, které na ně čekají, vyžaduje odvahu a inteligenci. A jak se propracovávají hlouběji do tajemné minulosti hradu, začínají se otevírat i otázky o jejich vlastní minulosti a osudech.<br><br>Nakonec, když se dostanou k samotnému jádru tajemství, objeví pravdu, která překonává jejich nejdivočejší představy. A uvědomí si, že některá tajemství by možná měla zůstat ukryta...<br><br>Příběh o hledání pravdy, přátelství a objevení skrytých tajemství, které byly zapomenuty v čase.',	'2024-04-07 16:10:27'),
(35,	7,	3,	'Můj krásný kód',	'import javafx.application.Application;<br>import javafx.scene.Scene;<br>import javafx.scene.control.Button;<br>import javafx.scene.layout.StackPane;<br>import javafx.stage.Stage;<br>import javafx.scene.control.Alert;<br>import javafx.scene.control.Alert.AlertType;<br><br>public class Main extends Application {<br><br>&emsp;@Override<br>&emsp;public void start(Stage primaryStage) {<br>&emsp;&emsp;// Vytvoření tlačítka<br>&emsp;&emsp;Button button = new Button();<br>&emsp;&emsp;button.setText(\"Klikni zde\");<br><br>&emsp;&emsp;// Nastavení akce po kliknutí na tlačítko<br>&emsp;&emsp;button.setOnAction(e -&gt; {<br>&emsp;&emsp;&emsp;// Vytvoření dialogového okna<br>&emsp;&emsp;&emsp;Alert alert = new Alert(AlertType.INFORMATION);<br>&emsp;&emsp;&emsp;alert.setTitle(\"Gratulace\");<br>&emsp;&emsp;&emsp;alert.setHeaderText(null);<br>&emsp;&emsp;&emsp;alert.setContentText(\"Gratulujeme, úspěšně jste kliknul na tlačítko!\");<br>&emsp;&emsp;&emsp;alert.showAndWait();<br>&emsp;&emsp;});<br><br>&emsp;&emsp;// Vytvoření kontejneru a přidání tlačítka do něj<br>&emsp;&emsp;StackPane root = new StackPane();<br>&emsp;&emsp;root.getChildren().add(button);<br><br>&emsp;&emsp;// Vytvoření scény a nastavení kontejneru jako jejího obsahu<br>&emsp;&emsp;Scene scene = new Scene(root, 300, 250);<br><br>&emsp;&emsp;// Nastavení scény na hlavním okně aplikace<br>&emsp;&emsp;primaryStage.setScene(scene);<br>&emsp;&emsp;primaryStage.setTitle(\"Příklad JavaFX\");<br>&emsp;&emsp;primaryStage.show();<br>&emsp;}<br><br>&emsp;public static void main(String[] args) {<br>&emsp;&emsp;launch(args);<br>&emsp;}<br>}<br>',	'2024-04-07 16:21:36');

DROP TABLE IF EXISTS `UserFollowers`;
CREATE TABLE `UserFollowers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserFrom` int NOT NULL,
  `UserTarget` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `UserFrom` (`UserFrom`),
  KEY `UserTarget` (`UserTarget`),
  CONSTRAINT `UserFollowers_ibfk_3` FOREIGN KEY (`UserFrom`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `UserFollowers_ibfk_4` FOREIGN KEY (`UserTarget`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `UserFollowers` (`id`, `UserFrom`, `UserTarget`) VALUES
(1,	1,	2),
(25,	2,	10),
(32,	2,	7);

DROP VIEW IF EXISTS `UserInfo`;
CREATE TABLE `UserInfo` (`username` varchar(20), `registration_date` timestamp, `profile_picture` varchar(255), `id` int, `adminstatus` bit(1), `post_numb` bigint, `Followers` bigint, `name` varchar(60));


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `PostParrentID` int NOT NULL,
  `Content` text COLLATE utf8_czech_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `UserID` (`UserID`),
  KEY `PostParrentID` (`PostParrentID`),
  CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_5` FOREIGN KEY (`PostParrentID`) REFERENCES `Posts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `comments` (`id`, `UserID`, `PostParrentID`, `Content`, `date`) VALUES
(35,	2,	31,	'Další komentář',	'2024-04-07 13:56:26'),
(36,	2,	31,	'Nwm',	'2024-04-07 13:56:30'),
(39,	19,	34,	'* Citace: ChatGPT *',	'2024-04-07 16:11:44'),
(40,	19,	34,	'Miluje to!',	'2024-04-07 16:13:43'),
(41,	7,	34,	'Krásný příspěvek, kde můž najít krásnou ženu zde?',	'2024-04-07 16:19:55'),
(42,	1,	35,	'Krásný kód more',	'2024-04-07 16:26:35');

DROP TABLE IF EXISTS `commentslikes`;
CREATE TABLE `commentslikes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `User` int NOT NULL,
  `CommentID` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CommentID` (`CommentID`),
  KEY `User` (`User`),
  CONSTRAINT `commentslikes_ibfk_1` FOREIGN KEY (`CommentID`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `commentslikes_ibfk_2` FOREIGN KEY (`User`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `commentslikes` (`id`, `User`, `CommentID`) VALUES
(17,	18,	36),
(18,	18,	35),
(21,	19,	39),
(22,	7,	41),
(23,	1,	35);

DROP TABLE IF EXISTS `followersforum`;
CREATE TABLE `followersforum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ForumID` int NOT NULL,
  `UserID` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ForumID` (`ForumID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `followersforum_ibfk_3` FOREIGN KEY (`ForumID`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `followersforum_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `followersforum` (`id`, `ForumID`, `UserID`) VALUES
(2,	1,	7),
(18,	7,	1),
(19,	1,	2),
(21,	14,	19),
(22,	15,	2);

DROP VIEW IF EXISTS `forumInfo`;
CREATE TABLE `forumInfo` (`id` int, `name` varchar(60), `description` tinytext, `icon` tinytext, `owner` int, `theme` varchar(50), `PostsCount` bigint, `Followers` bigint);


DROP TABLE IF EXISTS `forums`;
CREATE TABLE `forums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `description` tinytext COLLATE utf8_czech_ci NOT NULL,
  `theme` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `icon` tinytext CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `owner` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  CONSTRAINT `forums_ibfk_4` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `forums` (`id`, `name`, `description`, `theme`, `icon`, `owner`) VALUES
(1,	'SDĚLMITO',	'Officialní Fórum SDĚLMITO',	'Oznámení',	'assets/logo.png',	1),
(3,	'JavaFX',	'Java a JavaFX Fórum',	'Technologie',	'uploads/java.png',	7),
(7,	'ZpravodajsviCR',	'zpravodajství v čr',	'udalosti',	'uploads/IMG-65fa2a9d4eb473.95631024.jpg',	10),
(14,	'Hrady',	'Hrady a zámky',	'Lokální komunita',	'uploads/IMG-6612a935863e79.00044954.jpg',	19),
(15,	'Testovací fórum',	'Nevim',	'Zábava',	'uploads/IMG-6612ae36191748.56608880.jpg',	2);

DROP TABLE IF EXISTS `likesdislikes`;
CREATE TABLE `likesdislikes` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `PostID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PostID` (`PostID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `likesdislikes_ibfk_4` FOREIGN KEY (`PostID`) REFERENCES `Posts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likesdislikes_ibfk_6` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `likesdislikes` (`ID`, `UserID`, `PostID`) VALUES
(204,	2,	31),
(205,	19,	34),
(206,	7,	35),
(207,	1,	35),
(208,	2,	33);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) COLLATE utf8_czech_ci DEFAULT './assets/default_user.png',
  `adminstatus` bit(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registration_date`, `profile_picture`, `adminstatus`, `birthdate`) VALUES
(1,	'Jirkos',	'it-jirihart@stredniskola.net',	'912ec803b2ce49e4a541068d495ab570',	'2024-03-08 19:24:02',	'uploads/IMG-6612a55deac647.35294682.jpg',	NULL,	NULL),
(2,	'User Swager',	'user@test.cz',	'912ec803b2ce49e4a541068d495ab570',	'2024-03-08 19:25:31',	'uploads/IMG-6611b7d57d2ca2.03225397.png',	CONV('1', 2, 10) + 0,	NULL),
(7,	'Adam',	'petr.novak@seznam.cz',	'912ec803b2ce49e4a541068d495ab570',	'2024-03-10 11:12:59',	'uploads/IMG-6612acced4a452.32026972.jpg',	NULL,	'1998-04-10'),
(8,	'Adam Novotný',	'user2@email.cz',	'25f9e794323b453885f5181f1b624d0b',	'2024-03-13 15:22:21',	'./uploads/1cee2b888711ac763621327f568a513d_400x400.jpg',	NULL,	'1999-04-10'),
(10,	'JosefNovak',	'pepa.novak@email.com',	'912ec803b2ce49e4a541068d495ab570',	'2024-03-20 00:08:29',	'uploads/IMG-65fa28fc1b1909.35508216.jpg',	NULL,	'1999-12-10'),
(14,	'Jiří Hart',	'user.jirka@sdelmito.cz',	'912ec803b2ce49e4a541068d495ab570',	'2024-04-04 14:44:01',	'uploads/IMG-660ebcb16efb26.49273526.jpg',	CONV('1', 2, 10) + 0,	'2000-02-10'),
(18,	'Petr Chleba',	'petrchleba@gmail.com',	'25f9e794323b453885f5181f1b624d0b',	'2024-04-07 14:01:10',	'uploads/IMG-6612a725603d34.46954869.jpg',	NULL,	'1998-04-10'),
(19,	'Peťa',	'petr.mrtka@email.cz',	'ec03bcc5811f644df83c4a50396e0523',	'2024-04-07 14:08:03',	'uploads/IMG-6612a8c1bbbf40.38568399.jpg',	NULL,	'1950-12-10');

DROP TABLE IF EXISTS `CommentsInfo`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `CommentsInfo` AS select `comments`.`id` AS `CommentID`,`Posts`.`ForumID` AS `ForumID`,`comments`.`PostParrentID` AS `PostParrentID`,`comments`.`UserID` AS `CommentUserID`,`users`.`username` AS `UserName`,`comments`.`Content` AS `Content`,`users`.`profile_picture` AS `profile_picture`,`Posts`.`PostOwner` AS `PostOwner`,`comments`.`date` AS `date`,`forums`.`owner` AS `ForumOwner`,(select count(`commentslikes`.`CommentID`) from `commentslikes` where (`commentslikes`.`CommentID` = `comments`.`id`)) AS `CommentLikeCount` from (((`comments` left join `users` on((`users`.`id` = `comments`.`UserID`))) left join `Posts` on((`Posts`.`ID` = `comments`.`PostParrentID`))) left join `forums` on((`Posts`.`ForumID` = `forums`.`id`)));

DROP TABLE IF EXISTS `LikesDislikes`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `LikesDislikes` AS select `users`.`id` AS `userID`,`users`.`username` AS `username`,`users`.`profile_picture` AS `profile_picture`,`Posts`.`PostOwner` AS `PostOwner`,`Posts`.`Title` AS `Title`,`Posts`.`ID` AS `PostID`,`Posts`.`Content` AS `Content`,`Posts`.`PostDate` AS `PostDate`,`Posts`.`ForumID` AS `ForumID`,`forums`.`owner` AS `ForumOwner`,`forums`.`name` AS `name`,`forums`.`icon` AS `ForumIcon`,group_concat(`likesdislikes`.`UserID` separator ',') AS `liked_user_ids`,(select count(`comments`.`PostParrentID`) from `comments` where (`comments`.`PostParrentID` = `Posts`.`ID`)) AS `comments`,(select count(`likesdislikes`.`PostID`) from `likesdislikes` where (`likesdislikes`.`PostID` = `Posts`.`ID`)) AS `likes` from ((((`Posts` join `users` on((`Posts`.`PostOwner` = `users`.`id`))) join `forums` on((`Posts`.`ForumID` = `forums`.`id`))) left join `likesdislikes` on((`Posts`.`ID` = `likesdislikes`.`PostID`))) left join `comments` on((`Posts`.`ID` = `comments`.`PostParrentID`))) group by `Posts`.`ID` order by `Posts`.`ID`;

DROP TABLE IF EXISTS `UserInfo`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `UserInfo` AS select `users`.`username` AS `username`,`users`.`registration_date` AS `registration_date`,`users`.`profile_picture` AS `profile_picture`,`users`.`id` AS `id`,`users`.`adminstatus` AS `adminstatus`,count(`Posts`.`ID`) AS `post_numb`,(select count(`UserFollowers`.`UserTarget`) from `UserFollowers` where (`UserFollowers`.`UserTarget` = `users`.`id`)) AS `Followers`,`forums`.`name` AS `name` from ((`users` left join `Posts` on((`users`.`id` = `Posts`.`PostOwner`))) left join `forums` on((`users`.`id` = `forums`.`owner`))) group by `users`.`username`,`users`.`registration_date`,`users`.`profile_picture`,`users`.`id`,`forums`.`name`,`Followers`;

DROP TABLE IF EXISTS `forumInfo`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `forumInfo` AS select `forums`.`id` AS `id`,`forums`.`name` AS `name`,`forums`.`description` AS `description`,`forums`.`icon` AS `icon`,`forums`.`owner` AS `owner`,`forums`.`theme` AS `theme`,(select count(0) from `Posts` where (`forums`.`id` = `Posts`.`ForumID`)) AS `PostsCount`,(select count(0) from `followersforum` where (`forums`.`id` = `followersforum`.`ForumID`)) AS `Followers` from ((`forums` left join `Posts` on((`forums`.`id` = `Posts`.`ForumID`))) left join `followersforum` on((`forums`.`id` = `followersforum`.`ForumID`))) group by `forums`.`id`,`forums`.`name`,`forums`.`description`,`forums`.`icon`,`forums`.`owner`,`forums`.`theme`;

-- 2024-04-07 14:45:37
