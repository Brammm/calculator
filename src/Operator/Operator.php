<?php

declare(strict_types=1);

namespace Brammm\Calculator\Operator;

interface Operator
{
    public function symbol(): string;

    public function operate(string $a, string $b): string;
}
