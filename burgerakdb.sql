-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5484
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for burgerak
CREATE DATABASE IF NOT EXISTS `burgerak` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `burgerak`;

-- Dumping structure for table burgerak.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(25) NOT NULL,
  `role_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_fullname` varchar(50) DEFAULT NULL,
  `admin_phoneno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `role_id`, `admin_email`, `admin_fullname`, `admin_phoneno`) VALUES
	(1, 'admin', 'admin', 1, 'imrnsuhaimi@gmail.com', 'Administrator Gekkai', '0123344556'),
	(4, 'sekai', '5ffd558872d38', 1, 'imrnsuhaimi@gmail.com', 'MUHAMMAD IMRAN BIN SUHAIMI', '0182974533');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table burgerak.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_password` varchar(25) NOT NULL,
  `cust_username` varchar(12) NOT NULL,
  `cust_email` varchar(25) NOT NULL,
  `cust_phoneno` varchar(12) NOT NULL,
  `role_id` int(11) NOT NULL,
  `cust_fullname` varchar(50) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.customer: ~1 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`cust_id`, `cust_password`, `cust_username`, `cust_email`, `cust_phoneno`, `role_id`, `cust_fullname`) VALUES
	(1, 'sheilaon7', 'imranekoo', 'imrnsuhaimi@gmail.com', '01162270501', 2, 'Muhammad Imran bin Suhaimi');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table burgerak.hotitem
CREATE TABLE IF NOT EXISTS `hotitem` (
  `hotitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` char(5) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`hotitem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.hotitem: ~4 rows (approximately)
/*!40000 ALTER TABLE `hotitem` DISABLE KEYS */;
INSERT INTO `hotitem` (`hotitem_id`, `menu_id`, `description`) VALUES
	(1, 'BU4', NULL),
	(2, 'DR1', NULL),
	(3, 'DR2', NULL),
	(4, 'DR3', NULL);
/*!40000 ALTER TABLE `hotitem` ENABLE KEYS */;

-- Dumping structure for table burgerak.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` char(5) NOT NULL,
  `menu_img` varchar(80) DEFAULT NULL,
  `menu_type` char(2) NOT NULL DEFAULT '-',
  `menu_name` varchar(30) NOT NULL,
  `menu_price` double NOT NULL DEFAULT 0,
  `menu_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.menu: ~13 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`menu_id`, `menu_img`, `menu_type`, `menu_name`, `menu_price`, `menu_desc`) VALUES
	('BU1', 'assets/img/menu/beef.png', 'BU', 'Beef Burger', 4.5, 'Daging Lembu + Roti'),
	('BU2', 'assets/img/menu/ayam.png', 'BU', 'Chicken Burger', 4.5, 'Brrger Daging Ayam + Sayur Salad + Cheese'),
	('BU3', 'assets/img/menu/benjo.png', 'BU', 'Benjo', 3.5, NULL),
	('BU4', 'assets/img/menu/benjo double.png', 'BU', 'Double Benjo Burger', 5, NULL),
	('BU5', 'assets/img/menu/beef double.png', 'BU', 'Double Beef Burger', 6, NULL),
	('BU6', 'assets/img/menu/ayam double.png', 'BU', 'Double Chicken Burger', 6, NULL),
	('DR1', 'assets/img/menu/cola.png', 'DR', 'Cola', 2, NULL),
	('DR2', 'assets/img/menu/icelemontea.png', 'DR', 'Ice Lemon Tea', 3, NULL),
	('DR3', 'assets/img/menu/milo.png', 'DR', 'Iced Milo', 3, NULL),
	('SD1', 'assets/img/menu/hashbrown.png', 'SD', 'Hashbrown', 1, NULL),
	('SD2', 'assets/img/menu/nugget.png', 'SD', 'Nugget', 3, NULL),
	('SD3', 'assets/img/menu/onion ring.png', 'SD', 'Onion Ring Crisp', 3.5, NULL),
	('SM1', 'assets/img/menu/smoothie1.png', 'SM', 'Smoothie Grapie', 4.5, '');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table burgerak.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(15) NOT NULL,
  `cust_id` int(11) NOT NULL DEFAULT 0,
  `order_time` datetime NOT NULL,
  `orderstatus_id` int(11) NOT NULL,
  `complete_time` datetime DEFAULT NULL,
  `receive_time` datetime DEFAULT NULL,
  `shipment_id` char(2) DEFAULT NULL,
  `estimated_pickuptime` datetime DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `subtotal_price` double DEFAULT NULL,
  `order_message` varchar(200) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `address3` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.orders: ~23 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`order_id`, `cust_id`, `order_time`, `orderstatus_id`, `complete_time`, `receive_time`, `shipment_id`, `estimated_pickuptime`, `total_price`, `subtotal_price`, `order_message`, `address1`, `address2`, `address3`, `city`, `postcode`, `state`) VALUES
	('11021154027', 1, '2021-01-10 15:33:00', 4, NULL, '2021-01-10 23:51:00', '2', NULL, 19.31, 13.5, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('11021156205', 1, '2021-01-10 15:57:00', 4, NULL, '2021-01-10 18:18:00', '2', NULL, 25.67, 19.5, 'DELIVERY DI HADAPAN PINTU RUMAH\r\n', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('11021162145', 1, '2021-01-10 16:13:00', 5, NULL, NULL, '1', '2021-01-10 16:50:00', 14.31, 13.5, '', NULL, NULL, NULL, NULL, NULL, NULL),
	('11021233042', 1, '2021-01-10 23:28:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('11021233254', 1, '2021-01-10 23:27:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('11021233551', 1, '2021-01-10 23:32:00', 1, NULL, NULL, NULL, NULL, 31.8, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('11021233666', 1, '2021-01-10 23:29:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('11221006260', 1, '2021-01-12 01:00:00', 3, '2021-01-12 14:54:00', NULL, '2', NULL, 21.96, 16, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('11221106210', 1, '2021-01-12 10:52:00', 3, '2021-01-12 15:00:00', NULL, '2', NULL, 14.54, 9, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('11221125337', 1, '2021-01-12 12:52:00', 2, NULL, NULL, '2', NULL, 9.77, 4.5, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('11221126835', 1, '2021-01-12 12:59:00', 2, NULL, NULL, '2', NULL, 19.31, 13.5, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'PERLIS'),
	('11221130946', 1, '2021-01-12 13:13:00', 2, NULL, NULL, '2', '2021-01-12 14:03:00', 24.54, 9, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('11221131873', 1, '2021-01-12 13:16:00', 2, NULL, NULL, '1', '2021-01-12 13:46:00', 2.12, 2, '', NULL, NULL, NULL, NULL, NULL, NULL),
	('11221132528', 1, '2021-01-12 13:18:00', 2, NULL, NULL, '2', NULL, 12.42, 7, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122420141570', 1, '2020-12-24 14:12:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('122420143004', 1, '2020-12-24 14:22:00', 4, NULL, '2021-01-10 23:53:00', '2', NULL, 14.54, 9, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122420184914', 1, '2020-12-24 18:43:00', 4, NULL, NULL, '2', NULL, 60.12, 52, 'RING THE DOOR BELL', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122420235827', 1, '2020-12-25 00:13:00', 5, NULL, '2021-01-10 17:54:00', '1', NULL, 39.54, 9, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122520002042', 1, '2020-12-25 00:42:00', 5, '2021-01-10 17:36:00', '2021-01-10 17:54:00', '1', '2020-12-25 10:47:00', 42.42, 7, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122520230830', 1, '2020-12-25 23:03:00', 4, '2021-01-10 23:48:00', '2021-01-10 23:52:00', '2', NULL, 15.6, 10, 'hantar depan guardhouse', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122520233237', 1, '2020-12-25 23:37:00', 4, '2021-01-10 23:54:00', '2021-01-10 23:54:00', '2', NULL, 24.54, 9, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122520234567', 1, '2020-12-25 23:41:00', 2, NULL, NULL, '2', NULL, 17.42, 7, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR'),
	('122820230584', 1, '2020-12-28 23:00:00', 2, NULL, NULL, '2', NULL, 28.85, 22.5, '', 'NO 502 BLOK A12', 'SEKSYEN SATU WANGSA MAJU', '', 'KUALA LUMPUR', '53300', 'KUALA LUMPUR');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table burgerak.orderstatus
CREATE TABLE IF NOT EXISTS `orderstatus` (
  `orderstatus_id` int(11) NOT NULL,
  `orderstatus_desc` varchar(200) NOT NULL,
  `orderstatus_name` varchar(25) NOT NULL,
  PRIMARY KEY (`orderstatus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.orderstatus: ~5 rows (approximately)
/*!40000 ALTER TABLE `orderstatus` DISABLE KEYS */;
INSERT INTO `orderstatus` (`orderstatus_id`, `orderstatus_desc`, `orderstatus_name`) VALUES
	(1, '', 'INCOMPLETE'),
	(2, '', 'IN PROCESS'),
	(3, '', 'COMPLETED'),
	(4, '', 'DELIVERED'),
	(5, '', 'RECEIVED');
/*!40000 ALTER TABLE `orderstatus` ENABLE KEYS */;

-- Dumping structure for table burgerak.order_menu
CREATE TABLE IF NOT EXISTS `order_menu` (
  `order_id` varchar(15) NOT NULL,
  `menu_id` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `descr` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  KEY `order_id` (`order_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.order_menu: ~31 rows (approximately)
/*!40000 ALTER TABLE `order_menu` DISABLE KEYS */;
INSERT INTO `order_menu` (`order_id`, `menu_id`, `quantity`, `descr`, `price`) VALUES
	('122420141570', 'BU3', 3, '', NULL),
	('122420143004', 'BU1', 2, '', NULL),
	('122420184914', 'BU6', 3, '', NULL),
	('122420184914', 'BU5', 2, '', NULL),
	('122420184914', 'BU4', 2, '', NULL),
	('122420184914', 'DR1', 6, '', NULL),
	('122420235827', 'BU1', 2, '', NULL),
	('122520002042', 'BU3', 2, '', NULL),
	('122520230830', 'SD2', 3, 'Taknak sos cili, tomato ketchup only.', NULL),
	('122520230830', 'SD1', 1, '', NULL),
	('122520233237', 'BU1', 2, '', NULL),
	('122520234567', 'BU3', 2, '', NULL),
	('122820230584', 'BU2', 2, '', NULL),
	('122820230584', 'BU1', 3, '', NULL),
	('11021154027', 'BU1', 3, '', NULL),
	('11021156205', 'BU1', 3, '', NULL),
	('11021156205', 'DR2', 2, 'Kurang Ais', NULL),
	('11021162145', 'BU2', 3, '', NULL),
	('11021233254', 'SM1', 2, '', NULL),
	('11021233042', 'BU1', 3, '', NULL),
	('11021233666', 'BU2', 4, '', NULL),
	('11021233551', 'BU5', 5, '', NULL),
	('11221006260', 'BU5', 2, '', NULL),
	('11221006260', 'DR2', 1, '', NULL),
	('11221006260', 'SD1', 1, '', NULL),
	('11221106210', 'SM1', 2, '', NULL),
	('11221125337', 'BU2', 1, '', NULL),
	('11221126835', 'BU2', 3, '', NULL),
	('11221130946', 'BU2', 2, '', NULL),
	('11221131873', 'SD1', 2, '', NULL),
	('11221132528', 'BU3', 2, '', NULL);
/*!40000 ALTER TABLE `order_menu` ENABLE KEYS */;

-- Dumping structure for table burgerak.role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table burgerak.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`role_id`, `role_name`) VALUES
	(1, 'Administrator'),
	(2, 'Customer');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table burgerak.shipment
CREATE TABLE IF NOT EXISTS `shipment` (
  `shipment_id` int(11) NOT NULL,
  `shipment_type` varchar(25) NOT NULL,
  PRIMARY KEY (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table burgerak.shipment: ~2 rows (approximately)
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`shipment_id`, `shipment_type`) VALUES
	(1, 'Self Pick Up'),
	(2, 'Delivery');
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
