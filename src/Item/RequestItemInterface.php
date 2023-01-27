<?php

declare(strict_types=1);

namespace Ruga\Request\Item;


use Ruga\Request\RequestInterface;

/**
 * Interface to a REQUEST ITEM.
 *
 * @see      RequestItem
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
interface RequestItemInterface extends RequestItemAttributesInterface
{
    /**
     * Constructs a display name from the given fields.
     * Fullname is saved in the row to speed up queries.
     *
     * @return string
     * @throws \Exception
     */
    public function getFullname(): string;
    
    
    /**
     * Link REQUEST ITEM to a REQUEST. A REQUEST ITEM can not exist on its own and must always be linked to a REQUEST.
     *
     * @param RequestInterface $request
     *
     * @return void
     */
    public function linkTo(RequestInterface $request);

}
