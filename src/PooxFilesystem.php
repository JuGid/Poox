<?php

namespace Poox;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

abstract class PooxFilesystem {

    public static function clearDirectory(string $directory) : void {
        $finder = new Finder();
        $filesystem = new Filesystem();
        $files = $finder->files()->in($directory);
        $filesystem->remove($files);
    }

    public static function writeInFile(string $directory, string $filename ,string $render) : void {
        $file = fopen($directory.$filename, 'a');
        fwrite($file, $render);
        fclose($file);
    }
}