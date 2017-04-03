<?php


class Route
{
  
  protected $url;
  protected $siteFolder;
  protected $name;
  protected $controllerName;
  
  protected $controllersPath = 'controllers/';
  
  
  
  function __construct()
  {
    global $config;
    $this->siteFolder = $config->folder;
    
    $this->url = $_SERVER['REQUEST_URI'];
  
    App::uri(Parse::uri($this->url, $this->siteFolder));
    App::controller(App::uri());
    
    $this->controllerName = ucwords(App::controller()) . 'Controller';
  
    $this->selectController();
    $this->includeController();
  }
  
  
  
  protected function fileExist()
  {
    $path = $this->controllersPath . $this->controllerName . '.php';
    return File::exist($path);
  }
  
  
  
  protected function selectController()
  {
    $page = Page::where('uri', App::controller())->first();
    $uris = ['exit', '', '403'];
    
    if ($page->protected && !App::isAuth()) {
      $this->pageForbidden();
    }
    
    if ($page->exists || in_array(App::uri(), $uris)) {
      if(!$this->fileExist()) {
        $this->controllerName = 'DefaultController';
        App::controller('default');
      }
    } else {
      $this->pageNotFound();
    }
  }
  
  
  
  protected function includeController()
  {
    $path = $this->controllersPath . $this->controllerName . '.php';
    include $path;
  }
  
  
  
  public static function pageNotFound()
  {
    $host = 'http://'.$_SERVER['HTTP_HOST'] . '/';
  
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    header('Location:'. $host .'404');
  }
  
  
  public static function pageForbidden()
  {
    $host = 'http://'.$_SERVER['HTTP_HOST'] . '/';
    
    header('HTTP/1.1 403 Forbidden');
    header('Status: 403 Forbidden');
    echo "403 Forbidden";
    exit;
  }
  
  
  public static function redirectTo ($uri) {
    $host  = $_SERVER['HTTP_HOST'];
    $path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$path/$uri");
    exit;
  }
  
  
  
  public function run()
  {
    new $this->controllerName();
  }
  
}