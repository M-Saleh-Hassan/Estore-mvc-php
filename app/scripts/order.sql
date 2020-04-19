CREATE TABLE `orders`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `customer_id` INT(10) NOT NULL , 
    `date_ordered` DATE NOT NULL , 
    `date_required` DATE NOT NULL ,
    `status` INT(2) NOT NULL  DEFAULT '0',
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
