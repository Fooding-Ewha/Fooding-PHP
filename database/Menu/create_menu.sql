CREATE TABLE `Menu` (
	`menu_id` INT(10) NOT NULL AUTO_INCREMENT,
	`restaurant_id` INT(10) NOT NULL,
	`name` VARCHAR(20) NOT NULL,
	`price` VARCHAR(20) NULL DEFAULT NULL,
	`description` VARCHAR(100) NULL DEFAULT NULL,
	`image` VARCHAR(255) NULL DEFAULT NULL,
	`create_time` TIMESTAMP NOT NULL,
	`update_time` TIMESTAMP NOT NULL,
	PRIMARY KEY (`menu_id`),
	UNIQUE INDEX `name` (`name`),
	INDEX `FKMenu1` (`restaurant_id`),
	CONSTRAINT `FKMenu1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurant` (`restaurant_id`)
)
;
CREATE INDEX menu_index ON Menu(`menu_id`);