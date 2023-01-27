<?php

declare(strict_types=1);

namespace Ruga\Request\Item;

use Ruga\Db\Row\AbstractRugaRow;
use Ruga\Db\Row\Exception\InvalidArgumentException;
use Ruga\Db\Row\Feature\FullnameFeatureRowInterface;

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
}
