<?php

require __DIR__ . '/../../vendor/autoload.php';

use Poox\Poox;
use Poox\PooxVariables;

$variables = new PooxVariables();
$variables->add('poox-green', '#a0c918')
          ->add('poox-grey', '#cfcfcf');

$poox = new Poox($variables);
$from = __DIR__.'/Css';
$to = __DIR__. '/assets';

//$poox->inSeparateFiles()->generate($from, $to, 'Poox\Tests\Css');
$poox->generate($from, $to, 'Poox\Tests\Css');