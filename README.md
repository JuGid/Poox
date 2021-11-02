# Poox
[![codecov](https://codecov.io/gh/JuGid/Poox/branch/master/graph/badge.svg?token=MYW4EAZ78V)](https://codecov.io/gh/JuGid/Poox) 
## Installation

`composer require jugid/poox`

## Guide

### Install Poox

`composer require jugid/poox`

### Setup

build.php
```php
<?php

require __DIR__ . '/../../vendor/autoload.php';

use Poox\Poox;
use Poox\PooxVariables;

// Optional : Add your variables
$variables = new PooxVariables();
$variables->add('poox-green', '#a0c918');

$poox = new Poox($variables);
$poox->generate(__DIR__.'/css', __DIR__. '/assets', 'The\Namespaces\Of\PooxStyles');
```

### Create a style (or more)

```php
<?php

namespace Poox\Tests\Css;

use Poox\Node\PooxNodeType;
use Poox\PooxStyle;

class Body extends PooxStyle {

    public function style() : void {
        $builder = $this->createBuilder();
        [...]
    }
}
```

### Run Poox

`php build.php`

## Roadmap

- [] Finish methods for all properties
- [] Syntactic sugar

## License

Do what you want with Poox.

