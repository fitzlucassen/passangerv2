-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 08 Janvier 2014 à 08:06
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `passangerv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`id`, `title`, `description`, `date`, `thumb`, `lang`) VALUES
(1, 'Ultimate Attempt', 'Premier album', '2010-08-01', 'ultimate_attempt.jpg', 'fr'),
(2, 'Ultimate Attempt', 'First album', '2010-08-01', 'ultimate_attempt.jpg', 'en'),
(3, 'Eighteen', 'Deuxième album', '2014-01-01', 'eighteen.jpg', 'fr'),
(4, 'Eighteen', 'Second album', '2014-01-01', 'eighteen.jpg', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `type` varchar(2) NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date`, `type`, `lang`) VALUES
(1, 'Sortie de l''EP Eighteen part 1', 'Bientôt sortira le nouvel EP de Passanger "Eighteen part 1".', '2013-12-01', 'co', 'fr'),
(2, 'Release of Eighteen part 1', 'The new Passanger EP "Eighteen part 1" will be released soon.', '2013-12-01', 'co', 'en'),
(3, 'Recherche un(e) photographe', 'Passanger recherche son(sa) photographe attitré(e) ! Contactez-nous', '2013-12-01', 'co', 'fr'),
(4, 'Search a photograph', 'We are looking for our official photograph ! Contact us !', '2013-12-01', 'co', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `metaDescription` text NOT NULL,
  `metaKeywords` text NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `header`
--

INSERT INTO `header` (`id`, `title`, `metaDescription`, `metaKeywords`, `lang`) VALUES
(1, 'Passanger', 'Le site officiel du groupe de progressif heavy métal Passanger', 'Passanger,heavy metal, progressif, iron maiden, dream theater,guitare, solo,batterie,php,html,css,mysql,css3,html5,jquery,javascript', 'fr'),
(2, 'Passanger', 'The official website of the progressif heavy metal band Passanger', 'lastrope,heavy metal, progressif, iron maiden, dream theater,guitar, solo,drum,php,html,css,mysql,css3,html5,jquery,javascript', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `title`, `description`, `lang`) VALUES
(1, '2012', 'Après un premier semestre remplis de répétitions pour les musiques du dernier album et de quelques concerts dans la région, le groupe se met en quette d''une nouvelle identité musicale et graphique.\r\n\r\nL''enregistrement du nouvel EP "Eighteen part 1" commença en août.\r\n\r\nLa sortie prévu début 2013 donnera naissance à la nouvel vie du groupe.', 'fr'),
(2, '2011', 'Fort de cet album enfin sur CD, le groupe décide de s''inscrire à la SACEM pour officialiser ses droits d''auteurs.\n\nCette étape franchie, la groupe jongle entre répète, concert (Etrechy, Roinville, Sermaise, Dourdan), et composition du nouvel E.P "Eighteen part 1".', 'fr'),
(3, '2010', 'Tout en enchaînant les concerts à Roinville, Dourdan, Sermaise...etc,\r\nle groupe termine la composition de l''album et commence aussitôt son enregistrement chez Thibault afin de le sortir vers la fin d''année.\r\n\r\nCet album de 12 titres fait main sera donc la première trace du groupe.', 'fr'),
(4, '2009', 'Naissant d''une envie commune, Dust of Shadows voit le jour grâce à Thibault et Kenny, désireux de fonder un groupe de Heavy-métal sérieux.\n\nAprès une recherche intensive, chaque nouveaux membre trouva la pièce manquante. Ainsi Franck rejoignit le groupe comme second guitariste puis amena Paco le bassiste, qui lui même nous présenta Camille la batteuse, remplaçante de Kenny qui nous quitta pour une vie meilleure.\n\nAprès quelques ébauche, le groupe s''attela à la composition du premier Album "Ultimate Attempt".\n\nEt c''est le 12 décembre 2009 qu''ils scellèrent leurs line-up en se produisant pour la première fois ensemble sur scène à Janville.', 'fr'),
(5, '2012', 'After a first semester filled with rehearsals for the new album and some gigs in our region, the group goes in search of a new musical and graphic identity.\r\n\r\nThe recording of the new EP "Eighteen Part 1" began in August and the release in the beginning of 2013 means a new life for the band.', 'en'),
(6, '2011', 'Proud of this album finally recorded, the band decided to enroll SACEM formalized its copyright.\r\n\r\nThis step, the group juggles with rehearsals, concerts (Etrechy, Roinville, Sermaise, Dourdan), and composition of the new EP "Eighteen Part 1"', 'en'),
(7, '2010', 'While chaining concerts in Roinville, Dourdan, Sermaise...etc. the band ended composition of their first album and immediatly began recording in Thibault''s house, in order to finish it in the end of the year.\r\n\r\nThis 12-tracks album will be the first band-trace.', 'en'),
(8, '2009', 'Born of a common desire, Dust of Shadows was created by Thibault and Kenny, wanting to start a serious band of heavy-metal.\r\n\r\nAfter an intensive search, each new member found the missing piece. And Franck joined the band as second guitarist.\r\nPaco, the bass-guitarist, was brought by Franck. And Himself presented to Dust of shadow Camille, successor of Kenny who left the band for a better life.\r\n\r\nAfter a few draft, the group set about the composition of the first album "Ultimate Attempt".\r\n\r\nAnd it is in December 12, 2009 they seal their line-up performing for the first time together on stage in Janville.', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `code`) VALUES
(1, 'fr'),
(2, 'en'),
(3, 'es');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `picture` text NOT NULL,
  `birthday` date NOT NULL,
  `instrument` varchar(100) NOT NULL,
  `influences` text NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id`, `name`, `firstname`, `surname`, `picture`, `birthday`, `instrument`, `influences`, `description`, `lang`) VALUES
(1, 'Dulon', 'Thibault', 'Titi', 'titou.png', '1992-02-28', 'Guitariste Soliste', 'Ayreon, Iron Maiden, Dream Theater, Circus Maximus, Periphery, Tesseract, Intervals, Nightwish, Delain', 'Après plusieurs expériences de groupe non sérieuse, Thibault, née le 28 février 1992, et son ami Kenny décident de fonder Dust of shadows, un groupe de heavy progressif dans lequel ils pourrait enfin exprimer leur âme heavy et prog.\nAutodidacte depuis l''age de 15ans, il commence par apprendre la batterie avant de sombrer complètement dans la passion du manche à 6 cordes et du plectre chaleureux.\nEn parallèle, il continue ses projets solo qui lui permettent d''exprimer ses autres influences musicales (BO, classique, jazz) et d''apprendre toutes les ficelles du mixage. http://soundcloud.com/fitz_lucassen', 'fr'),
(2, 'Gautier', 'Franck', 'Kyky', 'kyky.png', '1990-07-27', 'Guitariste Rythmique', 'Iron maiden, Saxon, Helloween, Racer X, Accept, Killswitch Engage, Issues, Of Mice & men, Everyone dies in utah, While she sleeps, Symphony X, Bury Tomorrow, Periphery .', 'Franck , né le 27 juillet 1990. Commence son initiation à la musique à l''âge de 16 ans principalement à la guitare classique puis électrique, en grande partie autodidacte à ses débuts, c''est aux cotés de Pierre Culeux qu''il s''initie aux premières techniques de métal et enfin, au près  d''Emmanuel Malépart qu''il continue aujourd''hui d''apprendre et évoluer. Traversant multiples styles musicaux et divers groupes éphémères, il finit par rencontrer Thibault Dulon via un site communautaire pour musiciens et intégra ainsi le groupe Dust Of Shadows.', 'fr'),
(3, 'De Lima', 'Paco', 'Squid', 'pakpak.png', '1991-07-26', 'Bassiste', 'Rage Against The Machine, Periphery, Marcus Miller, Le peuple de l''herbe, Dream Theater, Massive Attack, Victor Wooten', 'Paco, née le 26 juillet 1991, commence son initiation à la musique par le piano. Après avoir fait 8 ans de conservatoire (piano, solfège, chorale), il commence l''apprentissage de la basse à 16 ans en jouant avec des amis dans des petits groupes éphémères, puis quelques années plus tard par le biais de Franck, entre dans le groupe Dust Of Shadows.\r\nLe groupe depuis rebaptisé Passanger lui permet de développer différentes techniques en rapport avec le métal.\r\nEn parallèle, il entretient d''autres projets musicaux comme Capt''ain Cover, groupe de reprises Rock/Hard des années 70 à nos jours.', 'fr'),
(5, 'Begou', 'Tatiana', 'Tatou', '', '1992-08-04', 'Chanteur', 'After Forever, Arch Enemy, Nightwish, Children of Bodom, Doro, Anthrax, Arkona, System of a Down, Metallica, Myles Kennedy, Anna Murphy', 'Tatiana née le 4 aout 1992 s’initie à la musique avec le violon à l’âge de 8 ans. C’est à 11 ans, qu’elle commença le chant par le biai de ses cours de comédie musicale et de son intégration à la chorale de Saint-Fargeau Ponthierry dont elle en devient vite la soliste. Ayant toujours eu un penchant pour le Rock, le Métal ainsi que le Classique (formation musicale de base oblige), elle intégra differents groupes au cours de son adolescence, sans trop de sérieux. C’est en répondant présente à l’appel des membres de Dust of Shadows à la recherche d’un chanteur, qu’elle intégra le groupe.', 'fr'),
(6, 'Dulon', 'Thibault', 'Titi', 'titou.png', '1992-02-28', 'Lead Guitarist', 'Ayreon, Iron Maiden, Dream Theater, Circus Maximus, Periphery, Tesseract, Intervals, Nightwish, Delain', 'After several non-serious band experiences Thibault, who was born on 28 February 1992, and his friend, Kenny, decided to form Dust of shadows, a heavy progressive band in which they could finally express their heavy and prog soul.\nAutodidact from the age of 15, he began by learning the drum before sinking completely into the passion of the 6 strings handle and plectrum warm.\nIn parallel, he carries on his solo projects which allow him to express his other musical influences (BO, classical, jazz) and learn all the mixing tricks. http://soundcloud.com/fitz_lucassen\n', 'en'),
(7, 'Gautier', 'Franck', 'Kyky', 'kyky.png', '1990-07-27', 'Rythm Guitarist', 'Iron maiden, Saxon, Helloween, Racer X, Accept, Killswitch Engage, Issues, Of Mice & men, Everyone dies in utah, While she sleeps, Symphony X, Bury Tomorrow, Periphery .', 'Frank, born in July 27 of 1990. begins his introduction to music at the age of 16 mainly on classical guitar and then electric guitar, largely self-taught in its infancy, it is alongside Pierre Culeux he learns the metal techniques and now, it’s with Emmanuel Malépart he continues to learn and evolve. Through multiple musical styles and various ephemera bands, he ends meet Thibault Dulon via a community musician’s website and join Dust Of Shadows.', 'en'),
(8, 'De Lima', 'Paco', 'Pakpak', 'pakpak.png', '1991-07-26', 'Bassist', 'Rage Against The Machine, Periphery, Marcus Miller, Le peuple de l''herbe, Dream Theater, Massive Attack, Victor Wooten', 'Paco, born in July 26 of 1991, begins his introduction to music on the piano. After 8 years of conservatory (piano, music theory, choir), he began learning the bass at age of 16 playing with friends in small ephemeral groups, then a few years later through Franck, enters Dust Of Shadows band.\nThe group since renamed Passanger allows him to develop different techniques in relation to the metal.\nIn parallel, he has other musical projects like Capt''ain Cover, cover band Rock / Hard 70s to today.\n', 'en'),
(10, 'Begou', 'Tatiana', 'Tatou', '', '0000-00-00', 'Singer', 'After Forever, Arch Enemy, Nightwish, Children of Bodom, Doro, Anthrax, Arkona, System of a Down, Metallica, Myles Kennedy, Anna Murphy', 'Tatiana, born in August 4th 1992, was introduced to the music with the violin at the age of 8. It is at 11 years old, she began singing by the mean of her current musical theater and her integration into the choir of Saint-Fargeau Ponthierry. She quickly becomes the soloist. Having always had a penchant for Rock, Metal and the Classic (basic musical training requires), she joined various groups during his teens, not seriously. Then, she decided to respond to the call of Dust of Shadows members who were looking for a singer.', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `lang`) VALUES
(1, 'Il y a du changement dans l''air.', 'Comme le dit le titre, il y a du changement dans l''air. L''été nous a tous inspiré l''année passée pour une vague de changement. Ainsi, voici un site tout beau tout propre refait de A à Z pour vous présenter le groupe.\r\nNous avons beaucoup évolué depuis la création de Dust Of Shadows. Et notre musique aussi. De ce fait, le besoin de changer de nom, d''apparence et d''identité est venu assez naturellement.\r\nRépondant à présent au nom de Passanger, nous prévoyons la sortie de notre nouvel EP "Eighteen part 1" de quatre titres fin septembre.\r\n\r\nPour suivre ce mouvement général une vidéo de présentation, voir même un clip, est un projet en cours de réflexion.\r\nS''inscrivant dans l''air de la musique moderne et complexe, Passanger est bien décidé à franchir une nouvelle étape. La sortie de ce futur EP sera l''élément attendu pour pouvoir - enfin - élargir notre horizon.\r\nNe perdez pas de temps et allez explorer ce site qui sera quotidiennement maintenu à jour pour être constamment exhaustif de toutes nos informations.\r\n\r\nMusicalement,\r\nPassanger.', '2013-12-01', 'fr'),
(2, 'There is change in the air.', 'As the title says, there is change in the air. Last summer inspired us for a wave of change. So here is a new clean and nice website to introduce the band.\r\nWe have evolved considerably since the creation of Dust Of Shadows. And our music too. Therefore, the need to change our name, our appearance and our identity came pretty naturally.\r\nResponding to the name of Passanger, we expect the release of our new four titles EP "Eighteen part 1" in late september.\r\n\r\nTo follow this general trend, we are also thinking of a video presentation (in progress).\r\nAs part of the air of modern and complex music, Passanger is determined to pass the next step. The release of this future EP will be the element expected to be able - finally - to expand our horizon.\r\nDo not waste time and go explore this website which will be daily maintained to be constantly updated exhaustive of all our information.\r\n\r\nMusically,\r\nPassanger.', '2013-12-01', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `rewrittingurl`
--

CREATE TABLE IF NOT EXISTS `rewrittingurl` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `idRouteUrl` tinyint(5) NOT NULL,
  `urlMatched` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `rewrittingurl`
--

INSERT INTO `rewrittingurl` (`id`, `idRouteUrl`, `urlMatched`, `lang`) VALUES
(1, 1, '/accueil.html', 'fr'),
(2, 1, '/en/home.html', 'en'),
(3, 2, '/404.html', 'fr'),
(4, 2, '/en/404.html', 'en'),
(5, 1, '/es/bienvenido.html', 'es'),
(6, 2, '/es/404.html', 'es');

-- --------------------------------------------------------

--
-- Structure de la table `routeurl`
--

CREATE TABLE IF NOT EXISTS `routeurl` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `controller` varchar(100) NOT NULL DEFAULT '',
  `action` varchar(100) NOT NULL DEFAULT '',
  `order` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `routeurl`
--

INSERT INTO `routeurl` (`id`, `name`, `controller`, `action`, `order`) VALUES
(1, 'home', 'home', 'index', 0),
(2, 'error404', 'home', 'error404', 0);

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `duration` varchar(10) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `idAlbum` tinyint(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `song`
--

INSERT INTO `song` (`id`, `filename`, `title`, `description`, `duration`, `lang`, `idAlbum`) VALUES
(1, '', 'Intro', '', '01:45', 'fr', 0),
(2, '', 'War is the key', '', '03:43', 'fr', 0),
(3, '', 'Revenge', '', '04:10', 'fr', 0),
(4, 'king.mp3', 'The King', '', '04:57', 'fr', 0),
(5, '', 'Burn in hell', '', '04:12', 'fr', 0),
(6, 'death.mp3', 'Death blows in my ears', '', '04:11', 'fr', 0),
(7, '', 'Into the shadows', '', '04:47', 'fr', 0),
(8, '', 'Never yourself', '', '04:33', 'fr', 0),
(9, '', 'Hopess', '', '04:22', 'fr', 0),
(10, 'power.mp3', 'Power of death', '', '04:14', 'fr', 0),
(11, '', 'Ultimate Attempt', '', '04:36', 'fr', 0),
(12, '', 'Conclusion', '', '02:08', 'fr', 0),
(13, '', 'Intro', '', '01:45', 'en', 0),
(14, '', 'War is the key', '', '03:43', 'en', 0),
(15, '', 'Revenge', '', '04:10', 'en', 0),
(16, 'king.mp3', 'The King', '', '04:57', 'en', 0),
(17, '', 'Burn in hell', '', '04:12', 'en', 0),
(18, 'death.mp3', 'Death blows in my ears', '', '04:11', 'en', 0),
(19, '', 'Into the shadows', '', '04:47', 'en', 0),
(20, '', 'Never yourself', '', '04:33', 'en', 0),
(21, '', 'Hopess', '', '04:22', 'en', 0),
(22, 'power.mp3', 'Power of death', '', '04:14', 'en', 0),
(23, '', 'Ultimate Attempt', '', '04:36', 'en', 0),
(24, '', 'Conclusion', '', '02:08', 'en', 0),
(25, '', 'Ch.1 - A weird travel', '', '04:00', 'fr', 0),
(26, '', 'Ch.2 - Survive after mourning', '', '05:50', 'fr', 0),
(27, '', 'Ch.3 - Loneliness', '', '05:10', 'fr', 0),
(28, '', 'Ch.4 - Kidnapping', '', '04:20', 'fr', 0),
(29, '', 'Ch.5 - Dilemma', '', '05:20', 'fr', 0),
(30, '', 'Ch.6 - The Leak', '', '03:45', 'fr', 0),
(31, '', 'Ch.7 - Change your mind', '', '05:00', 'fr', 0),
(32, '', 'Ch.8 - Nostalgia', '', '04:00', 'fr', 0),
(33, '', 'Ch.9 - Revolution', '', '02:45', 'fr', 0),
(34, '', 'Ch.10 - Revelation', '', '04:10', 'fr', 0),
(35, '', 'Ch.11 - Partener till the end', '', '04:22', 'fr', 0),
(36, '', 'Ch.12 - Somewhere else', '', '03:30', 'fr', 0),
(37, '', 'Ch.1 - A weird travel', '', '04:00', 'en', 0),
(38, '', 'Ch.2 - Survive after mourning', '', '05:50', 'en', 0),
(39, '', 'Ch.3 - Loneliness', '', '05:10', 'en', 0),
(40, '', 'Ch.4 - Kidnapping', '', '04:20', 'en', 0),
(41, '', 'Ch.5 - Dilemma', '', '05:20', 'en', 0),
(42, '', 'Ch.6 - The Leak', '', '03:45', 'en', 0),
(43, '', 'Ch.7 - Change your mind', '', '05:00', 'en', 0),
(44, '', 'Ch.8 - Nostalgia', '', '04:00', 'en', 0),
(45, '', 'Ch.9 - Revolution', '', '02:45', 'en', 0),
(46, '', 'Ch.10 - Revelation', '', '04:10', 'en', 0),
(47, '', 'Ch.11 - Partener till the end', '', '04:22', 'en', 0),
(48, '', 'Ch.12 - Somewhere else', '', '03:30', 'en', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `role`) VALUES
(1, 'fitzlucassen', '63a9f0ea7bb98050796b649e85481845', 'thibault.dulon@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `url`, `title`, `description`, `thumb`, `lang`) VALUES
(1, '<iframe width="450" height="338" src="https://www.youtube.com/embed/FDXU3pREfbE" frameborder="0" allowfullscreen></iframe>', 'Revolution', 'Video prise lors d''un concert spécial métal à Etréchy dans l''essonne (91)', 'none', 'fr'),
(2, '<iframe width="450" height="338" src="https://www.youtube.com/embed/Y0S3D4iGADI" frameborder="0" allowfullscreen></iframe>', 'Power of death', 'Une composition du premier album joué au live d''Etréchy lors de la deuxième édition du festival métal.', 'none', 'fr'),
(3, '<iframe width="450" height="253" src="https://www.youtube.com/embed/3cFp55qBRGI" frameborder="0" allowfullscreen></iframe>', 'Dilemma', 'Une composition du deuxième album interprété lors d''un live au PitchTime de Dourdan.', 'none', 'fr'),
(4, '<iframe width="450" height="338" src="https://www.youtube.com/embed/FDXU3pREfbE" frameborder="0" allowfullscreen></iframe>', 'Revolution', 'Video taken during a special metal gig in Etrechy (91)', 'none', 'en'),
(5, '<iframe width="450" height="338" src="https://www.youtube.com/embed/Y0S3D4iGADI" frameborder="0" allowfullscreen></iframe>', 'Power of death', 'Composition of the first album played live in Etréchy in the second edition of the festival metal.', 'none', 'en'),
(6, '<iframe width="450" height="253" src="https://www.youtube.com/embed/3cFp55qBRGI" frameborder="0" allowfullscreen></iframe>', 'Dilemma', 'Composition of the second album performed during a PitchTime live in Dourdan.', 'none', 'en'),
(7, '<iframe width="450" height="338" src="//www.youtube.com/embed/BGWYuWFlJhw" frameborder="0" allowfullscreen></iframe>', 'Revolution (2013)', 'Une composition de notre album Eighteen prochainement disponible.\r\nConcert à Dourdan au Pitchtime :\r\nChapitre 9 - Revolution.\r\nMusique déposée à la SACEM.', '', 'fr'),
(8, '<iframe width="450" height="338" src="//www.youtube.com/embed/BGWYuWFlJhw" frameborder="0" allowfullscreen></iframe>', 'Revolution (2013)', 'A composition from the "Eighteen part 1" EP.\r\nGig in Dourdan in the Pitchtime bar :\r\nchapter 9 - Revolution.\r\nMusic protected by SACEM.', '', 'en');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
