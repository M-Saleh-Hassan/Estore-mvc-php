CREATE TABLE `customer_profile`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `customer_id` INT(10) NOT NULL , 
    `first_name` VARCHAR(255) NOT NULL , 
    `last_name` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(255) NOT NULL ,
    `phone` VARCHAR(255) NOT NULL ,
    PRIMARY KEY(`id`) ,
    UNIQUE(`email`)
) 
ENGINE = InnoDB;
