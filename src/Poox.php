<?php

namespace Poox;

class Poox {

    public function __construct(
        private ?PooxVariables $variables = null,
        private bool $separateFiles = false
    ) {}

    public function inSeparateFiles() : self {
        $this->separateFiles = true;
        return $this;
    }

    public function generate(string $from, string $to, array $namespaces) : bool {
        $instances = PooxInstanciator::instanciate($from, $namespaces);
        $buildersNodes = $this->getBuildersNodes($instances);
        $nodeInheriance = PooxTransformer::transform($buildersNodes);
        
        $creator = new PooxCreator();
        $creator->create($to, $nodeInheriance, $this->separateFiles);
        return true;
    }

    private function getBuildersNodes(array $instances) {
        $buildersNodes = [];
        foreach($instances as $instance) {
            $instance->setVariables($this->variables);
            $instance->style();
            $builders = $instance->getBuilders();
            foreach($builders as $builder) {
                $buildersNodes[] = $builder->getNodes();
            }
        }

        return $buildersNodes;
    }

    
}