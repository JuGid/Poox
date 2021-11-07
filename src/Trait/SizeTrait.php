<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait SizeTrait {

    public function height(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('height', $this->convertToString($value, $unit));
    }

    public function width(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('width', $this->convertToString($value, $unit));
    }

    public function minHeight(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('min-height', $this->convertToString($value, $unit));
    }

    public function minWidth(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('min-width', $this->convertToString($value, $unit));
    }

    public function maxHeight(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('max-height', $this->convertToString($value, $unit));
    }

    public function maxWidth(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('max-width', $this->convertToString($value, $unit));
    }
}