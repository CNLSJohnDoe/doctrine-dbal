<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Tests\Platforms\SQLServer;

use Doctrine\DBAL\Platforms\SQLServer\Comparator;
use Doctrine\DBAL\Platforms\SQLServerPlatform;
use Doctrine\DBAL\Tests\Schema\ComparatorTest as BaseComparatorTest;

class ComparatorTest extends BaseComparatorTest
{
    protected function setUp(): void
    {
        $this->comparator = new Comparator(new SQLServerPlatform(), '');
    }
}
