<?php

declare(strict_types=1);

namespace Ruga\Request;

/**
 * The REQUEST table.
 *
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestTable extends AbstractRequestTable
{
    const TABLENAME = 'Request';
    const PRIMARYKEY = ['id'];
    const ROWCLASS = Request::class;
}
