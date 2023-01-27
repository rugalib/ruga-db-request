<?php

declare(strict_types=1);

namespace Ruga\Request\Item;

use Ruga\Db\Row\RowAttributesInterface;

/**
 * Interface CustomerAttributesInterface
 *
 * @property int                     $id                        Primary Key
 * @property string                  $fullname                  Full name / display name
 * @property int                     $Request_id                Foreign key to the REQUEST
 * @property int                     $seq                       Sequence number
 * @property \DateTimeImmutable|null $required_by_date          Date, when the items need to be delivered
 * @property float                   $quantity                  How many items
 * @property \Ruga\Money\Amount|null $maximum_amount            Upper limit price for the item
 * @property string|null             $name                      Subject of the REQUEST
 * @property string|null             $description               Details of the REQUEST ITEM
 * @property string|null             $remark                    Remark
 */
interface RequestItemAttributesInterface extends RowAttributesInterface
{
    
}