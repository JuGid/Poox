<?php

namespace Poox;

use Poox\Interfaces\Transformer;

class PooxTransformer implements Transformer{

    public static function transform(array $buildernodes) : array {
        $nodesInheritance = [];
        foreach($buildernodes as $nodes) {
            foreach($nodes as $node) {
                self::getNodeInheritance($node, $node->getName(), $node->getName(), $nodesInheritance);
            }
        }
        return $nodesInheritance;
    }

    private static function getNodeInheritance($node, string $parentsName, string $parent,array &$arrayInheritance) {
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
                self::getNodeInheritance($child,  $nodeSelector, $parent, $arrayInheritance);
            }
        }
    }
}