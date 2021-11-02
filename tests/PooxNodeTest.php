<?php

namespace Poox\Tests;

use PHPUnit\Framework\TestCase;
use Poox\Node\PooxNode;
use Poox\Node\PooxNodeType;

class PooxNodeTest extends TestCase {

    public function nodeSelectorDataProvider() : array {
        return [
            [PooxNodeType::NONE , ''],
            [PooxNodeType::AND , ','],
            [PooxNodeType::IMMEDIATELY ,'+'],
            [PooxNodeType::INSIDE , ' '],
            [PooxNodeType::PARENT ,'>'],
            [PooxNodeType::PRECEDENCE ,'~'],
            [PooxNodeType::WITH , '.']
        ];
    }

    /**
     * @dataProvider nodeSelectorDataProvider
     */
    public function testShouldCreateANode(string $selector, string $str) {
        $node = new PooxNode('nav', $selector);
        $this->assertSame('nav', $node->getName());
        $this->assertSame($str, $node->getSelector());
    }

    public function testShouldAddAndGetProperties() {
        $properties = [
            'margin'=>'0px',
            'padding'=>0,
            'background'=> ['url(\'image.png\'', 'no-repeat']
        ];

        $node = new PooxNode('nav', PooxNodeType::NONE);
        $this->assertFalse($node->hasProperties());
        $node->addProperty('margin', '0px');
        $node->addProperty('padding', 0);
        $node->addProperty('background', ['url(\'image.png\'', 'no-repeat']);
        $this->assertTrue($node->hasProperties());
        $this->assertEquals($properties, $node->getProperties());
    }

    public function testShouldGetParent() {
        $parent = new PooxNode('nav', PooxNodeType::NONE);
        $node = new PooxNode('ul', PooxNodeType::INSIDE);

        $this->assertSame(null, $node->getParent());
        $node->setParent($parent);
        $this->assertSame($parent, $node->getParent());
    }

    public function testShouldAddSubNode() {
        $parent = new PooxNode('nav', PooxNodeType::NONE);
        $node = new PooxNode('ul', PooxNodeType::INSIDE);

        $this->assertSame(null, $node->getParent());
        $parent->addNode($node);
        $this->assertSame($parent, $node->getParent());
    }
}