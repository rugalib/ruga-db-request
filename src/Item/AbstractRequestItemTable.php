<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request\Item;

use Ruga\Db\Row\RowInterface;
use Ruga\Db\Table\AbstractRugaTable;

abstract class AbstractRequestItemTable extends AbstractRugaTable
{
    public function createRow(array $rowData = []): RowInterface
    {
        if (!array_key_exists('seq', $rowData)) {
            // Set seq to null if undefined. This triggers the autoincrement when inserting and prevents an exception
            // because of missing default value
            $rowData['seq'] = null;
        }
        return parent::createRow($rowData);
    }
    
    
}