# Poox
[![codecov](https://codecov.io/gh/JuGid/Poox/branch/master/graph/badge.svg?token=MYW4EAZ78V)](https://codecov.io/gh/JuGid/Poox) 

Poox is a library used to generate CSS files as PHP classes.
The name is the concatenation of POO (Programmation Orientée Objet) and CSS (sounds as X in French)

## Installation

To install Poox, just get it from composer :
`composer require jugid/poox`

## Guide

### Setup

**build.php**
```php
<?php

require __DIR__ . '/../../vendor/autoload.php';

use Poox\Poox;
use Poox\PooxVariables;

// Optional : Add your variables
$variables = new PooxVariables();
$variables->add('poox-green', '#a0c918');

$poox = new Poox($variables);
$poox->generate(__DIR__.'/myClasses', __DIR__. '/assets', 'The\Namespaces\Of\PooxStyles');
```

### Create a style (or more)
Define the `style() : void` function and use the builder to create a hierarchical CSS.

**Body.php**
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
This command will generate a file named `build.css` in the defined directory or separated files if `inSeparateFiles()`is passed to Poox in your `build.php`

```
php build.php
```

## Roadmap

- [ ] Finish methods for all properties
- [ ] Multiple namespace styles
- [ ] Syntactic sugar

## License

Do what you want with Poox.

