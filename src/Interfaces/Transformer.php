<?php

namespace Poox\Interfaces;

interface Transformer {
    
    public static function transform(array $data) : array;
}