<?php

declare(strict_types=1);

namespace Ruga\Request\PartyRole;

/**
 * Class RequestHasPartyRole.
 *
 * @see RequestHasParty::$party_role
 *
 * @method static RequestHasPartyRole ORIGINATOR()
 * @method static RequestHasPartyRole RESPONDER()
 */
class RequestHasPartyRole extends \Ruga\Party\EntityHasParty\EntityHasPartyRole
{
    const ORIGINATOR = 'ORIGINATOR';
    const RESPONDER = 'RESPONDER';
}