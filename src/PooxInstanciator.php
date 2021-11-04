<?php

namespace Poox;

use Poox\Interfaces\Instanciator;
use ReflectionClass;

abstract class PooxInstanciator implements Instanciator {

    public static function instanciate(string $directory, array $namespaces) : array {
        $files = PooxFinder::find($directory);

        $classnames = [];
        foreach($files as $file) {
            require_once $file->getRealPath();

            $classname = self::getClassname($namespaces, $file->getFilename(), $classnames);

            if(!empty($classname)) {
                $classnames[] = $classname;
            }
            
        }

        return self::instanciateClassFromName($classnames);
    }

    private static function getClassname(array $namespaces, string $filename, array $classnames) : string {
        foreach($namespaces as $namespace) {
            $tmp_classname = $namespace. '\\'. str_replace('.php', '', $filename);

            if(!in_array($tmp_classname, $classnames) && class_exists($tmp_classname)) {
                return $tmp_classname;
            }
        }

        return '';
    }

    private static function instanciateClassFromName(array $classnames) : array {
        $instances = [];
        foreach($classnames as $className) {
            $instances[] = (new ReflectionClass($className))->newInstance();
        }

        return $instances;
    }

    
}