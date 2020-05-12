ALTER TABLE `usuarios`
	ALTER `username` DROP DEFAULT,
	ALTER `password` DROP DEFAULT,
	ALTER `email` DROP DEFAULT;
ALTER TABLE `usuarios`
	CHANGE COLUMN `username` `username` VARCHAR(50) NOT NULL FIRST,
	CHANGE COLUMN `password` `password` VARCHAR(100) NOT NULL AFTER `username`,
	CHANGE COLUMN `email` `email` VARCHAR(50) NOT NULL AFTER `password`;
