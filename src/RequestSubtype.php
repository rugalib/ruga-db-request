<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request;

/**
 * Class RequestSubtype.
 * Representation of the Request::$request_subtype.
 *
 * @method static RequestSubtype RFP()
 * @method static RequestSubtype RFQ()
 * @method static RequestSubtype RFI()
 */
class RequestSubtype extends \Ruga\Std\Enum\AbstractEnum
{
    const RFP = 'RFP';
    const RFQ = 'RFQ';
    const RFI = 'RFI';
}