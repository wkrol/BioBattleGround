
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- organism
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `organism`;


CREATE TABLE `organism`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45),
	`instinct` INTEGER,
	`toughness` INTEGER,
	`vitality` INTEGER,
	`type` CHAR,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- map
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `map`;


CREATE TABLE `map`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45)  NOT NULL,
	`map_string` TEXT  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- climate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `climate`;


CREATE TABLE `climate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45),
	`sun` INTEGER,
	`rain` INTEGER,
	`wind` INTEGER,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(45)  NOT NULL,
	`password` VARCHAR(45)  NOT NULL,
	`name` VARCHAR(45)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `user_U_1` (`login`(45))
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- user_privileges
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_privileges`;


CREATE TABLE `user_privileges`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_user` INTEGER,
	`id_organism` INTEGER,
	`id_map` INTEGER,
	`id_climate` INTEGER,
	`play` TINYINT,
	`fight` TINYINT,
	`edit` TINYINT,
	`show_stats` TINYINT,
	PRIMARY KEY (`id`),
	KEY `user_privileges_I_1`(`id_organism`),
	KEY `user_privileges_I_2`(`id_user`),
	KEY `user_privileges_I_3`(`id_map`),
	KEY `user_privileges_I_4`(`id_climate`),
	CONSTRAINT `id_organizm`
		FOREIGN KEY (`id_organism`)
		REFERENCES `organism` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `id_user`
		FOREIGN KEY (`id_user`)
		REFERENCES `user` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `id_map`
		FOREIGN KEY (`id_map`)
		REFERENCES `map` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `id_climate`
		FOREIGN KEY (`id_climate`)
		REFERENCES `climate` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- simulation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `simulation`;


CREATE TABLE `simulation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_climate` INTEGER,
	`id_map` INTEGER,
	`simulation_length` INTEGER,
	`date` DATE,
	PRIMARY KEY (`id`),
	KEY `simulation_I_1`(`id_map`),
	KEY `simulation_I_2`(`id_climate`),
	CONSTRAINT `id_map`
		FOREIGN KEY (`id_map`)
		REFERENCES `map` (`id`),
	CONSTRAINT `id_climate`
		FOREIGN KEY (`id_climate`)
		REFERENCES `climate` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `group`;


CREATE TABLE `group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_user_privileges` INTEGER,
	`id_organism` INTEGER,
	`id_simulation` INTEGER,
	`survive` TINYINT,
	`average_life_length` INTEGER,
	`quantity` INTEGER,
	`deaths` INTEGER,
	PRIMARY KEY (`id`),
	KEY `group_I_1`(`id_organism`),
	KEY `group_I_2`(`id_simulation`),
	KEY `group_I_3`(`id_user_privileges`),
	CONSTRAINT `id_organism`
		FOREIGN KEY (`id_organism`)
		REFERENCES `organism` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `id_simulation`
		FOREIGN KEY (`id_simulation`)
		REFERENCES `simulation` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `id_user_privileges`
		FOREIGN KEY (`id_user_privileges`)
		REFERENCES `user_privileges` (`id_user`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- simulation_privileges
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `simulation_privileges`;


CREATE TABLE `simulation_privileges`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_user` INTEGER,
	`create` TINYINT,
	`join` TINYINT,
	PRIMARY KEY (`id`),
	KEY `simulation_privileges_I_1`(`id_user`),
	CONSTRAINT `id_user`
		FOREIGN KEY (`id_user`)
		REFERENCES `user` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- round
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `round`;


CREATE TABLE `round`
(
	`id` INTEGER  NOT NULL,
	`id_organism` INTEGER,
	`id_simulation` INTEGER,
	`day` INTEGER,
	`quantity` INTEGER,
	`avg_hunger` INTEGER,
	`avg_hitPoints` INTEGER,
	`number_of_newborn` INTEGER,
	PRIMARY KEY (`id`),
	KEY `round_I_1`(`id_organism`),
	KEY `round_I_2`(`id_simulation`),
	CONSTRAINT `id_organism`
		FOREIGN KEY (`id_organism`)
		REFERENCES `organism` (`id`),
	CONSTRAINT `id_simulation`
		FOREIGN KEY (`id_simulation`)
		REFERENCES `simulation` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
