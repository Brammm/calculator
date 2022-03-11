<?php

declare(strict_types=1);

namespace Brammm\Calculator;

use Brammm\Calculator\Operator\Add;
use Brammm\Calculator\Operator\Operator;
use Brammm\Calculator\Parser\LoopingSymbolParser;
use Brammm\Calculator\Parser\ShuntingYardParser;
use Brammm\Calculator\Parser\SymbolParser;
use InvalidArgumentException;
use SplDoublyLinkedList;

final class Calculator
{
    private SymbolParser $symbolParser;

    private ShuntingYardParser $shuntingYardParser;

    /** @var Operator[] */
    private array $operators;

    public function __construct()
    {
        $this->symbolParser = new LoopingSymbolParser();
        $this->shuntingYardParser = new ShuntingYardParser();
        $this->operators = [
            new Add(),
        ];
    }

    public function calculate(string $expression): string
    {
        $symbols = $this->symbolParser->parse($expression);
        $rpn     = $this->shuntingYardParser->parse($symbols);

        $operands = new SplDoublyLinkedList();
        foreach ($rpn as $symbol) {
            if (is_numeric($symbol)) {
                $operands->push($symbol);
                continue;
            }

            $b = $operands->pop();
            $a = $operands->pop();
            $operator = $this->operator($symbol);
            $result = $operator->operate($a, $b);
            $operands->push($result);
        }

        return $operands->pop();
    }

    private function operator(string $symbol): Operator
    {
        foreach ($this->operators as $operator) {
            if ($operator->symbol() === $symbol) {
                return $operator;
            }
        }

        throw new InvalidArgumentException(sprintf('No operator available for symbol "%s"', $symbol));
    }
}
