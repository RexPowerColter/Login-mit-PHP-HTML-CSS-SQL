---add the table login---
CREATE TABLE `address_crud`.`login` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

---add a user for your database---
INSERT INTO `login` (`id`, `username`, `password`)
VALUES (NULL, 'Default_User', MD5('password'));