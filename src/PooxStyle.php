<?php

namespace Poox;

abstract class PooxStyle {

    private array $builders = [];

    public function __construct(
        private PooxVariables $variables
    ){}

    private function add(PooxBuilder $pooxBuilder) {
        $this->builders[] = $pooxBuilder;
    }

    protected function createBuilder() : PooxBuilder {
        $builder = new PooxBuilder();
        $this->add($builder);
        return $builder;
    }

    protected function getValueOf(string $variableName) : string {
        return $this->variables->get($variableName);
    }

    public function getBuilders() : array {
        return $this->builders;
    }

    abstract public function style() : void;
}