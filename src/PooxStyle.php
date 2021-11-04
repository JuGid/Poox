<?php

namespace Poox;

abstract class PooxStyle {

    private array $builders = [];

    private ?PooxVariables $variables;

    private function add(PooxBuilder $pooxBuilder) {
        $this->builders[] = $pooxBuilder;
    }

    protected function createBuilder() : PooxBuilder {
        $builder = new PooxBuilder();
        $this->add($builder);
        return $builder;
    }

    public function setVariables(?PooxVariables $variables) : void {
        $this->variables = $variables;
    }

    protected function getValueOf(string $variableName) : string {
        return $this->variables->get($variableName);
    }

    public function getBuilders() : array {
        return $this->builders;
    }

    abstract public function style() : void;
}