<?php

namespace Poox;

use InvalidArgumentException;
use LogicException;
use Poox\Node\PooxNode;
use Poox\Node\PooxNodeType;
use Poox\Trait\PropertiesTrait;

class PooxBuilder {
    use PropertiesTrait;

    public const MOST_USED_UNIT = 'px';
    
    private array $nodes = [];

    private ?PooxNode $currentNode = null;

    public function addProperty(string $name, string|int|float|array $value) : self {
        if($this->currentNode === null) {
            throw new LogicException('You should add a node before setting a property');
        }

        if(isset($this->currentNode->getProperties()[$name])) {
            throw new InvalidArgumentException('The property '.$name.' already exists. Just redefine it.');
        }

        $this->currentNode->addProperty($name, $value);
        return $this;
    }

    public function addNode(string $name, string $selector = PooxNodeType::NONE) : self {
        $node = new PooxNode($name, $selector);
        
        if($this->currentNode !== null) {
            $this->currentNode->addNode($node);
        } else {
            $this->nodes[] = $node;
        }

        $this->currentNode = $node;
        return $this;
    }


    public function endNode() : self {
        $this->currentNode = $this->currentNode->getParent();
        return $this;
    }

    public function getNodes() : array {
        return $this->nodes;
    }

    /*
    * ALIASES
    */

    public function add(string $name, string $selector = PooxNodeType::INSIDE) : self {
        return $this->addNode($name, $selector);
    }

    public function end() : self {
        return $this->endNode();
    }

    
}