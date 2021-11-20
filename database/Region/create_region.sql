CREATE TABLE `Region` (
	`region_id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL,
	`create_time` TIMESTAMP NOT NULL,
	`update_time` TIMESTAMP NOT NULL,
	PRIMARY KEY (`region_id`),
	UNIQUE INDEX `name` (`name`)
)
;
CREATE INDEX region_index ON Region(`region_id`);