<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait PaddingTrait {
    public function padding(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s', $this->convertToString($value, $unit));
        return $this->addProperty('padding', $value);
    }

    public function paddingTop(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s', $this->convertToString($value, $unit));
        return $this->addProperty('padding-top', $value);
    }

    public function paddingRight(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s', $this->convertToString($value, $unit));
        return $this->addProperty('padding-right', $value);
    }

    public function paddingBottom(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s', $this->convertToString($value, $unit));
        return $this->addProperty('padding-bottom', $value);
    }

    public function paddingLeft(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s', $this->convertToString($value, $unit));
        return $this->addProperty('padding-left', $value);
    }
}