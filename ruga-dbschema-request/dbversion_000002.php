<?php

declare(strict_types=1);

/**
 * @return string
 * @var \Ruga\Db\Schema\Resolver $resolver
 * @var string                   $comp_name
 */

$entityTable = $resolver->getTableName(\Ruga\Request\RequestTable::class);
$partyTable = $resolver->getTableName(\Ruga\Party\PartyTable::class);
$userTable = $resolver->getTableName('UserTable');
$entityHasPartyTable = "{$entityTable}_has_{$partyTable}";

if ($partyRole_values = implode("','", \Ruga\Request\PartyRole\RequestHasPartyRole::getConstants())) {
    $partyRole_values = "'{$partyRole_values}'";
}


return <<<"SQL"

SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE `{$entityHasPartyTable}` (
  `{$entityTable}_id` INT NOT NULL,
  `{$partyTable}_id` INT NOT NULL,
  `party_role` ENUM({$partyRole_values}) NOT NULL,
  `remark` TEXT NULL,
  `created` DATETIME NOT NULL,
  `createdBy` INT NOT NULL,
  `changed` DATETIME NOT NULL,
  `changedBy` INT NOT NULL,
  PRIMARY KEY (`{$entityTable}_id`, `{$partyTable}_id`),
  INDEX `fk_{$entityHasPartyTable}_{$entityTable}_id_idx` (`{$entityTable}_id`),
  CONSTRAINT `fk_{$entityHasPartyTable}_{$entityTable}` FOREIGN KEY (`{$entityTable}_id`) REFERENCES `{$entityTable}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  INDEX `fk_{$entityHasPartyTable}_{$partyTable}_id_idx` (`{$partyTable}_id`),
  CONSTRAINT `fk_{$entityHasPartyTable}_{$partyTable}` FOREIGN KEY (`{$partyTable}_id`) REFERENCES `{$partyTable}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  INDEX `fk_{$entityHasPartyTable}_changedBy_idx` (`changedBy` ASC),
  INDEX `fk_{$entityHasPartyTable}_createdBy_idx` (`createdBy` ASC),
  CONSTRAINT `fk_{$entityHasPartyTable}_changedBy` FOREIGN KEY (`changedBy`) REFERENCES `{$userTable}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_{$entityHasPartyTable}_createdBy` FOREIGN KEY (`createdBy`) REFERENCES `{$userTable}` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE=InnoDB
;
SET FOREIGN_KEY_CHECKS = 1;

SQL;
