CREATE TABLE `order_details`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `order_id` INT(10) NOT NULL , 
    `product_id` INT(10) NOT NULL , 
    `quantity` INT(5) NOT NULL ,
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
