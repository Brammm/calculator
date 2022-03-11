<?php

declare(strict_types=1);

namespace Brammm\Calculator\Operator;

use function bcadd;

final class Add implements Operator
{
    public function symbol(): string
    {
        return '+';
    }

    public function operate(string $a, string $b): string
    {
        return bcadd($a, $b);
    }
}
