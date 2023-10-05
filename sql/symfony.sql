-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2023 at 11:56 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230924175649', '2023-09-24 17:57:41', 188),
('DoctrineMigrations\\Version20230925081752', '2023-09-26 12:44:18', 129),
('DoctrineMigrations\\Version20230926124215', '2023-09-26 12:44:18', 213),
('DoctrineMigrations\\Version20230926130536', '2023-09-26 13:06:00', 35),
('DoctrineMigrations\\Version20230928102739', '2023-09-28 10:28:09', 167),
('DoctrineMigrations\\Version20231002212342', '2023-10-02 21:43:11', 260);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_number` int NOT NULL,
  `customer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_lines`
--

CREATE TABLE `invoice_lines` (
  `id` int NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `vat_amount` decimal(12,2) NOT NULL,
  `total_with_vat` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `price`) VALUES
(1, 'Elektronika (např. telefony, televize, počítače)', 'Většina zboží a služeb', 1000),
(4, 'Domácí spotřebiče (např. ledničky, pračky, trouby)', 'Většina zboží a služeb', 1000),
(5, 'Oděvy a obuv', 'Většina zboží a služeb', 200),
(6, 'Kosmetika a parfémy', 'Většina zboží a služeb', 300),
(7, 'Nábytek', 'Většina zboží a služeb', 450),
(8, 'Automobily a motocykly', 'Většina zboží a služeb', 4000),
(9, 'Stavebnní materiály', 'Většina zboží a služeb', 500),
(10, 'Restaurace a stravování v restauracích', 'Většina zboží a služeb', 50),
(11, 'Vstupenky na kulturní a sportovní akce', 'Většina zboží a služeb', 25),
(12, 'Elektrická energie a plyn', 'Většina zboží a služeb', 10),
(13, 'Luxusní zboží (například šperky, luxusní oblečení)', 'Většina zboží a služeb', 300),
(14, 'Alkoholické nápoje', 'Většina zboží a služeb', 5),
(15, 'Tabákové výrobky', 'Většina zboží a služeb', 5),
(16, 'Telefonní a internetové služby', 'Většina zboží a služeb', 8),
(17, 'Lékárnické výrobky (například léky na předpis)', 'Většina zboží a služeb', 10),
(18, 'Základní potraviny (například chléb, mléko, maso, zelenina, ovoce)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 3),
(19, 'Nápoje (čaj, káva, nealkoholické nápoje)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 3),
(20, 'Zdravotnické pomůcky (například některé druhy obvazů)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 2),
(21, 'Dětské autosedačky', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 15),
(22, 'Městská hromadná doprava (jízdenky na městskou hromadnou dopravu)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 5),
(23, 'Knihy a tiskoviny (například noviny, časopisy)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 10),
(24, 'Vytápění (například palivo, topení)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 10),
(25, 'Školní potřeby a vzdělávací materiály', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 10),
(26, 'Textilie a látky', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 15),
(27, 'Některé zdravotnické prostředky (například jednoduché oční kapky)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 10),
(28, 'Kondomy', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 10),
(29, 'Základní hygienické produkty (toaletní papír, mýdlo)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 2),
(30, 'Voda v lahvích', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 1),
(31, 'Některé hudební nástroje', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 500),
(32, 'Základní zemědělské produkty (například základní obiloviny)', 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů', 20),
(33, 'Kojenecká výživa', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 5),
(34, 'Knihy a časopisy (vydávané a distribuované na fyzických nosičích)', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 15),
(35, 'Pitná voda z vodovodu', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 1),
(36, 'Slabé a nealkoholické pivo', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 3),
(37, 'Některé zemědělské produkty (například ovocné šťávy)', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 3),
(38, 'Zvuková média (CD, gramodesky)', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 10),
(39, 'Dětská obuv', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 50),
(40, 'Výtvarné a ruční práce potřeby', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 70),
(41, 'Letecké a kosmické zájezdy (letecké jízdenky)', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 800),
(42, 'Základní mezinárodní telefonní služby', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 30),
(43, 'Základní internetové služby', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 30),
(44, 'Autobusové jízdenky na meziměstské linky', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 100),
(45, 'Základní telekomunikační služby', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 30),
(46, 'Ruční nástroje a zahradnické nástroje', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 50),
(47, 'Základní spotřební elektronika (například jednoduché hodinky)', 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_72DBDC232989F1FD` (`invoice_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  ADD CONSTRAINT `FK_72DBDC232989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
