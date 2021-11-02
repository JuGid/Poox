<?php

namespace Poox\Tests;

use PHPUnit\Framework\TestCase;
use Poox\PooxBuilder;
use Poox\PooxStyle;
use Poox\PooxVariables;
use Poox\Tests\TestsInstances\Menu;
use Poox\Tests\TestsInstances\MenuGetOfValues;

class PooxStyleTest extends TestCase {

    private PooxStyle $basicStyle;

    private PooxStyle $getofStyle;

    public function setUp() : void {
        $variables = new PooxVariables();
        $variables->add('poox-green', '#00FF00');
        $variables->add('poox-red', '#FF0000');

        $this->basicStyle = new Menu($variables);
        $this->getofStyle = new MenuGetOfValues($variables);
    }

    public function testShouldCreatePooxBuilder() {
        $this->assertEquals(0, count($this->basicStyle->getBuilders()));
        $this->basicStyle->style();
        $this->assertEquals(1, count($this->basicStyle->getBuilders()));
    }

    public function testShouldSeeIfGetOfWorks() {
        $this->getofStyle->style();
        $nodeForGetof = $this->getofStyle->getBuilders()[0]->getNodes()[0];

        $this->assertSame('#00FF00', $nodeForGetof->getProperties()['background']);
    }
}