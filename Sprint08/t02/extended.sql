USE ucode_web;
CREATE TABLE powers (
  id INT NOT NULL AUTO_INCREMENT,
  hero_id INT NOT NULL,
  name VARCHAR(30) NOT NULL,
  points INT NOT NULL,
  type ENUM('attack', 'defense'),
  PRIMARY KEY (id),
  FOREIGN KEY (hero_id) REFERENCES heroes(id)
);
CREATE TABLE races (
  id INT NOT NULL AUTO_INCREMENT,
  hero_id INT NOT NULL UNIQUE,
  name VARCHAR(30) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (hero_id) REFERENCES heroes(id)
);
CREATE TABLE teams (
  id INT NOT NULL AUTO_INCREMENT,
  hero_id INT NOT NULL UNIQUE,
  name VARCHAR(30) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (hero_id) REFERENCES heroes(id)
);
INSERT INTO powers (hero_id, name, points, type)
VALUES 
  (6, "bloody fist", 110, 1),
  (7, "iron shield", 200, 2);
INSERT INTO races (hero_id, name)
VALUES 
  (1, "Human"),
  (8, "Kree");
INSERT INTO teams (hero_id, name)
VALUES 
  (1, "Avengers"),
  (2, "Hydra");