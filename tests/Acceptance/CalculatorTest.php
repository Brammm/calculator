<?php

declare(strict_types=1);

namespace Brammm\Calculator\Acceptance;

use Brammm\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * @dataProvider expressionProvider
     */
    public function testItCalculatesAResult(string $expression, string $result): void
    {
        self::assertSame($result, $this->calculator->calculate($expression));
    }

    /**
     * @return array<array{string, int}>
     */
    public function expressionProvider(): array
    {
        return [
            ['2 + 3', '5'],
        ];
    }
}
