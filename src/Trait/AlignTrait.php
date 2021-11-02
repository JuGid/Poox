<?php

namespace Poox\Trait;

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
}