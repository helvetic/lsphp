<?php


class Controller
{
  protected $name;
  protected $view;
  protected $handler;
  
  public $data;

  
  
  function __construct()
  {
    $this->name = App::controller();
    $this->view = new View($this->name);
    $this->addData();
  }
  
  
  
  protected function addData()
  {
    global $config;
    $this->data = new stdClass();
    
    $page = Page::where('uri', App::uri())->first();
  
    $this->data->menu     = Menu::list();
    $this->data->imgpath  = $config->fullimagepath;
    $this->data->folder   = $config->folder;
    $this->data->title    = $page->title;
    $this->data->h1       = $page->h1;
    $this->data->content  = $page->content;
  }
  
  
  
  protected function handle($handler = true)
  {
    if ($handler !== true) {
      $handlerName = $handler;
    } else {
      $handlerName = $this->name;
    }
    require_once "core/handlers/{$handlerName}.php";
  }
  
}