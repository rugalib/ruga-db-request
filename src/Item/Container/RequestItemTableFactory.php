<?php

declare(strict_types=1);

namespace Ruga\Request\Item\Container;

use Psr\Container\ContainerInterface;
use Ruga\Db\Adapter\Adapter;
use Ruga\Request\Item\AbstractRequestItemTable;
use Ruga\Request\Item\RequestItemTable;

class RequestItemTableFactory
{
    public function __invoke(ContainerInterface $container): AbstractRequestItemTable
    {
        return new RequestItemTable($container->get(Adapter::class));
    }
}