<?php

namespace Poox;

use Poox\Interfaces\Creator;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PooxCreator implements Creator {

    private FilesystemLoader $loader;

    private Environment $twig;

    private string $genericfilename;

    public function __construct(){
        $this->loader = new FilesystemLoader(__DIR__.'/../templates');
        $this->twig = new Environment($this->loader);
        $this->genericfilename = '/build.css';
    }

    public function create(string $directory, array $definitions, bool $separateFiles) : void {
        PooxFilesystem::clearDirectory($directory);
        $renderedDefinitions = $this->renderDefinitions($definitions);
        
        foreach($renderedDefinitions as $parent => $render) {
            if($separateFiles) {
                PooxFilesystem::writeInFile($directory, '/'.$parent.'.css', $render);
            } else {
                PooxFilesystem::writeInFile($directory, $this->genericfilename, $render);
            }
        }
    }

    private function renderDefinitions(array $definitions) : array {
        $renderedDefinitions = [];

        foreach($definitions as $parent => $definition) {
            $renderedDefinitions[$parent] = $this->twig->render('part.css.twig', ['definitions' => $definition]);
        }

        return $renderedDefinitions;
    }
}