<?php

namespace Poox\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\MockObject\InvalidMethodNameException;
use PHPUnit\Framework\TestCase;
use Poox\PooxVariables;

class PooxVariableTest extends TestCase {

    protected PooxVariables $pooxVariables;

    protected function setUp() : void {
        $this->pooxVariables = new PooxVariables();
    }

    public function testAddVariables() {
        $this->pooxVariables->add('green', '#00FF00')
                            ->add('red', '#FF0000');
        $this->assertSame('#00FF00', $this->pooxVariables->get('green'));
        $this->assertSame('#FF0000', $this->pooxVariables->get('red'));
    }

    public function testGetShouldThrowException() {

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('This variable name does not exist (red)');

        $this->pooxVariables->add('green', '#00FF00');
        $this->pooxVariables->get('red');
    }

    public function testShouldGetSimpleByCall() {
        $this->pooxVariables->add('green', '#00FF00');
        $this->pooxVariables->add('red', '#FF0000');

        $this->assertSame('#FF0000', $this->pooxVariables->getRed());
    }

    public function testShouldGetComplexByCall() {
        $this->pooxVariables->add('poox-green', '#a0c918')
                            ->add('poox-grey-light', '#cfcfcf')
                            ->add('this-is-a-complex-variablename', '#000000');

        $this->assertSame('#a0c918', $this->pooxVariables->getPooxGreen());
        $this->assertSame('#cfcfcf', $this->pooxVariables->getPooxGreyLight());
        $this->assertSame('#000000', $this->pooxVariables->getThisIsAComplexVariablename());
    }

    public function testCallShouldThrowException() {
        $this->expectException(InvalidMethodNameException::class);
        
        $this->pooxVariables->add('green', '#00FF00');
        $this->pooxVariables->add('red', '#FF0000');

        $this->pooxVariables->gtGreen();
        $this->pooxVariables->addPooxGreen();
    }
}