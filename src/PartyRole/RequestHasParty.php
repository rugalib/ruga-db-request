<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request\PartyRole;

use Ruga\Party\EntityHasParty\AbstractEntityHasParty;

/**
 * Implements the REQUEST has PARTY link.
 * Connects PARTYs to REQUESTs and assigns a role to the link.
 *
 * @see      RequestHasPartyRole
 *
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestHasParty extends AbstractEntityHasParty implements RequestHasPartyInterface
{
}
