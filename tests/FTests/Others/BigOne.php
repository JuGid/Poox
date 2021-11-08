<?php

namespace Poox\Tests\Others;

use Poox\PooxStyle;

class BigOne extends PooxStyle {

    public function style() : void {
        $builder = $this->createBuilder();
        
        $builder->addByClass('text-blue')
            ->color('#00C2C2')
            ->end();
        
        $builder->addByClass('text-grey')
            ->color('grey')
            ->end();

        $builder->addByClass('text-blue-dark')
            ->color('rgb(16,81,91)')
            ->end();
        
        $builder->addByClass('text-red')
            ->color('red')
            ->end();
        
        $builder->addByClass('text-green')
            ->color('green')
            ->end();

        $builder->addByClass('button-nav')
            ->display('block')
            ->padding('rem', 0.5, 1)
            ->textDecoration('none')
            ->color('#00C2C2')
            ->borderRadius('25px')
            ->hover()
                ->background('#00ABAB')
                ->color('#FFF')
            ->end()
        ->end();

        $builder->addByClass('module')
            ->color('rgb(16,81,91)')
            ->hover()->color('#FFF')->end()
        ->end();

        $builder->addByClass('border-search')
            ->borderColor('#00ABAB')->important()
        ->end();
    }

}