<?php


class View
{
  protected $name;
  protected $viewsPath = 'views/';
  protected $twig;
  
  
  function __construct($name)
  {
    $this->name = $name;
    
    $loader = new Twig_Loader_Filesystem($this->viewsPath);
    $this->twig = new Twig_Environment($loader, [
        'debug' => true
    ]);
    $this->twig->addExtension(new Twig_Extension_Debug());
  }
  
  
  public function render($data)
  {
    $twig = $this->twig->load("{$this->name}.twig");
    $data = (array) $data;
    echo $twig->render($data);
  }
  
}