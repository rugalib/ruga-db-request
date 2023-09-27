<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

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