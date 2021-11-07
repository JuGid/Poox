<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait AlignTrait {

    public function alignContent(string $value) : self {
        $this->addProperty('align-content', $value);
        $this->addProperty('-webkit-align-content', $value);
        return $this;
    }

    public function alignItems(string $value) : self {
        $this->addProperty('align-items', $value);
        $this->addProperty('-webkit-align-items', $value);
        return $this;
    }

    public function alignSelf(string $value) : self {
        $this->addProperty('align-self', $value);
        $this->addProperty('-webkit-align-self', $value);
        return $this;
    }

    public function verticalAlign(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('vertical-align', $this->convertToString($value, $unit));
    }

    public function textAlign(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('text-align', $this->convertToString($value, $unit));
    }

    public function textAlignLast(string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('text-align-last', $this->convertToString($value, $unit));
    }
}