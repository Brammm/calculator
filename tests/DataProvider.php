<?php

declare(strict_types=1);

namespace Brammm\Calculator;

final class DataProvider
{
    private const EXPRESSIONS = [
        '5 + 3',
        '55 + 3',
        '5 + 3.55',
        '-5 + 3',
    ];

    private const PARSED_INFIX = [
        ['5', '+', '3'],
        ['55', '+', '3'],
        ['5', '+', '3.55'],
        ['-', '5', '+', '3'],
    ];

    private const RESULTS = [
        '8',
        '58',
        '8.55',
        '-2',
    ];

    public static function parsedInfix(): array
    {
        return self::map(self::PARSED_INFIX);
    }

    private static function map(array $combine): array
    {
        return array_map(
            static fn (string $expression, mixed $add) => [$expression, $add],
            self::EXPRESSIONS,
            $combine
        );
    }
}
