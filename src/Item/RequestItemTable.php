<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request\Item;

/**
 * The REQUEST ITEM table.
 *
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestItemTable extends AbstractRequestItemTable
{
    const TABLENAME = 'RequestItem';
    const PRIMARYKEY = ['id'];
//    const RESULTSETCLASS = ;
    const ROWCLASS = RequestItem::class;
}
