# Jade

Download link
https://github.com/NielAndalecio26/Jade/archive/refs/heads/main.zip

put to this directory:
../xampp/htdocs/
*MAKE SURE THAT THE FOLDER NAME IS " Jade "*
**Rename if not**


DOWNLOAD AND INSTALL XAMPP
XAMPP Version
https://www.apachefriends.org/
8.1.12.0

Open XAMPP
Start Apache & MySQL

Click MySQL admin button

SQL Tab enter this: 

----------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `jade_db_test`;
USE `jade_db_test`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` int(50) NOT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);

--------------------------------------------------------------------    

ACCESS THE SITE HERE:
http://localhost/jade/