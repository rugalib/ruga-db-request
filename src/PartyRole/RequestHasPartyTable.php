<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request\PartyRole;

/**
 * The REQUEST has PARTY table with role.
 *
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestHasPartyTable extends \Ruga\Party\EntityHasParty\AbstractEntityHasPartyTable
{
    const TABLENAME = 'Request_has_Party';
    const PRIMARYKEY = ['Request_id', 'Party_id'];
    const ROWCLASS = RequestHasParty::class;
}
