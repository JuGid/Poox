<?php

namespace Poox\Trait;

trait ListStyleTrait {

    public function listStyle(string $value, ?string $url = null, ?bool $in = null) : self {
        if($in !== null) {
            $inOutString = $in ? 'inside' : 'outside';
        } 

        if($url !== null) {
            $urlAsString = "url(\'".$url."\')";
        }

        $value = sprintf('%s %s %s', 
            $value, 
            $inOutString ?? '', 
            $urlAsString ?? ''
        );

        return $this->addProperty('list-style', $value);
    }

    public function listStyleImage(string $value) : self {
        if(str_contains($value, '.')) {
            $value = "url(\'".$value."\')";
        }

        return $this->addProperty('list-style-image', $value);
    }

    public function listStylePosition(string $value) : self {
        return $this->addProperty('list-style-position', $value);
    }

    public function listStyleType(string $value) : self {
        return $this->addProperty('list-style-type', $value);
    }
}