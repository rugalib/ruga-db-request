<?php

declare(strict_types=1);

namespace Ruga\Request\PartyRole\Container;

use Psr\Container\ContainerInterface;
use Ruga\Db\Adapter\Adapter;
use Ruga\Request\PartyRole\RequestHasPartyTable;

class RequestHasPartyTableFactory
{
    public function __invoke(ContainerInterface $container): RequestHasPartyTable
    {
        return new RequestHasPartyTable($container->get(Adapter::class));
    }
}