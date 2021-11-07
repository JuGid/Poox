<?php

namespace Poox\Trait;

trait PropertiesTrait {
    use 
    MarginTrait, 
    PaddingTrait, 
    ListStyleTrait, 
    AlignTrait, 
    AnimationTrait, 
    SizeTrait,
    PositionTrait,
    OverflowTrait;

    public abstract function addProperty(string $name, string|int|float|array $value) : self;

    public function color(string $value) : self {
        return $this->addProperty('color', $value);
    }

    public function display(string $value) : self {
        return $this->addProperty('display', $value);
    }

    public function background(string $color) {
        $this->addProperty('background', $color);
    }

    public function textDecoration(string $value) : self {
        return $this->addProperty('text-decoration', $value);
    }

    public function all(string $value) : self {
        return $this->addProperty('all', $value);
    }

    public function convertToString(int|string|float $value, string $unit) : string {
        return is_string($value) ? sprintf('%s', $value) : sprintf('%d%s', $value, $unit);
    }
}