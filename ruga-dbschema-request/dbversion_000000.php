<?php

declare(strict_types=1);

/**
 * @return string
 * @var \Ruga\Db\Schema\Resolver $resolver
 * @var string                    $comp_name
 */
$request = $resolver->getTableName(\Ruga\Request\RequestTable::class);
//$user = $resolver->getTableName(\Ruga\User\UserTable::class);
$user = $resolver->getTableName('UserTable');


return <<<"SQL"

SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE `{$request}` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(190) NULL,
  `request_subtype` SET('RFP', 'RFQ', 'RFI') NULL DEFAULT NULL,
  `request_date` DATETIME NULL DEFAULT NULL,
  `response_required_date` DATETIME NULL DEFAULT NULL,
  `request_role` INT NULL,
  `name` VARCHAR(190) NULL,
  `description` TEXT NULL,
  `remark` TEXT NULL,
  `created` DATETIME NOT NULL,
  `createdBy` INT NOT NULL,
  `changed` DATETIME NOT NULL,
  `changedBy` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `{$request}_fullname_idx` (`fullname`),
  INDEX `{$request}_request_role_idx` (`request_role`),
  INDEX `{$request}_name_idx` (`name`),
  INDEX `fk_{$request}_changedBy_idx` (`changedBy` ASC),
  INDEX `fk_{$request}_createdBy_idx` (`createdBy` ASC),
  CONSTRAINT `fk_{$request}_changedBy` FOREIGN KEY (`changedBy`) REFERENCES `{$user}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_{$request}_createdBy` FOREIGN KEY (`createdBy`) REFERENCES `{$user}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE=InnoDB
;
SET FOREIGN_KEY_CHECKS = 1;

SQL;
