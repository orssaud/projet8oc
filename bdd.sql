-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Janvier 2019 à 14:34
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
  `email` varchar(256) NOT NULL,
  `passwordAccount` varchar(256) NOT NULL,
  `lastLogin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id`, `accountName`, `email`, `passwordAccount`, `lastLogin`) VALUES
(1, 'jean', 'orssaudgeorges@gmail.com', '$2y$10$3okq42A9d61a9QIGkqgLAe4VH3k3xT0mRLPg27tXQVHx5OWJ.pPre', 1548253075);

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
  `comment_date` int(11) NOT NULL,
  `reported` int(11) NOT NULL,
  `by_author` tinyint(1) NOT NULL DEFAULT '0',
  `reply` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reported`, `by_author`, `reply`) VALUES
(122, 6, 'é', 'é"', 1546958219, 0, 0, NULL),
(134, 7, 'Jean Forteroche', 'Bonjour Arthur, \r\nLe livre sortira en librairie le 2 décembre.', 1548129648, 0, 1, 133),
(133, 7, 'Arthur', 'Votre livre sera-t-il disponible en version papier ?  ', 1548129529, 0, 0, NULL),
(132, 7, 'Georges', 'Génial, j\'ai vraiment hâte de lire votre prochain chapitre !', 1548129218, 0, 0, NULL),
(130, 7, 'moi', 'azer', 1547726300, 0, 0, NULL),
(135, 7, 'moi', 'test\r\ntest', 1548130367, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `security_key` varchar(256) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recovery`
--

INSERT INTO `recovery` (`id`, `email`, `security_key`, `date`) VALUES
(23, 'orssaudgeorges@gmail.com', '$2y$10$J/ycqBdHJVe3IYqshfuS8.pXV.C6U57GFD2Hj3dB9mm2b7QdaMVZO', 1548189785);

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
-- Index pour la table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT pour la table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
