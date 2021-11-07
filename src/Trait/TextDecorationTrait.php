<?php

namespace Poox\Trait;

trait TextDecorationTrait {

    public function textDecoration(...$values) : self {
        $this->verify($values);

        if(isset($values[0])) {
            $this->textDecorationLine($values[0]);
        }
        
        if(isset($values[1])) {
            $this->textDecorationColor($values[1]);
        }

        if(isset($values[2])) {
            $this->textDecorationColor($values[2]);
        }

        return $this;
    }

    public function textDecorationLine(string $value) : self {
        return $this->addProperty('text-decoration-line', $value);
    }

    public function textDecorationColor(string $value) : self {
        return $this->addProperty('text-decoration-color', $value);
    }

    public function textDecorationStyle(string $value) : self {
        return $this->addProperty('text-decoration-style', $value);
    }
}