CREATE TABLE `User` (
	`user_id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(20) NOT NULL,
	`id` VARCHAR(50) NOT NULL COLLATE,
	`password` VARCHAR(50) NOT NULL COLLATE,
	`create_time` TIMESTAMP NOT NULL,
	`update_time` TIMESTAMP NOT NULL,
	PRIMARY KEY (`user_id`),
	UNIQUE INDEX `id` (`id`)
)
;
CREATE INDEX user_index ON User(`user_id`);
