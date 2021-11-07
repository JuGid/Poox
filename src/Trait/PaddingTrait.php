<?php

namespace Poox\Trait;

use InvalidArgumentException;
use Poox\PooxBuilder;

trait PaddingTrait {
    public function padding(...$values) : self {

        $this->verify($values);

        switch(count($values)) {
            case 1:
                $this->paddingFull($values[0]);
                break;
            case 2:
                $this->paddingVH($values[0], $values[1]);
                break;
            case 3:
                $this->paddingTHB($values[0], $values[1], $values[2]);
                break;
            case 4:
                $this->paddingTRBL($values[0], $values[1], $values[2], $values[3]);
                break;
        }

        return $this;
    }

    public function paddingFull(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('padding', $this->convertToString($value, $unit));
    }

    public function paddingVH(int|string $vertical, int|string $horizontal, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s %s', 
            $this->convertToString($vertical, $unit), 
            $this->convertToString($horizontal, $unit)
        );

        return $this->addProperty('padding', $value);
    }

    public function paddingTHB(int|string $top, int|string $horizontal, int|string $bottom, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s %s %s', 
            $this->convertToString($top, $unit), 
            $this->convertToString($horizontal, $unit),
            $this->convertToString($bottom, $unit)
        );

        return $this->addProperty('padding', $value);
    }

    public function paddingTRBL(int|string $top, int|string $right, int|string $bottom, int|string $left, string $unit = PooxBuilder::MOST_USED_UNIT) {
        $value = sprintf('%s %s %s %s', 
            $this->convertToString($top, $unit), 
            $this->convertToString($right, $unit),
            $this->convertToString($bottom, $unit),
            $this->convertToString($left, $unit)
        );

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