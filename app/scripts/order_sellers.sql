CREATE TABLE `order_sellers`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `order_id` INT(10) NOT NULL , 
    `seller_id` INT(10) NOT NULL , 
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
