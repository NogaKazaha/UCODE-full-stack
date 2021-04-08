CREATE database sword;
CREATE USER osavich@localhost IDENTIFIED BY 'securepass';
GRANT ALL PRIVILEGES ON sword.* TO osavich@localhost;
USE sword;
create TABLE users (
  id INT AUTO_INCREMENT,
  login VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  full_name VARCHAR(50) NOT NULL,
  email_address VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);