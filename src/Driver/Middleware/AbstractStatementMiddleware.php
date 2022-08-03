<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Driver\Middleware;

use Doctrine\DBAL\Driver\Result;
use Doctrine\DBAL\Driver\Statement;
use Doctrine\DBAL\ParameterType;

abstract class AbstractStatementMiddleware implements Statement
{
    public function __construct(private readonly Statement $wrappedStatement)
    {
    }

    public function bindValue(int|string $param, mixed $value, ParameterType $type): void
    {
        $this->wrappedStatement->bindValue($param, $value, $type);
    }

    public function bindParam(
        int|string $param,
        mixed &$variable,
        ParameterType $type,
        ?int $length = null
    ): void {
        $this->wrappedStatement->bindParam($param, $variable, $type, $length);
    }

    public function execute(): Result
    {
        return $this->wrappedStatement->execute();
    }
}
