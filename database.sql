-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 23 Juin 2018 à 11:53
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `culture`
--

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isCorrect` tinyint(4) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `choices`
--

INSERT INTO `choices` (`id`, `content`, `isCorrect`, `question_id`) VALUES
(1, '1930 الأوروغواي', 1, 4),
(2, 'مرتين', 1, 5),
(3, '3-0', 1, 6),
(4, 'عام 1954', 1, 7),
(5, 'تركيا', 1, 8),
(6, 'البرازيل خمس مرات', 1, 9),
(7, 'الفرنسي فابيان بارتيز', 1, 10),
(8, '1974', 1, 11),
(9, 'إيطاليا، في عام 1934 وعام 1938', 1, 12),
(10, 'في عام 1994 في أميركا. المباراة كانت بين البرازيل وإيطاليا وانتهت بفوز البرازيل بركلات الترجيح 3-2', 1, 13),
(13, 'في عام 1986 في المكسيك. المباراة كانت بين الأرجنتين و ألمانيا الغربية و انتهت بفوز الأرجنتين بركلات الترجيح 5-4', 0, 13),
(14, 'في عام 1982 في إسبانيا. المباراة كانت بين إسبانيا و التشيلي و انتهت بفوز إسبانيا بركلات الترجيح 3-1', 0, 13),
(15, '1970', 0, 11),
(16, '1982', 0, 11),
(17, 'كوريا الجنوبية', 0, 8),
(18, 'اليابان', 0, 8),
(19, 'عام 1942', 0, 7),
(20, 'عام 1962', 0, 7),
(21, 'ألمانيا ست مرات', 0, 9),
(22, 'الأرجنتين أربع مرات', 0, 9),
(23, 'الأرجنتين، في عام 1982 و عام 1986', 0, 12),
(24, 'البرازيل، في عام 1970 و عام 1974', 0, 12),
(25, '2-0', 0, 6),
(26, '2-1', 0, 6),
(27, '1934 الباراغواي', 0, 4),
(28, '1938 نيكاراغوا', 0, 4),
(29, 'مرة واحدة', 0, 5),
(30, 'ثلاث مرات', 0, 5),
(31, 'البرازيلي كلاوديو طافاريل', 0, 10),
(32, 'الكرواتي درازن لاديتش', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `content`) VALUES
(4, 'في أي عام أقيمت أول بطولة لكأس العالم ؟'),
(5, 'كم مره الغيت بطولة كاس العالم منذ إنطلاقتها ؟'),
(6, 'ما هي نتيجة المباراة النهائية لكأس العالم بين فرنسا والبرازيل سنة 1998 ؟'),
(7, 'في أي بطولة لكأس العالم كان أو نقل حي ومباشر للمباريات ؟'),
(8, 'أي دولة حققت المركز الثالث في كأس العالم سنة 2002 ؟'),
(9, 'ما هي أكثر الدول فوزا ببطولة كاس العالم لكرة القدم ؟'),
(10, 'من حصل على لقب أفضل حارس مرمى في كأس العالم 1998 بفرنسا ؟'),
(11, 'في أي عام شاركت كل من ألمانيا الغربية والمانيا الشرقية بفريقين منفصلين ؟'),
(12, 'ما هو الفريق الذي فاز بأول بطولة بكأس العالم مرتين متتاليتين ؟'),
(13, 'في أي عام حصل أول تعادل سلبي بين فريقين في المباراة النهائية لكأس العالم في كرة القدم ؟');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
