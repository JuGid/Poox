<?php

namespace Poox;

use InvalidArgumentException;
use PHPUnit\Framework\MockObject\InvalidMethodNameException;

class PooxVariables {

    private array $variables;

    public function add(string $name, string|int|float $value) : self {
        $this->variables[$name] = $value;
        return $this;
    }

    public function get(string $name) : string {
        if(!isset($this->variables[$name])) {
            throw new InvalidArgumentException('This variable name does not exist ('. $name .')');
        }

        return $this->variables[$name];
    }

    public function __call(string $name, array $arguments) : mixed
    {
        if(!str_contains($name, 'get')) {
            throw new InvalidMethodNameException('This method cannot be called on PooxVariables ('. $name .')');
        }

        $variableName = lcfirst(str_replace('get', '', $name));
        $variableName = preg_replace('/\B([A-Z])/', '-$1', $variableName);
        $variableName = strtolower($variableName);

        return $this->get($variableName);
    }
}