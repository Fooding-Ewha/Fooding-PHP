CREATE TABLE `Review` (
	`review_id` INT(10) NOT NULL AUTO_INCREMENT,
	`restaurant_id` INT(10) NOT NULL,
	`user_id` INT(10) NOT NULL,
	`score` INT(10) NOT NULL DEFAULT '0',
	`comment` VARCHAR(200) NULL DEFAULT NULL,
	`create_time` TIMESTAMP NOT NULL,
	`update_time` TIMESTAMP NOT NULL,
	PRIMARY KEY (`review_id`),
	INDEX `FKReview1` (`restaurant_id`,
	INDEX `FKReview2` (`user_id`),
	CONSTRAINT `FKReview1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurant` (`restaurant_id`),
	CONSTRAINT `FKReview2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`)
)
;
CREATE INDEX review_index ON Review(`review_id`);