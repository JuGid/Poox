<?php

namespace Poox\Interfaces;

interface Creator {

    public function create(string $directory, array $definitions, bool $separateFiles) : void;
}