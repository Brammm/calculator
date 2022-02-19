#!/usr/bin/env php
<?php

use Brammm\Calculator\Calculator;

require __DIR__ . '/../vendor/autoload.php';

$calculator = new Calculator();

$result = $calculator->calculate('5 + 3');

echo $result . PHP_EOL;
