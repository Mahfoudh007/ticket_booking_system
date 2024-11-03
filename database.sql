-- Database: `ticket_booking_system`

-- Creating the database
CREATE DATABASE IF NOT EXISTS `ticket_booking_system`;
USE `ticket_booking_system`;

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `event_date` datetime NOT NULL,
  `ticket_adult_price` int(11) NOT NULL,
  `ticket_adult_quantity` int(11) NOT NULL,
  `ticket_kid_price` int(11) NOT NULL,
  `ticket_kid_quantity` int(11) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `equal_price` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `ticket_types`
CREATE TABLE `ticket_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `order_details`
CREATE TABLE `order_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `ticket_type_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_types`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample Insert Statements for ticket_types
INSERT INTO `ticket_types` (`name`, `price`) VALUES
('Adult Ticket', 700),
('Kid Ticket', 450),
('Discount Ticket', 500),
('Group Ticket', 600);

-- Sample Insert Statements for orders
INSERT INTO `orders` (`event_id`, `event_date`, `ticket_adult_price`, `ticket_adult_quantity`, `ticket_kid_price`, `ticket_kid_quantity`, `barcode`, `equal_price`, `created`) VALUES
(3, '2021-08-21 13:00:00', 700, 1, 450, 0, '11111111', 700, '2021-01-11 13:22:09'),
(6, '2021-07-29 18:00:00', 1000, 0, 800, 2, '22222222', 1600, '2021-01-12 16:62:08'),
(3, '2021-08-15 17:00:00', 700, 4, 450, 3, '33333333', 4150, '2021-01-13 10:08:45');

-- Sample Insert Statements for order_details
INSERT INTO `order_details` (`order_id`, `ticket_type_id`, `quantity`, `barcode`) VALUES
(1, 1, 1, 'barcode_1'),
(1, 3, 1, 'barcode_2'),
(2, 2, 2, 'barcode_3'),
(3, 1, 2, 'barcode_4'),
(3, 4, 1, 'barcode_5');
