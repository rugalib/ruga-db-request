<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request\Item;

use Laminas\Db\Sql\Expression;
use Laminas\Db\Sql\Sql;
use Ruga\Db\Row\AbstractRugaRow;
use Ruga\Db\Row\Feature\FullnameFeatureRowInterface;
use Ruga\Request\RequestInterface;

/**
 * Abstract REQUEST ITEM.
 *
 * @see      RequestItem
 * @see      RequestItemAttributesInterface
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
abstract class AbstractRequestItem extends AbstractRugaRow implements RequestItemAttributesInterface,
                                                                      RequestItemInterface,
                                                                      FullnameFeatureRowInterface
{
    /**
     * Constructs a display name from the given fields.
     * Fullname is saved in the row to speed up queries.
     *
     * @return string
     * @throws \Exception
     */
    public function getFullname(): string
    {
        return "" . parent::offsetGet('name');
    }
    
    
    
    /**
     * Link REQUEST ITEM to a REQUEST. A REQUEST ITEM can not exist on its own and must always be linked to a REQUEST.
     *
     * @param RequestInterface $request
     *
     * @return void
     */
    public function linkTo(RequestInterface $request)
    {
        $this->Request_id = $request->id;
//        $this->seq = $request->getNextSeq();
    }
    
    
    
    /**
     * Save row, but first add sub select for the seq column.
     *
     * @return int
     * @throws \Exception
     * @todo actually, this should be done with a ruga-db feature
     */
    public function save()
    {
        if ($this->isNew() && (($this->seq === null) || ($this->seq == 0))) {
            // Create sub request for seq column
            $sql = (new Sql($this->getTableGateway()->getAdapter()))->select();
            $sql->from(['P' => $this->getTableGateway()->getTable()]);
            $sql->columns(['next_seq' => new Expression("COALESCE(MAX(seq), 0) + 1")]);
            $sql->where(['Request_id' => $this->Request_id]);
            
            $this->seq = new Expression(
                "({$sql->getSqlString($this->getTableGateway()->getAdapter()->getPlatform())})"
            );
        }
        return parent::save();
    }
    
    
}
