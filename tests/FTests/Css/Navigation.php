<?php

namespace Poox\Tests\Css;

use Poox\Node\PooxNodeType;
use Poox\PooxStyle;

class Navigation extends PooxStyle {

    public function style() : void {
        $builder = $this->createBuilder();
        
        $builder->addNode('nav');
        $builder->background($this->getValueOf('poox-green'));

        $builder->add('ul')
                    ->margin(0)
                    ->padding(0)
                    ->listStyle('none')
                ->end();

        $builder->add('li')
                    ->display('inline-block')
                ->end();

        $builder->add('a')
                    ->display('block')
                    ->padding('6px 12px')
                    ->textDecoration('none')
                ->end();

        $builder->add('h1', PooxNodeType::PARENT)
                    ->padding(0)
                ->add('p', PooxNodeType::PRECEDENCE)
                    ->padding(0)
                ->end()
                ->end();
        $builder->endNode();
    }

    /*
    SHOULD GIVE

    nav {
        background : #a0c918;
    }

    nav ul {
        margin : 0px;
        padding : 0px;
        list-style : none;
    }

    nav li {
        display : inline-block;
    }

    nav a {
        display : block;
        padding : 6px 12px;
        text-decoration : none;
    }

    nav>h1 {
        padding : 0px;
    }

    nav>h1~p {
        padding : 0px;
    }
    */
}