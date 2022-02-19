<?php

declare(strict_types=1);

namespace Brammm\Calculator\Unit\Parser;

use Brammm\Calculator\DataProvider;
use Brammm\Calculator\Parser\LoopingSymbolParser;
use PHPUnit\Framework\TestCase;

final class LoopingSymbolParserTest extends TestCase
{
    private LoopingSymbolParser $parser;

    protected function setUp(): void
    {
        $this->parser = new LoopingSymbolParser();
    }

    /**
     * @dataProvider expressionProvider
     */
    public function testItParsesAString(string $expression, array $parsedExpression): void
    {
        self::assertSame($parsedExpression, iterator_to_array($this->parser->parse($expression)));
    }

    /**
     * @return array<array{string, array<string>}>
     */
    public function expressionProvider(): array
    {
        return DataProvider::parsedInfix();
    }
}
