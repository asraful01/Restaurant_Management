-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 04:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(15) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_location` char(10) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_location`, `time`) VALUES
(1, 'Best-Chinese', '518,240', 'MON-FRI:10AM-12PM\r\nSAT-SUN:5PM-2PM'),
(2, 'Steak&SeaFood', '15,83', 'MON-FRI:10AM-12PM'),
(3, 'Ittalian-Pizza', '20,09', 'MON-SUN:10AM-12PM'),
(4, 'spanish-Food', '25,17', 'MON-FRI:10AM-12PM'),
(5, 'Thai for YOU', '16,09', 'MON-FRI:10AM-12PM'),
(6, 'Biriyani house(Indian)', '31,31', 'MON-FRI:10AM-12PM'),
(7, 'Philliphiono', '37,83', 'MON-FRI:10AM-12PM'),
(8, 'Macdonalds', '51,35', 'MON-FRI:10AM-12PM'),
(9, 'Red-Robin Bakery', '39,65', 'MON-FRI:10AM-12PM'),
(10, 'Mane Bar', '31,31', 'MON-FRI:10AM-12PM');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(5) NOT NULL,
  `currency_symbol` varchar(15) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_symbol`, `flag`) VALUES
(1, '$', 0),
(2, '$', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE `food_details` (
  `food_id` int(15) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_description` text NOT NULL,
  `food_price` float NOT NULL,
  `food_category` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`food_id`, `food_name`, `food_description`, `food_price`, `food_category`) VALUES
(1, 'TOMATO WITH EGG', 'cooked with onions and scallions in light sauce.', 6.95, 1),
(2, 'CHICKEN JALAPENO(HOT)', 'stir fried with onions, spicy red peppers and jalapeños.', 7.35, 1),
(3, 'GARLIC TOFU EGGPLANT', 'with tofu, cooked in special garlic sauce with scallions.', 6.95, 1),
(4, 'CHICKEN WITH STRING BEANS', 'cooked with garlic in brown sauce.', 7.95, 1),
(5, 'CHICKEN WITH BROCCOLI', 'cooked in brown sauce.', 7.35, 1),
(6, 'FIVE FLAVORED CHICKEN (HOT)', 'served in our special spicy sauce with shredded carrots, celery, and water chestnuts', 8, 1),
(7, 'CHICKEN JALAPENO (HOT)', 'stir fried with onions, spicy red peppers and jalapeños.', 7.35, 1),
(8, 'FIVE FLAVORED SHRIMP (HOT)', 'served in our special spicy sauce with shredded carrots, celery, and water chestnuts.', 8.65, 1),
(9, 'FISH WITH VEGETABLES', 'sliced grouper with broccoli, mushrooms, water chestnuts, bamboo, baby corn, nappa and celery in brown sauce.', 8.95, 1),
(10, 'SPICY FISH (HOT)', 'sliced grouper stir fried with green and red peppers in a special hot ginger sauce', 8.95, 1),
(11, 'SESAME CHICKEN', 'deep fried breaded chicken cooked in a sweet sesame sauce.', 9.05, 1),
(12, '', '', 0, 0),
(14, 'Calamari', 'A house favorite, fried and served with a spicy tomato sauce (sautÃ©ed on request).', 15, 2),
(15, 'Coconut Shrimp', '5 tempura-battered shrimp rolled in coconut and deep fried, served with orange marmalade sauce', 17, 2),
(16, 'Octopus', 'Marinated and charbroiled, served with sautÃ©ed onions, Kalamata olives, and bell peppers. Very tender and delicious.', 18, 2),
(17, 'Shrimp Scampi', '5 seasoned sautÃ©ed black tiger shrimp over arugula, topped with tomato relish and pita croutons', 15, 2),
(18, 'Cheese Pizza', 'Classic cheese or create your own pizza.', 13, 3),
(20, 'Special Pizza', 'Sausage, meatball, pepperoni, mushroom, pepper onions, black olives, & extra cheese.', 22, 3),
(21, 'Veggie Pizza', 'Spinach, broccoli, eggplant, mushrooms, peppers, onions, black olives, & extra cheese.', 22, 3),
(22, 'Sfincione Sicilian Pizza\r\n', 'Spinach, broccoli, eggplant, mushrooms, peppers, onions, black olives, & extra cheese.', 20, 3),
(23, 'Heroes Special', 'Meatball parmigiana, eggplant parmigiana, chicken parmigiana, large salad, and 2-liter soda.', 28.75, 3),
(24, 'Tortilla Española', 'Egg,potato, roasted peppers, olives, onions, smoked paprika aioli', 8, 4),
(25, 'Patatas bravas (5)', 'Crispy potato, ají amarillo, smoked paprika ', 7, 4),
(26, 'Tortilla Española', 'Egg,potato, roasted peppers, olives, onions, smoked paprika aioli', 8, 4),
(27, 'Patatas bravas (5)', 'Crispy potato, ají amarillo, smoked paprika ', 7, 4),
(28, 'Croquetas de pollo', 'Ground chicken, béchamel cheese, smoked paprika aioli  ', 8, 4),
(29, 'Croquetas de Jamón Serrano', 'Serrano ham, Manchego cheese, figs, almonds, roasted garlic aioli ', 9.25, 4),
(30, 'Guacamole', 'creamy avocado, pico de gallo, lemon oil ', 7, 4),
(31, 'Lobster Guacamole', 'Creamy avocado, pico de gallo, lobster ', 11.9, 4),
(32, 'Mexican street corn', 'Grilled sweet corn, chipotle aioli, cotija cheese, tajín lime chili salt ', 6, 4),
(33, 'THAI SPRING ROLL', 'glass noodle & mixed vegetable • sweet chili sauce', 6, 5),
(34, ' FRIED CHICKEN WING', 'seasoned fried chicken wings • sweet chili sauce', 8.75, 5),
(35, ' TOD MUN (FISH CAKE) *', 'fish cake & curry paste • sweet cucumber vinegar', 9, 0),
(36, 'THAI SPRING ROLL', 'glass noodle & mixed vegetable • sweet chili sauce', 6, 5),
(37, ' FRIED CHICKEN WING', 'seasoned fried chicken wings • sweet chili sauce', 8.75, 5),
(38, ' TOD MUN (FISH CAKE) *', 'fish cake & curry paste • sweet cucumber vinegar', 9, 5),
(39, 'THAI VEGETABLE CAKE', 'fried chive & dough â€¢ sweet soy sauce', 8.75, 5),
(40, 'DUCK ROLL', 'roast duck, scallion, cucumber, carrot & ginger wrapped in a thin fresh crepe â€¢ french mustard & hoisin sauce', 7.75, 5),
(41, 'Dahi Batata Puri (v)', 'Potatoes, tamarind & mint chutney, yogurt', 6, 6),
(42, 'Kale Pakoda', 'Ground chickpeas, chat masala, chutneys', 7, 6),
(43, 'Masala Fried Chicken', 'Garam masala, dried mango, potato wedges', 11.22, 6),
(44, 'Chana Masala', 'Chickpeas, mango powder, cumin', 8.99, 6),
(45, 'Seasonal Saag Paneer', 'Seasonal Saag Paneer', 9.99, 6),
(46, 'Mumbai Lamb Curry', 'Slow-cooked lamb, Adda chili blend, onion', 10.99, 6),
(47, 'Chicken Adobo', 'Manok simmered in garlic, sea salt, and soy sauce.', 12, 7),
(49, 'Beef Baka Pares', 'Sweet and spicy braised beef soy sauce, garlic, and Papaâ€™s seasonings.', 15.99, 7),
(50, 'Lechon Kawali', 'Fried chicharron belly.', 17.25, 7),
(51, 'Mushroom & Swiss Burger', 'Mushroom & Swiss Burger', 5, 8),
(52, 'MANGO SUPREME CAKE', 'Three layers of moist white chiffon cake, each layer is filled with mango glaze and our signature cream that is loaded with real Philippine mangoes.', 30, 9),
(53, 'UBE OVERLOAD CAKE', 'Soft ube chiffon cake, each layer filled with our signature cream and real Philippine ube halaya.', 34, 9),
(54, 'CHOCOLATE MOUSSE CAKE', 'Rich chocolate pound cake with delicious chocolate mousse, topped with our signature cream and chocolate chips for a treat like no other.', 22.5, 9),
(56, 'Double Mushroom & Swiss Burger', 'Double Mushroom & Swiss Burger', 6.25, 8),
(57, 'Quarter PounderÂ®* with Cheese', 'Quarter PounderÂ®* with Cheese', 3.45, 8),
(58, 'Bacon Smokehouse Burger', 'Bacon Smokehouse Burger', 4.55, 8),
(59, 'coffee', 'beverage', 2.75, 10),
(60, 'coffee', 'beverage', 3.99, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pizza_admin`
--

CREATE TABLE `pizza_admin` (
  `Admin_ID` int(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_admin`
--

INSERT INTO `pizza_admin` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`) USING BTREE;

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `food_details`
--
ALTER TABLE `food_details`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `pizza_admin`
--
ALTER TABLE `pizza_admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_details`
--
ALTER TABLE `food_details`
  MODIFY `food_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pizza_admin`
--
ALTER TABLE `pizza_admin`
  MODIFY `Admin_ID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
