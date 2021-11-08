<?php

namespace Poox\Node;

class PooxNode {

    private ?PooxNode $parent = null;

    private array $nodes = [];

    private array $properties = [];

    public function __construct(
        private string $name, 
        private string $selectorWithParent
    ){}

    public function addNode(PooxNode $node) {
        $node->setParent($this);
        $this->nodes[] = $node;
    }

    public function hasChildren() : bool {
        return !empty($this->nodes);
    }

    public function hasParent() : bool {
        return $this->parent !== null;
    }

    public function addProperty(string $name, string|int|float|array $value) {
        $this->properties[$name] = $value;
    }

    public function hasProperties() : bool {
        return !empty($this->properties);
    }

    public function getProperties() : array {
        return $this->properties;
    }

    public function setProperties(array $properties) : void {
        $this->properties = $properties;
    }

    public function getParent() : ?PooxNode {
        return $this->parent;
    }

    public function setParent(PooxNode $parent) : void {
        $this->parent = $parent;
    }

    public function getSelector() : string {
        return $this->selectorWithParent;
    }

    public function getNodes() : array {
        return $this->nodes;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : void {
        $this->$name = $name;
    }

    public function addSelector(string $selector) : void {
        $this->setName($this->name . $selector);
    }

}