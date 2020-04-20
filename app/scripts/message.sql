CREATE TABLE `message`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `seller_id` INT(10) NOT NULL , 
    `customer_id` INT(10) NOT NULL , 
    `customer_email` VARCHAR(255) NOT NULL , 
    `subject` VARCHAR(255) NOT NULL ,
    `message` TEXT NOT NULL ,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
