<?php

namespace Poox\Trait;

trait OverflowTrait {

    public function overflow(string $value) : self {
        return $this->addProperty('overflow', $value);
    }

    public function overflowX(string $value) : self {
        return $this->addProperty('overflow-x', $value);
    }

    public function overflowY(string $value) : self {
        return $this->addProperty('overflow-y', $value);
    }
}