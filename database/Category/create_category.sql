CREATE TABLE `Category` (
	`category_id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL,
	`create_time` TIMESTAMP NOT NULL,
	`update_time` TIMESTAMP NOT NULL,
	PRIMARY KEY (`category_id`),
	UNIQUE INDEX `name` (`name`),
	INDEX `category_index` (`category_id`)
)
;
CREATE INDEX category_index ON Category(`category_id`);