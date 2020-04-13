CREATE TABLE `product`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `seller_id` INT(10) NOT NULL , 
    `name` VARCHAR(255) NOT NULL , 
    `price` VARCHAR(255) NOT NULL ,
    `quantity` INT(5) NOT NULL ,
    `category` VARCHAR(255) NOT NULL ,
    `image` TEXT NOT NULL ,
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;