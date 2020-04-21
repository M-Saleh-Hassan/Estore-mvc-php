CREATE TABLE `review`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `product_id` INT(10) NOT NULL , 
    `customer_id` INT(10) NOT NULL , 
    `comment` TEXT NOT NULL , 
    `rating` int(2) NOT NULL ,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
