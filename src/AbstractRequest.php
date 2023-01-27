<?php

declare(strict_types=1);

namespace Ruga\Request;

use Ruga\Db\Row\AbstractRugaRow;
use Ruga\Db\Row\Feature\FullnameFeatureRowInterface;

/**
 * Abstract request.
 *
 * @see      Request
 * @see      RequestAttributesInterface
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
abstract class AbstractRequest extends AbstractRugaRow implements RequestAttributesInterface,
                                                                RequestInterface,
                                                                FullnameFeatureRowInterface
{

}
