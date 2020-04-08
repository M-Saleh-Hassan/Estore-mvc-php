CREATE TABLE `user`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(255) NOT NULL , 
    `password` TEXT NOT NULL , 
    `user_type` ENUM('seller','buyer') NOT NULL DEFAULT 'buyer' ,
     PRIMARY KEY(`id`), 
     UNIQUE(`username`)
) 
ENGINE = InnoDB;
