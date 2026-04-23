SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Add user account: User ID: ecpi_user Password: Password1
CREATE USER 'ecpi_user'@'%' IDENTIFIED VIA mysql_native_password USING '*7EE969BBE0A3985C8BFF9FA65A06345C67FE434A';
GRANT ALL PRIVILEGES ON *.* TO 'ecpi_user'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

-- Database: sdc310_wk3gp
CREATE DATABASE IF NOT EXISTS sdc310_wk3gp DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sdc310_wk3gp;

-- Table structure for table userinfo
DROP TABLE IF EXISTS userinfo;
CREATE TABLE userinfo (
  UserNo int(11) NOT NULL,
  FirstName varchar(25) NOT NULL,
  LastName varchar(25) NOT NULL,
  EMail varchar(50) NOT NULL,
  FavoriteNum int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data for table userinfo
INSERT INTO userinfo (UserNo, FirstName, LastName, EMail, FavoriteNum) VALUES
(1, 'Admin', 'Administrator', 'admin@admin.com', 0),
(2, 'Jaden', 'Covington', 'jadenc087@.com', 0),
(3, 'Joe', 'Smith', 'jsmith@joe.com', 42),
(4, 'Jane', 'Jones', 'jjones@jane.com', 7);

-- Indexes for table userinfo
ALTER TABLE userinfo
  ADD PRIMARY KEY (UserNo);

-- AUTO_INCREMENT for table userinfo
ALTER TABLE userinfo
  MODIFY UserNo int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
