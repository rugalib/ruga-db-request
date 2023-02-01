<?php

declare(strict_types=1);

namespace Ruga\Request\PartyRole;

use Ruga\Db\Row\RowAttributesInterface;

/**
 * Interface RequestAttributesInterface
 *
 * @property int                 $Request_id              Foreign key to the REQUEST object
 * @property RequestHasPartyRole $party_role              Role of the PARTY in the REQUEST object
 */
interface RequestHasPartyAttributesInterface extends \Ruga\Party\EntityHasParty\EntityHasPartyAttributesInterface
{
    
}