<?php

namespace Poox\Trait;

use InvalidArgumentException;
use Poox\PooxBuilder;

trait MarginTrait {

    public function margin(int|string ...$values) : self {

        foreach($values as $val) {
            if(!is_string($val) && !is_integer($val)) {
                throw new InvalidArgumentException('Arguments of function margin may be string or integer');
            }
        }

        switch(count($values)) {
            case 1:
                $this->marginFull($values[0]);
                break;
            case 2:
                $this->marginVH($values[0], $values[1]);
                break;
            case 3:
                $this->marginTHB($values[0], $values[1], $values[2]);
                break;
            case 4:
                $this->marginTRBL($values[0], $values[1], $values[2], $values[3]);
                break;
        }

        return $this;
    }

    public function marginFull(int|string $value, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        return $this->addProperty('margin', $this->convertToString($value, $unit));
    }

    public function marginVH(int|string $vertical, int|string $horizontal, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s %s', 
            $this->convertToString($vertical, $unit), 
            $this->convertToString($horizontal, $unit)
        );

        return $this->addProperty('margin', $value);
    }

    public function marginTHB(int|string $top, int|string $horizontal, int|string $bottom, string $unit = PooxBuilder::MOST_USED_UNIT) : self {
        $value = sprintf('%s %s %s', 
            $this->convertToString($top, $unit), 
            $this->convertToString($horizontal, $unit),
            $this->convertToString($bottom, $unit)
        );

        return $this->addProperty('margin', $value);
    }

    public function marginTRBL(int|string $top, int|string $right, int|string $bottom, int|string $left, string $unit = PooxBuilder::MOST_USED_UNIT) {
        $value = sprintf('%s %s %s %s', 
            $this->convertToString($top, $unit), 
            $this->convertToString($right, $unit),
            $this->convertToString($bottom, $unit),
            $this->convertToString($left, $unit)
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