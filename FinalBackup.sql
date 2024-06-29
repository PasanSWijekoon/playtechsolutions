-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for eshop
CREATE DATABASE IF NOT EXISTS `eshop` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eshop`;

-- Dumping structure for table eshop.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.admin: ~1 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`, `password`) VALUES
	('Admin@playtech.com', 'Admin', 'Admin', NULL, 'Java@8828'),
	('anandawijekoon533@gmail.com', 'Ananda', 'Wijekoon', '667d8d635ed7c', 'Java@8828');

-- Dumping structure for table eshop.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK1_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.brand: ~11 rows (approximately)
INSERT INTO `brand` (`id`, `name`, `category_id`) VALUES
	(1, 'Samsung', 1),
	(2, 'Sony', 1),
	(3, 'Oppo', 1),
	(4, 'Huawei', 1),
	(5, 'Apple', 1),
	(6, 'MSI', 4),
	(7, 'Mac', 4),
	(8, 'XBOX', 2),
	(9, 'Phillips', 3),
	(10, 'Ninja', 3),
	(11, 'Nintendo', 2),
	(12, 'HTC', 1),
	(13, 'JeoDel', 3);

-- Dumping structure for table eshop.brand_has_model
CREATE TABLE IF NOT EXISTS `brand_has_model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int DEFAULT NULL,
  `model_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `model_id` (`model_id`),
  CONSTRAINT `fk_brand_has_model_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_brand_has_model_model` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.brand_has_model: ~33 rows (approximately)
INSERT INTO `brand_has_model` (`id`, `brand_id`, `model_id`) VALUES
	(1, 5, 2),
	(2, 5, 6),
	(3, 4, 4),
	(4, 3, 7),
	(5, 1, 5),
	(6, 2, 3),
	(7, 2, 1),
	(8, 1, 8),
	(9, 5, 2),
	(10, 5, 2),
	(11, 5, 2),
	(12, 5, 2),
	(13, 5, 2),
	(14, 5, 2),
	(15, 5, 2),
	(16, 5, 2),
	(17, 5, 2),
	(18, 5, 2),
	(19, 5, 2),
	(20, 5, 2),
	(21, 6, 9),
	(22, 6, 10),
	(23, 6, 11),
	(24, 6, 12),
	(25, 8, 13),
	(26, 8, 14),
	(27, 8, 15),
	(28, 9, 16),
	(29, 10, 17),
	(31, 9, 18),
	(32, 9, 19),
	(33, 11, 20),
	(34, 3, 21),
	(35, 1, 1),
	(36, 1, 2),
	(37, 1, 22),
	(38, 1, 23),
	(39, 3, 24);

-- Dumping structure for table eshop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `FK_cart_eshop.product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_cart_eshop.user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.cart: ~1 rows (approximately)
INSERT INTO `cart` (`id`, `qty`, `product_id`, `user_email`) VALUES
	(55, 13, 36, 'pasanwijekoon1@gmail.com');

-- Dumping structure for table eshop.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.category: ~4 rows (approximately)
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Mobile  Phones and Accessories'),
	(2, 'Video Game Controllers'),
	(3, 'Air Fryer'),
	(4, ' Laptops ');

-- Dumping structure for table eshop.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `from` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  `to` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `from` (`from`),
  KEY `to` (`to`),
  CONSTRAINT `FK_chat_eshop.user` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `FK_chat_eshop.user_2` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.chat: ~0 rows (approximately)
INSERT INTO `chat` (`id`, `content`, `from`, `date_time`, `status`, `to`) VALUES
	(40, 'sfsd', 'anjanainduwara.123@gmail.com', '2024-06-27 22:02:22', 1, 'wijekoonpasan055@gmail.com');

-- Dumping structure for table eshop.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.city: ~4 rows (approximately)
INSERT INTO `city` (`id`, `name`, `district_id`) VALUES
	(1, 'Anuradhapura', 1),
	(2, 'Horana', 2),
	(3, 'Nittambuwa', 3),
	(4, 'Galnawa', 1);

-- Dumping structure for table eshop.colour
CREATE TABLE IF NOT EXISTS `colour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.colour: ~8 rows (approximately)
INSERT INTO `colour` (`id`, `name`) VALUES
	(1, 'Black'),
	(2, 'White'),
	(3, 'Red'),
	(4, 'Blue'),
	(5, 'Silver'),
	(6, 'Green'),
	(7, 'Purple'),
	(8, 'Pink'),
	(9, 'Navy Blue'),
	(10, 'Navy Green');

-- Dumping structure for table eshop.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.condition: ~2 rows (approximately)
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Brand New'),
	(2, 'Used');

-- Dumping structure for table eshop.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.district: ~3 rows (approximately)
INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Anuradhapura', 1),
	(2, 'Colombo', 2),
	(3, 'Gampha', 2);

-- Dumping structure for table eshop.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `feedback` text NOT NULL,
  `date` datetime NOT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `FK_feedback_eshop.product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_feedback_eshop.user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.feedback: ~2 rows (approximately)
INSERT INTO `feedback` (`id`, `type`, `feedback`, `date`, `product_id`, `user_email`) VALUES
	(7, 1, 'Good', '2024-06-27 09:21:05', 5, 'wijekoonpasan055@gmail.com'),
	(9, 1, 'goood', '2024-06-28 19:32:12', 27, 'pasanwijekoon1@gmail.com');

-- Dumping structure for table eshop.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL,
  `gender_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.gender: ~2 rows (approximately)
INSERT INTO `gender` (`id`, `gender_name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table eshop.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.images: ~35 rows (approximately)
INSERT INTO `images` (`code`, `product_id`) VALUES
	('resource/Products/Sony Xperia0667bc4ec84457.jpeg', 1),
	('resource/Products/Sony Xperia1667bc4ec84d94.jpeg', 1),
	('resource/Products/Sony Xperia2667bc4ec85a3f.jpeg', 1),
	('resource/Products/Iphone120667bc4cb5b19c.jpeg', 2),
	('resource/Products/Iphone121667bc4cb5c04a.jpeg', 2),
	('resource/Products/Iphone122667bc4cb5cdd7.jpeg', 2),
	('resource\\mobile phones\\htc u.jpg', 3),
	('resource\\mobile phones\\huawei P20.jpg', 4),
	('resource/Products/Samsung Galaxy0667bc49a1298a.jpeg', 5),
	('resource/Products/Samsung Galaxy1667bc49a13f37.jpeg', 5),
	('resource/Products/Samsung Galaxy2667bc49a14c2f.jpeg', 5),
	('resource\\mobile phones\\iphone x.jpg', 6),
	('resource\\mobile phones\\Oppo A 95.jpg', 7),
	('resource\\mobile phones\\green.jpg', 8),
	('resource\\mobile phones\\purple2.webp', 13),
	('resource\\mobile phones\\flip.jpg', 14),
	('resource\\msi.jpg', 15),
	('resource\\msi katana gf66.jpg', 16),
	('resource\\msi plus gl66 15.6.jpg', 17),
	('resource\\MSI Raider.jpg', 18),
	('resource\\xbox wireless controller.jpg', 19),
	('resource\\wired box controller.jpg', 20),
	('resource\\red.jpg', 21),
	('resource\\philips air fryer.jpg', 22),
	('resource\\ninja air fryer.jpg', 23),
	('resource\\phillips white.jpg', 24),
	('resource\\pink.jpg', 25),
	('resource\\nintendo.jpg', 26),
	('resource/Products/ZTE Blade A5 20200667da23a8ed45.jpeg', 27),
	('resource/Products/ZTE Blade A5 20201667da23a8fe43.jpeg', 27),
	('resource/Products/ZTE Blade A5 20202667da23a907c7.jpeg', 27),
	('resource/Products/Samsung Note 100667e9d7cb29b3.jpeg', 36),
	('resource/Products/Samsung Note 101667e9d7cb3a2e.jpeg', 36),
	('resource/Products/Samsung Note 102667e9d7cb4490.jpeg', 36),
	('resource/Products/Samsung A150667ec34436314.jpeg', 37),
	('resource/Products/Samsung A151667ec34436e98.jpeg', 37),
	('resource/Products/Samsung A152667ec34437977.jpeg', 37);

-- Dumping structure for table eshop.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `FK_invoice_eshop.product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_invoice_eshop.user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.invoice: ~7 rows (approximately)
INSERT INTO `invoice` (`id`, `order_id`, `date`, `total`, `qty`, `status`, `product_id`, `user_email`) VALUES
	(15, '667cb8c3666f3', '2024-06-27 06:27:02', 46000, 1, 0, 13, 'wijekoonpasan055@gmail.com'),
	(16, '667cbbe854eb5', '2024-06-27 06:40:25', 30700, 1, 0, 27, 'wijekoonpasan055@gmail.com'),
	(17, '667d0e43383fd', '2024-06-27 12:33:49', 30700, 1, 0, 27, 'wijekoonpasan055@gmail.com'),
	(18, '667dab6a73b18', '2024-06-27 23:42:26', 30700, 1, 0, 27, 'wijekoonpasan055@gmail.com'),
	(19, '667de7720914c', '2024-06-28 03:58:44', 2700, 1, 0, 26, 'wijekoonpasan055@gmail.com'),
	(20, '667df97ae7993', '2024-06-28 05:15:37', 2300, 1, 0, 19, 'wijekoonpasan055@gmail.com'),
	(21, '667eaf6d5b3cc', '2024-06-28 18:12:17', 35700, 1, 0, 27, 'pasanwijekoon1@gmail.com'),
	(22, '667ec216c5b48', '2024-06-28 19:31:29', 35450, 1, 0, 36, 'pasanwijekoon1@gmail.com');

-- Dumping structure for table eshop.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.model: ~21 rows (approximately)
INSERT INTO `model` (`id`, `name`) VALUES
	(1, 'Xperia'),
	(2, 'Iphone 12'),
	(3, 'HTC U'),
	(4, 'P20'),
	(5, 'Galaxy'),
	(6, 'Iphone X'),
	(7, 'A 95'),
	(8, 'Flip'),
	(9, 'MSI Roger'),
	(10, 'MSI Katana Gf66'),
	(11, 'MSI Plus GL66'),
	(12, 'MSI Raider'),
	(13, 'Xbox Wireless Controller'),
	(14, 'Xbox Wired Controller'),
	(15, 'Xbox Controller Red Version'),
	(16, 'Phillips Air Fryer'),
	(17, 'Ninja Air Fryer'),
	(18, 'Phillips White Air Fryer'),
	(19, 'Phillips Pink Air Fryer'),
	(20, 'Nintendo Controller'),
	(21, 'Oppo A 57'),
	(22, 'Galaxy J7'),
	(23, 'Galaxy M02'),
	(24, 'White A 78');

-- Dumping structure for table eshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `brand_has_model_id` int NOT NULL,
  `colour_id` int NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `title` varchar(100) DEFAULT NULL,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_brand_has_model1_idx` (`brand_has_model_id`),
  KEY `fk_product_colour1_idx` (`colour_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  KEY `fk_product_category1_idx` (`category_id`) USING BTREE,
  CONSTRAINT `fk_product_brand_has_model1` FOREIGN KEY (`brand_has_model_id`) REFERENCES `brand_has_model` (`id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_colour1` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.product: ~23 rows (approximately)
INSERT INTO `product` (`id`, `category_id`, `brand_has_model_id`, `colour_id`, `price`, `qty`, `description`, `title`, `condition_id`, `status_id`, `user_email`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`) VALUES
	(1, 1, 7, 2, 76000, 10, 'Good', 'Sony Xperia', 1, 2, 'wijekoonpasan055@gmail.com', '2022-10-06 14:14:49', 300, 200),
	(2, 1, 1, 1, 65000, 5, 'Good', 'Iphone12', 1, 2, 'wijekoonpasan055@gmail.com', '2022-10-06 14:17:35', 200, 200),
	(3, 1, 6, 3, 94000, 8, 'Good', 'HTC U', 2, 1, 'wijekoonpasan055@gmail.com', '2022-10-06 14:19:05', 200, 567),
	(4, 1, 3, 5, 55000, 3, 'Good', 'Huawei P20', 1, 1, 'wijekoonpasan055@gmail.com', '2022-10-06 14:20:26', 780, 340),
	(5, 1, 5, 2, 54000, 89, 'Good', 'Samsung Galaxy', 2, 2, 'wijekoonpasan055@gmail.com', '2022-10-06 14:21:44', 678, 200),
	(6, 1, 2, 5, 55000, 7, 'Good', 'Iphone X', 1, 2, 'wijekoonpasan055@gmail.com', '2022-10-06 14:24:02', 800, 300),
	(7, 1, 4, 3, 55000, 6, 'Good', 'Oppo A 95', 1, 2, 'wijekoonpasan055@gmail.com', '2022-10-06 14:26:16', 780, 890),
	(8, 1, 9, 6, 53000, 2, 'Good', 'Iphone 12', 1, 1, 'wijekoonpasan055@gmail.com', '2022-10-26 13:08:10', 340, 800),
	(13, 1, 20, 7, 85000, 49, 'good', 'Iphone 12', 1, 1, 'wijekoonpasan055@gmail.com', '2022-11-15 12:08:32', 500, 1000),
	(14, 1, 8, 1, 95000, 4, 'good', 'Samsung Flip', 1, 1, 'wijekoonpasan055@gmail.com', '2022-11-15 13:08:24', 600, 700),
	(15, 4, 21, 1, 100000, 10, 'good', 'MSI Roger', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 16:00:02', 800, 700),
	(16, 4, 22, 1, 200000, 78, 'Good', 'Msi Katana', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 16:05:16', 100000, 100000),
	(17, 4, 23, 1, 78000, 10, 'Good', 'MSI Plus GL66', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 16:11:12', 900, 1000),
	(18, 4, 24, 1, 60000, 5, 'Good', 'MSI Raider', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 18:55:38', 200, 300),
	(19, 2, 25, 1, 20000, 3, 'Not Good', 'Xbox Wireless Controller', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 19:15:45', 100, 300),
	(20, 2, 26, 1, 30000, 5, 'Good', 'Xbox Wired Controller', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 19:21:11', 50, 56),
	(21, 2, 27, 3, 34000, 7, 'good', 'Xbox Controller Red Version', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-01 19:26:04', 300, 400),
	(22, 3, 28, 1, 56000, 100, 'Good', 'Phillips Air Fryer', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-02 08:03:08', 500, 800),
	(23, 3, 29, 1, 78000, 20, 'Good', 'Ninja Air Fryer', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-02 08:06:41', 200, 300),
	(24, 3, 31, 2, 80000, 10, 'Good', 'Phillips White Air Fryer', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-02 08:12:41', 100, 400),
	(25, 3, 32, 8, 80000, 4, 'Good', 'Phillips Pink Version', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-02 08:17:08', 500, 400),
	(26, 2, 33, 1, 70000, 4, 'Good', 'Nintendo Controller', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-02 08:23:18', 400, 700),
	(27, 1, 34, 1, 35000, 0, '6.008 inch HD water-drop notch display ,\r\n‘Dual rear cameras (13MP+2MP),\r\n8MP Front camera,\r\nFace deduction & bokeh,\r\nOcta core CPU,\r\n3200mAh Battery,\r\n2GB Ram with 32GB Rom,', 'ZTE Blade A5 2020', 1, 1, 'wijekoonpasan055@gmail.com', '2022-12-02 08:47:21', 500, 700),
	(36, 1, 5, 2, 35000, 9, 'Re-engineered nightography camera\r\nRevolutionary gaming processor\r\nMore innovation less footprint\r\nS-Pen Notes signature tool coms built in\r\n200MP Wide-angle camera', 'Samsung Note 10', 1, 1, 'pasanwijekoon1@gmail.com', '2024-06-28 16:54:44', 350, 450),
	(37, 1, 5, 1, 50000, 10, 'good', 'Samsung A15', 1, 1, 'pasanwijekoon1@gmail.com', '2024-06-28 19:35:26', 400, 450);

-- Dumping structure for table eshop.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.profile_image: ~2 rows (approximately)
INSERT INTO `profile_image` (`path`, `user_email`) VALUES
	('assets/img/customer/kaluwa_6679d2a709a9c.jpeg', 'san@gmail.com'),
	('assets/img/customer/Pasan_6679d1c5bca4f.png', 'wijekoonpasan055@gmail.com'),
	('assets/img/customer/Pasan_6679ddb2aba2c.jpeg', 'loma48276@gmail.com');

-- Dumping structure for table eshop.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.province: ~9 rows (approximately)
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'NorthCentral'),
	(2, 'Western'),
	(3, 'Nothern'),
	(4, 'Southern'),
	(5, 'Uwa'),
	(6, 'Sabaragamuwa'),
	(7, 'Eastern'),
	(8, 'North Westen'),
	(9, 'Central');

-- Dumping structure for table eshop.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `FK_recent_eshop.product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_recent_eshop.user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.recent: ~71 rows (approximately)
INSERT INTO `recent` (`id`, `product_id`, `user_email`) VALUES
	(1, 6, 'wijekoonpasan055@gmail.com'),
	(2, 6, 'wijekoonpasan055@gmail.com'),
	(3, 8, 'wijekoonpasan055@gmail.com'),
	(4, 6, 'wijekoonpasan055@gmail.com'),
	(5, 5, 'wijekoonpasan055@gmail.com'),
	(6, 8, 'wijekoonpasan055@gmail.com'),
	(7, 6, 'wijekoonpasan055@gmail.com'),
	(8, 8, 'wijekoonpasan055@gmail.com'),
	(9, 6, 'wijekoonpasan055@gmail.com'),
	(10, 8, 'wijekoonpasan055@gmail.com'),
	(11, 8, 'wijekoonpasan055@gmail.com'),
	(12, 6, 'wijekoonpasan055@gmail.com'),
	(13, 5, 'wijekoonpasan055@gmail.com'),
	(14, 4, 'wijekoonpasan055@gmail.com'),
	(15, 8, 'wijekoonpasan055@gmail.com'),
	(16, 8, 'wijekoonpasan055@gmail.com'),
	(17, 6, 'wijekoonpasan055@gmail.com'),
	(18, 5, 'wijekoonpasan055@gmail.com'),
	(19, 4, 'wijekoonpasan055@gmail.com'),
	(20, 8, 'wijekoonpasan055@gmail.com'),
	(21, 8, 'wijekoonpasan055@gmail.com'),
	(22, 6, 'wijekoonpasan055@gmail.com'),
	(23, 8, 'wijekoonpasan055@gmail.com'),
	(24, 5, 'wijekoonpasan055@gmail.com'),
	(25, 8, 'wijekoonpasan055@gmail.com'),
	(26, 6, 'wijekoonpasan055@gmail.com'),
	(27, 4, 'wijekoonpasan055@gmail.com'),
	(28, 5, 'wijekoonpasan055@gmail.com'),
	(29, 8, 'wijekoonpasan055@gmail.com'),
	(30, 5, 'wijekoonpasan055@gmail.com'),
	(31, 6, 'wijekoonpasan055@gmail.com'),
	(32, 4, 'wijekoonpasan055@gmail.com'),
	(33, 6, 'wijekoonpasan055@gmail.com'),
	(34, 14, 'wijekoonpasan055@gmail.com'),
	(35, 4, 'wijekoonpasan055@gmail.com'),
	(36, 8, 'wijekoonpasan055@gmail.com'),
	(37, 14, 'wijekoonpasan055@gmail.com'),
	(38, 14, 'wijekoonpasan055@gmail.com'),
	(39, 8, 'wijekoonpasan055@gmail.com'),
	(40, 13, 'wijekoonpasan055@gmail.com'),
	(41, 14, 'wijekoonpasan055@gmail.com'),
	(42, 13, 'wijekoonpasan055@gmail.com'),
	(43, 16, 'wijekoonpasan055@gmail.com'),
	(44, 16, 'wijekoonpasan055@gmail.com'),
	(45, 14, 'wijekoonpasan055@gmail.com'),
	(46, 8, 'wijekoonpasan055@gmail.com'),
	(47, 21, 'wijekoonpasan055@gmail.com'),
	(48, 25, 'wijekoonpasan055@gmail.com'),
	(49, 24, 'wijekoonpasan055@gmail.com'),
	(50, 27, 'wijekoonpasan055@gmail.com'),
	(51, 13, 'wijekoonpasan055@gmail.com'),
	(52, 17, 'wijekoonpasan055@gmail.com'),
	(53, 27, 'wijekoonpasan055@gmail.com'),
	(54, 27, 'wijekoonpasan055@gmail.com'),
	(55, 27, 'wijekoonpasan055@gmail.com'),
	(56, 14, 'wijekoonpasan055@gmail.com'),
	(57, 13, 'wijekoonpasan055@gmail.com'),
	(58, 8, 'wijekoonpasan055@gmail.com'),
	(59, 19, 'wijekoonpasan055@gmail.com'),
	(60, 27, 'wijekoonpasan055@gmail.com'),
	(61, 18, 'wijekoonpasan055@gmail.com'),
	(62, 1, 'wijekoonpasan055@gmail.com'),
	(63, 27, 'wijekoonpasan055@gmail.com'),
	(64, 14, 'wijekoonpasan055@gmail.com'),
	(65, 13, 'wijekoonpasan055@gmail.com'),
	(66, 8, 'wijekoonpasan055@gmail.com'),
	(67, 27, 'wijekoonpasan055@gmail.com'),
	(68, 27, 'wijekoonpasan055@gmail.com'),
	(69, 14, 'wijekoonpasan055@gmail.com'),
	(70, 13, 'wijekoonpasan055@gmail.com'),
	(71, 27, 'wijekoonpasan055@gmail.com'),
	(72, 27, 'wijekoonpasan055@gmail.com'),
	(73, 27, 'wijekoonpasan055@gmail.com'),
	(74, 27, 'wijekoonpasan055@gmail.com'),
	(75, 13, 'wijekoonpasan055@gmail.com'),
	(76, 14, 'wijekoonpasan055@gmail.com'),
	(77, 14, 'wijekoonpasan055@gmail.com'),
	(78, 27, 'wijekoonpasan055@gmail.com'),
	(79, 27, 'wijekoonpasan055@gmail.com');

-- Dumping structure for table eshop.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.status: ~2 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');

-- Dumping structure for table eshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.user: ~10 rows (approximately)
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `joined_date`, `verification_code`, `status`, `gender_id`) VALUES
	('anjanainduwara.123@gmail.com', 'Anjana', 'Wijekoon', 'Lenavo@8828', '0765498828', '2024-04-01 12:49:32', '66787de1780ff', 1, 1),
	('grodddupvifosne@gmail.com', 'Shantha', 'peris', 'Java@*828', '0719376489', '2024-06-25 00:02:29', NULL, 1, 1),
	('groupvifosne@gmail.com', 'Pasan', 'Wijekoon', 'Java@8828', '0765498870', '2024-06-22 22:16:51', '66787ec16aee7', 1, 1),
	('loma48276@gmail.com', 'Pasan', 'Wijekoon', 'Java@8828', '0719376447', '2024-06-22 22:13:29', NULL, 1, 1),
	('loma4827d6@gmail.com', 'Pasan', 'Wijekoon', '12345', '0719376467', '2024-06-22 22:23:21', NULL, 1, 1),
	('loma482ss76@gmail.com', 'Json', 'Sudira', 'Java@8828', '0719376557', '2024-06-22 22:28:01', NULL, 1, 1),
	('lomass48276@gmail.com', 'Hihy', 'hiks', 'Java@8882', '0719376449', '2024-06-22 22:30:29', NULL, 1, 1),
	('Nimesha@gmail.com', 'Saduni', 'Nimeha', 'Java@8828', '071937644j', '2024-06-28 16:36:56', NULL, 1, 2),
	('pasanwijekoon1@gmail.com', 'Luffy', 'Silva', 'Java@6447', '0719376559', '2024-06-28 16:45:15', '667e9b604ab15', 1, 1),
	('san@gmail.com', 'kaluwa', 'Dason', 'Java@8828', '0713978447', '2024-06-22 22:31:46', NULL, 1, 1),
	('wijekoonpasan055@gmail.com', 'Pasan', 'Wijekoon', 'Java@8828', '+94712584756', '2022-09-29 11:26:06', '6679b94770d8c', 1, 1);

-- Dumping structure for table eshop.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.user_has_address: ~0 rows (approximately)
INSERT INTO `user_has_address` (`id`, `line1`, `line2`, `postal_code`, `user_email`, `city_id`) VALUES
	(1, '90', 'Abayapura/Anuradhapura', '60000', 'wijekoonpasan055@gmail.com', 4),
	(2, 'Kalawana Road Mihiripanna', 'Sagathe', '50000', 'loma48276@gmail.com', 1),
	(3, 'Kolaba', 'Pannipitiya', '50000', 'pasanwijekoon1@gmail.com', 1);

-- Dumping structure for table eshop.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `FK_watchlist_eshop.product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_watchlist_eshop.user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table eshop.watchlist: ~1 rows (approximately)
INSERT INTO `watchlist` (`id`, `product_id`, `user_email`) VALUES
	(101, 36, 'pasanwijekoon1@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
