<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait WordTrait {

    public function wordBreak(string $value) : self {
        return $this->addProperty('word-break', $value);
    }

    public function wordSpacing(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('word-spacing', $this->convertToString($value, $unit));
    }

    public function wordWrap(string $value) : self {
        return $this->addProperty('word-wrap', $value);
    }
}