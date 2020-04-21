CREATE TABLE `product`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `seller_id` INT(10) NOT NULL , 
    `name` VARCHAR(255) NOT NULL , 
    `description` TEXT NOT NULL , 
    `price` VARCHAR(255) NOT NULL ,
    `quantity` INT(5) NOT NULL ,
    `category` VARCHAR(255) NOT NULL ,
    `image` TEXT NOT NULL ,
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;

ALTER TABLE `product`
ADD `has_promotion` INT(1) NOT NULL DEFAULT '0' AFTER `image`, 
ADD `expiry_date` DATE NULL DEFAULT NULL AFTER `has_promotion`, 
ADD `new_price` VARCHAR(255) NULL DEFAULT NULL AFTER `expiry_date`;
