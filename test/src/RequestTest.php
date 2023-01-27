<?php

declare(strict_types=1);

namespace Ruga\Request\Test;

use Laminas\ServiceManager\ServiceManager;

/**
 * @author                 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestTest extends \Ruga\Request\Test\PHPUnit\AbstractTestSetUp
{
    public function testCanSetContainer(): void
    {
        $this->expectNotToPerformAssertions();
    }
}
