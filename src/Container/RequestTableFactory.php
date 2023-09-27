<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request\Container;

use Psr\Container\ContainerInterface;
use Ruga\Db\Adapter\Adapter;
use Ruga\Request\AbstractRequestTable;
use Ruga\Request\RequestTable;

class RequestTableFactory
{
    public function __invoke(ContainerInterface $container): AbstractRequestTable
    {
        return new RequestTable($container->get(Adapter::class));
    }
}