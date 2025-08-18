<?php

namespace Doctrine\DBAL\Driver;

use PDOStatement;

/**
 * @internal
 */
trait PDOQueryImplementation
{
    /**
     * @return PDOStatement
     */
    public function query(string $query, ?int $fetchMode = null, ...$fetchModeArgs): PDOStatement|false
    {
        return $this->doQuery($query, $fetchMode, ...$fetchModeArgs);
    }
}
