<?php

return <<<"SQL"
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO `Request_has_Party` (`Request_id`, `Party_id`, `party_role`, `remark`, `created`, `createdBy`, `changed`, `changedBy`)
VALUES (1, 1, 'RESPONDER', NULL, '2023-02-01 14:15:43', 1, '2023-02-01 14:15:45', 1);
INSERT INTO `Request_has_Party` (`Request_id`, `Party_id`, `party_role`, `remark`, `created`, `createdBy`, `changed`, `changedBy`)
VALUES (1, 3, 'ORIGINATOR', NULL, '2023-02-01 14:16:16', 1, '2023-02-01 14:16:18', 1);

SET FOREIGN_KEY_CHECKS = 1;
SQL;
