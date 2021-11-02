<?php

namespace Poox\Tests\Css;

use Poox\Node\PooxNodeType;
use Poox\PooxStyle;

class Body extends PooxStyle {

    public function style() : void {
        $builder = $this->createBuilder();
        
        $builder->addNode('body');
        $builder->background($this->getValueOf('poox-green'));

        $builder->add('p')
                ->padding(0)
                ->end();

        $builder->endNode();
    }

    /*
    SHOULD GIVE

    body {
        background : #a0c918;
    }

    body p {
        padding : 0px;
    }

    */
}