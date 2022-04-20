-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 03:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Society Games'),
(2, 'Yugioh Cards'),
(3, 'Fut Cards');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `offer` varchar(2) DEFAULT NULL,
  `datee` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `offer`, `datee`, `image`) VALUES
(1, 1, 'Monopoly-SpeedRapid', 'Monopoly is the fast-dealing property trading game that your will have the whole family buying, selling and having a blast.', 17.50, 12, NULL, '0000-00-00', 'monopoly.jpeg'),
(3, 1, 'Loup Garou', 'Le but des villageois est de découvrir et d\'éliminer les loups-garous, et le but des loups-garous est de ne pas se faire démasquer et d\'éliminer tous les villageois. ... Le jour revenu, tout le monde se réveille et ouvre les yeux et le meneur de jeu révèle l\'identité de la (ou les) victime(s).', 12.00, 0, NULL, '0000-00-00', 'lougarou.jpg'),
(4, 1, 'Secret Hitler', 'Secret Hitler is a board and card game based on hidden identities assigned to each player.', 25.99, 20, NULL, '0000-00-00', 'secrethit.jpg'),
(5, 1, 'Divide and Conquer', 'Divide and Conquer is an abstract strategy board game for 2-4 players. As the Commander of a battalion of troops, you plan out and execute troop movements to secure objective regions around the game board. Your opponent’s competing troops will cause you to tangle and engage in conflict taking on causalities and slowing your pace to victory. You must anticipate the other players’ strategies by moving with precision and seizing the initiative. Sometimes your position is defensive to block an opponent from an objective and other times you are invading occupied regions to weaken the offensive of another player.', 21.99, 0, NULL, '0000-00-00', 'ww.jpg'),
(16, 3, 'Daniel (Rabais !)', 'Dan ur trash ! git gud...', -5.00, 3, NULL, '0000-00-00', 'dan.png'),
(17, 3, 'Wammni', 'Player Cards or Player Items are the items that represent a football player in FIFA Ultimate Team. A player card contains information & stats of a real life footballer and is categorised based on the player\'s type and quality. FUT player card types are available as Standard (Regular), Rare and Special.', 250.00, 0, NULL, '0000-00-00', 'wamni.png'),
(24, 3, 'Sadio', 'Player Cards or Player Items are the items that represent a football player in FIFA Ultimate Team. A player card contains information & stats of a real life footballer and is categorised based on the player\'s type and quality. FUT player card types are available as Standard (Regular), Rare and Special.', 240.00, 0, NULL, '0000-00-00', 'sadio.png'),
(25, 3, 'Alphonso Davis', 'Player Cards or Player Items are the items that represent a football player in FIFA Ultimate Team. A player card contains information & stats of a real life footballer and is categorised based on the player\'s type and quality. FUT player card types are available as Standard (Regular), Rare and Special.', 190.00, 0, NULL, '0000-00-00', 'davis.png'),
(26, 3, 'SoufianeJD', 'It\'s been a good year for FIFA 20 Icons, with Zinedine Zidane and Ronald Koeman among the new old faces in this year\'s game. But that hasn\'t stopped us being greedy for more. With FIFA 20 approaching the end of its life cycle and FIFA 21 mere months away, below we take a look at the past, present and future of football – running down the best additions to this year\'s game, and those GR hopes to make the cut next year. Let\'s get your FIFA 20 Icons guide underway.', 250.00, 10, NULL, '0000-00-00', 'sou.png'),
(27, 3, 'Mathieu', 'Player Cards or Player Items are the items that represent a football player in FIFA Ultimate Team. A player card contains information & stats of a real life footballer and is categorised based on the player\'s type and quality. FUT player card types are available as Standard (Regular), Rare and Special.', 51.00, 0, NULL, '0000-00-00', 'mat.png'),
(29, 2, 'Blue eyes white dragon', 'A legendary dragon that takes pride in its enormous power. Its power of destruction far exceeds comprehension. ... This legendary dragon is a powerful engine of destruction. Virtually invincible, very few have faced this awesome creature and lived to tell the tale.', 2.99, 0, NULL, '0000-00-00', 'card1.jpg'),
(30, 2, 'Dark Magician', 'A sinister spellcaster who possesses both power and defense. He is among the best of all Magicians. The ultimate wizard in terms of attack and defense. The ultimate wizard in terms of attack and didense.', 1.99, 0, NULL, '0000-00-00', 'card2.jpg'),
(33, 2, 'Magician girl', 'A beautiful female counterpart to the male Dark Magician. She powers up if there is a Dark Magician in the graveyard. Increase the ATK of this monster by 300 points for each \"Dark Magician\" or \"Magician of Black Chaos\" in either player\'s Graveyard.', 1.50, 0, NULL, '0000-00-00', 'card3.jpg'),
(34, 2, 'Sliver Sky Dragon', 'Although support for all 3 God cards exist in the TCG/OCG, most of the support is focused specifically on “Ra”, with the other two Gods getting much more minor levels of support in comparison, however said support has boosted their summoning speed and general effectiveness significantly. ', 25.00, 0, NULL, '0000-00-00', 'card4.webp'),
(35, 2, 'Dragon Of Ra', 'Although support for all 3 God cards exist in the TCG/OCG, most of the support is focused specifically on “Ra”, with the other two Gods getting much more minor levels of support in comparison, however said support has boosted their summoning speed and general effectiveness significantly. ', 25.00, 0, NULL, '0000-00-00', 'card5.jpg'),
(36, 2, 'Obelisk The Terminator', 'Although support for all 3 God cards exist in the TCG/OCG, most of the support is focused specifically on “Ra”, with the other two Gods getting much more minor levels of support in comparison, however said support has boosted their summoning speed and general effectiveness significantly. ', 25.00, 0, NULL, '0000-00-00', 'card6.png'),
(37, 1, 'Cards against humanity', 'Red Box. The Red Box contains 300 cards you can add to your deck of Cards Against Humanity, making it a better bludgeoning weapon against home invaders.', 15.99, 5, NULL, '0000-00-00', 'cards.jpg'),
(38, 1, 'Clue', 'Classic mystery solving fun. Clue is still a fantastic family board game! With hundreds (if not thousands) of new board games and card games being published every year, it\'s refreshing to pull out a classic family board game and still have a fantastic time together.', 14.99, 10, NULL, '0000-00-00', 'clue.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `pw`, `role`) VALUES
(12, 'Soufiane', 'Jaida', 'client@gmail.com', '$2y$04$emSiTj66..dM3prMjybrv.yY1RA3y/iX7PxVT3vaaMy.KS7zqLb5W', 'user'),
(13, 'Admin', 'Admin', 'admin@gmail.com', '$2y$04$PNKzFbqWQs2cffH006M9gOH/FJNi2FEAdbj/Q3vuZnMKNAq33Q8C.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
