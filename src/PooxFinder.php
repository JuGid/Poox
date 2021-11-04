<?php

namespace Poox;

use Symfony\Component\Finder\Finder;

abstract class PooxFinder {

    public static function find(string $directory) : array {
        $files = Finder::create()->files()->in($directory);
        return iterator_to_array($files);
    }
}