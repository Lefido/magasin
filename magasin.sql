-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 fév. 2023 à 23:08
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `magasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `reference` varchar(30) NOT NULL,
  `descriptif` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quantite` int NOT NULL,
  `prix` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `produit`, `reference`, `descriptif`, `quantite`, `prix`) VALUES
(1, 'Télévision Samsung', '123456', 'Découvrez notre TV 65 pouces (165 cm) LED LG UHD 4K 65UQ70006LB ainsi que ses caractéristiques parmi notre nouvelle gamme de téléviseurs LG.', 4, '530.54'),
(2, 'Samsung S23', '654321', 'Voici les nouveaux Galaxy S23. Incarnant un changement majeur pour Samsung, ils intègrent des composants issus de matériaux recyclés, pour une conception nouvelle plus respectueuse de l’environnement. Incroyablement puissants, ils embarquent notre processeur le plus rapide à ce jour, le Qualcomm Snapdragon® 8 Gen 2 ; associé à 8Go de RAM. Parfait pour vos sessions de jeu les plus intenses, avec des smartphones qui assurent fluidité, hautes performances et autonomie du matin jusq u’a u soir. Côté photo, les Galaxy S23 et Galaxy S23+ sont incroyables. Avec un système photo à 3 capteurs et capteur principal de 50 Mpx, ils sont en mesure de révéler la lumière dans la pénombre, shooter en très haute définition ou zoomer sans perdre en qualité. Pour des photos et vidéos extraordinaires, à tout moment Leurs écrans de 6,1 et 6,6 pouces, d’une fluidité adaptative de 120Hz, embarquent tout le savoir faire Samsung. Pour des écrans lumineux aux couleurs fidèles, vous plongeant en immersion totale dans vos contenus préférés.', 24, '950.99'),
(12, 'Echo Dot (5e génération, modèle 2022) ', 'ECHODOT5', 'Notre Echo Dot aux meilleures performances audio : vivez une expérience audio inégalée par les générations précédentes d Echo Dot avec Alexa, et profitez de voix plus claires, de basses plus profondes et d un son puissant dans chaque pièce.', 45, '79.80'),
(13, 'Tablette Fire HD 10 | 10,1\" (25,6 cm), Full HD 1080p, 32 Go | Noir | ', 'FireHD1032 ', 'L option Avec publicités (ou Avec offres spéciales) affiche du contenu sponsorisé sur l écran de verrouillage de votre appareil ainsi qu en mode veille. En savoir plus\r\nÉcran Full HD 10,1\" (25,6 cm), stockage interne de 32 ou 64 Go. Ajoutez jusqu à 1 To de stockage avec une carte microSD (vendue séparément).\r\nRapide et réactive : processeur octocœur puissant et 3 Go de RAM.\r\nAutonomie jusqu à 12 heures et port USB-C pour une charge plus facile. Charge complète en moins de 4 heures (avec câble et adaptateur secteur inclus).\r\nProfitez de vos applications préférées telles que Netflix, Facebook, Instagram, TikTok et bien plus encore via l Amazon Appstore Google Play non pris en charge ; des frais d abonnement peuvent s appliquer. Avec Amazon Prime, accédez à Prime Video, Prime Music et Prime Reading depuis votre tablette Fire. AVERTISSEMENT : Google Play Store n est pas pris en charge sur les tablettes Fire. Certaines applications peuvent ne pas être disponibles.', 12, '349.50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
