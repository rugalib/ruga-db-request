<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

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