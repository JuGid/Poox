<?php

namespace Poox\Interfaces;

interface Instanciator {

    public static function instanciate(string $directory, array $namespaces) : array;
}