<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Driver\IBMDB2;

use Doctrine\DBAL\Driver\AbstractDB2Driver;
use Doctrine\DBAL\Driver\IBMDB2\Exception\ConnectionFailed;
use SensitiveParameter;

use function db2_connect;
use function db2_pconnect;

final class Driver extends AbstractDB2Driver
{
    /**
     * {@inheritdoc}
     */
    public function connect(
        #[SensitiveParameter]
        array $params,
    ): Connection {
        $dataSourceName = DataSourceName::fromConnectionParameters($params)->toString();

        $username      = $params['user'] ?? '';
        $password      = $params['password'] ?? '';
        $driverOptions = $params['driverOptions'] ?? [];

        if (! empty($params['persistent'])) {
            $connection = db2_pconnect($dataSourceName, $username, $password, $driverOptions);
        } else {
            $connection = db2_connect($dataSourceName, $username, $password, $driverOptions);
        }

        if ($connection === false) {
            throw ConnectionFailed::new();
        }

        return new Connection($connection);
    }
}
