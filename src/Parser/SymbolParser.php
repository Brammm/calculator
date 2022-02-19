<?php

declare(strict_types=1);

namespace Brammm\Calculator\Parser;

use SplDoublyLinkedList;

interface SymbolParser
{
    /**
     * Parse an infix expression to an array of operators and operands
     *
     * @return string[]
     */
    public function parse(string $expression): SplDoublyLinkedList;
}
