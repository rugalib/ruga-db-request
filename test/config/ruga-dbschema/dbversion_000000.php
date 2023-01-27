<?php

declare(strict_types=1);

/**
 * @return string
 * @var \Ruga\Db\Schema\Resolver $resolver
 * @var string                    $comp_name
 */
$request = $resolver->getTableName(\Ruga\Request\RequestTable::class);
$requestItem = $resolver->getTableName(\Ruga\Request\Item\RequestItemTable::class);

return <<<"SQL"

SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO `{$request}` (`fullname`, `request_subtype`, `request_date`, `response_required_date`, `request_role`, `name`, `description`, `remark`, `created`, `createdBy`, `changed`, `changedBy`)
VALUES
     (NULL, 'RFP', '2023-01-26 00:00:00', NULL, NULL, NULL, NULL, NULL, '2023-01-26 16:00:00', 1, '2023-01-26 16:00:00', 1)
    ,(NULL, 'RFQ', '2023-01-27 00:00:00', NULL, NULL, NULL, NULL, NULL, '2023-01-27 16:00:00', 1, '2023-01-27 16:00:00', 1)
;

INSERT INTO `{$requestItem}` (`fullname`, `Request_id`, `seq`, `required_by_date`, `quantity`, `maximum_amount`, `name`, `description`, `remark`, `created`, `createdBy`, `changed`, `changedBy`)
VALUES
     (NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-26 16:00:00', 1, '2023-01-26 16:00:00', 1)
    ,(NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-27 16:00:00', 1, '2023-01-27 16:00:00', 1)
    ,(NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-27 16:00:00', 1, '2023-01-27 16:00:00', 1)
    ,(NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-27 16:00:00', 1, '2023-01-27 16:00:00', 1)
    ,(NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-27 16:00:00', 1, '2023-01-27 16:00:00', 1)
;


SET FOREIGN_KEY_CHECKS = 1;

SQL;
