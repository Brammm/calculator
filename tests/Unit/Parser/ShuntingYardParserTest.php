<?php

declare(strict_types=1);

namespace Brammm\Calculator\Unit\Parser;

use Brammm\Calculator\Parser\ShuntingYardParser;
use PHPUnit\Framework\TestCase;
use SplDoublyLinkedList;

final class ShuntingYardParserTest extends TestCase
{
    private ShuntingYardParser $parser;

    protected function setUp(): void
    {
        $this->parser = new ShuntingYardParser();
    }

    /**
     * @dataProvider listProvider
     */
    public function testItParsesSymbolsIntoRPN(array $symbols, array $reversePolishNotation): void
    {
        $list = new SplDoublyLinkedList();
        foreach ($symbols as $symbol) {
            $list->push($symbol);
        }

        self::assertSame($reversePolishNotation, iterator_to_array($this->parser->parse($list)));
    }

    /**
     * @return array<array{string, array<string>}>
     */
    public function listProvider(): array
    {
        return [
            [['5', '+', '3'], ['5', '3', '+']],
            [['5', '+', '3', '-', '4'], ['5', '3', '4', '-', '+']],
        ];
    }
}
