<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

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