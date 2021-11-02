<?php

namespace Poox;

use ReflectionClass;
use Symfony\Component\Finder\Finder;

class Poox {

    public function __construct(
        private ?PooxVariables $variables = null,
        private bool $separateFiles = false
    ) {}

    public function inSeparateFiles() : self {
        $this->separateFiles = true;
        return $this;
    }

    public function generate(string $from, string $to, string $namespace) : bool {
        $instances = $this->instanciateStyleClassFromDirectory($from, $namespace);

        $buildersNodes = $this->getBuildersNodes($instances);
        $nodeInheriance = $this->getCssAsArray($buildersNodes);
        
        $creator = new PooxCreator();
        $creator->create($to, $nodeInheriance, $this->separateFiles);
        return true;
    }

    private function instanciateStyleClassFromDirectory(string $directory, string $namespace) : array {
        $finder = new Finder();
        $files = $finder->files()->in($directory);
        return $this->instanciateClassFromFiles($files, $namespace);
    }

    private function instanciateClassFromFiles(Finder $files, string $namespace) : array {
        $classnames = [];
        foreach($files as $file) {
            require_once $file->getRealPath();

            $classname = $namespace. '\\'. $file->getFilename();
            $classnames[] = str_replace('.php', '', $classname);
        }

        return $this->instanciateClassFromName($classnames);
    }

    private function instanciateClassFromName(array $classnames) : array {
        $instances = [];
        foreach($classnames as $className) {
            $instances[] = (new ReflectionClass($className))->newInstance($this->variables);
        }

        return $instances;
    }

    private function getBuildersNodes(array $instances) {
        $buildersNodes = [];
        foreach($instances as $instance) {
            $instance->style();
            $builders = $instance->getBuilders();
            foreach($builders as $builder) {
                $buildersNodes[] = $builder->getNodes();
            }
        }

        return $buildersNodes;
    }

    private function getCssAsArray(array $buildersNodes) {
        $nodesInheritance = [];
        foreach($buildersNodes as $nodes) {
            foreach($nodes as $node) {
                $this->getNodeInheritance($node, $node->getName(), $node->getName(), $nodesInheritance);
            }
        }
        return $nodesInheritance;
    }

    private function getNodeInheritance($node, string $parentsName, string $parent,array &$arrayInheritance) {
        $nodeSelector = $node->getName();

        if($node->hasParent()) {
            $nodeSelector = $parentsName . $node->getSelector() . $node->getName();
        } else {
            $parent = $node->getName();
        }
        
        if($node->hasProperties()) {
            $arrayInheritance[$parent][] = new PooxDefinition($nodeSelector, $node->getProperties());
        }

        if($node->hasChildren()) {
            $children = $node->getNodes();
            foreach($children as $child) {
                $this->getNodeInheritance($child,  $nodeSelector, $parent, $arrayInheritance);
            }
        }
    }
}