<?php


class Config
{
  
  protected $config;
  
  
  
  function __construct($root)
  {
    $data = File::read('config.json');
    $this->config = json_decode($data);
  
    $this->config->root = $root;
    
    $config = $this->config;
    $config->url = $_SERVER['HTTP_HOST'] . $config->folder;
    $config->address = "//{$config->url}";
    $config->fullimagepath = "{$config->address}{$config->imagepath}";
  }
  
  
  
  public function get()
  {
    return $this->config;
  }

}