<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait PositionTrait {

    public function zindex(int|string $value) {
        $this->addProperty('z-index', $value);
    }

    public function position(string $value) : self {
        return $this->addProperty('position', $value);
    }

    public function top(string|int $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('top', $this->convertToString($value, $unit));
    }

    public function left(string|int $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('left', $this->convertToString($value, $unit));
    }

    public function bottom(string|int $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('bottom', $this->convertToString($value, $unit));
    }

    public function right(string|int $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('right', $this->convertToString($value, $unit));
    }

    public function resize(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('resize', $this->convertToString($value, $unit));
    }

    public function float(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('float', $this->convertToString($value, $unit));
    }

    public function textAlign(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('text-align', $this->convertToString($value, $unit));
    }

    public function textAlignLast(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('text-align-last', $this->convertToString($value, $unit));
    }

    public function verticalAlign(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('vertical-align', $this->convertToString($value, $unit));
    }

    public function alignContent(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = $this->convertToString($value, $unit);
        $this->addProperty('-webkit-align-content', $value);
        $this->addProperty('align-content', $value);
        return $this;
    }

    public function alignItems(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = $this->convertToString($value, $unit);
        $this->addProperty('-webkit-align-items', $value);
        $this->addProperty('align-items', $value);
        return $this;
    }

    public function alignSelf(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = $this->convertToString($value, $unit);
        $this->addProperty('-webkit-align-self', $value);
        $this->addProperty('align-self', $value);
        return $this;
    }
}