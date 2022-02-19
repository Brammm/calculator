<?php

declare(strict_types=1);

namespace Brammm\Calculator\Parser;

use SplDoublyLinkedList;
use SplStack;

final class ShuntingYardParser
{
    public function parse(SplDoublyLinkedList $symbols): SplDoublyLinkedList
    {
        $output        = new SplDoublyLinkedList();
        $operatorStack = new SplStack();

        foreach ($symbols as $symbol) {
            if (is_numeric($symbol)) {
                $output->push($symbol);
            } else {
                $operatorStack->push($symbol);
            }
        }

        // Put the remaining operators on the output list
        foreach ($operatorStack as $operator) {
            $output->push($operator);
        }

        return $output;
    }
}
