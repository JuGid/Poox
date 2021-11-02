<?php

namespace Poox\Tests\TestsInstances;

use Poox\PooxBuilder;
use Poox\PooxStyle;

class MenuGetOfValues extends PooxStyle {

    public function style() : void {
        $builder = $this->createBuilder();

        $builder->add('li')->background($this->getValueOf('poox-green'));
    }
}