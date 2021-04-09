CREATE DATABASE IF NOT EXISTS sword;
CREATE USER IF NOT EXISTS osavich@localhost IDENTIFIED WITH mysql_native_password BY 'securepass';
GRANT ALL PRIVILEGES ON sword.* TO osavich@localhost WITH GRANT OPTION;
USE sword;
CREATE TABLE IF NOT EXISTS sword.users (
  id INT NOT NULL AUTO_INCREMENT , 
  login VARCHAR(30) NOT NULL , 
  password VARCHAR(100) NOT NULL , 
  full_name VARCHAR(30) NOT NULL , 
  email VARCHAR(50) NOT NULL , 
  PRIMARY KEY (id),
  UNIQUE (login),
  UNIQUE (email) 
) ENGINE = InnoDB;