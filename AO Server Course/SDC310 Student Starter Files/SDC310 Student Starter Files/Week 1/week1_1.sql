SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: week1_1
CREATE DATABASE IF NOT EXISTS week1_1 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE week1_1;

-- Table structure for table `users`
CREATE TABLE users (
  UserId int(11) NOT NULL,
  FirstName varchar(25) NOT NULL,
  LastName varchar(30) NOT NULL,
  EMail varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `users`
ALTER TABLE users
  ADD PRIMARY KEY (UserId);
COMMIT;
