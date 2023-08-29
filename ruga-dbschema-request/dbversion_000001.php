<?php

declare(strict_types=1);

/**
 * @return string
 * @var \Ruga\Db\Schema\Resolver $resolver
 * @var string                    $comp_name
 */
$request = $resolver->getTableName(\Ruga\Request\RequestTable::class);
$requestItem = $resolver->getTableName(\Ruga\Request\Item\RequestItemTable::class);
$user = $resolver->getTableName('UserTable');


return <<<"SQL"

SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE `{$requestItem}` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(190) NULL,
  `{$request}_id` INT NOT NULL,
  `seq` INT NOT NULL,
  `required_by_date` DATETIME NULL DEFAULT NULL,
  `quantity` DECIMAL(27,8) NULL DEFAULT NULL,
  `maximum_amount` DECIMAL(27,8) NULL DEFAULT NULL,
  `name` VARCHAR(190) NULL,
  `description` TEXT NULL,
  `remark` TEXT NULL,
  `created` DATETIME NOT NULL,
  `createdBy` INT NOT NULL,
  `changed` DATETIME NOT NULL,
  `changedBy` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `{$requestItem}_fullname_idx` (`fullname`),
  INDEX `fk_{$requestItem}_{$request}_id_idx` (`{$request}_id`),
  INDEX `{$requestItem}_seq_idx` (`seq`),
  UNIQUE `fk_{$requestItem}_{$request}_id_seq_unique` (`{$request}_id`, `seq`),
  CONSTRAINT `fk_{$requestItem}_{$request}_id` FOREIGN KEY (`{$request}_id`) REFERENCES `{$request}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  INDEX `fk_{$requestItem}_changedBy_idx` (`changedBy` ASC),
  INDEX `fk_{$requestItem}_createdBy_idx` (`createdBy` ASC),
  CONSTRAINT `fk_{$requestItem}_changedBy` FOREIGN KEY (`changedBy`) REFERENCES `{$user}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_{$requestItem}_createdBy` FOREIGN KEY (`createdBy`) REFERENCES `{$user}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE=InnoDB
;
SET FOREIGN_KEY_CHECKS = 1;

SQL;
