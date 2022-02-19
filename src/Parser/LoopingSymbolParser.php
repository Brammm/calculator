<?php

declare(strict_types=1);

namespace Brammm\Calculator\Parser;

use SplDoublyLinkedList;

final class LoopingSymbolParser implements SymbolParser
{
    /**
     * @inheritDoc
     */
    public function parse(string $expression): SplDoublyLinkedList
    {
        $expression = preg_replace('/\s+/', '', $expression);
        $characters = mb_str_split($expression);
        $list       = new SplDoublyLinkedList();

        foreach ($characters as $character) {
            $item = $character;
            if ($this->isNumberPart($item) && $list->count() > 0 && $this->isNumberPart($list->top())) {
                $item = $list->pop() . $character;
            }

            $list->push($item);
        }

        return $list;
    }

    private function isNumberPart(string $character): bool
    {
        return is_numeric($character) || $character === '.';
    }
}
