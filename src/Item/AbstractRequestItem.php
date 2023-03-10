<?php

declare(strict_types=1);

namespace Ruga\Request\Item;

use Ruga\Db\Row\AbstractRugaRow;
use Ruga\Db\Row\Exception\InvalidArgumentException;
use Ruga\Db\Row\Feature\FullnameFeatureRowInterface;
use Ruga\Request\Item\Exception\ParentNotSavedException;
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
        $this->seq = $request->getNextSeq();
    }
    
}
