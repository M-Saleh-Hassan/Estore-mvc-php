CREATE TABLE `review_likes`
(
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `review_id` INT(10) NOT NULL , 
    `user_id` INT(10) NOT NULL , 
    PRIMARY KEY(`id`)
) 
ENGINE = InnoDB;
