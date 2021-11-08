<?php

require __DIR__ . '/../../vendor/autoload.php';

use Poox\Poox;
use Poox\PooxVariables;

$variables = new PooxVariables();

$poox = new Poox($variables);

$from = __DIR__.'/Others';
$to = __DIR__. '/assets';
$namespaces = ['Poox\Tests\Others'];

$poox->generate($from, $to, $namespaces);