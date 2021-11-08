<?php

namespace Poox\Trait;

use Poox\Node\PooxNodeType;

trait SelectorTrait {
    public function active() : self {
        return $this->addCurrentNodeSelector(':active');
    }

    public function after() : self {
        return $this->addCurrentNodeSelector('::after');
    }

    public function before() : self {
        return $this->addCurrentNodeSelector('::before');
    }

    public function checked() : self {
        return $this->addCurrentNodeSelector(':checked');
    }

    public function default() : self {
        return $this->addCurrentNodeSelector(':default');
    }

    public function disabled() : self {
        return $this->addCurrentNodeSelector(':disabled');
    }

    public function empty() : self {
        return $this->addCurrentNodeSelector(':empty');
    }

    public function enabled() : self {
        return $this->addCurrentNodeSelector(':enabled');
    }

    public function firstChild() : self {
        return $this->addCurrentNodeSelector(':first-child');
    }

    public function firstLetter() : self {
        return $this->addCurrentNodeSelector('::first-letter');
    }

    public function firstLine() : self {
        return $this->addCurrentNodeSelector(':first-line');
    }

    public function firstOfType() : self {
        return $this->addCurrentNodeSelector(':first-of-type');
    }

    public function focus() : self {
        return $this->addCurrentNodeSelector(':focus');
    }

    public function fullscreen() : self {
        return $this->addCurrentNodeSelector(':fullscreen');
    }

    public function hover() : self {
        return $this->addCurrentNodeSelector(':hover');
    }

    public function inRange() : self {
        return $this->addCurrentNodeSelector(':in-range');
    }

    public function indeterminate() : self {
        return $this->addCurrentNodeSelector(':indeterminate');
    }

    public function invalid() : self {
        return $this->addCurrentNodeSelector(':invalid');
    }

    public function lang(string $language) : self {
        return $this->addCurrentNodeSelector(':lang('.$language.')');
    }

    public function lastChild() : self {
        return $this->addCurrentNodeSelector(':last-child');
    }

    public function lastOfType() : self {
        return $this->addCurrentNodeSelector(':last-of-type');
    }

    public function link() : self {
        return $this->addCurrentNodeSelector(':link');
    }

    public function marker() : self {
        return $this->addCurrentNodeSelector('::marker');
    }

    public function not(string $selector) : self {
        return $this->addCurrentNodeSelector(':not('.$selector.')');
    }

    public function nthChild(int $index) : self {
        return $this->addCurrentNodeSelector(':nth-child('.$index.')');
    }

    public function nthLastChild(int $index) : self {
        return $this->addCurrentNodeSelector(':nth-last-child('.$index.')');
    }

    public function nthLastOfType(int $index) : self {
        return $this->addCurrentNodeSelector(':nth-last-of-type('.$index.')');
    }

    public function nthOfType(int $index) : self {
        return $this->addCurrentNodeSelector(':nth-of-type('.$index.')');
    }

    public function onlyOfType() : self {
        return $this->addCurrentNodeSelector(':only-of-type');
    }

    public function onlyChild() : self {
        return $this->addCurrentNodeSelector(':only-child');
    }

    public function optional() : self {
        return $this->addCurrentNodeSelector(':optional');
    }

    public function outOfRange() : self {
        return $this->addCurrentNodeSelector(':out-of-range');
    }

    public function placeholder() : self {
        return $this->addCurrentNodeSelector('::placeholder');
    }

    public function readOnly() : self {
        return $this->addCurrentNodeSelector(':read-only');
    }

    public function readWrite() : self {
        return $this->addCurrentNodeSelector(':read-write');
    }

    public function required() : self {
        return $this->addCurrentNodeSelector(':required');
    }

    public function root() : self {
        return $this->addCurrentNodeSelector(':root');
    }

    public function selection() : self {
        return $this->addCurrentNodeSelector('::selection');
    }

    public function target() : self {
        return $this->addCurrentNodeSelector(':target');
    }

    public function valid() : self {
        return $this->addCurrentNodeSelector(':valid');
    }

    public function visited() : self {
        return $this->addCurrentNodeSelector(':visited');
    }

    public function addCurrentNodeSelector(string $selector) {
        if(!$this->isCurrentNodeNull()) {
            $this->add($selector, PooxNodeType::NONE);
        }

        return $this;
    }
}