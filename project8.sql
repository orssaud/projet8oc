-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Novembre 2018 à 10:32
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project8`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `accountName` varchar(256) NOT NULL,
  `passwordAccount` varchar(256) NOT NULL,
  `lastLogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id`, `accountName`, `passwordAccount`, `lastLogin`) VALUES
(1, 'jean', '$2y$10$Gak2NJDqYv5CmUtBME0JVOPTH6bvkEp2qU2GFdtAr6e8Bnp1P6qA.', '2018-10-15 16:12:14');

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapter_date` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chapter`
--

INSERT INTO `chapter` (`id`, `title`, `chapter_date`, `content`) VALUES
(1, 'chapter one ', '2018-08-01 00:00:00', 'Hello world.\r\n\r\nWelcome to Alaska'),
(2, 'un titre', '2018-08-20 10:58:57', '<p>un chapitre</p>'),
(13, 'MON TITRE', '2018-10-11 17:05:24', '<p>Aute exercitation sed sint dolor nisi non duis dolore exercitation adipisicing laborum sit labore commodo pariatur aliquip deserunt labore commodo aliqua minim amet aute laboris amet et culpa ullamco fugiat id commodo velit sint veniam aliquip proident irure culpa nisi nulla eiusmod aliqua et proident anim duis tempor ad dolor sunt reprehenderit ullamco fugiat pariatur aliquip ullamco sunt elit in officia adipisicing officia laboris eu nisi consequat incididunt eu incididunt cillum ut consectetur veniam ut tempor sint id ullamco eu proident magna ut aute in ut non ex et laborum irure ad deserunt cupidatat pariatur consectetur officia sit id elit minim est sunt veniam voluptate et nisi nulla ullamco est cillum excepteur magna id ullamco aute deserunt id incididunt aliquip officia minim consectetur anim veniam labore aute commodo fugiat consectetur et sint velit est dolore consectetur nisi ut dolore cillum ullamco laborum laboris proident aliquip labore aute esse tempor aute veniam aute excepteur et sed dolore commodo quis pariatur ullamco anim qui reprehenderit dolore mollit dolore aliquip enim esse ut eu laboris occaecat dolor laboris esse deserunt incididunt in in aute proident aliquip proident reprehenderit ad mollit ut dolor minim dolor consectetur dolore sunt laborum duis enim est nisi ea nulla voluptate dolore quis aliqua officia irure irure ut sunt voluptate in do laboris duis sit eu sunt adipisicing officia fugiat proident eiusmod cupidatat dolore irure labore ullamco ex ut elit quis incididunt ut dolor proident aliqua deserunt pariatur enim ullamco in dolor et dolore dolor labore dolor ea do incididunt ut cillum velit sint id magna.</p>'),
(14, 'éèêû', '2018-10-15 14:49:42', '<p>ff</p>'),
(4, 'un titre 2', '2018-08-22 03:29:24', '<p>un chapitre 2</p>'),
(5, 'titre chapitre', '2018-08-22 09:50:52', '<p>chapitre 4</p>'),
(6, 'aujourd\'hui', '2018-09-12 13:56:30', '<p>blablzerrrrr</p>'),
(7, 'on va ajouter le titre 3', '2018-09-18 16:00:57', '<p style="text-align: center;">la page <em>blanche</em></p>\r\n<p>&nbsp;</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non laoreet odio, non interdum libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec nibh id sapien mollis faucibus a ut dui. Vivamus tristique ipsum eu iaculis fringilla. Sed sodales sit amet orci vitae sagittis. Sed venenatis, leo a lobortis pretium, libero lectus rhoncus tortor, eu ultrices ipsum nisi sed ante. Nam cursus lectus et sapien malesuada, sit amet ullamcorper turpis accumsan. Nulla nec fringilla velit. Nullam nec dui placerat, pharetra felis at, dapibus tortor. Aliquam ac lectus quis sapien feugiat ornare. Duis sapien diam, interdum eget ultrices eget, efficitur vel nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent laoreet ultrices volutpat.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Maecenas ac lorem et lacus rhoncus iaculis. Integer aliquam lobortis dolor, eget luctus leo porttitor vel. Donec rhoncus mauris vitae dolor eleifend, vitae fringilla lacus pulvinar. Maecenas vel sapien vel enim ultrices elementum cursus non tortor. Nullam vulputate imperdiet est. Proin gravida aliquam erat vel elementum. Ut id dignissim eros. Nam quis tortor a justo pharetra sagittis. Nulla vulputate odio dapibus magna tempor, non lacinia nisl venenatis. Curabitur maximus, metus vitae sodales sodales, nisl metus ultrices lorem, nec lobortis purus magna at nulla.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Phasellus ac quam eu enim fringilla condimentum. Nunc sed luctus tortor. Ut eu laoreet leo, at mattis ex. Sed ut semper libero. In hac habitasse platea dictumst. Ut tempor ligula mauris, et scelerisque turpis facilisis eget. Phasellus id justo ac magna lobortis porta at a odio. Suspendisse potenti. Nullam commodo et ligula eu mollis. Integer consectetur viverra elit, ac varius erat porta quis. Sed id odio id nisi iaculis cursus.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Phasellus faucibus, est fermentum pulvinar hendrerit, ipsum arcu dictum mi, ac sagittis est mauris id diam. Sed facilisis luctus ex non molestie. Aliquam elementum pharetra ipsum, a porta velit porttitor id. Nam fermentum congue nisl, at rutrum nunc vulputate vel. Mauris aliquam, nulla sit amet rutrum eleifend, neque mauris efficitur massa, ut pellentesque nisl enim vel orci. Fusce orci nibh, fringilla sit amet fermentum id, efficitur eget eros. Praesent faucibus lobortis augue porttitor sodales. Fusce vitae vestibulum augue. Suspendisse felis risus, congue a quam vel, porta tincidunt odio. Donec id molestie magna, venenatis placerat urna. Integer eu sapien porttitor, scelerisque nibh id, venenatis leo. Sed dignissim, sapien ut rhoncus varius, ex quam sodales nunc, non faucibus sapien lectus id leo. Suspendisse sed enim at metus porttitor tincidunt. Integer accumsan magna justo, et bibendum nisi posuere id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Phasellus malesuada id magna vitae finibus. Duis aliquet pellentesque sem ac tincidunt. Sed vitae mi gravida, hendrerit dui sed, imperdiet nulla. Aenean a ullamcorper tellus. Nam dictum eu diam a vehicula. Duis ac metus non eros lobortis sagittis. In eu rutrum lectus. Nulla facilisi. Proin in orci vulputate, porta ipsum quis, vulputate lectus. Nulla facilisi.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reported` int(11) NOT NULL,
  `by_author` tinyint(1) NOT NULL DEFAULT '0',
  `reply` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reported`, `by_author`, `reply`) VALUES
(1, 1, 'Georges', 'New comment', '2018-08-10 00:00:00', 0, 0, NULL),
(2, 1, 'moi', 'test com', '2018-08-14 11:45:28', 0, 0, NULL),
(3, 2, 'moi', 'test com', '2018-08-20 11:00:28', 0, 0, NULL),
(4, 2, 'moi', 'comment', '2018-08-20 13:33:11', 0, 0, NULL),
(5, 5, 'moi', 'test', '2018-09-12 09:12:11', 0, 0, NULL),
(6, 5, 'moi', 'test', '2018-09-12 09:12:35', 0, 0, NULL),
(8, 5, 'moi', 'test2', '2018-09-12 09:13:45', 0, 0, NULL),
(47, 6, 'q', 'qq', '2018-10-05 18:06:43', 0, 0, NULL),
(43, 6, 'z', 'zz', '2018-10-05 16:52:04', 0, 0, NULL),
(42, 6, 'moi', 'rr', '2018-10-05 16:50:36', 0, 0, NULL),
(41, 6, 's', 'ss', '2018-10-05 16:46:42', 0, 0, NULL),
(40, 6, 'ez', 'zez', '2018-10-05 16:44:55', 0, 0, NULL),
(39, 6, 'moi', 'aza', '2018-10-05 16:44:00', 0, 0, NULL),
(49, 7, 'Jean Forteroche', '3', '2018-10-08 10:25:59', 0, 1, NULL),
(50, 7, 'Jean Forteroche', 'moi', '2018-10-08 10:36:48', 0, 1, NULL),
(62, 7, 'moi', 'hch', '2018-10-09 13:15:29', 1, 0, NULL),
(63, 7, 'Jean Forteroche', 'Velit ut fugiat labore dolor sint ex et anim ad magna minim ut incididunt ea incididunt nulla irure proident fugiat dolor est fugiat laborum dolor ut dolore aute nostrud deserunt anim eiusmod ut sint in consectetur consequat proident consectetur excepteur ullamco laborum fugiat aliqua ullamco consequat aliquip ea et sit cupidatat cillum deserunt eu minim proident culpa labore enim excepteur exercitation veniam sed exercitation proident cillum irure deserunt esse sint id ut in reprehenderit ullamco nostrud in fugiat tempor fugiat qui ut anim incididunt commodo laboris laborum enim in aliqua sunt minim nulla qui occaecat in aute velit aliqua culpa veniam quis esse sunt eiusmod eu aliquip consectetur irure occaecat non reprehenderit occaecat voluptate occaecat qui quis tempor eu voluptate tempor exercitation non ex non culpa ut sed irure ea minim exercitation laboris commodo cillum.', '2018-10-09 15:39:41', 0, 1, NULL),
(56, 6, 'Jean Forteroche', 'fe', '2018-10-08 11:00:59', 0, 1, NULL),
(57, 5, 'es', 'se', '2018-10-08 11:01:06', 0, 0, NULL),
(58, 6, 'Jean Forteroche', 'io', '2018-10-08 11:03:57', 0, 1, NULL),
(59, 6, 'moi', 'jj', '2018-10-08 11:04:10', 0, 0, NULL),
(64, 7, 'Jean Forteroche', 'Velit ut fugiat labore dolor sint ex et anim ad magna minim ut incididunt ea incididunt nulla irure proident fugiat dolor est fugiat laborum dolor ut dolore aute nostrud deserunt anim eiusmod ut sint in consectetur consequat proident consectetur excepteur ullamco laborum fugiat aliqua ullamco consequat aliquip ea et sit cupidatat cillum deserunt eu minim proident culpa labore enim excepteur exercitation veniam sed exercitation proident cillum irure deserunt esse sint id ut in reprehenderit ullamco nostrud in fugiat tempor fugiat qui ut anim incididunt commodo laboris laborum enim in aliqua sunt minim nulla qui occaecat in aute velit aliqua culpa veniam quis esse sunt eiusmod eu aliquip consectetur irure occaecat non reprehenderit occaecat voluptate occaecat qui quis tempor eu voluptate tempor exercitation noncillum.', '2018-10-09 15:40:07', 0, 1, NULL),
(65, 7, 'moi', '.col-md-4 .offset-md-4', '2018-10-09 15:43:48', 1, 0, NULL),
(66, 7, 'moi', 'azer', '2018-10-09 15:50:33', 1, 0, NULL),
(67, 7, 'Jean Forteroche', 's', '2018-10-09 16:41:02', 0, 0, NULL),
(116, 14, 'moi', 'aze', '2018-10-15 16:10:27', 0, 0, NULL),
(69, 7, 'Jean Forteroche', ' bv', '2018-10-09 17:24:30', 0, 0, NULL),
(70, 7, 'Jean Forteroche', 'h', '2018-10-09 17:28:34', 0, 0, NULL),
(71, 7, 'moi', 't', '2018-10-09 17:29:30', 0, 0, NULL),
(96, 7, 'moi', 'ma réponse', '2018-10-10 15:00:51', 0, 0, 69),
(112, 13, 'aze', 'aa', '2018-10-12 16:56:50', 0, 0, NULL),
(114, 14, 'ioi', 'ioi', '2018-10-15 15:58:06', 0, 0, NULL),
(115, 13, 'Jean Forteroche', 'kk', '2018-10-15 16:10:01', 0, 1, NULL),
(111, 13, 's', 'sss', '2018-10-12 16:27:01', 1, 0, NULL),
(110, 7, 'Jean Forteroche', 'teeette', '2018-10-12 14:42:12', 0, 1, 106),
(97, 7, 'moiz', 'q', '2018-10-10 15:01:24', 0, 0, 66),
(98, 7, 's', 'ss', '2018-10-10 15:01:31', 0, 0, 69),
(99, 5, 'Moguru', 'Vraiment bien se système de commentaire !', '2018-10-10 15:36:12', 0, 0, NULL),
(100, 5, 'Layka', 'Oui tu as bien travailler :p', '2018-10-10 15:36:41', 0, 0, 99),
(101, 5, 'Natssuko', 'C\'est de la nul !!!!!!!!', '2018-10-10 15:37:30', 1, 0, NULL),
(106, 7, 'moi', 'azer', '2018-10-11 14:47:45', 2, 0, NULL),
(107, 7, 'moi', 't', '2018-10-12 12:22:42', 0, 0, NULL),
(109, 7, 'Jean Forteroche', 's', '2018-10-12 14:34:32', 0, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
