<?php


class Route
{
    protected $request;
    protected $method;
    protected $controllerName;

    protected $controllersPath = 'controllers/';



    function __construct($url)
    {
        $this->request = Parse::request($url);
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->controllerName = $this->selectController();
        $this->includeController();
    }
  
  

    public function start()
    {
        new $this->controllerName($this->request);
    }



    protected function fileExist()
    {
        $path = $this->controllersPath . $this->controllerName . '.php';
        return File::exist($path);
    }



    protected function selectController()
    {
        switch ($this->method)
        {
            case 'GET':
                return 'ShowController';
                break;
            case 'POST':
                return 'CreateController';
                break;
            default:
                return 'ShowController';
        }
    }



    protected function includeController()
    {
        $path = $this->controllersPath . $this->controllerName . '.php';
        include $path;
    }
}
