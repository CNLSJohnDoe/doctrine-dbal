<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Tests\Functional\Driver\PDO\PgSQL;

use Doctrine\DBAL\Driver\PDO\PgSQL\Driver;
use Doctrine\DBAL\Tests\Functional\Driver\AbstractPostgreSQLDriverTest;
use Doctrine\DBAL\Tests\TestUtil;

/** @requires extension pdo_pgsql */
class DriverTest extends AbstractPostgreSQLDriverTest
{
    protected function setUp(): void
    {
        parent::setUp();

        if (TestUtil::isDriverOneOf('pdo_pgsql')) {
            return;
        }

        self::markTestSkipped('This test requires the pdo_pgsql driver.');
    }

    protected function createDriver(): Driver
    {
        return new Driver();
    }
}
