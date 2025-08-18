<?php

namespace Doctrine\DBAL\Driver;

use PDO;
use PDOStatement;
use ReturnTypeWillChange;

use function func_get_args;

use const PHP_VERSION_ID;

/**
 * @internal
 */
trait PDOQueryImplementation
{
    /**
     * @return PDOStatement
     */
    #[ReturnTypeWillChange]
    public function query($query, $fetchMode = PDO::ATTR_DEFAULT_FETCH_MODE, $arg3 = null, $ctorargs = [])
    {
        return $this->doQuery($query, $fetchMode, $arg3, $ctorargs);
    }
}
