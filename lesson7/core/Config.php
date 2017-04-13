<?php


class Config
{
  
  protected $config;
  
  
  
  function __construct($root)
  {
    $data = File::read('config.json');
    $this->config = json_decode($data);
  
    $this->config->root = $root;
  }
  
  
  
  public function get()
  {
    return $this->config;
  }

}