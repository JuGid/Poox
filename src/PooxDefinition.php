<?php

namespace Poox;

class PooxDefinition {
    
    public function __construct(
        public string $selector,
        public array $properties
    ){}
}