CREATE TABLE `shop_profile`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `seller_id` INT(10) NOT NULL , 
    `shop_description` text NOT NULL , 
    `shop_name` VARCHAR(255) NOT NULL , 
    `shop_category` VARCHAR(255) NOT NULL ,
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
