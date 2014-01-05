ALTER TABLE `users` 
ADD COLUMN `enabled` SMALLINT(1) NULL DEFAULT '1' AFTER `super`,
ADD INDEX `IX1_USERS` USING BTREE (`enabled` ASC);
update `users` set enabled=1;

ALTER TABLE `users` MODIFY COLUMN `enabled` SMALLINT(1) NOT NULL DEFAULT '1';