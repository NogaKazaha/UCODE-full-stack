CREATE database ucode_web;
CREATE USER osavich@localhost IDENTIFIED BY 'securepass';
GRANT ALL PRIVILEGES ON ucode_web.* TO osavich@localhost;