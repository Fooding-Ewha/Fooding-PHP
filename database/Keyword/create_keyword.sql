CREATE TABLE `Keyword` (
	`keyword_id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`keyword_id`),
	UNIQUE INDEX `name` (`name`)
)
;
CREATE INDEX keyword_index ON Region(`keyword_id`);