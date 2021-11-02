<?php

namespace Poox\Tests;

use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;
use Poox\Node\PooxNodeType;
use Poox\PooxBuilder;

class PooxBuilderTest extends TestCase {

    private PooxBuilder $builder;

    protected function setUp() : void {
        $this->builder = new PooxBuilder();
    }

    public function testShouldTryAddingPropertyOnNoNodeBuilder() {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('You should add a node before setting a property');

        $this->builder->margin(0);
    }

    public function testShouldAddNodeInBuilder() {
        $this->builder->addNode('nav');

        $this->assertSame(1, count($this->builder->getNodes()));
        $this->assertSame(' ', $this->getFirstNode()->getSelector());
    }

    public function testShouldAddChildNodeToCurrent() {
        $this->builder->addNode('nav')->add('ul', PooxNodeType::INSIDE);

        $this->assertSame(1, count($this->builder->getNodes()[0]->getNodes()));
        $this->assertSame(' ', $this->getFirstNode()->getNodes()[0]->getSelector());
    }

    public function testShouldAddProperty() {
        $this->builder->addNode('nav')->margin(0);

        $this->assertSame('0px', $this->getFirstNode()->getProperties()['margin']);
    }

    public function testShouldAddSameProperty() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The property margin already exists. Just redefine it.');

        $this->builder->addNode('nav')->margin(0);
        $this->builder->margin(10);
    }

    public function testShouldAddMultipleNode() {
        $this->builder->addNode('nav')
                        ->add('ul', PooxNodeType::INSIDE)
                            ->margin(0)
                        ->end()
                        ->add('li', PooxNodeType::INSIDE)
                            ->margin(0)
                        ->end()
                    ->endNode();
        
        $this->assertEquals(2, count($this->getFirstNode()->getNodes()));
    }

    private function getFirstNode() {
        return $this->builder->getNodes()[0];
    }
}