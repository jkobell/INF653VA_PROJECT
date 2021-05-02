-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 08:24 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inf653project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(101, 'baby'),
(102, 'baked_goods'),
(103, 'beverage'),
(104, 'cleaning_supply'),
(105, 'dairy'),
(106, 'frozen'),
(107, 'laundry'),
(110, 'packaged'),
(111, 'paper_product'),
(112, 'personal_care'),
(113, 'pet'),
(108, 'pharmacy'),
(114, 'produce'),
(115, 'protein'),
(109, 'unspecified');

-- --------------------------------------------------------

--
-- Table structure for table `frequencies`
--

CREATE TABLE `frequencies` (
  `frequencyId` int(11) NOT NULL,
  `frequency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frequencies`
--

INSERT INTO `frequencies` (`frequencyId`, `frequency`) VALUES
(501, 'daily'),
(505, 'monthly'),
(511, 'quarterly'),
(506, 'twice_monthly'),
(507, 'twice_quarterly'),
(504, 'twice_weekly'),
(508, 'twice_yearly'),
(510, 'unspecified'),
(502, 'weekly'),
(509, 'yearly');

-- --------------------------------------------------------

--
-- Table structure for table `listitems`
--

CREATE TABLE `listitems` (
  `listItemId` int(11) NOT NULL,
  `item` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listitems`
--

INSERT INTO `listitems` (`listItemId`, `item`) VALUES
(486, '3_in_one_oil'),
(414, 'acetaminophen '),
(434, 'air_freshner'),
(369, 'ajax_cleaner'),
(409, 'alcohol_rubbing '),
(450, 'aluminum_foil '),
(385, 'ant_bait'),
(403, 'anti_fungal_cream'),
(491, 'apple_butter'),
(256, 'apple_juice'),
(218, 'apples'),
(399, 'aspirin '),
(242, 'avocados'),
(343, 'baby_wipes'),
(435, 'bacon'),
(452, 'baking_powder'),
(453, 'baking_soda'),
(454, 'baking_yeast '),
(222, 'bananas'),
(400, 'bandaids '),
(411, 'bath_soap'),
(465, 'batteries_2a'),
(464, 'batteries_3a'),
(466, 'batteries_d'),
(467, 'batteries_specialty '),
(290, 'beans_dried '),
(248, 'beer'),
(318, 'beets_can'),
(312, 'black_beans_can'),
(282, 'black_pepper'),
(208, 'blueberries'),
(257, 'bread'),
(516, 'Bread_Keto'),
(210, 'broccoli'),
(320, 'broth_chicken'),
(319, 'broth_vegetable'),
(274, 'brownie_mix'),
(285, 'butter'),
(365, 'butter_milk'),
(209, 'cabbage'),
(326, 'cake_ice_cream '),
(325, 'cake_occasion'),
(401, 'campho_phenique'),
(483, 'candles'),
(422, 'candy_bar'),
(284, 'canola_oil'),
(203, 'cantelope'),
(379, 'catfood'),
(212, 'cauliflower '),
(340, 'cereal_cocoa_rice'),
(303, 'cereal_corn_flakes'),
(301, 'cereal_honey_os'),
(302, 'cereal_raisin_bran'),
(304, 'cereal_unspecified'),
(238, 'cheese_block_colby'),
(237, 'cheese_block_mozzarella '),
(239, 'cheese_fresco '),
(235, 'cheese_shredded_mozzarella '),
(234, 'cheese_shredded_sharp '),
(231, 'cheese_sliced_colby  '),
(232, 'cheese_sliced_provolone '),
(233, 'cheese_sliced_swiss'),
(236, 'cheese_sticks'),
(345, 'chicken_frozen'),
(346, 'chicken_thighs_fresh'),
(313, 'chili_beans_can'),
(279, 'chili_powder'),
(426, 'chips_potato'),
(427, 'chips_potato_bbq'),
(425, 'chips_tortilla'),
(310, 'chocolate_chips'),
(216, 'cilantro '),
(459, 'cinnamon_powder  '),
(324, 'cinnamon_rolls'),
(417, 'clothes_pins'),
(311, 'cocoa_powder '),
(298, 'coffee'),
(364, 'coffee_creamer'),
(456, 'coffee_cup'),
(305, 'coffee_filters'),
(306, 'coffee_keurig_cups'),
(370, 'comet_cleaner'),
(261, 'cookies'),
(260, 'cookies_oreos'),
(339, 'cool_whip'),
(315, 'corn_can'),
(245, 'corn_on_cob '),
(240, 'cottage_cheese'),
(323, 'cream_cheese'),
(460, 'creamer_powder'),
(458, 'cumin_powder '),
(402, 'cut_ointment'),
(390, 'deodorant_body'),
(344, 'diapers'),
(469, 'dinner_rolls'),
(373, 'dish_soap'),
(380, 'dogfood'),
(497, 'duck_rubber_toy'),
(360, 'eggs'),
(429, 'english_muffins '),
(421, 'eraser'),
(404, 'feminine_pads'),
(406, 'feminine_pads_thin'),
(347, 'fish_fresh'),
(381, 'fishfood'),
(259, 'flatbread'),
(392, 'floss'),
(391, 'floss_picks'),
(270, 'flour'),
(269, 'flour_allpurpose'),
(247, 'flowers'),
(228, 'fruit_seasonal '),
(447, 'garbage_bags_kitchen'),
(448, 'garbage_bags_lawn'),
(449, 'garbage_bags_small'),
(395, 'garden_plants'),
(396, 'garden_seeds'),
(217, 'garlic'),
(468, 'gift_card'),
(478, 'gift_occasion '),
(412, 'glucosamine_chondroitin '),
(262, 'graham_crackers'),
(446, 'granola_bars'),
(244, 'grapefruits '),
(206, 'grapes'),
(314, 'green_beans_can'),
(299, 'grits'),
(415, 'guaifenesin_tablets'),
(462, 'hair_conditioner'),
(366, 'half_and_half'),
(436, 'ham'),
(457, 'hamburger_buns'),
(490, 'hand_soap_liquid'),
(433, 'honey'),
(309, 'hot_chocolate '),
(413, 'ibuprofen '),
(342, 'ice_cream'),
(350, 'ice_cream_bars'),
(383, 'insect_repellent '),
(503, 'jam_blackberry'),
(512, 'jam_grape'),
(504, 'jam_peach'),
(502, 'jam_strawberry'),
(268, 'jelly_grape'),
(382, 'kitty_litter'),
(445, 'kiwi_fruit'),
(455, 'knife_paring '),
(375, 'laundry_detergent '),
(275, 'lemon_bars_mix'),
(387, 'lemon_juice'),
(280, 'lemon_pepper'),
(224, 'lemons'),
(291, 'lentils'),
(225, 'limes'),
(443, 'louisiana_hot_sauce'),
(230, 'luncheon_meat'),
(377, 'lysol_spray '),
(294, 'macaroni_and_cheese'),
(223, 'mangos'),
(286, 'margarine'),
(482, 'matches'),
(440, 'mayonnaise '),
(358, 'meat_beef_fresh'),
(359, 'meat_beef_ground'),
(357, 'meat_pork_fresh'),
(341, 'meatloaf_frozen'),
(363, 'milk_1_percent'),
(361, 'milk_2_percent'),
(461, 'milk_powdered '),
(362, 'milk_whole'),
(317, 'mixed_vegetables_can'),
(485, 'motor_oil'),
(389, 'mouthwash '),
(371, 'mr_clean_cleaner'),
(205, 'mushrooms'),
(441, 'mustard '),
(354, 'napkins'),
(471, 'noxzema '),
(493, 'nuts_baking'),
(300, 'oatmeal'),
(283, 'olive_oil'),
(278, 'onion_powder'),
(214, 'onions'),
(215, 'onions_long'),
(213, 'onions_red'),
(220, 'oranges'),
(430, 'pancake_mix'),
(356, 'paper_towels'),
(281, 'parsley '),
(267, 'peanut_butter'),
(266, 'peanuts'),
(420, 'pen_writing'),
(419, 'pencil_writing'),
(246, 'peppers_bell'),
(489, 'petroleum_jelly '),
(439, 'pickles_dill'),
(335, 'pie_apple'),
(337, 'pie_cherry'),
(333, 'pie_frozen'),
(338, 'pie_peach'),
(334, 'pie_pumpkin'),
(336, 'pie_sweet_potato'),
(372, 'pinesol_cleaner'),
(423, 'pizza'),
(386, 'plant_food'),
(219, 'plums'),
(515, 'Polish_Furniture'),
(265, 'popcorn'),
(229, 'potato_salad '),
(227, 'potatoes'),
(226, 'potatoes_red'),
(416, 'printer_paper'),
(397, 'protein_shakes'),
(408, 'pseudo_ephedrine '),
(418, 'push_pins'),
(353, 'q_tips'),
(297, 'ramen_soup'),
(495, 'razors '),
(288, 'rice_brown'),
(492, 'rice_cakes'),
(289, 'rice_jasmine'),
(287, 'rice_plain'),
(384, 'roach_bait'),
(296, 'rotel_tomatoes'),
(201, 'salad'),
(488, 'salmon_can'),
(348, 'salmon_fresh'),
(329, 'salmon_frozen'),
(276, 'salt'),
(264, 'saltines'),
(263, 'saltines_wheat'),
(451, 'sandwich_bags'),
(277, 'season_salt'),
(394, 'sewing_needles'),
(393, 'sewing_thread'),
(410, 'shampoo'),
(494, 'shave_cream'),
(331, 'shrimp_fresh'),
(332, 'shrimp_frozen'),
(202, 'slaw'),
(251, 'soda_cola'),
(252, 'soda_lemonlime'),
(253, 'soda_rootbeer'),
(322, 'soup_can_tomato'),
(321, 'soup_can_unspecified'),
(241, 'sour_cream'),
(442, 'soy_sauce'),
(293, 'spaghetti'),
(295, 'spaghetti_sauce'),
(292, 'spaghetti_wheat '),
(211, 'spinach'),
(316, 'spinach_can'),
(374, 'sponges_dish'),
(444, 'sriracha_sauce '),
(480, 'storage_bags_gallon'),
(207, 'strawberries'),
(273, 'sugar_brown'),
(271, 'sugar_cane'),
(272, 'sugar_powder'),
(473, 'sunburn_spray'),
(474, 'sunscreen_lotion'),
(475, 'sunscreen_spray'),
(431, 'syrup '),
(476, 'tablet_writing'),
(405, 'tampons'),
(470, 'tape_scotch'),
(307, 'tea_black'),
(308, 'tea_green'),
(376, 'tide_detergent'),
(328, 'tilapia_frozen'),
(204, 'tofu'),
(355, 'toilet_paper'),
(351, 'tomato_sauce'),
(243, 'tomatoes '),
(388, 'toothpaste'),
(258, 'tortillas'),
(367, 'tortillas_corn'),
(368, 'tortillas_flour'),
(487, 'tuna_can'),
(499, 'turnips'),
(477, 'umbrella'),
(428, 'vanilla_extract '),
(472, 'vapor_rub'),
(352, 'vegetable_juice'),
(327, 'vegetables_frozen'),
(407, 'vitamin_e_capsules '),
(398, 'vitamins'),
(432, 'waffles_frozen'),
(484, 'wasp_spray'),
(254, 'water_bottled'),
(424, 'water_can'),
(255, 'water_distilled'),
(463, 'watermelon '),
(481, 'wax_paper'),
(249, 'wine'),
(250, 'wine_coolers'),
(378, 'wipes_disinfectant '),
(479, 'wrapping_paper'),
(438, 'yogurt_flavored'),
(437, 'yogurt_plain');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `storeId` int(11) NOT NULL,
  `storeName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeId`, `storeName`) VALUES
(801, 'ahold_delhaize'),
(802, 'albertsons'),
(804, 'aldi'),
(805, 'brookshires'),
(806, 'costco'),
(807, 'heb'),
(808, 'hy_vee'),
(809, 'kroger'),
(819, 'local_farmers_market'),
(818, 'neighborhood_walmart'),
(810, 'publix'),
(811, 'safeway'),
(812, 'super_1_foods'),
(813, 'target'),
(814, 'trader_joes'),
(815, 'unspecified'),
(816, 'walmart'),
(817, 'whole_foods');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_user` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `admin_user`, `created`) VALUES
(1002, 'tester0@aol.com', '$2y$10$vFfxHpQTV4KRSm/RCenGeOc4gzJKFOu69BDLYUjaHPer1STUlB17C', 0, '2021-04-20 17:46:00'),
(1004, 'tester1@gmail.com', '$2y$10$AzYUWjFshbgMW75IP3inhuV8MWi8jdNi3362wLUt0U.d30U3y5isC', 0, '2021-04-21 16:45:45'),
(1005, 'tester2@yahoo.com', '$2y$10$ERreA9nDQ1uvXgSS9.k7W.wzUrQfaRQtPXNbAlXLdtUMKAacXCaJq', 0, '2021-04-21 17:37:01'),
(1006, 'tester3@aol.com', '$2y$10$VN/6C.nBo5yU7dtijOSLAuMQX7NlTxx.3yBnppz5sJf7.x5gGKN26', 0, '2021-04-30 15:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `userslistitems`
--

CREATE TABLE `userslistitems` (
  `userListItemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `checked_on_list` tinyint(1) NOT NULL DEFAULT '0',
  `listItemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `categoryId` int(11) NOT NULL,
  `storeId` int(11) NOT NULL,
  `frequencyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userslistitems`
--

INSERT INTO `userslistitems` (`userListItemId`, `userId`, `checked_on_list`, `listItemId`, `quantity`, `categoryId`, `storeId`, `frequencyId`) VALUES
(112, 1005, 0, 333, 1, 104, 807, 504),
(113, 1005, 1, 255, 2, 109, 816, 511),
(114, 1005, 0, 286, 1, 106, 811, 501),
(120, 1002, 0, 222, 5, 114, 819, 502),
(121, 1002, 1, 411, 3, 112, 818, 507),
(123, 1005, 0, 235, 1, 102, 805, 501),
(125, 1005, 0, 359, 1, 114, 812, 505),
(126, 1005, 1, 256, 1, 109, 808, 506),
(127, 1002, 1, 499, 2, 114, 818, 505),
(139, 1002, 0, 504, 1, 110, 804, 511),
(141, 1002, 1, 515, 1, 104, 806, 508),
(143, 1002, 0, 303, 2, 110, 818, 506),
(144, 1002, 0, 328, 1, 106, 818, 505),
(145, 1002, 1, 516, 1, 102, 817, 506);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `categoryName` (`categoryName`);

--
-- Indexes for table `frequencies`
--
ALTER TABLE `frequencies`
  ADD PRIMARY KEY (`frequencyId`),
  ADD UNIQUE KEY `frequency` (`frequency`);

--
-- Indexes for table `listitems`
--
ALTER TABLE `listitems`
  ADD PRIMARY KEY (`listItemId`),
  ADD UNIQUE KEY `item` (`item`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeId`),
  ADD UNIQUE KEY `storeName` (`storeName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `userslistitems`
--
ALTER TABLE `userslistitems`
  ADD PRIMARY KEY (`userListItemId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `listItemId` (`listItemId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `storeId` (`storeId`),
  ADD KEY `frequencyId` (`frequencyId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `frequencies`
--
ALTER TABLE `frequencies`
  MODIFY `frequencyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;
--
-- AUTO_INCREMENT for table `listitems`
--
ALTER TABLE `listitems`
  MODIFY `listItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `storeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=820;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `userslistitems`
--
ALTER TABLE `userslistitems`
  MODIFY `userListItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `userslistitems`
--
ALTER TABLE `userslistitems`
  ADD CONSTRAINT `userslistitems_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userslistitems_ibfk_2` FOREIGN KEY (`listItemId`) REFERENCES `listitems` (`listItemId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userslistitems_ibfk_3` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userslistitems_ibfk_4` FOREIGN KEY (`storeId`) REFERENCES `stores` (`storeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userslistitems_ibfk_5` FOREIGN KEY (`frequencyId`) REFERENCES `frequencies` (`frequencyId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
