-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.32 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for parlo
CREATE DATABASE IF NOT EXISTS `parlo` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `parlo`;

-- Dumping structure for table parlo.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.admin: ~1 rows (approximately)
REPLACE INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
	(1, 'Manilka', '405090');

-- Dumping structure for table parlo.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `cart_qty` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_customer1_idx` (`customer_id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  CONSTRAINT `fk_cart_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.cart: ~0 rows (approximately)

-- Dumping structure for table parlo.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_firstname` varchar(30) NOT NULL,
  `customer_lastname` varchar(30) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_contactno` varchar(10) NOT NULL,
  `customer_password` varchar(45) NOT NULL,
  `customer_registedon` datetime NOT NULL,
  `customer_verification` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.customer: ~3 rows (approximately)
REPLACE INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_contactno`, `customer_password`, `customer_registedon`, `customer_verification`) VALUES
	(24, 'Manilka', 'vinduwara', 'mvinduwara@gmail.com', '0712739342', '405090', '2025-07-18 18:57:06', 'Verified'),
	(27, 'Manilka', 'vinduwara', 'manilka.codefiline@gmail.com', '0712739346', '405090', '2025-08-14 09:41:53', 'Verified'),
	(28, 'Manilka', 'vinduwara', 'manilka.codefiline@gmail.com', '0712739346', '405090', '2025-08-14 09:41:53', '076565');

-- Dumping structure for table parlo.customer_address
CREATE TABLE IF NOT EXISTS `customer_address` (
  `customer_address_id` int NOT NULL AUTO_INCREMENT,
  `customer_address_line01` varchar(45) NOT NULL,
  `customer_address_line02` varchar(45) NOT NULL,
  `customer_address_city` varchar(45) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `customer_id` int NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`customer_address_id`),
  KEY `fk_customer_address_customer1_idx` (`customer_id`),
  CONSTRAINT `fk_customer_address_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.customer_address: ~3 rows (approximately)
REPLACE INTO `customer_address` (`customer_address_id`, `customer_address_line01`, `customer_address_line02`, `customer_address_city`, `postal_code`, `customer_id`, `firstname`, `lastname`, `mobile`) VALUES
	(7, '20F yakahaluwa', 'kiriwaththuduwa', 'Colombo', '10200', 24, NULL, NULL, NULL),
	(12, '20F yakahaluwa', 'Colombo', 'pitipana', '10200', 24, NULL, NULL, NULL),
	(13, '20F Yakahaluwa ', 'kiriwathtuduwa', 'Homagama', '10200', 27, NULL, NULL, NULL);

-- Dumping structure for table parlo.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `orders_id` int NOT NULL AUTO_INCREMENT,
  `order_created_date` datetime NOT NULL,
  `customer_address_id` int NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`orders_id`),
  KEY `fk_orders_customer_address1_idx` (`customer_address_id`),
  KEY `fk_orders_customer1_idx` (`customer_id`),
  CONSTRAINT `fk_orders_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_orders_customer_address1` FOREIGN KEY (`customer_address_id`) REFERENCES `customer_address` (`customer_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.orders: ~1 rows (approximately)
REPLACE INTO `orders` (`orders_id`, `order_created_date`, `customer_address_id`, `customer_id`) VALUES
	(23, '2025-08-14 09:44:10', 13, 27);

-- Dumping structure for table parlo.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_items_id` int NOT NULL AUTO_INCREMENT,
  `order_items_qty` int NOT NULL,
  `product_id` int NOT NULL,
  `order_status` int NOT NULL,
  `product_delivery` int NOT NULL,
  `orders_orders_id` int NOT NULL,
  PRIMARY KEY (`order_items_id`),
  KEY `fk_order_items_product1_idx` (`product_id`),
  KEY `fk_order_items_order_status1_idx` (`order_status`),
  KEY `fk_order_items_product_delivery1_idx` (`product_delivery`),
  KEY `fk_order_items_orders1_idx` (`orders_orders_id`),
  CONSTRAINT `fk_order_items_order_status1` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`order_status_id`),
  CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`orders_orders_id`) REFERENCES `orders` (`orders_id`),
  CONSTRAINT `fk_order_items_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_order_items_product_delivery1` FOREIGN KEY (`product_delivery`) REFERENCES `product_delivery` (`product_delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.order_items: ~1 rows (approximately)
REPLACE INTO `order_items` (`order_items_id`, `order_items_qty`, `product_id`, `order_status`, `product_delivery`, `orders_orders_id`) VALUES
	(30, 2, 11, 5, 2, 23);

-- Dumping structure for table parlo.order_status
CREATE TABLE IF NOT EXISTS `order_status` (
  `order_status_id` int NOT NULL AUTO_INCREMENT,
  `order_status_type` varchar(15) NOT NULL,
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.order_status: ~5 rows (approximately)
REPLACE INTO `order_status` (`order_status_id`, `order_status_type`) VALUES
	(1, 'Paid'),
	(2, 'Process'),
	(3, 'Shipped'),
	(4, 'Deliverd'),
	(5, 'Pending');

-- Dumping structure for table parlo.product
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) NOT NULL,
  `product_title` text NOT NULL,
  `product_description` text NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int NOT NULL,
  `product_weight` varchar(10) NOT NULL,
  `product_dimentions` text NOT NULL,
  `product_material_id` int NOT NULL,
  `product_fabrics` int NOT NULL,
  `prop69_warning_id` int NOT NULL,
  `product_category_id` int NOT NULL,
  `product_status_id` int NOT NULL,
  `product_model_id` int NOT NULL,
  `admin_admin_id` int NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_product_material1_idx` (`product_material_id`),
  KEY `fk_product_product_fabrics1_idx` (`product_fabrics`),
  KEY `fk_product_prop69_warnning1_idx` (`prop69_warning_id`),
  KEY `fk_product_product_category2_idx` (`product_category_id`),
  KEY `fk_product_product_status1_idx` (`product_status_id`),
  KEY `fk_product_product_model1_idx` (`product_model_id`),
  KEY `fk_product_admin1_idx` (`admin_admin_id`),
  CONSTRAINT `fk_product_admin1` FOREIGN KEY (`admin_admin_id`) REFERENCES `admin` (`admin_id`),
  CONSTRAINT `fk_product_product_category2` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`),
  CONSTRAINT `fk_product_product_fabrics1` FOREIGN KEY (`product_fabrics`) REFERENCES `product_fabrics` (`product_fabrics_id`),
  CONSTRAINT `fk_product_product_material1` FOREIGN KEY (`product_material_id`) REFERENCES `product_material` (`product_material_id`),
  CONSTRAINT `fk_product_product_model1` FOREIGN KEY (`product_model_id`) REFERENCES `product_model` (`product_model_id`),
  CONSTRAINT `fk_product_product_status1` FOREIGN KEY (`product_status_id`) REFERENCES `product_status` (`product_status_id`),
  CONSTRAINT `fk_product_prop69_warnning1` FOREIGN KEY (`prop69_warning_id`) REFERENCES `prop69_warning` (`prop69_warning_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product: ~13 rows (approximately)
REPLACE INTO `product` (`product_id`, `product_name`, `product_title`, `product_description`, `product_price`, `product_qty`, `product_weight`, `product_dimentions`, `product_material_id`, `product_fabrics`, `prop69_warning_id`, `product_category_id`, `product_status_id`, `product_model_id`, `admin_admin_id`) VALUES
	(1, 'Posey Sideboard', 'Desmond is a mid-century modern showstopper featuring an elegantly contoured frame and brass-tipped legs.', 'description - Desmond is a mid-century modern showstopper featuring an elegantly contoured frame and brass-tipped legs.', 1350, 10, '35.7 lbs', 'W29.5" x D30.3" x H32.7"', 1, 1, 1, 3, 1, 1, 1),
	(2, 'Bradley TV Stand', 'Bradley highlights fine craftsmanship with dovetail joinery, solid edges and a wire-brushed natural finish. Perfect for those seeking a bold look with its heavier-style legs.', 'Bradley highlights fine craftsmanship with dovetail joinery, solid edges and a wire-brushed natural finish. Perfect for those seeking a bold look with its heavier-style legs.', 1200, 11, '187.4 lbs', 'W78.7" x D18.5" x H24.4"', 8, 4, 2, 3, 1, 2, 1),
	(3, 'Hamilton Chaise Sectional Sofa', 'Very comfortable and good quality', 'With deep seats and additional cushions, Hamilton\'s minimalist silhouette invites you to recline in maximum comfort.', 1500, 12, '217.6 lbs', 'W109.4" x D67.3" x H32.3"', 1, 2, 2, 4, 1, 2, 1),
	(4, 'Pebble Chaise Sectional Sofa', 'Pebble adds sophisticated simplicity and contemporary charm with its gently curved frame and metal brass-capped legs', 'Very elegant style and amazing quality. Easy to put together as well.', 1250, 12, '159.2 lbs', 'W103.9" x D34.6"/65.7" x H32.3"', 4, 4, 1, 4, 1, 4, 1),
	(5, 'Seb Extendable Dining Set for 4-6', 'Rustic, homey and thoughtfully crafted, Seb is a mid-century collection made to create warm, cozy spaces.', 'description - Rustic, homey and thoughtfully crafted, Seb is a mid-century collection made to create warm, cozy spaces.', 1000, 12, '220.2 lbs ', 'Table: W59.1"/78.7" x D35.4" x H29.5"; Chair: W19.7" x D21.3" x H32.7"; Bench: W51.2" x D15" x H17.7"', 5, 5, 1, 2, 1, 5, 1),
	(6, 'Sloane Dining Set for 6-8', 'The Sloane Collection is characterized by a sophisticated fluted panel design. Its tactile surface highlights a distinguished wood grain. ​', 'descriptio - The Sloane Collection is characterized by a sophisticated fluted panel design. Its tactile surface highlights a distinguished wood grain. ​', 1200, 12, '120.2 lbs ', 'Table: W70.9"/88.6" x D35.4" x H29.9"; Chair: W18.9"/22.8" x D22" x H31.5"; Bench: W59.1"/70.9" x D16.1" x H20.3"', 3, 2, 1, 2, 2, 5, 1),
	(7, 'Desmond Leather Armchair', 'Desmond is a mid-century modern showstopper featuring an elegantly contoured frame and brass-tipped legs.', 'description - Desmond is a mid-century modern showstopper featuring an elegantly contoured frame and brass-tipped legs.', 1350, 10, '35.7 lbs', 'W29.5" x D30.3" x H32.7"', 7, 7, 1, 1, 1, 7, 1),
	(8, 'Esther Bookshelf, Tall', 'Elevate your shelving display with Esther\'s sophisticated mid-century modern looks', 'Elevate your shelving display with Esther\'s sophisticated mid-century modern looks. This storage beauty features marble and dark walnut shelves anchored by classy gold metal frames.', 1000, 12, '127 lbs', 'W47.2" x D13.4" x H64.2"', 2, 6, 1, 3, 1, 7, 1),
	(9, 'Luna Sideboard', 'Designed by Polish designer Krystian Kowalski', 'Designed by Polish designer Krystian Kowalski, Luna serves as both a practical and artistic statement piece for modern homes.', 1000, 11, '205 lbs', 'W63" x D17.7" x H32.3"', 2, 1, 1, 3, 1, 2, 1),
	(10, 'Mori Performance Fabric Armless ', 'With a refined silhouette that sits low to the ground,', 'With a refined silhouette that sits low to the ground, Mori delivers a luxurious lounging experience with feather-filled seats.', 1200, 10, '355.2 lbs', 'W110.8" x D110.8" x H32.1"', 4, 4, 2, 4, 1, 3, 1),
	(11, 'Marlow Performance Bouclé Curve', 'Combine different elements of your favorite furniture and create your ideal configuration.', 'Marlow exudes artful sophistication with its curved silhouette. Its spill-resistant bouclé fabric is a delight for hosting guests.', 1250, 8, '185.2 lbs', 'W120.9" x D55.5" x H29.9"​', 7, 7, 2, 4, 1, 4, 1),
	(12, 'Fable Performance Fabric sectinal sofa', 'Combine different elements of your favorite furniture and create your ideal configuration.', 'Fable is a low-profile silhouette that spotlights bold curves and intentional creases, offering an inviting spot to unwind for hours.', 1000, 7, '258.2 lbs', 'W108.3" x D108.3" x H33.5"', 3, 2, 2, 4, 1, 4, 1),
	(14, 'table', ' as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.  Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.  5 	paragraphs 	words 	bytes 	lists 	Start with \'Lorem ipsum dolor sit amet...\'', ' as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n', 10000, 0, '120lbs', 'W78.7" x D18.5" x H24.4"', 2, 2, 1, 2, 1, 5, 1);

-- Dumping structure for table parlo.product_category
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_category_id` int NOT NULL AUTO_INCREMENT,
  `product_category_type` varchar(45) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_category: ~4 rows (approximately)
REPLACE INTO `product_category` (`product_category_id`, `product_category_type`) VALUES
	(1, 'Chairs'),
	(2, 'Tables'),
	(3, 'Storages'),
	(4, 'Sofas');

-- Dumping structure for table parlo.product_delivery
CREATE TABLE IF NOT EXISTS `product_delivery` (
  `product_delivery_id` int NOT NULL AUTO_INCREMENT,
  `product_delivery_type` varchar(45) NOT NULL,
  `product_delivery_price` double NOT NULL,
  PRIMARY KEY (`product_delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_delivery: ~2 rows (approximately)
REPLACE INTO `product_delivery` (`product_delivery_id`, `product_delivery_type`, `product_delivery_price`) VALUES
	(1, 'With In Colmbo', 100),
	(2, 'Out Of Colombo', 200);

-- Dumping structure for table parlo.product_fabrics
CREATE TABLE IF NOT EXISTS `product_fabrics` (
  `product_fabrics_id` int NOT NULL AUTO_INCREMENT,
  `product_fabrics_type` varchar(45) NOT NULL,
  PRIMARY KEY (`product_fabrics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_fabrics: ~7 rows (approximately)
REPLACE INTO `product_fabrics` (`product_fabrics_id`, `product_fabrics_type`) VALUES
	(1, 'Broucle'),
	(2, 'Linen Weave'),
	(3, 'Twill'),
	(4, 'Plain Weave'),
	(5, 'Textured Weave'),
	(6, 'Velvet'),
	(7, 'Chenille');

-- Dumping structure for table parlo.product_material
CREATE TABLE IF NOT EXISTS `product_material` (
  `product_material_id` int NOT NULL AUTO_INCREMENT,
  `product_material_type` varchar(45) NOT NULL,
  PRIMARY KEY (`product_material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_material: ~8 rows (approximately)
REPLACE INTO `product_material` (`product_material_id`, `product_material_type`) VALUES
	(1, 'Fabric'),
	(2, 'Wood'),
	(3, 'Perfomance Fabric'),
	(4, 'Marble'),
	(5, 'Glass'),
	(6, 'Aluminium'),
	(7, 'Cane'),
	(8, 'Velvet');

-- Dumping structure for table parlo.product_model
CREATE TABLE IF NOT EXISTS `product_model` (
  `product_model_id` int NOT NULL AUTO_INCREMENT,
  `product_model_type` varchar(45) NOT NULL,
  PRIMARY KEY (`product_model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_model: ~7 rows (approximately)
REPLACE INTO `product_model` (`product_model_id`, `product_model_type`) VALUES
	(1, 'Chaise'),
	(2, 'Sectional'),
	(3, 'L-shape'),
	(4, 'Curved Shaped'),
	(5, 'Coffee Table'),
	(6, 'Side Table'),
	(7, 'Build Your Own Set');

-- Dumping structure for table parlo.product_reviews
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `product_reviews_id` int NOT NULL AUTO_INCREMENT,
  `product_reviews_description` text NOT NULL,
  `product_reviews_date` datetime NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`product_reviews_id`),
  KEY `fk_product_reviews_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_reviews_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_reviews: ~0 rows (approximately)

-- Dumping structure for table parlo.product_status
CREATE TABLE IF NOT EXISTS `product_status` (
  `product_status_id` int NOT NULL AUTO_INCREMENT,
  `product_status_type` varchar(45) NOT NULL,
  PRIMARY KEY (`product_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.product_status: ~2 rows (approximately)
REPLACE INTO `product_status` (`product_status_id`, `product_status_type`) VALUES
	(1, 'Available'),
	(2, 'Not-Available');

-- Dumping structure for table parlo.prop69_warning
CREATE TABLE IF NOT EXISTS `prop69_warning` (
  `prop69_warning_id` int NOT NULL AUTO_INCREMENT,
  `prop69_warning_type` varchar(45) NOT NULL,
  PRIMARY KEY (`prop69_warning_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table parlo.prop69_warning: ~2 rows (approximately)
REPLACE INTO `prop69_warning` (`prop69_warning_id`, `prop69_warning_type`) VALUES
	(1, 'Lead'),
	(2, 'Formeldyhyde');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
