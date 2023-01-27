<?php

declare(strict_types=1);

namespace Ruga\Request;


use Ruga\Db\Schema\Updater;

/**
 * ConfigProvider.
 *
 * @see    https://docs.mezzio.dev/mezzio/v3/features/container/config/
 */
class ConfigProvider
{
    public function __invoke()
    {
        return [
            'db' => [
                Updater::class => [
                    'components' => [
                        Request::class => [
                            Updater::CONF_REQUESTED_VERSION => 1,
                            Updater::CONF_SCHEMA_DIRECTORY => __DIR__ . '/../ruga-dbschema-request',
                            Updater::CONF_TABLES => [
                                'RequestTable' => RequestTable::class
                            ],
                        ],
                    ],
                ],
            ],
            'dependencies' => [
                'services' => [],
                'factories' => [
                    RequestTable::class => Container\RequestTableFactory::class,
                ],
                'aliases' => [
                    'RequestTable' => RequestTable::class,
                ],
                'invokables' => [],
                'delegators' => [],
            ],
        ];
    }
}
