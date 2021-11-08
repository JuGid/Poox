<?php

namespace Poox\Trait;

use Poox\PooxBuilder;

trait BorderTrait {

    public function borderColor(...$values) : self {
        $pattern = str_repeat('%s ', count($values));
        return $this->addProperty('border-color', vsprintf($pattern, $values));
    }

    public function borderCollapse(string $value) : self {
        return $this->addProperty('border-collaspe', $value);
    }

    public function borderRadius(...$values) : self {
        $pattern = str_repeat('%s ', count($values));
        return $this->addProperty('border-radius', vsprintf($pattern, $values));
    }

    public function borderWidth(...$values) : self {
        $pattern = str_repeat('%s ', count($values));
        return $this->addProperty('border-width', vsprintf($pattern, $values));
    }

    public function borderTop(string $width, string $style, string $color = '') : self {
        return $this->specificBorder('top', $width, $style, $color);
    }

    public function borderLeft(string $width, string $style, string $color = '') : self {
        return $this->specificBorder('left', $width, $style, $color);
    }

    public function borderBottom(string $width, string $style, string $color = '') : self {
        return $this->specificBorder('bottom', $width, $style, $color);
    }

    public function borderRight(string $width, string $style, string $color = '') : self {
        return $this->specificBorder('right', $width, $style, $color);
    }

    private function specificBorder(string $border, ...$values) : self {
        $this->addProperty('border-'.$border.'-width', $values[0]);
        $this->addProperty('border-'.$border.'-style', $values[1]);
        $this->addProperty('border-'.$border.'-color', $values[2]);
        return $this;
    }
}