CREATE TABLE `Restaurant` (
	`restaurant_id` INT(10) NOT NULL AUTO_INCREMENT,
	`category_id` INT(10) NOT NULL,
	`region_id` INT(10) NOT NULL,
	`keyword_id` INT(10) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`address` VARCHAR(100) NULL DEFAULT NULL,
	`image` VARCHAR(255) NOT NULL,
	`score` FLOAT NULL DEFAULT NULL,
	`create_time` TIMESTAMP NULL DEFAULT NULL,
	`update_time` TIMESTAMP NULL DEFAULT NULL,
	PRIMARY KEY (`restaurant_id`),
	UNIQUE INDEX `name` (`name`),
	INDEX `FKRestaurant1` (`category_id`),
	INDEX `FKRestaurant2` (`region_id`),
	INDEX `FKRestaurant3` (`keyword_id`),
	CONSTRAINT `FKRestaurant1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`),
	CONSTRAINT `FKRestaurant2` FOREIGN KEY (`region_id`) REFERENCES `Region` (`region_id`),
	CONSTRAINT `FKRestaurant3` FOREIGN KEY (`keyword_id`) REFERENCES `Keyword` (`keyword_id`)
)
;

CREATE INDEX restaurant_index On Restaurant (restaurant_id);