<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait MarginTrait {
    public function margin(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('margin', $this->convertToString($value, $unit));
    }

    public function marginVH(int|string $vertical, int|string $horizontal, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s %s', 
            $this->convertToString($vertical, $unit), 
            $this->convertToString($horizontal, $unit)
        );

        return $this->addProperty('margin', $value);
    }

    public function marginTop(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s', $this->convertToString($value, $unit));
        return $this->addProperty('margin-top', $value);
    }

    public function marginRight(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%d%s', $value, $unit);
        return $this->addProperty('margin-right', $value);
    }

    public function marginBottom(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%d%s', $value, $unit);
        return $this->addProperty('margin-bottom', $value);
    }

    public function marginLeft(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%d%s', $value, $unit);
        return $this->addProperty('margin-left', $value);
    }
}