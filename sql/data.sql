-- -------------------------------------------------------------
-- -------------------------------------------------------------
-- TablePlus 1.0.3
--
-- https://tableplus.com/
--
-- Database: mysql
-- Generation Time: (null)
-- -------------------------------------------------------------



-- Table cars for save the information of the cars
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` longtext,
  `year` varchar(4) DEFAULT NULL,
  `mileage` int DEFAULT NULL,
  `colour` varchar(20) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `seller_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seller` (`seller_id`),
  CONSTRAINT `fk_seller` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


-- Table sellers for save the information of the sellers that sell cars
CREATE TABLE `sellers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


-- Table users for save the information of the admin user
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


-- Records for the table cars
INSERT INTO `cars` (`id`, `title`, `price`, `image`, `description`, `year`, `mileage`, `colour`, `create_date`, `seller_id`) VALUES 
(1, 'Audi A1', 599900.00, '23fc83248f97f65d825988d0b6d72e40.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt ar?
', '2020', 234557, 'yellow', '2024-02-08', 2),
(2, 'BMW M3 Sedan', 3300000.00, '899b212d46bc48d46692aeaf727ffe9e.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt amet dolores debitis perferendis corrupti inventore, unde illum sint asperiores aliquid adipisci praesentium fugit nisi laboriosam nihil porro. Rem, nobis tenetur?
', '2022', 123000, 'green', '2024-02-08', 3),
(3, 'MG One', 485900.00, '2e12cc4681ee94024d9f817ac2bc27d7.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt amet dolores debitis perferendis corrupti inventore, unde illum sint asperiores aliquid adipisci praesentium fugit nisi laboriosam nihil porro. Rem, nobis tenetur?
', '2021', 234567, 'orange', '2024-02-08', 2),
(5, 'Scania 25L', 3300000.00, '27f40533275b0af24307298503637f2e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nunc diam, volutpat eu massa et, rutrum egestas dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. PrLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nunc diam, volutpat eu massa et, rutrum egestas dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pr', '2020', 345678, 'white', '2024-02-09', 2),
(6, 'Freightliner M2', 2340000.00, 'f4f57cc1f6ce4bb3e5824d14fb1fe846.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nunc diam, volutpat eu massa et, rutrum egestas dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pr', '2016', 324588, 'white', '2024-02-09', 3),
(7, 'RAM 2500', 1579900.00, '97e7f986266929a5ff8d218549d32965.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nunc diam, volutpat eu massa et, rutrum egestas dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pr', '2022', 94326, 'white', '2024-02-09', 3);


-- Records for the table sellers
INSERT INTO `sellers` (`id`, `name`, `last_name`, `phone_number`) VALUES 
(2, 'Luis', 'Torres', '2223334442'),
(3, 'Karla', 'Vazquez', '2223334445');


-- Records for the users
INSERT INTO `users` (`id`, `email`, `password`) VALUES (1, 'correo@example.com', '$2y$10$hRDcMdZVRgHVYRKb8wWnfur2r87JZKUWUagw1Uv5dlU.PPlN4FpRe');