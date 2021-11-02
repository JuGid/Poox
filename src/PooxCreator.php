<?php

namespace Poox;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PooxCreator {

    private FilesystemLoader $loader;

    private Environment $twig;

    private string $genericfilename;

    public function __construct(){
        $this->loader = new FilesystemLoader(__DIR__.'/../templates');
        $this->twig = new Environment($this->loader);
        $this->genericfilename = '/build.css';
    }

    public function create(string $directory, array $definitions, bool $separateFiles) : void {
        $this->clear($directory);
        $renderedDefinitions = $this->renderDefinitions($definitions);
        
        foreach($renderedDefinitions as $parent => $render) {
            if($separateFiles) {
                $this->writeInFile($directory, '/'.$parent.'.css', $render);
            } else {
                $this->writeInFile($directory, $this->genericfilename, $render);
            }
        }
    }

    private function clear(string $directory) : void {
        $finder = new Finder();
        $filesystem = new Filesystem();
        $files = $finder->files()->in($directory);
        $filesystem->remove($files);
    }

    private function renderDefinitions(array $definitions) : array {
        $renderedDefinitions = [];

        foreach($definitions as $parent => $definition) {
            $renderedDefinitions[$parent] = $this->twig->render('part.css.twig', ['definitions' => $definition]);
        }

        return $renderedDefinitions;
    }

    private function writeInFile(string $directory, string $filename ,string $render) {
        $file = fopen($directory.$filename, 'a');
        fwrite($file, $render);
        fclose($file);
    }
}