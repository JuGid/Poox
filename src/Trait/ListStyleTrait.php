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
}